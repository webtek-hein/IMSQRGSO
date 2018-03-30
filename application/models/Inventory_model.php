<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventory_model extends CI_Model
{
    //Adding of Item to the inventory
    public function add_item($counter)
    {
        $user_id = $this->session->userdata['logged_in']['user_id'];
        $item_type = $this->input->post('Type')[$counter];
        $quantity = $this->input->post('quant')[$counter];
        $serialStatus = $this->input->post('serialStatus')[$counter];

        $cost = $this->input->post('cost')[$counter];
        $date = $this->input->post('rec')[$counter];
        $transaction_number = $this->input->post('or')[$counter];
        if ($serialStatus === null) {
            $serialStatus = '0';
        }
        $data = array(
            'item_name' => $this->input->post('item')[$counter],
            'quantity' => $quantity,
            'item_description' => $this->input->post('description')[$counter],
            'unit' => $this->input->post('Unit')[$counter],
            'item_type' => $item_type,
            'serialStatus' => $serialStatus,
            'initialStock' => $quantity,
            'initialCost' => $cost,
            'cost' => $cost
        );

        $data1 = array(
            'PO_number' => $this->input->post('PO')[$counter],
            'date_delivered' => $this->input->post('del')[$counter],
            'date_received' => $date,
            'unit_cost' => $cost,
            'quantity' => $quantity,
            'expiration_date' => $this->input->post('exp')[$counter],
            'or_no' => $transaction_number,
            'supplier_id' => $this->input->post('supp')[$counter]
        );

        try {
            $this->db->trans_begin();

            //  1. Insert into item
            $this->db->insert('item', $data);
            //item insert id
            $item_id = array('item_id' => $this->db->insert_id());

            // 2. Insert to item detail
            $this->db->insert('itemdetail', $data1 + $item_id);

            //item detail insert id
            $insert_id = $this->db->insert_id();

            //create an array of serial for items with serial
            if ($serialStatus === '1') {
                $serial = array_fill(1, $quantity, array('item_det_id' => $insert_id));
                $this->db->insert_batch('serial', $serial);
            }
            $this->db->insert('transaction',
                array(
                    'date' => $date,
                    'transaction_number' => $transaction_number,
                    'increased' => $quantity,
                    'item_id' => $item_id['item_id'],
                    'unit_cost' => $cost,
                    'transaction' => 'added'
                ));
            // 3. Insert into logs
            $this->db->insert('logs.increaselog', array('userid' => $user_id, 'item_det_id' => $insert_id, 'quantity' => $quantity));
            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
                throw new Exception($this->db->trans_status());
            } else {
                $this->db->trans_commit();


                return $this->db->trans_status();
            }
        } catch (Exception $e) {
            return $e;
        }
    }

    //Adding bulk of Item to the inventory
    public function saveAll()
    {
        $user_id = $this->session->userdata['logged_in']['user_id'];
        $item_name = $this->input->post('item');
        $data = [];
        $data1 = [];

        foreach ($item_name as $key => $value) {
            if (isset($this->input->post('serialStatus')[$key])) {
                $serialStatus = $this->input->post('serialStatus')[$key];
            } else {
                $serialStatus = '0';
            }

            $data[] = array(
                'item_name' => $item_name[$key],
                'quantity' => $this->input->post('quant')[$key],
                'cost' => $this->input->post('quant')[$key],
                'item_description' => $this->input->post('description')[$key],
                'unit' => $this->input->post('Unit')[$key],
                'item_type' => $this->input->post('Type')[$key],
                'serialStatus' => $serialStatus,
                'initialStock' => $this->input->post('quant')[$key],
                'initialCost' => $this->input->post('cost')[$key]
            );
        }

        $this->db->trans_start();
        // 1. Insert into item
        $count = count($data);
        $this->db->insert_batch('item', $data);

        //item insert id
        $id = $this->db->insert_id();

        //last insert id
        $last_insert_id = ($count - 1) + $id;
        $insert_id = range($id, $last_insert_id);
        $trans_data = [];
        $date = $this->input->post('rec');
        $transaction_number = $this->input->post('or');
        $cost = $this->input->post('cost');
        $quantity = $this->input->post('quant');


        foreach ($insert_id as $key => $value) {
            $trans_data[] = array(
                'date' => $date[$key],
                'transaction_number' => $transaction_number[$key],
                'unit_cost' => $cost[$key],
                'item_id' => $insert_id[$key],
                'increased' => $quantity[$key],
                'transaction' => 'added'
            );
            $data1[] = array(
                'PO_number' => $this->input->post('PO')[$key],
                'date_delivered' => $this->input->post('del')[$key],
                'date_received' => $date[$key],
                'unit_cost' => $cost[$key],
                'quantity' => $this->input->post('quant')[$key],
                'expiration_date' => $this->input->post('exp')[$key],
                'item_id' => $insert_id[$key],
                'supplier_id' => $this->input->post('supp')[$key],
                'or_no' => $transaction_number[$key]
            );
        }

        // 2. Insert to item detail
        $this->db->insert_batch('itemdetail', $data1);

        //item detail insert id
        $id = $this->db->insert_id();
        $last_insert_id = ($count - 1) + $id;
        $item_detail_id = range($id, $last_insert_id);

        foreach ($item_detail_id as $key => $value) {
            $detail[] = array('item_det_id' => $item_detail_id[$key],
                'userid' => $user_id,
                'quantity' => $quantity[$key]
            );
            $item_type = $this->input->post('Type');
            $serialStatus = $this->input->post('serialStatus');

            //serial
            if ($item_type[$key] === 'CO' && $serialStatus[$key] === '1') {
                $serial = array_fill(1, $quantity[$key], array('item_det_id' => $item_detail_id[$key]));
                if (isset($serial)) {
                    $this->db->insert_batch('serial', $serial);
                }
            }
        }

        $this->db->insert_batch('transaction', $trans_data);

        // 3. Insert into logs
        $this->db->insert_batch('logs.increaselog', $detail);
        $this->db->trans_complete();

    }

    //Distribute item
    public function distrib($position, $user)
    {
        $owner = $this->input->post('owner');
        $serial_data = [];
        $dept = $this->input->post('dept');

        //Count PR of department
        $this->db->select('count(PR_no) as PR_no');
        $this->db->where('dept_id', $dept);
        $query = $this->db->get('distribution')->row();
        $PR_no = intval($query->PR_no) + 1;

        $item_det_id = $this->input->post('id');
        $serial = $this->input->post('serial');
        $serial_id = [];
        if (isset($serial)) {
            $quantity = count($serial);
        }else{
            $quantity = $this->input->post('quantity');
        }
        $query = $this->db->select('item.item_id,item.cost')
            ->join('item', 'itemdetail.item_id = item.item_id ', 'inner')
            ->where('itemdetail.item_det_id', $item_det_id)
            ->get('itemdetail')->row();
        $item_id = $query->item_id;
        $unit_cost = $query->cost;
        if ($position === 'Custodian') {
            $this->db->set('quantity', 'quantity-' . $quantity, FALSE);
            $this->db->where('item_det_id', $item_det_id);
            $this->db->update('itemdetail');

            $this->db->set('quantity', 'quantity-' . $quantity, FALSE);
            $this->db->where('item_id', $item_id);
            $this->db->update('item');


            $date = $this->input->post('date');
            $transaction_number = $PR_no;


            $data = array(
                'dept_id' => $dept,
                'ac_id' => $this->input->post('Code'),
                'quantity_distributed' => $quantity,
                'date_received' => $date,
                'PR_no' => $PR_no,
                'OBR_no' => $this->input->post('obr'),
                'item_det_id' => $item_det_id,
                'user_id' => $user,
                'supply_officer_id' => $owner,
                'status' => 'pending',
                'cost' => $unit_cost
            );

            $this->db->insert('distribution', $data);
            //dist_id
            $dist_id = $this->db->insert_id();

            $this->db->insert('reconciliation',array('dist_id' => $dist_id));

            $this->db->insert('logs.decreaselog', array('userid' => $user, 'dist_id' => $dist_id));
            //dec log id
            $dec_log_id = $this->db->insert_id();

            $this->db->insert('transaction',
                array(
                    'date' => $date,
                    'transaction_number' => $transaction_number,
                    'decreased' => $quantity,
                    'item_id' => $item_id,
                    'unit_cost' => $unit_cost,
                    'transaction' => 'issued'
                ));
            // if item has serial
            if (isset($serial)) {
                foreach ($serial as $key => $value) {
                    // if serial is not null
                    if ($value !== 'null') {
                        $serial_id[] = array(
                            'serial_id' => $key,
                            'dec_log_id' => $dec_log_id
                        );
                    }

                    $serial_data[] = array(
                        'serial' => $value,
                        'dist_id' => $dist_id,
                        'item_status' => 'Distributed'
                    );
                }
                $this->db->update_batch('serial', $serial_data, 'serial');
                $this->db->insert_batch('logs.decreaseserial', $serial_id);
            }
        } else {
            $employee = $this->input->post('owner');
            if (count($serial) != 0) {
                $this->db->set('employee', $employee);
                $this->db->where_in('serial', $serial);
                $this->db->update('serial');
            } else {
                $quantity = $this->input->post('quantity');
                $dist_id = $this->input->post('id');
                $mooedata = array('dist_id' => $dist_id, 'employee' => $employee, 'quantity_distributed' => $quantity);

                $this->db->insert('mooedistribution', $mooedata);
            }
        }

    }

    public
    function insert()
    {
        $user_id = $this->session->userdata['logged_in']['user_id'];
        $filename = ($_FILES["csv_file"]["tmp_name"]) or die("can't open file");
        $file = (fopen($filename, "r"));
        while (($row = fgetcsv($file, 10000, ",")) !== FALSE) {
            $data = array(
                'quantity' => $row[0],
                'unit' => $row[1],
                'item_name' => $row[2],
                'item_description' => $row[3],
                'item_type' => $row[4],
                'serial' => $row[5]
            );
            $this->db->insert('item', $data);
            $insert_id = array('item_id' => $this->db->insert_id());


            $data1 = array(
                'date_delivered' => $row[6],
                'date_received' => $row[7],
                'quantity' => $row[0],
                'unit_cost' => $row[8],
                'expiration_date' => $row[9],
                'OR_no' => $row[10],
                'PO_number' => $row[11],
                'supplier_id' => $row[12]
            );

            $this->db->insert('itemdetail', $data1 + $insert_id);
            //item detail insert id
            $insert_id = $this->db->insert_id();
            $ser = array('item_type' => $row[4]);
            $quant = array('quantity' => $row[0]);
            $serial = array('serial' => $row[5]);
            if ($ser['item_type'] === 'CO') {
                if ($serial['serial'] === '1') {
                    $serial = array_fill(1, $quant['quantity'], array('item_det_id' => $insert_id));
                    $this->db->insert_batch('serial', $serial);

                }
            }
            $datalogs = array(
                'userid' => $user_id,
                'item_det_id' => $insert_id,
                'quantity' => $row[0],
            );

            $this->db->insert('logs.increaselog', $datalogs);
        }

    }

    public
    function viewincrease()
    {
        $query = $this->db->get('item');
        return $query->result_array();

    }


    public
    function select_item($type)
    {
        $this->db->select('item.*,(cost*quantity) as totalcost');
        $this->db->where('item_type', $type);
        $this->db->order_by('item_id','desc');
        $query = $this->db->get('item');
        return $query->result_array();
    }

