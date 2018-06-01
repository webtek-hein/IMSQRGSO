<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventory_model extends CI_Model
{
    /**
     *
     *This method is for adding items in the inventory.
     *
     * @param int $counter For the index of items to be registered.
     * @return Exception for errors.
     */
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


            $this->db->insert('reconciliation', $item_id + array('beginning_inventory' => $date));

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
                    'running_quantity' => $quantity,
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

    /**
     * This method is for adding more than one items or in bulk
     *in the custodian inventory .
     */
    public function saveAll()
    {
        $user_id = $this->session->userdata['logged_in']['user_id'];
        $item_name = $this->input->post('item');
        $data = [];
        $data1 = [];
        $counter = 0;

        foreach ($item_name as $key => $value) {
            if (isset($this->input->post('serialStatus')[$key])) {
                $serialStatus = '1';
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
        $rec_item_id = [];

        foreach ($insert_id as $key => $value) {
            $rec_item_id[] = array(
                'item_id' => $insert_id[$key]
            );
            $trans_data[] = array(
                'date' => $date[$key],
                'transaction_number' => $transaction_number[$key],
                'unit_cost' => $cost[$key],
                'item_id' => $insert_id[$key],
                'increased' => $quantity[$key],
                'running_quantity' => $quantity[$key],
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

        $this->db->insert_batch('reconciliation', $rec_item_id);

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
            if ($serialStatus[$key] === '1') {
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

    /**
     *
     * This method is for the distribution of items.
     *
     * @param string $position position of the user.
     * @param string $user user to be distribute to/from.
     */
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
        } else {
            $quantity = $this->input->post('quantity');
        }
        $query = $this->db->select('item.item_id,item.cost,item.quantity')
            ->join('item', 'itemdetail.item_id = item.item_id ', 'inner')
            ->where('itemdetail.item_det_id', $item_det_id)
            ->get('itemdetail')->row();
        $item_id = $query->item_id;
        $unit_cost = $query->cost;
        $last_quantiy = $query->quantity;
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
                    'running_quantity' => $last_quantiy - $quantity,
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

                    $employee = $this->input->post('owner');

                    $serial_data[] = array(
                        'serial' => $value,
                        'dist_id' => $dist_id,
                        'item_status' => 'Distributed',
                        'employee' => $employee
                    );
                    $this->db->select('CONCAT(first_name," ",last_name) as name');
                    $this->db->where('user.user_id', $employee);
                    $emp = $this->db->get('user')->row();

                    $enduser_data[] = array(
                        'serial_id' => $key,
                        'accountability_date' => $date,
                        'name' => $emp->name
                    );
                }
                $this->db->update_batch('serial', $serial_data, 'serial');
                $this->db->insert_batch('logs.decreaseserial', $serial_id);
                $this->db->insert_batch('enduser', $enduser_data);
            }
        } else {
            $employee = $this->input->post('owner');
            if (count($serial) != 0) {
                $this->db->set('employee', $employee);
                $this->db->set('item_status', 'UserDistributed');
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

    /**
     * This method is for inserting item in to the inventory.
     */
    public function insert()
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

    /**
     *
     * This method retrieved data of an item.
     *
     * @return mixed result of the query.
     */
    public function viewincrease()
    {
        $query = $this->db->get('item');
        return $query->result_array();

    }

    /**
     *
     * This allows the selection of item.
     *
     * @param string $type type of the item
     * @return mixed result of the query.
     */
    public function select_item($type)
    {
        $this->db->select('item.*,(cost*quantity) as totalcost,recon_id');
        $this->db->where('item_type', $type);
        $this->db->join('reconciliation', 'reconciliation.item_id = item.item_id', 'inner');
        $this->db->where('reconciliation.inventory_date', null, false);
        $this->db->order_by('item_id', 'desc');
        $query = $this->db->get('item');
        return $query->result_array();
    }

    /**
     *
     * This gets serial from database so serials could be displayed on
     * an item.
     *
     * @param string $status status of the serial.
     * @return mixed result of the query
     */
    public function viewItemPerSerial($status)
    {
        $this->db->select('item.*,(cost*quantity) as totalcost,recon_id');
        $this->db->where('serialStatus', $status);
        $this->db->join('reconciliation', 'reconciliation.item_id = item.item_id', 'inner');
        $this->db->where('reconciliation.inventory_date', null, false);
        $this->db->order_by('item_id', 'desc');
        $query = $this->db->get('item');
        return $query->result_array();
    }

    /**
     *
     * This is for adding quantity to an specified item.
     *
     * @param int $item_det_id ID for item details.
     * @param int $counter
     * @return array|Exception
     */
    public function addquant($item_det_id, $counter)
    {
        $user_id = $this->session->userdata['logged_in']['user_id'];
        $quantity = $this->input->post('quant')[$counter];
        $supplier = $this->input->post('supp')[$counter];
        $po = '';
        if (isset($this->input->post('PO')[$counter])) {
            $po = $this->input->post('PO')[$counter];
        }

        $date = $this->input->post('rec')[$counter];
        $unit_cost = $this->input->post('cost')[$counter];
        $transaction_number = $this->input->post('or')[$counter];

        $data1 = array(
            'PO_number' => $po,
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
                            <a class=\"dropdown-item\"  href=\"#\" onclick=\"getserial($insert_id)\"data-toggle=\"modal\" data-id='$insert_id'data-target=\" .Distribute\">
                            <i class=\" fa fa-share-square-o\" ></i > Distribute</a >
                            <a class=\"serialdrop dropdown-item\" onclick='viewSerial($insert_id)' data-toggle=\"collapse\" 
                            href=\"#serialpage\" role=\"button\" aria-expanded=\"false\" aria-controls=\"serialpage\"><i class=\"fa fa-folder-open\"></i>
                            </i > View Serial </a >
                            </div>
                            </div>";
            } else {
                $action = "<div class=\"dropdown\">
                            <a data-toggle=\"dropdown\" class=\"btn btn-default btn-sm dropdown-toggle\" type=\"button\" aria-expanded=\"false\"><span class=\"caret\"></span></a>
                            <div id=\"DetailDropDn\" role=\"menu\" class=\"dropdown-menu\">
                            <a class=\"dropdown-item\"  href=\"#\" onclick=\"noserial($insert_id)\"data-toggle=\"modal\" data-id='$insert_id'data-target=\" .Distribute\">
                            <i class=\" fa fa-share-square-o\" ></i > Distribute</a >
                            </div>
                            </div>";
            }

            $data1 = array(
                '<a onclick="removeDetail(' . $insert_id . ',' . $serialStatus . ')"> <i class="fa fa-remove" style="color:red"></i></a>',
                $po,
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
                    'running_quantity' => $lastQuantity + $quantity,
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

    /**
     *
     * This is for getting a data of an item
     * which is distributed.
     *
     * @param string $dept name of department
     * @param int $id ID of the method.
     * @param int $dept_id ID of the department.
     * @return mixed result of the query
     */
    public function getItem($dept, $id, $dept_id)
    {
        $this->db->where('item.item_id', $id);

        if ($dept === 'dept') {
            $this->db->select('item.*,sum(quantity_distributed) as quant');
            $this->db->join('itemdetail', 'distribution.item_det_id = itemdetail.item_det_id', 'inner');
            $this->db->join('item', 'itemdetail.item_id = item.item_id', 'inner');
            $this->db->where('distribution.dept_id', $dept_id);
            $this->db->group_by('item.item_id');
            $query = $this->db->get('distribution');
        } else {
            $query = $this->db->get('item');
        }
        return $query->row();
    }

    /**
     * This method allows an item's data to be edited.
     */
    public function edititem()
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

    /**
     *
     * This method is for getting items detail to be displayed.
     *
     * @param int $id ID of the method
     * @param string $position position of the user
     * @return mixed result of the query
     */
    public function viewdetail($id, $position)
    {
        $this->db->select('OR_no,PO_number,item.serialStatus,item_type,date_delivered,itemdetail.date_received,expiration_date,unit_cost,supplier_name,
        item_name,item_description,item.quantity as total,unit,itemdetail.quantity,itemdetail.item_det_id,item.item_id');
        $this->db->join('itemdetail', 'item.item_id = itemdetail.item_id', 'iner');
        // $this->db->join('distribution', 'distribution.item_det_id = itemdetail.item_det_id', 'inner');
        $this->db->where('itemdetail.status', 'active');
        $this->db->join('supplier', 'supplier.supplier_id = itemdetail.supplier_id', 'inner');
        $this->db->order_by('itemdetail.item_det_id', 'desc');
        $this->db->group_by('itemdetail.item_det_id');
        $query = $this->db->get_where('item', array('item.item_id' => $id));;

        return $query->result_array();
    }

    /**
     *
     * This allows an item to be returned.
     *
     * @param int $dept_id ID of the department
     * @param int $id ID of the method
     * @param int $dist_id ID of the distribution
     * @return mixed result of the query
     */
    public function retquant($dept_id, $id, $dist_id)
    {
        $status = array('pending');
        $this->db->select('sum(returnitem.return_quantity) as retq');
        $this->db->join('itemdetail', 'returnitem.item_det_id = itemdetail.item_det_id');
        $this->db->join('distribution', 'distribution.dist_id = returnitem.dist_id');
        $this->db->join('department', 'department.dept_id = distribution.dept_id');
        $this->db->where('department.dept_id', $dept_id);
        $this->db->where('returnitem.dist_id', $dist_id);
        $this->db->where_in('returnitem.status', $status);
        $this->db->where('itemdetail.item_id', $id);
        $query = $this->db->get('returnitem')->result_array();

        return $query;
    }

    /**
     *
     * This method allows the returning of items.
     *
     * @param int $dept_id ID of the department
     * @param int $id ID of the method.
     * @return mixed result of the query.
     */
    public function retquant1($dept_id, $id)
    {
        $status = array('pending');
        $this->db->select('sum(returnitem.return_quantity) as retq');
        $this->db->join('itemdetail', 'returnitem.item_det_id = itemdetail.item_det_id');
        $this->db->join('distribution', 'distribution.dist_id = returnitem.dist_id');
        $this->db->join('department', 'department.dept_id = distribution.dept_id');
        $this->db->where('department.dept_id', $dept_id);
        $this->db->where_in('returnitem.status', $status);
        $this->db->where('itemdetail.item_id', $id);
        $query = $this->db->get('returnitem')->result_array();

        return $query;
    }

    /**
     *
     * This gets the data for displaying item details of an
     * item per department.
     *
     * @param $id ID of the method.
     * @param $dept_id ID of the department
     * @return mixed result of the query
     */
    public function viewDetailperDept($id, $dept_id)
    {
        $this->db->select('CONCAT(first_name," ",last_name) as receiver,
        distribution.dist_id,item.item_type,item.serialStatus,quantity_distributed,distribution.cost,
        distribution.status as dist_stat,distribution.PR_no,itemdetail.*,department,supplier_name');
        $this->db->join('itemdetail', 'distribution.item_det_id = itemdetail.item_det_id', 'inner');
        $this->db->join('item', 'item.item_id = itemdetail.item_id', 'inner');
        $this->db->join('department', 'department.dept_id = distribution.dept_id', 'inner');
        $this->db->join('account_code', 'account_code.ac_id = distribution.ac_id ', 'inner');
        $this->db->join('user', ' distribution.supply_officer_id = user.user_id ', 'inner');
        $this->db->join('supplier', 'supplier.supplier_id = itemdetail.supplier_id', 'inner');
        $this->db->where('distribution.dept_id', $dept_id);
        $this->db->where('item.item_id', $id);
        $this->db->order_by('dist_id', 'desc');
        $query = $this->db->get('distribution');
        return $query->result_array();
    }

    /**
     *
     * This method is for getting the inventory of a department.
     *
     * @param $type type of the item
     * @param $id ID of the method
     * @return mixed result of the query
     */
    public function departmentInventory($type, $id)
    {
        $this->db->select('item.*,sum(quantity_distributed) as quant');
        $this->db->join('itemdetail', 'distribution.item_det_id = itemdetail.item_det_id', 'inner');
        $this->db->join('item', 'itemdetail.item_id = item.item_id', 'inner');
        $this->db->where('item.item_type', $type);
        $this->db->where('distribution.dept_id', $id);
        $this->db->group_by('item.item_id');
        $this->db->order_by('item.item_id', 'desc');
        $query = $this->db->get('distribution');
        return $query->result_array();
    }

    /**
     *
     * This method gets the data of reconciled items from database.
     *
     * @param string $type type of item.
     * @param int $id ID of the method
     * @return mixed result of the query
     */
    public function reconcile($type, $id)
    {
        $this->db->select('item.*,sum(quantity_distributed) as quant,reconciliation.physical_count as pc,reconciliation.remarks,reconciliation.*');
        $this->db->join('itemdetail', 'distribution.item_det_id = itemdetail.item_det_id', 'inner');
        $this->db->join('item', 'itemdetail.item_id = item.item_id', 'inner');
        $this->db->join('reconciliation', 'distribution.item_det_id = reconciliation.dist_id', 'inner');
        $this->db->where('item.item_type', $type);
        $this->db->where('distribution.dept_id', $id);
        $this->db->group_by('reconciliation.recon_id,reconciliation.dist_id,item.item_id');
        $this->db->order_by('item.item_id', 'desc');
        $query = $this->db->get('distribution');
        return $query->result_array();
    }

    /**
     * This method is for the ending inventory
     */
    public function endingInventory()
    {
        $remarks = $this->input->post('remarks');
        $logical = $this->input->post('logical');
        $physical = $this->input->post('physical');
        $date = $this->input->post('date');
        $id = $this->input->post('id');
        $item_data = [];
        $data = [];

        $item_id = $this->db->select('item_id')->where_in('recon_id', $id)->get('reconciliation')->result_array();
        $cost = $this->db->select('cost')->where_in($item_id)->get('item')->result_array();
        $item_det_id = $this->db->select('item_det_id')->where_in($item_id)->get('itemdetail')->result_array();

        foreach ($id as $key => $value) {
            $data[] = array(
                'recon_id' => $value,
                'inventory_date' => $date,
                'physical_count' => $physical[$key],
                'last_quantity' => $logical[$key],
                'remarks' => $remarks[$key],
                'ending_cost' => $cost[$key]['cost']
            );

            $item_data[] = array(
                'item_id' => $item_id[$key]['item_id'],
                'quantity' => $physical[$key],
                'cost' => $cost[$key]['cost'],
                'initialCost' => $cost[$key]['cost'],
                'initialStock' => $physical[$key],
            );
            $new_detail[] = array(
                'quantity' => $physical[$key],
                'unit_cost' => $cost[$key]['cost'],
                'item_id' => $item_id[$key]['item_id']
            );
            $last_detail[] = array(
                'item_det_id' => $item_det_id[$key]['item_det_id'],
                'status' => 'inactive'
            );
        }

        $this->db->insert_batch('itemdetail', $new_detail);

        //make all details inactive
        $this->db->update_batch('itemdetail', $last_detail, 'item_det_id');

        $this->db->insert_batch('itemdetail', $new_detail);

        $this->db->update_batch('reconciliation', $data, 'recon_id');
        $this->db->update_batch('item', $item_data, 'item_id');
    }

    /**
     *
     * This method is for selecting details of an item.
     *
     * @return mixed result of the query
     */
    public function selectdetails()
    {
        $this->db->join('itemdetail', 'item.item_id = itemdetail.item_id', 'inner');
        $query = $this->db->get('item');
        return $query->result_array();
    }

    /**
     *
     * This method is for selecting departments.
     *
     * @return mixed result of the query
     */
    public function select_departments()
    {
        $query = $this->db->get('department');
        return $query->result_array();
    }

    /**
     *
     * This method is for getting the department list.
     *
     * @return mixed result of the query
     */
    public function get_department_list()
    {
        $this->db->order_by('res_center_code');
        $query = $this->db->get('department');
        return $query->result_array();

    }

    /**
     *
     * This method is for selecting account codes.
     *
     * @return mixed result of the query
     */
    public function select_acc_codes()
    {
        $query = $this->db->get('account_code');
        return $query->result_array();
    }

    /**
     *
     * This method getting the end user of a distribution.
     *
     * @param int $dist_id ID of the distribution
     * @return mixed result of the query
     */
    public function getEndUserDist($dist_id)
    {

        $this->db->select('enduser.*,serial.serial');
        $this->db->join('serial', 'enduser.serial_id = serial.serial_id', 'left');
        $this->db->where('serial.dist_id', $dist_id);
        $query = $this->db->get('enduser');
        return $query->result_array();

    }

    /**
     * This metod is for returning items
     *
     * @return mixed result of the query
     */
    public function return_item()
    {
        $query = $this->db->get('return');
        return $query->result_array();
    }

    /**
     *
     *This method is for user distribution and transfer
     * of items of end users.
     *
     * @param string $position position of the user
     * @param string $user the user for distribution
     */
    public function userdistrib($position, $user)
    {

        $lastowner = $this->input->post('currentuser');
        $transferowner = $this->input->post('transfername');
        $serial = $this->input->post('serial');
        $serialid = $this->input->post('serialid');
        $date = $this->input->post('date');
        $data = array(
            'name' => $transferowner,
            'serial_id' => $serialid,
            'accountability_date' => $date
        );
        $this->db->where('enduser.serial_id', $serialid);
        $query = $this->db->get('enduser');
        if ($query->num_rows() > 0) {
            $this->db->where('serial_id', $serialid);
            $this->db->update('enduser', $data);
        } else {
            $this->db->insert('enduser', $data);
        }

        $this->db->set('item_status', 'UserDistributed');
        $this->db->where('serial', $serial);
        $this->db->update('serial');

        $transfer_data = array(
            'serial_id' => $serialid,
            'last_owner' => $lastowner,
            'current_owner' => $transferowner,
            'transfer_date' => $date
        );
        $this->db->insert('logs.transferlog', $transfer_data);

    }

    /**
     *
     * This method gets the serial of the item for transfer of items.
     *
     * @param $serialid ID of the serial
     * @return mixed result of the query
     */
    public function getTrans($serialid)
    {
        $this->db->select('CONCAT(user.first_name," ", user.last_name) AS name,serial.serial,serial.serial_id');
        $this->db->join('user', 'user.user_id = serial.employee', 'inner');
        $this->db->where('serial.serial_id', $serialid);
        $query = $this->db->get('serial');
        return $query->result_array();
    }

    /**
     *
     * This method is for geting  items with no serial.
     *
     * @param int $id ID for the methid
     * @param string $position position of the user
     * @return mixed result of the query
     */
    function getSerialNull($id, $position)
    {
        $this->db->select('serial.serial');
        $this->db->join('itemdetail', 'itemdetail.item_det_id = serial.item_det_id', 'inner');
        $this->db->join('item', 'item.item_id = itemdetail.item_id', 'inner');
        $this->db->where('item.item_id', $id);
        $this->db->where('serial is NOT NULL', null, FALSE);
        $this->db->where('item_status', 'In-stock');
        $query = $this->db->get('serial');
        return $query->result_array();
    }

    /**
     *
     * This method is for getting the serial of the return.
     *
     * @param int $det_id ID of the department
     * @param int $sid ID of the serial
     * @return mixed result of the query
     */
    public function getSerialReturn($det_id, $sid)
    {
        $status = array('Distributed', 'UserDistributed');
        $this->db->select('item.serialStatus,serial.*');
        $this->db->join('itemdetail', 'itemdetail.item_det_id = serial.item_det_id', 'inner');
        $this->db->join('item', 'item.item_id = itemdetail.item_id', 'inner');
        $this->db->join('distribution', 'distribution.dist_id = serial.dist_id', 'inner');
        $this->db->where_in('item_status', $status);
        $this->db->where('serial.dist_id', $sid);
        $this->db->where('serial.item_det_id', $det_id);
        $query = $this->db->get('serial');
        return $query->result_array();
    }

    /**
     *
     * This method gets the serial of an item.
     *
     * @param int $det_id ID of the deparment
     * @param string $position position of the user
     * @return mixed result of the query
     */
    public function getSerial($det_id, $position)
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
        $this->db->where('serial.record_status', '1');
        $query = $this->db->get('serial');
        return $query->result_array();
    }

    /**
     *
     * This method is for getting the serial of a button.
     *
     * @param int $det_id ID of the details
     * @param string $position position of the user
     * @param int $sid ID of the serial
     * @return mixed result of the query
     */
    public function getSerialbtn($det_id, $position, $sid)
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
        $this->db->where('serial.dist_id', $sid);
        $this->db->where('serial.item_det_id', $det_id);
        $query = $this->db->get('serial');
        return $query->result_array();
    }

    /**
     *
     * This method is for adding serial to an item.
     *
     * @return mixed result of the query
     */
    public function addSerial()
    {
        $serial = $this->input->post('serial');
        $data = array();
        foreach ($serial as $key => $value) {
            // if serial is not null
            if ($value !== 'null') {
                if (empty($value)) {
                    $value = null;
                }
                $data[] = array(
                    'serial_id' => $key,
                    'serial' => $value,
                );
            }
        }
        return $this->db->update_batch('serial', $data, 'serial_id');
    }

    /**
     *
     * This method is for counting the items.
     *
     * @param int $id ID of the method.
     * @return mixed result of the query
     */
    public function countItem($id)
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

    /**
     * This method is for editing quantity of the item.
     */
    public function editquant()
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

    /**
     * This method is for accepting items issued.
     */
    public function accept()
    {
        $user_id = $this->session->userdata['logged_in']['user_id'];
        $dist_id = $this->input->post('id');
        $remarks = $this->input->post('remarks');
        $accept = 'Accepted';

        $this->db->set('status', $accept);
        $this->db->where('dist_id', $dist_id);
        $this->db->update('distribution');

    }

    /**
     *
     * This method is for displaying item details for mobile.
     *
     * @return mixed result of the query
     */
    public function mobiledetail()
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

    /**
     * This method is for returning item.
     */
    public function returnitem()
    {

        $user_id = $this->session->userdata['logged_in']['user_id'];
        $id = $this->input->post('id');
        $serial = $this->input->post('serial');

        if (isset($serial)) {
            $quantity_returned = count($serial);
        } else {
            $quantity_returned = $this->input->post('quantity');
        }

        $query = $this->db->select('item.serialStatus,distribution.cost,distribution.quantity_distributed,distribution.PR_no,itemdetail.item_det_id,itemdetail.item_id')
            ->join('distribution', 'itemdetail.item_det_id = distribution.item_det_id')
            ->join('item', 'itemdetail.item_id = item.item_id')
            ->where('distribution.dist_id', $id)
            ->get('itemdetail')->row();
        $item_det_id = $query->item_det_id;
        $item_id = $query->item_id;
        $transaction_number = ($query->PR_no);
        $cost = ($query->cost);
        $quantdist = ($query->quantity_distributed);
        $serialStatus = ($query->serialStatus);

        $date = $this->input->post('returndate');
        $data = array(
            'return_quantity' => $quantity_returned,
            'date_returned' => $date,
            'receiver' => $this->input->post('receiver'),
            'item_status' => $this->input->post('remarks'),
            'reason' => $this->input->post('reason'),
            'item_det_id' => $item_det_id,
            'dist_id' => $id,
            'status' => 'pending'

        );
        $this->db->insert('returnitem', $data);

        $return_id = $this->db->insert_id();

        if ($serialStatus === '1') {
            for ($i = 0; $i < $quantity_returned; $i++) {
                $serial_data[] = array(
                    'item_status' => 'returned',
                    'serial' => $serial[$i]
                );
            }
            $this->db->set('item_status', 'Pending');
            $this->db->set('return_id', $return_id);
            $this->db->where_in('serial', $serial);
            $this->db->update('serial');
        }


        $this->db->insert('logs.returnlog', array(
            'return_id' => $return_id,
            'userid' => $user_id
        ));
    }

    /**
     *
     * This method is for general ledger of items.
     *
     * @param int $id ID of the method
     * @return mixed result of the query
     */
    public function ledger($id)
    {
        $this->db->where('transaction.item_id', $id);
        $this->db->join('item', 'item.item_id = transaction.item_id');
        $query = $this->db->get('transaction');
        return $query->result_array();


    }

    /**
     *
     * This method is for the return of items after issuing.
     *
     * @param string $department department of the user
     * @param string $position position of the user
     * @return mixed result of the query
     */
    public function returns($department, $position)
    {

        $this->db->select('receiver,date_returned,item.*,returnitem.*,department,distribution.PR_no', 'inner');
        $this->db->join('itemdetail', 'returnitem.item_det_id = itemdetail.item_det_id', 'inner');
        $this->db->join('item', 'itemdetail.item_id = item.item_id', 'inner');
        $this->db->join('distribution', 'returnitem.dist_id = distribution.dist_id', 'inner');
        $this->db->join('department', 'department.dept_id = distribution.dept_id', 'inner');
        if ($position === 'Supply Officer') {
            $this->db->where('distribution.dept_id', $department);
        }
        $this->db->where('returnitem.status', 'pending');

        $query = $this->db->get('returnitem');

        return $query->result_array();
    }

    /**
     *
     * This method is for accepting returned items.
     *
     * @param int $return_id ID of the return.
     * @param int $serial serial of an item
     * @return mixed result of the query
     */
    public function acceptReturn($return_id, $serial, $item_status)
    {
        $query = $this->db
            ->select('item.serialStatus,item.serialStatus,PR_no,item.quantity,returnitem.*,distribution.cost,item.item_id')
            ->where('return_id', $return_id)
            ->join('distribution', 'distribution.dist_id = returnitem.dist_id')
            ->join('itemdetail', 'returnitem.item_det_id = itemdetail.item_det_id')
            ->join('item', 'item.item_id = returnitem.item_det_id')
            ->get('returnitem')
            ->row();
        $serialStatus = $query->serialStatus;
        if ($serialStatus === '1') {
            $this->db->set('item_status', 'Returned');
            $this->db->where('item_status', 'Pending');
            $this->db->where_in('serial_id', $serial);
            $this->db->update('serial');
        }

        $dist_id = $query->dist_id;
        $item_det_id = $query->item_det_id;
        $item_id = $query->item_id;
        $quantity_returned = $query->return_quantity;
        $lastQuant = $query->quantity;
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
                'running_quantity' => $quantity_returned + $lastQuant,
                'transaction' => 'returned'
            ));
        $this->db->set('status', 'accepted');
        $this->db->set('item_status',$item_status);
        $this->db->where('return_id', $return_id);
        return $this->db->update('returnitem');
    }

    /**
     *
     * This method is for declining item/s that are returned.
     *
     * @param $return_id ID of the return
     */
    public function declineReturn($return_id)
    {
        $this->db->set('status', 'declined');
        $this->db->where('return_id', $return_id);
        $this->db->update('returnitem');

        $this->db->set('item_status', 'Distributed');
        $this->db->where('return_id', $return_id);
        $this->db->update('serial');
    }

    /**
     *
     * This method is for canceling the return of item/s.
     *
     * @param $return_id ID of the return
     */
    public function cancelReturn($return_id)
    {
        $this->db->set('status', 'cancelled');
        $this->db->where('return_id', $return_id);
        $this->db->update('returnitem');

        $this->db->set('item_status', 'Distributed');
        $this->db->where('return_id', $return_id);
        $this->db->update('serial');
    }

    /**
     *
     * This method is for counting total items received
     * for custodian dashboard.
     *
     * @return mixed result of the query
     */
    public function itemsrec()
    {
        $this->db->SELECT('COUNT(inc_log_id) as countInc,item.*,CONCAT(first_name," ",last_name) as custodian');
        $this->db->join('gsois.itemdetail detail', 'detail.item_det_id = increaselog.item_det_id');
        $this->db->join('gsois.item item', 'item.item_id = detail.item_id');
        $this->db->join('gsois.user u', 'u.user_id = increaselog.userid');
        $this->db->where('date(timestamp)', 'CURDATE()', false);
        $this->db->group_by('item.item_id');
        $query = $this->db->get('logs.increaselog');
        return $query->result_array();
    }

    /**
     *
     * This method is for counting total items issued
     * for custodian dashboard.
     *
     * @return mixed result of the query
     */
    public function issued($position, $user_id)
    {
        $this->db->SELECT('COUNT(dec_log_id) as countDec,i.*,dept.department,CONCAT(first_name," ",last_name) as custodian');
        $this->db->join('gsois.distribution dist', 'decreaselog.dist_id = dist.dist_id');
        $this->db->join(' gsois.department dept', 'dist.dept_id = dept.dept_id');
        $this->db->join('gsois.itemdetail det', 'det.item_det_id = dist.item_det_id');
        $this->db->join('gsois.item i', 'det.item_id = i.item_id');
        $this->db->join('gsois.account_code ac', 'dist.ac_id = ac.ac_id');
        $this->db->join('gsois.user u', ' u.user_id = decreaselog.userid');
        $this->db->where('date(timestamp)', 'CURDATE()', false);
        $this->db->group_by('i.item_id');
        $query = $this->db->get('logs.decreaselog');
        return $query->result_array();
    }

    /**
     *
     * This method is for counting total items returned
     * for custodian dashboard.
     *
     * @return mixed result of the query
     */
    public function returndash($position, $user_id)
    {
        $this->db->SELECT('COUNT(ret_log_id) as countRet,i.*,dept.department');
        $this->db->join('gsois.returnitem ret', 'ret.return_id = retlog.return_id', 'inner');
        $this->db->join('gsois.distribution dist', ' dist.dist_id = ret.dist_id', 'inner');
        $this->db->join('gsois.department dept', ' dist.dept_id = dept.dept_id', 'inner');
        $this->db->join('gsois.itemdetail det', ' det.item_det_id = dist.item_det_id', 'inner');
        $this->db->join('gsois.item i', ' i.item_id = det.item_id', 'inner');
        $this->db->where('date(timestamp)', 'CURDATE()', false);
        $this->db->group_by('i.item_id');
        $query = $this->db->get('logs.returnlog retlog');
        return $query->result_array();
    }

    /**
     *
     * This method is for counting total items cost
     * for custodian dashboard.
     *
     * @return mixed result of the query
     */

    public function editedItems()
    {
        $this->db->select('COUNT(edit_log_id) as countEdit,item.*,CONCAT(first_name," ",last_name) as custodian,edit.*');
        $this->db->join('gsois.item item', 'item.item_id = edit.item_id');
        $this->db->join('gsois.user u', 'edit.userid = u.user_id');
        $this->db->group_by('item.item_id');
        $query = $this->db->get('logs.editlog edit');
        return $query->result_array();
    }

    public function totalcost()
    {
        $this->db->SELECT('sum(unit_cost * quantity) as totalcost');
        $query = $this->db->get('gsois.itemdetail');
        return $query->result_array();
    }

    /**
     *
     * This method is for counting total items expired
     * for custodian dashboard.
     *
     * @return mixed result of the query
     */
    public function totalexpired($position, $user_id)
    {
        $this->db->SELECT('count(expiration_date) as countExp,item.*');
        $this->db->join('gsois.item item', 'item.item_id = itemdetail.item_id');
        $this->db->where('expiration_date <=', 'CURDATE()', false);
        $this->db->group_by('item.item_id');
        $query = $this->db->get('gsois.itemdetail');
        return $query->result_array();
    }

    /**
     *
     * This method is for counting total users registered
     * for admin dashboard.
     *
     * @return mixed result of the query
     */
    public function totaluser()
    {
        $this->db->SELECT('count(user_id) as totaluser');
        $query = $this->db->get('gsois.user');
        return $query->result_array();
    }


    //supply officer dashboard

    /**
     *
     * This method is for pending items in the
     * supply officer dashboard.
     *
     * @return mixed result of the query
     */
    public function pendingItem()
    {
        $user_id = $this->session->userdata['logged_in']['user_id'];
        $this->db->SELECT('count(decreaselog.dec_log_id) as totalItems');
        $this->db->WHERE('gsois.distribution.supply_officer_id', $user_id);
        $this->db->WHERE('gsois.distribution.status', 'pending');
        $this->db->JOIN('gsois.distribution', 'gsois.distribution.dist_id = logs.decreaselog.dist_id');
        $query = $this->db->get('logs.decreaselog');
        return $query->result_array();
    }

    /**
     *
     * This method is for counting items issued
     * for the day, for supply officer dashboard.
     *
     * @return mixed result of the query
     */
    public function itemsThisDay()
    {
        $user_id = $this->session->userdata['logged_in']['user_id'];
        $this->db->SELECT('count(decreaselog.dec_log_id) as totalItems');
        $this->db->WHERE('gsois.distribution.supply_officer_id', $user_id);
        $this->db->WHERE('date(timestamp)', 'CURDATE()', false);
        $this->db->WHERE('gsois.distribution.status', 'Accepted');
        $this->db->JOIN('gsois.distribution', 'gsois.distribution.dist_id = logs.decreaselog.dist_id');
        $query = $this->db->get('logs.decreaselog');
        return $query->result_array();
    }

    /**
     *
     * This method is for counting items
     * returned for the day, for supply officer
     * dashboard.
     *
     * @return mixed result of the query
     */
    public function itemsReturnedThisDay()
    {
        $user_id = $this->session->userdata['logged_in']['user_id'];
        $this->db->SELECT('count(logs.returnlog.ret_log_id) as totalItemsReturned');
        $this->db->WHERE('gsois.distribution.supply_officer_id', $user_id);
        $this->db->WHERE('date(timestamp)', 'CURDATE()', false);
        $this->db->JOIN('gsois.returnitem', 'gsois.returnitem.return_id = logs.returnlog.return_id');
        $this->db->JOIN('gsois.distribution', 'gsois.distribution.dist_id = gsois.returnitem.dist_id');
        $query = $this->db->get('logs.returnlog');
        return $query->result_array();
    }

    /**
     *
     * This method is for counting items expired for
     * the supply officer dashboard .
     *
     * @return mixed result of the query
     */
    public function itemsExpired()
    {
        $dept_id = $this->session->userdata['logged_in']['dept_id'];
        $this->db->SELECT('count(gsois.itemdetail.item_id) as totalItemsExpired');
        $this->db->WHERE('gsois.distribution.dept_id', $dept_id);
        $this->db->WHERE('gsois.distribution.status', 'Accepted');
        $this->db->WHERE('gsois.itemdetail.expiration_date >=', 'CURDATE()', false);
        $this->db->JOIN('gsois.distribution', 'gsois.distribution.item_det_id = gsois.itemdetail.item_det_id');
        $query = $this->db->get('gsois.itemdetail');
        return $query->result_array();
    }

    /**
     *
     * This method is for counting  total cost of the
     * inventory of the department of a supply officer.
     *
     * @return mixed result of the query
     */
    public function itemsTcost()
    {
        $dept_id = $this->session->userdata['logged_in']['dept_id'];
        $this->db->select('sum(gsois.distribution.cost*gsois.distribution.quantity_distributed) as itemTcost');
        $this->db->WHERE('gsois.distribution.dept_id', $dept_id);
        $this->db->WHERE('gsois.distribution.status', 'Accepted');
        $query = $this->db->get('gsois.distribution');
        return $query->result_array();
    }

//end of supply officer dashboard

    /**
     *
     * This method is for removing details of an item.
     *
     * @param int $id ID of the method
     * @param string $serialStatus status of the serial
     */
    public function rmDet($id, $serialStatus)
    {
        $this->db->set('status', 'removed');
        $this->db->where('item_det_id', $id);
        $this->db->update('itemdetail');

        if ($serialStatus === '1') {
            $this->db->set('record_status', '0');
            $this->db->where('item_det_id', $id);
            $this->db->where('dist_id', null, FALSE);
            $this->db->update('serial');
        }

        $query = $this->db->select('item_id,quantity')
            ->where('item_det_id', $id)->get('itemdetail')->row();

        $item_id = $query->item_id;
        $detailQuant = $query->quantity;

        $this->db->set('quantity', 'quantity-' . $detailQuant, FALSE);
        $this->db->where('item_id', $item_id);
        $this->db->update('item');
    }

    /**
     *
     * This method is for getting item details that were removed.
     *
     * @param int $id ID of the method
     * @return mixed result of the query
     */
    public function rmItems($id)
    {
        $this->db->select('OR_no,PO_number,item.serialStatus,item_type,date_delivered,date_received,expiration_date,unit_cost,supplier_name,
        item_name,item_description,item.quantity as total,unit,itemdetail.quantity,itemdetail.item_det_id,item.item_id');
        $this->db->join('itemdetail', 'item.item_id = itemdetail.item_id', 'inner');
        $this->db->join('supplier', 'supplier.supplier_id = itemdetail.supplier_id', 'inner');
        $this->db->where('itemdetail.status', 'removed');
        $query = $this->db->get_where('item', array('item.item_id' => $id));;
        return $query->result_array();
    }

    /**
     *
     * This method is for reverting status serial.
     *
     * @param int $id ID of the method
     * @param string $serialStatus status of the serial
     */
    public function revert($id, $serialStatus)
    {
        $this->db->set('status', 'active');
        $this->db->where('item_det_id', $id);
        $this->db->update('itemdetail');

        if ($serialStatus === '1') {
            $this->db->set('record_status', '1');
            $this->db->where('item_det_id', $id);
            $this->db->update('serial');
        }

        $query = $this->db->select('item_id,quantity')
            ->where('item_det_id', $id)->get('itemdetail')->row();

        $item_id = $query->item_id;
        $detailQuant = $query->quantity;

        $this->db->set('quantity', 'quantity+' . $detailQuant, FALSE);
        $this->db->where('item_id', $item_id);
        $this->db->update('item');
    }

    /**
     *
     * This method is for getting the names supply officers.
     *
     * @param  int $id ID for the method
     * @return mixed result of the query
     */
    public function getSuppOfficers($id)
    {
        return $this->db->select('user_id,CONCAT(first_name," ",last_name) as name')
            ->where('position', 'Supply Officer')
            ->where('dept_id', $id)
            ->get('user')->result_array();
    }

    /**
     *
     * This method is for items delivered/added report.
     *
     * @param string $type result of the query
     * @return mixed result of the query
     */
    public function deliveredReports($type)
    {
        $this->db->select('item.item_name,item.item_description,item.item_type,itemdetail.*,supplier_name')
            ->join('item', 'itemdetail.item_id = item.item_id')
            ->join('supplier', 'itemdetail.supplier_id = supplier.supplier_id');

        if ($type === 'CO') {
            $this->db->where('item.item_type', $type);
        } elseif ($type === 'MOOE') {
            $this->db->where('item.item_type', $type);
        }
        return $this->db->get('itemdetail')->result_array();
    }

    /**
     *
     * This method is for getting delivered reports with date.
     *
     * @param string $type type of the item
     * @param string $from from whom
     * @param string $to to whom
     * @return mixed result of the query
     */
    public function deliveredReportsWithDate($type, $from, $to)
    {
        $this->db->select('item.item_name,item.item_description,item.item_type,itemdetail.*,supplier_name')
            ->join('item', 'itemdetail.item_id = item.item_id')
            ->join('supplier', 'itemdetail.supplier_id = supplier.supplier_id');

        if ($type === 'CO') {
            $this->db->where('item.item_type', $type);
        } elseif ($type === 'MOOE') {
            $this->db->where('item.item_type', $type);
        }
        $this->db->where('date_received BETWEEN ' . $this->db->escape($from) . ' AND ' . $this->db->escape($to));

        return $this->db->get('itemdetail')->result_array();
    }

    /**
     *
     * This method is for items issued reports.
     *
     * @param string $type type of an item
     * @return mixed result of the query
     */
    public function issuedReports($type)
    {
        $this->db->select('PR_no,distribution.quantity_distributed,distribution.cost,department,distribution.date_received,CONCAT(first_name," ",last_name) as supply_officer,item.*,account_code');
        $this->db->join('itemdetail', 'distribution.item_det_id = itemdetail.item_det_id', 'inner');
        $this->db->join('item', 'itemdetail.item_id = item.item_id', 'inner');
        $this->db->join('department', 'distribution.dept_id = department.dept_id');
        $this->db->join('user', 'distribution.supply_officer_id = user.user_id');
        $this->db->join('account_code', 'distribution.ac_id = account_code.ac_id');
        if ($type === 'CO') {
            $this->db->where('item.item_type', $type);
        } elseif ($type === 'MOOE') {
            $this->db->where('item.item_type', $type);
        }
        $query = $this->db->get('distribution');
        return $query->result_array();
    }

    /**
     *
     * This method is for items issued with dates
     *
     * @param string $type type of the item
     * @param string $from from whom
     * @param string $to to whom
     * @return mixed result of the query
     */
    public function issuedReportsWithDate($type, $from, $to)
    {
        $this->db->select('PR_no,distribution.quantity_distributed,distribution.cost,department,distribution.date_received,CONCAT(first_name," ",last_name) as supply_officer,item.*,account_code');
        $this->db->join('itemdetail', 'distribution.item_det_id = itemdetail.item_det_id', 'inner');
        $this->db->join('item', 'itemdetail.item_id = item.item_id', 'inner');
        $this->db->join('department', 'distribution.dept_id = department.dept_id');
        $this->db->join('user', 'distribution.supply_officer_id = user.user_id');
        $this->db->join('account_code', 'distribution.ac_id = account_code.ac_id');
        if ($type === 'CO') {
            $this->db->where('item.item_type', $type);
        } elseif ($type === 'MOOE') {
            $this->db->where('item.item_type', $type);
        }
        $this->db->where('distribution.date_received BETWEEN ' . $this->db->escape($from) . ' AND ' . $this->db->escape($to));

        return $this->db->get('distribution')->result_array();
    }

    /**
     *
     * This method is for the return reports.
     *
     * @param string $type type of an item
     * @return mixed result of the query
     */
    public function returnedReports($type)
    {
        $this->db->select('receiver,date_returned,item.*,returnitem.*,department,distribution.PR_no');
        $this->db->join('itemdetail', 'returnitem.item_det_id = itemdetail.item_det_id', 'inner');
        $this->db->join('item', 'itemdetail.item_id = item.item_id', 'inner');
        $this->db->join('distribution', 'returnitem.dist_id = distribution.dist_id', 'inner');
        $this->db->join('department', 'department.dept_id = distribution.dept_id', 'inner');
        $this->db->where('returnitem.status', 'accepted');
        if ($type === 'CO') {
            $this->db->where('item.item_type', $type);
        } elseif ($type === 'MOOE') {
            $this->db->where('item.item_type', $type);
        }

        $query = $this->db->get('returnitem');

        return $query->result_array();
    }

    /**
     *
     * This method is for returned report with date.
     *
     * @param string $type type of the user
     * @param string $from from whom
     * @param string $to to whom
     * @return mixed result of the query
     */
    public function returnedReportsWithDate($type, $from, $to)
    {
        $this->db->select('receiver,date_returned,item.*,returnitem.*,department,distribution.PR_no');
        $this->db->join('itemdetail', 'returnitem.item_det_id = itemdetail.item_det_id', 'inner');
        $this->db->join('item', 'itemdetail.item_id = item.item_id', 'inner');
        $this->db->join('distribution', 'returnitem.dist_id = distribution.dist_id', 'inner');
        $this->db->join('department', 'department.dept_id = distribution.dept_id', 'inner');
        $this->db->where('returnitem.status', 'accepted');
        if ($type === 'CO') {
            $this->db->where('item.item_type', $type);
        } elseif ($type === 'MOOE') {
            $this->db->where('item.item_type', $type);
        }
        $this->db->where('date_returned BETWEEN ' . $this->db->escape($from) . ' AND ' . $this->db->escape($to));

        $query = $this->db->get('returnitem');

        return $query->result_array();

    }


    /**
     *
     * This method is for the supplier report.
     *
     * @param $type type of the user
     * @return mixed result of the query
     */
    public function supplierReport($type)
    {
        $this->db->select('supplier_name,item.*,itemdetail.date_delivered');
        $this->db->join('itemdetail', 'itemdetail.supplier_id = supplier.supplier_id', 'inner');
        $this->db->join('item', 'item.item_id = itemdetail.item_id', 'inner');
        if ($type === 'CO') {
            $this->db->where('item.item_type', $type);
        } elseif ($type === 'MOOE') {
            $this->db->where('item.item_type', $type);
        }
        $query = $this->db->get('supplier');

        return $query->result_array();
    }

    /**
     *
     * This method is for supplier report with date.
     *
     * @param string $type type of the user
     * @param string $from from whom
     * @param string $to to whom
     * @return mixed result of the query
     */
    public function supplierReportWithDate($type, $from, $to)
    {
        $this->db->select('supplier_name,item.*,itemdetail.date_delivered');
        $this->db->join('itemdetail', 'itemdetail.supplier_id = supplier.supplier_id', 'inner');
        $this->db->join('item', 'item.item_id = itemdetail.item_id', 'inner');
        if ($type === 'CO') {
            $this->db->where('item.item_type', $type);
        } elseif ($type === 'MOOE') {
            $this->db->where('item.item_type', $type);
        }
        $this->db->where('date_received BETWEEN ' . $this->db->escape($from) . ' AND ' . $this->db->escape($to));

        $query = $this->db->get('supplier');

        return $query->result_array();
    }


    /**
     * This method is for getting reconciliation dates.
     */
    public function getInventoryDates()
    {
        $this->db->select('inventory_date');
        $this->db->group_by('inventory_date');
        $this->db->get('reconciliation');
    }

    /**
     *
     * This method is for getting return data.
     *
     * @param int $serialStatus status of the serial
     * @param int $id ID of the method
     * @return mixed result of the query
     */
    public function getRetData($serialStatus, $id)
    {
        if ($serialStatus === '1') {
            $this->db->select('serial_id,serial');
            $this->db->where('return_id', $id);
            $query = $this->db->get('serial');
        } else {
            $this->db->select('return_quantity,remarks');
            $this->db->where('return_id', $id);
            $query = $this->db->get('returnitem');
        }
        return $query->result_array();
    }

    /**
     * This method is for inventory with no discrepancy
     */
    public function reconcileInv()
    {
        $remarks = $this->input->post('remarks');
        $logical = $this->input->post('logical');
        $physical = $this->input->post('physical');
        $date = $this->input->post('date');
        $id = $this->input->post('id');
        $newReconcileData = array();
        $data = array();

        $item_id = $this->db->select('item_id')->where_in('recon_id', $id)->get('reconciliation')->result_array();
        $cost = $this->db->select('cost')->where_in($item_id)->get('item')->result_array();

        foreach ($id as $key => $value) {
            $data[] = array(
                'recon_id' => $value,
                'inventory_date' => $date,
                'physical_count' => $physical[$key],
                'last_quantity' => $logical[$key],
                'remarks' => $remarks[$key],
                'ending_cost' => $cost[$key]['cost']
            );

            $newReconcileData[] = array(
                'item_id' => $item_id[$key]['item_id'],
                'beginning_inventory' => $date
            );
        }

        $this->db->update_batch('reconciliation', $data, 'recon_id');

        $this->db->insert_batch('reconciliation', $newReconcileData);
    }

    /**
     *
     * This method is for getting discrepancy.
     *
     * @return mixed result of  the query
     */
    public function getDiscrepancy()
    {
        $logical = $this->input->post('logical');
        $physical = $this->input->post('physical');
        $id = $this->input->post('id');

        $item_id = $this->db->select('item_id')->where_in('recon_id', $id)->get('reconciliation')->result_array();

        foreach ($id as $key => $value) {
            $missing = $logical[$key] - $physical[$key];
            if ($missing > 0) {
                $item[] = $item_id[$key]['item_id'];
                $m[] = array('missing' => $missing);

            }
        }

        $serial = $this->db->select('item_name,item.item_id, GROUP_CONCAT(serial) as serials')
            ->join('itemdetail', 'itemdetail.item_det_id = serial.item_det_id', 'inner')
            ->join('item', 'item.item_id = itemdetail.item_id', 'inner')
            ->where('serial !=', null, false)
            ->where('record_status', '1')
            ->where('item_status', 'In-stock')
            ->where_in('itemdetail.item_id', $item)
            ->group_by('itemdetail.item_id')
            ->get('serial')->result_array();

        return $serial;

    }

    /**
     * This method is for reconciliation of serialized items.
     */
    function recSerializedItems()
    {
        $remarks = $this->input->post('remarks');
        $logical = $this->input->post('logical');
        $physical = $this->input->post('physical');
        $date = $this->input->post('date');
        $id = $this->input->post('id');
        $serial = $this->input->post('serials');
        $newReconcileData = array();
        $data = array();
        $serialList = array();

        $item_id = $this->db->select('item_id')->where_in('recon_id', $id)->get('reconciliation')->result_array();
        $cost = $this->db->select('cost')->where_in($item_id)->get('item')->result_array();

        foreach ($id as $key => $value) {
            $data[] = array(
                'recon_id' => $value,
                'inventory_date' => $date,
                'physical_count' => $physical[$key],
                'last_quantity' => $logical[$key],
                'remarks' => $remarks[$key],
                'ending_cost' => $cost[$key]['cost']
            );

            $newReconcileData[] = array(
                'item_id' => $item_id[$key]['item_id'],
                'beginning_inventory' => $date
            );
        }

        $item = $this->db->select('item.item_id,count(item.item_id) as quantity')
            ->join('itemdetail', 'itemdetail.item_det_id = serial.item_det_id', 'inner')
            ->join('item', 'item.item_id = itemdetail.item_id', 'inner')
            ->where_in('serial', $serial)
            ->group_by('item.item_id')->get('serial')->result_array();

        $itemdetail = $this->db->select('itemdetail.item_det_id,count(itemdetail.item_det_id) as quantity')
            ->join('itemdetail', 'itemdetail.item_det_id = serial.item_det_id', 'inner')
            ->where_in('serial', $serial)
            ->group_by('itemdetail.item_det_id')->get('serial')->result_array();

        foreach ($item as $list) {
            $this->db->set('quantity', 'quantity-' . $list['quantity'], FALSE);
            $this->db->where('item_id', $list['item_id']);
            $this->db->update('item');
        }

        foreach ($itemdetail as $list) {
            $this->db->set('quantity', 'quantity-' . $list['quantity'], FALSE);
            $this->db->where('item_det_id', $list['item_det_id']);
            $this->db->update('itemdetail');
        }


        $this->db->insert_batch('reconciliation', $newReconcileData);

        $this->db->update_batch('reconciliation', $data, 'recon_id');

        $this->db->set('record_status', '0');
        $this->db->where_in('serial', $serial);
        $this->db->update('serial');


    }

    /**
     * This method is for reconciliation of items
     * with no serials.
     */
    public function nonSerializedRec()
    {
        $remarks = $this->input->post('remarks');
        $logical = $this->input->post('logical');
        $physical = $this->input->post('physical');
        $date = $this->input->post('date');
        $id = $this->input->post('id');
        $data = array();
        $itemdetID = array();
        $newItemDetail = array();

        $query = $this->db->select('item_id')
            ->where_in('recon_id', $id)
            ->get('reconciliation')->result_array();

        foreach ($query as $list) {
            $item_id[] = $list['item_id'];
        }

        $item_detail = $this->db->select(' max(date_delivered) as maxDate, `itemdetail`.*')
            ->where('status', 'active')
            ->where_in('item_id', $item_id)
            ->group_by('itemdetail.item_det_id')
            ->get('itemdetail')->result_array();


        foreach ($id as $key => $value) {
            $data[] = array(
                'recon_id' => $value,
                'inventory_date' => $date,
                'physical_count' => $physical[$key],
                'last_quantity' => $logical[$key],
                'remarks' => $remarks[$key],
                'ending_cost' => $item_detail[$key]['unit_cost']
            );

            $newReconcileData[] = array(
                'item_id' => $item_id[$key],
                'beginning_inventory' => $date
            );
            $item_ID[] = array(
                'item_id' => $item_id[$key],
                'quantity' => $physical[$key]
            );
            $newItemDetail[] = array(
                'date_delivered' => $item_detail[$key]['date_delivered'],
                'date_received' => $item_detail[$key]['date_received'],
                'quantity' => $physical[$key],
                'unit_cost' => $item_detail[$key]['unit_cost'],
                'expiration_date' => $item_detail[$key]['expiration_date'],
                'OR_no' => $item_detail[$key]['OR_no'],
                'PO_number' => $item_detail[$key]['PO_number'],
                'status' => $item_detail[$key]['status'],
                'item_id' => $item_detail[$key]['item_id'],
                'supplier_id' => $item_detail[$key]['supplier_id'],
            );
            $itemdetID[] = array(
                'item_det_id' => $item_detail[$key]['item_det_id'],
                'status' => 'inactive'
            );
        }


        $this->db->insert_batch('reconciliation', $newReconcileData);

        $this->db->update_batch('reconciliation', $data, 'recon_id');

        $this->db->update_batch('itemdetail', $itemdetID, 'item_det_id');

        $this->db->update_batch('item', $item_ID, 'item_id');

        $this->db->insert_batch('itemdetail', $newItemDetail);

    }

    public function getOR()
    {
        return $this->db->select('OR_no')
            ->group_by('OR_no')
            ->get('itemdetail')->result_array();
    }

    public function createAIR($or)
    {
        return $this->db->select('OR_no,date_received,PO_number,supplier_name,unit,item_name,itemdetail.quantity,item_description,
        (itemdetail.unit_cost*itemdetail.quantity) as amount')
            ->join('item', 'item.item_id = itemdetail.item_id', 'inner')
            ->join('supplier', 'supplier.supplier_id = itemdetail.supplier_id')
            ->where('OR_no', $or)
            ->group_by('item.item_id, itemdetail.item_det_id')
            ->get('itemdetail')->result_array();
    }

    public function validateSerial($serial)
    {
        $this->db->where('serial', $serial);
        $query = $this->db->get('serial');
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function getDelDate($id)
    {
        return $this->db->select('date_delivered')
            ->where('item_det_id', $id)
            ->get('itemdetail')->row()->date_delivered;

    }

    public function checkSer(){
        $query =  $this->db->select('serial')
            ->where('serial',null,false)
            ->get('serial');
        if ($query->num_rows() === 0) {
           return true;
        } else {
            return false;
        }

    }
    public function getRecSerial($id){
        return $this->db->select('item.item_id,item.item_name,serial')
            ->join('reconciliation','reconciliation.item_id = item.item_id')
            ->join('itemdetail','itemdetail.item_id = reconciliation.item_id')
            ->join('serial','serial.item_det_id = itemdetail.item_det_id')
            ->where('reconciliation.recon_id',$id)
            ->where('serial.item_status','In-stock')
            ->where('serial.record_status','1')
            ->get('item')->result_array();
    }
}