//Add quantity to a specific item

    public
    function addquant($item_det_id, $counter)
    {
        $user_id = $this->session->userdata['logged_in']['user_id'];
        $quantity = $this->input->post('quant')[$counter];
        $supplier = $this->input->post('supp')[$counter];

        $date = $this->input->post('rec')[$counter];
        $unit_cost = $this->input->post('cost')[$counter];
        $transaction_number = $this->input->post('or')[$counter];

        $data1 = array(
            'PO_number' => $this->input->post('PO')[$counter],
            'date_delivered' => $this->input->post('del')[$counter],
            'date_received' => $date,
            'unit_cost' => $unit_cost,
            'quantity' => $quantity,
            'supplier_id' => $supplier,
            'expiration_date' => $this->input->post('exp')[$counter],
            'or_no' => $transaction_number
        );

        $this->db->where('item_det_id', $item_det_id);
        $this->db->join('item', 'itemdetail.item_id = item.item_id');
        $query = $this->db->get('itemdetail')->row();
        $item_id = array('item_id' => $query->item_id);
        $item_type = $query->item_type;
        $serialStatus = $query->serialStatus;
        $lastQuantity = $query->quantity;
        $lastPrice = $query->cost;
        $totalLastCost = $lastPrice * $lastQuantity;
        $totalCost = $unit_cost * $quantity;

        $latestCost = ($totalCost + $totalLastCost) / ($lastQuantity + $quantity);
        try {
            $this->db->trans_begin();
            // 2. Insert to item detail
            $this->db->insert('itemdetail', $data1 + $item_id);
            //item detail insert id
            $insert_id = $this->db->insert_id();
            //create an array of serial for capital outlay item
            $this->db->select('supplier_name');
            $this->db->where('supplier_id', $supplier);
            $supp = $this->db->get('supplier')->row()->supplier_name;
            if ($serialStatus === '1') {
                $serial = array_fill(1, $quantity, array('item_det_id' => $insert_id));
                $this->db->insert_batch('serial', $serial);
                $action = "<div class=\"dropdown\">
                            <a data-toggle=\"dropdown\" class=\"btn btn-default btn-sm dropdown-toggle\" type=\"button\" aria-expanded=\"false\"><span class=\"caret\"></span></a>
                            <div id=\"DetailDropDn\" role=\"menu\" class=\"dropdown-menu\">
                            <a class=\"dropdown-item\"  href=\"#\" onclick=\"noserial($item_det_id)\"data-toggle=\"modal\" data-id='$item_det_id'data-target=\" .Distribute\">
                            <i class=\" fa fa-share-square-o\" ></i > Distribute</a >
                            <a class=\"serialdrop dropdown-item\" onclick='viewSerial($item_det_id)' data-toggle=\"collapse\" 
                            href=\"#serialpage\" role=\"button\" aria-expanded=\"false\" aria-controls=\"serialpage\"><i class=\"fa fa-folder-open\"></i>
                            </i > View Serial </a >
                            </div>
                            </div>";
            } else {
                $action = "<div class=\"dropdown\">
                            <a data-toggle=\"dropdown\" class=\"btn btn-default btn-sm dropdown-toggle\" type=\"button\" aria-expanded=\"false\"><span class=\"caret\"></span></a>
                            <div id=\"DetailDropDn\" role=\"menu\" class=\"dropdown-menu\">
                            <a class=\"dropdown-item\"  href=\"#\" onclick=\"getserial($item_det_id)\"data-toggle=\"modal\" data-id='$item_det_id'data-target=\" .Distribute\">
                            <i class=\" fa fa-share-square-o\" ></i > Distribute</a >
                            </div>
                            </div>";
            }

            $data1 = array(
                '<a href="#" onclick="removeDetail('.$item_det_id.')"> <i class="fa fa-remove"></i> </a>',
                $this->input->post('PO')[$counter],
                $this->input->post('del')[$counter],
                $this->input->post('rec')[$counter],
                $this->input->post('exp')[$counter],
                $this->input->post('cost')[$counter],
                $supp,
                $quantity,
                $this->input->post('or')[$counter],
                $action
            );


            $this->db->set('quantity', 'quantity+' . $quantity, FALSE);
            $this->db->set('cost', $latestCost);
            $this->db->where($item_id);
            $this->db->update('item');
            // 3. Insert into logs
            $this->db->insert('logs.increaselog', array('userid' => $user_id, 'item_det_id' => $insert_id, 'quantity' => $quantity));

            $this->db->insert('transaction',
                array(
                    'date' => $date,
                    'transaction_number' => $transaction_number,
                    'increased' => $quantity,
                    'item_id' => $item_id['item_id'],
                    'unit_cost' => $unit_cost,
                    'transaction' => 'added'
                ));
            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
                throw new Exception($this->db->trans_status());
            } else {
                $this->db->trans_commit();
                return $data1;
            }
        } catch (Exception $e) {
            return $e;
        }
    }

    public
    function getItem($dept, $id)
    {
        if ($dept === 'dept') {
            $this->db->select('item.*,sum(quantity_distributed) as quant');
            $this->db->join('itemdetail', 'distribution.item_det_id = itemdetail.item_det_id', 'inner');
            $this->db->join('item', 'itemdetail.item_id =' . $id, 'inner');
            $this->db->group_by('item.item_id');
            $query = $this->db->get('distribution');
        } else {
            $this->db->where('item.item_id', $id);
            $query = $this->db->get('item');
        }
        return $query->row();
    }

    public
    function edititem()
    {
        $user_id = $this->session->userdata['logged_in']['user_id'];
        $values = [];
        $item_id = $this->input->post('id');
        // select item
        $item = $this->db->get_where('item', array('item_id' => $item_id))->row();

        // convert to array
        $data1 = array(
            'item_name' => $item->item_name,
            'item_description' => $item->item_description,
            'unit' => $item->unit,
            'item_type' => $item->item_type
        );
        // update item
        $data = array(
            'item_name' => $this->input->post('item'),
            'item_description' => $this->input->post('description'),
            'unit' => $this->input->post('Unit'),
            'item_type' => $this->input->post('Type')
        );
        $this->db->set($data);
        $this->db->where('item_id', $item_id);
        $this->db->update('item');

        // compare data
        $result1 = array_diff($data1, $data);
        $result2 = array_diff($data, $data1);

        foreach ($result1 as $key => $value) {
            $values[] = array(
                'field_edited' => $key,
                'old_value' => $value,
                'new_value' => $result2[$key],
                'userid' => $user_id,
                'item_id' => $item_id
            );
        }
        //insert to edit log table
        $this->db->insert_batch('logs.editLog', $values);
    }

    public
    function viewdetail($id,$position)
    {
        $this->db->select('OR_no,PO_number,item.serialStatus,item_type,date_delivered,date_received,expiration_date,unit_cost,supplier_name,
        item_name,item_description,item.quantity as total,unit,itemdetail.quantity,itemdetail.item_det_id,item.item_id');
        $this->db->join('itemdetail', 'item.item_id = itemdetail.item_id', 'inner');
        $this->db->where('itemdetail.status','active');
        $this->db->join('supplier', 'supplier.supplier_id = itemdetail.supplier_id', 'inner');
        $this->db->order_by('itemdetail.item_det_id','desc');
        $query = $this->db->get_where('item', array('item.item_id' => $id));;

        return $query->result_array();
    }

    public
    function viewDetailperDept($dept,$id,$dept_id,$position)
    {
        $this->db->select('CONCAT(first_name," ",last_name) as receiver,
        dist_id,item.item_type,item.serialStatus,quantity_distributed,distribution.cost,
        distribution.status as dist_stat,distribution.PR_no,itemdetail.*,department,supplier_name');
        $this->db->join('itemdetail', 'distribution.item_det_id = itemdetail.item_det_id', 'inner');
        $this->db->join('item', 'item.item_id = itemdetail.item_id', 'inner');
        $this->db->join('department', 'department.dept_id = distribution.dept_id', 'inner');
        $this->db->join('account_code', ' account_code.ac_id = distribution.ac_id ', 'inner');
        $this->db->join('user', ' distribution.supply_officer_id = user.user_id ', 'inner');
        $this->db->join('supplier', 'supplier.supplier_id = itemdetail.supplier_id', 'inner');
        if($position === 'Supply Officer'){
            $this->db->where('distribution.dept_id',$dept_id);
        }elseif ($position === 'Custodian' && $dept !== 'dept'){
            $this->db->where('itemdetail.status','active');

        }
        $this->db->order_by('dist_id','desc');
        $query = $this->db->get_where('distribution', array('distribution.item_det_id' => $id));
        return $query->result_array();
    }

    public
    function departmentInventory($type, $id)
    {
        $this->db->select('item.*,sum(quantity_distributed) as quant');
        $this->db->join('itemdetail', 'distribution.item_det_id = itemdetail.item_det_id', 'inner');
        $this->db->join('item', 'itemdetail.item_id = item.item_id', 'inner');
        $this->db->where('item.item_type', $type);
        $this->db->where('distribution.dept_id', $id);
        $this->db->group_by('item.item_id');
        $this->db->order_by('item.item_id','desc');
        $query = $this->db->get('distribution');
        return $query->result_array();
    }

    public
    function reconcile($type, $id)
    {
        $this->db->select('item.*,sum(quantity_distributed) as quant,reconciliation.physical_count as pc,reconciliation.remarks,reconciliation.*,distribution.date_received');
        $this->db->join('itemdetail', 'distribution.item_det_id = itemdetail.item_det_id', 'inner');
        $this->db->join('item', 'itemdetail.item_id = item.item_id', 'inner');
        $this->db->join('reconciliation', 'distribution.item_det_id = reconciliation.dist_id', 'inner');
        $this->db->where('item.item_type', $type);
        $this->db->where('distribution.dept_id', $id);
        $this->db->group_by('reconciliation.recon_id,reconciliation.dist_id,distribution.date_received');
        $this->db->order_by('item.item_id','desc');
        $query = $this->db->get('distribution');
        return $query->result_array();
    }

    public
    function compareitem()
    {
        $remarks = $this->input->post('remarks');
        $pcount = $this->input->post('reconcileitem');
        $id = $this->input->post('ids');
        $keys = $this->input->post('ids');

        $data = array();
        foreach ($keys as $key => $value) {
            // if serial is not null
            if ($value !== 'null' || $value !== 0) {
                $data[$value] = array(
                    'recon_id' => $id[$key],
                    'physical_count' => $pcount[$key],
                    'remarks' => $remarks[$key]
                );
            }
        }
        var_dump($data);

        return $this->db->update_batch('reconciliation', $data,'recon_id');
    }

    public
    function selectdetails()
    {
        $this->db->join('itemdetail', 'item.item_id = itemdetail.item_id', 'inner');
        $query = $this->db->get('item');
        return $query->result_array();
    }

    public
    function select_departments()
    {
        $query = $this->db->get('department');
        return $query->result_array();
    }

    public
    function get_department_list()
    {
        $this->db->order_by('res_center_code');
        $query = $this->db->get('department');
        return $query->result_array();

    }

    public
    function select_acc_codes()
    {
        $query = $this->db->get('account_code');
        return $query->result_array();
    }

    public
    function return_item()
    {
        $query = $this->db->get('return');
        return $query->result_array();
    }

    public
    function getSerial($det_id, $position)
    {

        $this->db->select('item.serialStatus,serial_id,serial.serial,serial.item_status');
        $this->db->join('itemdetail', 'itemdetail.item_det_id = serial.item_det_id', 'inner');
        $this->db->join('item', 'item.item_id = itemdetail.item_id', 'inner');
        if ($position === 'Custodian') {
            $this->db->where('item_status', 'In-stock');
        } else {
            $this->db->where('item_status', 'Distributed');
            $this->db->join('distribution', 'distribution.dist_id = serial.dist_id');
        }
        $this->db->where('serial.item_det_id', $det_id);
        $query = $this->db->get('serial');
        return $query->result_array();
    }

    public
    function addSerial()
    {
        $serial = $this->input->post('serial');
        $data = array();
        foreach ($serial as $key => $value) {
            // if serial is not null
            if ($value !== 'null') {
                $data[] = array(
                    'serial_id' => $key,
                    'serial' => $value,
                );
            }
        }
        return $this->db->update_batch('serial', $data, 'serial_id');

    }

    public
    function countItem($id)
    {
        $minimum = $this->db->select('count(*) as min')
            ->join('itemdetail', 'item.item_id = itemdetail.item_id ', 'inner')
            ->join('serial', 'serial.item_det_id = itemdetail.item_det_id', 'inner')
            ->where('item.item_id', $id)
            ->where('serial.serial !=', null, False)
            ->get('item')
            ->row();
        return $minimum;
    }

    public
    function editquant()
    {
        $user_id = $this->session->userdata['logged_in']['user_id'];
        $values = [];
        $item_id = $this->input->post('id');
        // select item
        $item = $this->db->get_where('itemdetail', array('item_id' => $item_id))->row();
        // convert to array
        $data1 = array(
            'quantity' => $item->quantity,
        );
        // update item
        $data = array(
            'quantity' => $this->input->post('quantity'),
        );

        $this->db->set($data);
        $this->db->where('item_det_id', $item_id);
        $this->db->update('itemdetail');

        $this->db->set($data);
        $this->db->where('item_id', $item_id);
        $this->db->update('item');

        // compare data
        $result1 = array_diff($data1, $data);
        $result2 = array_diff($data, $data1);

        foreach ($result1 as $key => $value) {
            $values[] = array(
                'field_edited' => $key,
                'old_value' => $value,
                'new_value' => $result2[$key],
                'userid' => $user_id
            );
        }

        //insert to edit log table
        $this->db->insert_batch('logs.editLog', $values);

    }

    public
    function accept()
    {
        $user_id = $this->session->userdata['logged_in']['user_id'];
        $dist_id = $this->input->post('id');
        $remarks = $this->input->post('remarks');
        $accept = 'Accepted';

        $this->db->set('status', $accept);
        $this->db->where('dist_id', $dist_id);
        $this->db->update('distribution');

    }

    public
    function mobiledetail()
    {
        $this->db->select('serial.serial_id, item.item_name, serial.serial, account_code.account_code, account_code.description, item.item_description, itemdetail.unit_cost, item.item_type, itemdetail.expiration_date, serial.employee');
        $this->db->distinct();
        $this->db->join('itemdetail', 'itemdetail.item_id = item.item_id', 'left');
        $this->db->join('serial', 'serial.item_det_id = itemdetail.item_det_id', 'left');
        $this->db->join('distribution', 'distribution.item_det_id = itemdetail.item_det_id', 'left');
        $this->db->join('account_code', 'account_code.ac_id = distribution.ac_id', 'left');
        $this->db->where('serial.serial !=', NULL);
        $query = $this->db->get('item');
        return $query->result_array();
    }

    public
    function returnitem()
    {

        $user_id = $this->session->userdata['logged_in']['user_id'];
        $id = $this->input->post('id');
        $serial = $this->input->post('serial');

        if(isset($serial)){
            $quantity_returned = count($serial);
        }else{
            $quantity_returned = $this->input->post('quantity');
        }

        $query = $this->db->select('item.serialStatus,distribution.cost,distribution.PR_no,itemdetail.item_det_id,itemdetail.item_id')
            ->join('distribution', 'itemdetail.item_det_id = distribution.item_det_id')
            ->join('item', 'itemdetail.item_id = item.item_id')
            ->where('distribution.dist_id', $id)
            ->get('itemdetail')->row();
        $item_det_id = $query->item_det_id;
        $item_id = $query->item_id;
        $transaction_number = ($query->PR_no);
        $cost = ($query->cost);
        $serialStatus = ($query->serialStatus);

        if ($serialStatus === '1') {
            for ($i = 0; $i < $quantity_returned; $i++) {
                $serial_data[] = array(
                    'item_status' => 'returned',
                    'serial' => $serial[$i]
                );
            }
            $this->db->set('item_status', 'Returned');
            $this->db->where_in('serial', $serial);
            $this->db->update('serial');

        }

        $date = $this->input->post('returndate');
        $data = array(
            'return_quantity' => $quantity_returned,
            'date_returned' => $date,
            'receiver' => $this->input->post('receiver'),
            'remarks' => $this->input->post('remarks'),
            'item_det_id' => $item_det_id,
            'dist_id'=> $id,
            'status'=>'pending'

        );
        $this->db->insert('returnitem', $data);

        $return_id = $this->db->insert_id();

        $this->db->insert('logs.returnlog',array(
            'return_id' => $return_id,
            'userid' => $user_id
        ));
    }

    public function ledger($id)
    {
        $this->db->where('item_id', $id);
        $query = $this->db->get('transaction');
        return $query->result_array();


    }

    public function returns($department,$position){

        $this->db->select('receiver,date_returned,item.*,returnitem.*,department,distribution.PR_no','inner');
        $this->db->join('itemdetail','returnitem.item_det_id = itemdetail.item_det_id','inner');
        $this->db->join('item','itemdetail.item_id = item.item_id','inner');
        $this->db->join('distribution','returnitem.dist_id = distribution.dist_id','inner');
        $this->db->join('department','department.dept_id = distribution.dept_id','inner');
        if($position === 'Supply Officer'){
            $this->db->where('distribution.dept_id',$department);
        }
        $this->db->where('returnitem.status','pending');

        $query = $this->db->get('returnitem');

        return $query->result_array();
    }
    public function acceptReturn($return_id){
        $query = $this->db
            ->where('return_id',$return_id)
            ->join('distribution','distribution.dist_id = returnitem.dist_id')
            ->join('itemdetail','returnitem.item_det_id = itemdetail.item_det_id')
            ->get('returnitem')
            ->row();

        $dist_id = $query->dist_id;
        $item_det_id = $query->item_det_id;
        $item_id = $query->item_id;
        $quantity_returned = $query->return_quantity;
        $date = $query->date_returned;
        $transaction_number = $query->PR_no;
        $cost = $query->cost;

        $this->db->set('quantity_distributed', 'quantity_distributed-' . $quantity_returned, FALSE);
        $this->db->where('dist_id', $dist_id);
        $this->db->update('distribution');

        $this->db->set('quantity', 'quantity+' . $quantity_returned, FALSE);
        $this->db->where('item_det_id', $item_det_id);
        $this->db->update('itemdetail');

        $this->db->set('quantity', 'quantity+' . $quantity_returned, FALSE);
        $this->db->where('item_id', $item_id);
        $this->db->update('item');

        $this->db->insert('transaction',
            array(
                'date' => $date,
                'transaction_number' => $transaction_number,
                'increased' => $quantity_returned,
                'item_id' => $item_id,
                'unit_cost' => $cost,
                'transaction' => 'returned'
            ));
        $this->db->set('status','accepted');
        $this->db->where('return_id',$return_id);
        return $this->db->update('returnitem');
    }

    public function declineReturn($return_id){
        $this->db->set('status','declined');
        $this->db->where('return_id',$return_id);
        return $this->db->update('returnitem');
    }
    public function cancelReturn($return_id){
        $this->db->set('status','cancelled');
        $this->db->where('return_id',$return_id);
        return $this->db->update('returnitem');
    }

    //count total items received dash custodian
    public function itemsrec(){
        $this->db->SELECT('COUNT(inc_log_id) as countInc');
        $this->db->where('date(timestamp)','CURDATE()',false);
        $query = $this->db->get('logs.increaselog');
        return $query->result_array();
    }

    //count issued items dash custodian
    public function issued(){
        $this->db->SELECT('COUNT(dec_log_id) as issued');
        $this->db->where('date(timestamp)','CURDATE()',false);
        $query = $this->db->get('logs.decreaselog');
        return $query->result_array();
    }

    //count return items dash custodian
    public function returndash(){
        $this->db->SELECT('COUNT(ret_log_id) as returned');
        $this->db->where('date(timestamp)','CURDATE()',false);
        $query = $this->db->get('logs.returnlog');
        return $query->result_array();
    }

    //total cost dash custodian
    public function totalcost(){
        $this->db->SELECT('sum(unit_cost * quantity) as totalcost');
        $this->db->where('date_received','CURDATE()', false);
        $query = $this->db->get('gsois.itemdetail');
        return $query->result_array();
    }

    //total expired items dash custodian and admin
    public function totalexpired(){
        $this->db->SELECT('count(expiration_date) as expired');
        $this->db->where('expiration_date <=','CURDATE()',false);
        $query = $this->db->get('gsois.itemdetail');
        return $query->result_array();
    }
    //total user dash admin
    public function totaluser(){
        $this->db->SELECT('count(user_id) as totaluser');
        $query = $this->db->get('gsois.user');
        return $query->result_array();
    }
//Supply Dashboard
    //count items issued for the day
    public function itemsThisDay(){
        $user_id = $this->session->userdata['logged_in']['user_id'];
        $this->db->SELECT('count(decreaselog.dec_log_id) as totalItems');
        $this->db->WHERE('gsois.distribution.supply_officer_id', $user_id);
        $this->db->WHERE('date(timestamp)','CURDATE()',false);
        $this->db->JOIN('gsois.distribution','gsois.distribution.dist_id = logs.decreaselog.dist_id');       
        $query = $this->db->get('logs.decreaselog');
        return $query->result_array();
    }

    //count items returned for the day
    public function itemsReturnedThisDay(){
        $user_id = $this->session->userdata['logged_in']['user_id'];
        $this->db->SELECT('count(logs.returnlog.ret_log_id) as totalItemsReturned');
        $this->db->WHERE('gsois.distribution.supply_officer_id', $user_id);
        $this->db->WHERE('date(timestamp)','CURDATE()',false);
        $this->db->JOIN('gsois.returnitem','gsois.returnitem.return_id = logs.returnlog.return_id');   
        $this->db->JOIN('gsois.distribution','gsois.distribution.dist_id = gsois.returnitem.dist_id');           
        $query = $this->db->get('logs.returnlog');
        return $query->result_array();
    }
    //count expired items supply officer
    public function itemsExpired(){
        $user_id = $this->session->userdata['logged_in']['user_id'];
        $this->db->SELECT('count(gsois.itemdetail.item_id) as totalItemsExpired');
        $this->db->WHERE('gsois.distribution.supply_officer_id', $user_id);
        $this->db->WHERE('gsois.itemdetail.expiration_date >=','CURDATE()',false);
        $this->db->JOIN('gsois.distribution','gsois.distribution.item_det_id = gsois.itemdetail.item_det_id');
        $query = $this->db->get('gsois.itemdetail');
        return $query->result_array();
    }
    //total cost supply officer
    public function itemsTcost(){
        $user_id = $this->session->userdata['logged_in']['user_id'];
        $this->db->select('sum(gsois.distribution.cost*gsois.distribution.quantity_distributed) as itemTcost');
        $this->db->WHERE('gsois.distribution.supply_officer_id', $user_id);
        $this->db->WHERE('gsois.distribution.status', 'Accepted');
        $query = $this->db->get('gsois.distribution');
        return $query->result_array();
    }
//end of supplier dashboard
    public function rmDet($id,$serialStatus){
        $this->db->set('status','removed');
        $this->db->where('item_det_id',$id);
        $this->db->update('itemdetail');

        if($serialStatus === '1'){
            $this->db->set('record_status','0');
            $this->db->where('item_det_id',$id);
            $this->db->where('dist_id',null,FALSE);
            $this->db->update('serial');
        }

        $query = $this->db->select('item_id,quantity')
            ->where('item_det_id',$id)->get('itemdetail')->row();

        $item_id = $query->item_id;
        $detailQuant = $query->quantity;

        $this->db->set('quantity', 'quantity-' . $detailQuant, FALSE);
        $this->db->where('item_id',$item_id);
        $this->db->update('item');
    }

    public function rmItems($id){
        $this->db->select('OR_no,PO_number,item.serialStatus,item_type,date_delivered,date_received,expiration_date,unit_cost,supplier_name,
        item_name,item_description,item.quantity as total,unit,itemdetail.quantity,itemdetail.item_det_id,item.item_id');
        $this->db->join('itemdetail', 'item.item_id = itemdetail.item_id', 'inner');
        $this->db->join('supplier', 'supplier.supplier_id = itemdetail.supplier_id', 'inner');
        $this->db->where('itemdetail.status','removed');
        $query = $this->db->get_where('item', array('item.item_id' => $id));;
        return $query->result_array();
    }

    public function revert($id,$serialStatus){
        $this->db->set('status','active');
        $this->db->where('item_det_id',$id);
        $this->db->update('itemdetail');

        if($serialStatus === '1'){
            $this->db->set('record_status','1');
            $this->db->where('item_det_id',$id);
            $this->db->update('serial');
        }

        $query = $this->db->select('item_id,quantity')
            ->where('item_det_id',$id)->get('itemdetail')->row();

        $item_id = $query->item_id;
        $detailQuant = $query->quantity;

        $this->db->set('quantity', 'quantity+' . $detailQuant, FALSE);
        $this->db->where('item_id',$item_id);
        $this->db->update('item');
    }

    public function getSuppOfficers($id){
        return $this->db->select('user_id,CONCAT(first_name," ",last_name) as name')
            ->where('position','Supply Officer')
            ->where('dept_id',$id)
            ->get('user')->result_array();
    }
    //items delivered/added report
    public function deliveredReports($type)
    {
         $this->db->select('date_delivered,item.*')
            ->join('item', 'itemdetail.item_id = item.item_id');
            if($type === 'CO'){
                $this->db->where('item.item_type',$type);
            }elseif ($type === 'MOOE'){
                $this->db->where('item.item_type',$type);
            }
        return $this->db->get('itemdetail')->result_array();
    }
    //items issued reports
    public function issuedReports($type)
    {
        $this->db->select('PR_no,,distribution.cost,department,distribution.date_received,CONCAT(first_name," ",last_name) as supply_officer,item.*,account_code');
        $this->db->join('itemdetail', 'distribution.item_det_id = itemdetail.item_det_id', 'inner');
        $this->db->join('item', 'itemdetail.item_id = item.item_id', 'inner');
        $this->db->join('department', 'distribution.dept_id = department.dept_id');
        $this->db->join('user', 'distribution.supply_officer_id = user.user_id');
        $this->db->join('account_code', 'distribution.ac_id = account_code.ac_id');
        if($type === 'CO'){
            $this->db->where('item.item_type',$type);
        }elseif ($type === 'MOOE'){
            $this->db->where('item.item_type',$type);
        }
        $query = $this->db->get('distribution');
        return $query->result_array();
    }
    // items return reports
    public function returnedReports($type)
    {
        $this->db->select('receiver,date_returned,item.*,returnitem.*,department,distribution.PR_no');
        $this->db->join('itemdetail', 'returnitem.item_det_id = itemdetail.item_det_id', 'inner');
        $this->db->join('item', 'itemdetail.item_id = item.item_id', 'inner');
        $this->db->join('distribution', 'returnitem.dist_id = distribution.dist_id', 'inner');
        $this->db->join('department', 'department.dept_id = distribution.dept_id', 'inner');
        $this->db->where('returnitem.status', 'accepted');
        if($type === 'CO'){
            $this->db->where('item.item_type',$type);
        }elseif ($type === 'MOOE'){
            $this->db->where('item.item_type',$type);
        }

        $query = $this->db->get('returnitem');

        return $query->result_array();
    }
    //supplier report
    public function supplierReport($type){
        $this->db->select('supplier_name,item.*,itemdetail.date_delivered');
        $this->db->join('itemdetail', 'itemdetail.supplier_id = supplier.supplier_id', 'inner');
        $this->db->join('item', 'item.item_id = itemdetail.item_id', 'inner');
        if($type === 'CO'){
            $this->db->where('item.item_type',$type);
        }elseif ($type === 'MOOE'){
            $this->db->where('item.item_type',$type);
        }
        $query = $this->db->get('supplier');

        return $query->result_array();
    }
    //reconciliation date
    public function getInventoryDates(){
        $this->db->select('inventory_date');
        $this->db->group_by('inventory_date');
        $this->db->get('reconciliation');
    }
}