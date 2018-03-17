<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventory_model extends CI_Model
{
    //Adding of Item to the inventory

    public function insert()
    {
        $user_id = $this->session->userdata['logged_in']['user_id'];
        $filename = ($_FILES["csv_file"]["tmp_name"]) or die("can't open file");
        $file = (fopen($filename, "r"));
        var_dump($file);
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
                'date_delivered' => $row[5],
                'date_received' => $row[6],
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
            print_r($serial);
            if ($ser['item_type'] === 'CO') {
                echo 'asdf';
                if ($serial['serial'] === '1') {
                    $serial = array_fill(1, $quant['quantity'], array('item_det_id' => $insert_id));
                    $this->db->insert_batch('serial', $serial);

                }
            }
        }

    }

    public function viewincrease()
    {
        $query = $this->db->get('item');
        return $query->result_array();

    }

    public function add_item($counter)
    {
        $user_id = $this->session->userdata['logged_in']['user_id'];
        $item_name = $this->input->post('item')[$counter];
        $item_type = $this->input->post('Type')[$counter];
        $quantity = $this->input->post('quant')[$counter];
        $supplier_id = $this->input->post('supp')[$counter];
        $serialStatus = $this->input->post('serialStatus')[$counter];
        if ($serialStatus === null) {
            $serialStatus = 0;
        }
        $data = array(
            'item_name' => $item_name,
            'quantity' => $quantity,
            'item_description' => $this->input->post('description')[$counter],
            'unit' => $this->input->post('Unit')[$counter],
            'item_type' => $item_type,
            'serial' => $serialStatus
        );
        $data1 = array(
            'PO_number' => $this->input->post('PO')[$counter],
            'date_delivered' => $this->input->post('del')[$counter],
            'date_received' => $this->input->post('rec')[$counter],
            'unit_cost' => $this->input->post('cost')[$counter],
            'quantity' => $quantity,
            'expiration_date' => $this->input->post('exp')[$counter],
            'or_no' => $this->input->post('or')[$counter]
        );

        try {
            $this->db->trans_begin();
            //  1. Insert into item
            $this->db->insert('item', $data);
            //item insert id
            $insert_id = array('item_id' => $this->db->insert_id());
            // 2. Insert to item detail
            $this->db->insert('itemdetail', $data1 + $insert_id + array('supplier_id' => $supplier_id));
            //item detail insert id
            $insert_id = $this->db->insert_id();
            //create an array of serial for capital outlay item

            if ($item_type === 'CO') {
                if ($serialStatus === '1') {
                    $serial = array_fill(1, $quantity, array('item_det_id' => $insert_id));
                    $this->db->insert_batch('serial', $serial);
                }
            }
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

    public function saveAll()
    {
        $user_id = $this->session->userdata['logged_in']['user_id'];

        $data = array();
        $item_name = $this->input->post('item');

        foreach ($item_name as $key => $value) {
            if (isset($this->input->post('serialStatus')[$key])) {
                $serialStatus = $this->input->post('serialStatus')[$key];
            } else {
                $serialStatus = '0';
            }

            $data[] = array(
                'item_name' => $item_name[$key],
                'quantity' => $this->input->post('quant')[$key],
                'item_description' => $this->input->post('description')[$key],
                'unit' => $this->input->post('Unit')[$key],
                'item_type' => $this->input->post('Type')[$key],
                'serial' => $serialStatus
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
        // 2. Insert to item detail
        foreach ($insert_id as $key => $value) {
            $data1[] = array(
                'PO_number' => $this->input->post('PO')[$key],
                'date_delivered' => $this->input->post('del')[$key],
                'date_received' => $this->input->post('rec')[$key],
                'unit_cost' => $this->input->post('cost')[$key],
                'quantity' => $this->input->post('quant')[$key],
                'expiration_date' => $this->input->post('exp')[$key],
                'item_id' => $insert_id[$key],
                'supplier_id' => $this->input->post('supp')[$key],
                'or_no' => $this->input->post('or')[$key]
            );
        }
        $this->db->insert_batch('itemdetail', $data1);
        //item detail insert id
        $id = $this->db->insert_id();
        $item_detail_id = range($id, $last_insert_id);

        foreach ($item_detail_id as $key => $value) {
            $detail[] = array('item_det_id' => $item_detail_id[$key], 'userid' => $user_id, 'quantity' => $this->input->post('quant')[$key]);
            $quantity = $this->input->post('quant');
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

        // 3. Insert into logs
        $this->db->insert_batch('logs.increaselog', $detail);
        $this->db->trans_complete();

    }

    public function select_item($type)
    {
        $this->db->where('item_type', $type);
        $query = $this->db->get('item');
        return $query->result_array();
    }

    //Add quantity to a specific item

    public function addquant()
    {
        $user_id = $this->session->userdata['logged_in']['user_id'];

        $id = $this->input->post('id');
        //1. Get Quantity
        $quantity = $this->input->post('quant');

        $query = $this->db->get_where('item', array('item_id' => $id));
        $item = $query->row();

        $data = array(
            'item_name' => $item->item_name,
            'item_description' => $item->item_description,
            'quantity' => $quantity,
            'item_type' => $item->item_type,
            'unit' => $item->unit,
        );
        $item_id = array('item_id' => $id,
            'supplier_id' => $this->input->post('supp'),
        );
        $data1 = array(
            'date_delivered' => $this->input->post('del'),
            'date_received' => $this->input->post('rec'),
            'quantity' => $quantity,
            'unit_cost' => $this->input->post('cost'),
            'expiration_date' => $this->input->post('exp'),
            // 'or_no' => $this->input->post('or')
        );

        //2. Insert to item detail
        $this->db->insert('itemdetail', $data1 + $item_id);

        //item detail insert id
        $insert_id = $this->db->insert_id();
        //insert serial
        $serial = array_fill(1, $quantity, array('item_det_id' => $insert_id));
        $this->db->insert_batch('serial', $serial);
        //4. Insert into logs
        $this->db->insert('logs.increaselog', array('userid' => $user_id, 'item_det_id' => $insert_id));

        //5. Update quantity
        $this->db->set('quantity', 'quantity+' . $quantity, FALSE);
        $this->db->where('item_id', $id);
        $this->db->update('item');
    }

    public function getItem($id)
    {
        $this->db->where('item_id', $id);
        $query = $this->db->get('item');
        return $query->row();
    }

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

    public function viewdetail($id)
    {
        $this->db->select('PO_number,item.serial,item_type,date_delivered,date_received,expiration_date,unit_cost,supplier_name,
        item_name,item_description,item.quantity as total,unit,itemdetail.quantity,itemdetail.item_det_id,item.item_id');
        $this->db->join('itemdetail', 'item.item_id = itemdetail.item_id', 'inner');
        $this->db->join('supplier', 'supplier.supplier_id = itemdetail.supplier_id', 'inner');
        $query = $this->db->get_where('item', array('item.item_id' => $id));;
        return $query->result_array();
    }
    public function viewDetailperDept($id){
        $this->db->select('distribution.dist_id,PO_number,item.serial,item_type,date_delivered,distribution.date_received,expiration_date,unit_cost,supplier_name,
        item_name,item_description,item.quantity as total,unit,SUM(distribution.quantity_distributed) as quantity,itemdetail.item_det_id,item.item_id');
        $this->db->join('item','item.item_id = itemdetail.item_id');
        $this->db->join('distribution','distribution.item_id = item.item_id');
        $this->db->join('supplier', 'supplier.supplier_id = itemdetail.supplier_id', 'inner');
        $this->db->group_by('item.item_id,distribution.dist_id,itemdetail.item_det_id');
        $query = $this->db->get_where('itemdetail', array('item.item_id' => $id));
        return $query->result_array();
    }

    public function departmentInventory($type, $id)
    {
        $this->db->select('item.item_id,item_name, item_description, sum(quantity_distributed) as quantity, unit');
        $this->db->join('item', 'item.item_id = distribution.item_id', 'inner');
        $this->db->where('dept_id', $id);
        $this->db->where('item.item_type', $type);
        $this->db->group_by('item.item_id');
        $query = $this->db->get('distribution');
        return $query->result_array();
    }

    public function selectdetails()
    {
        $this->db->join('itemdetail', 'item.item_id = itemdetail.item_id', 'inner');
        $query = $this->db->get('item');
        return $query->result_array();
    }

    public function select_departments()
    {
        $query = $this->db->get('department');
        return $query->result_array();
    }

    public function get_department_list()
    {
        $this->db->order_by('res_center_code');
        $query = $this->db->get('department');
        return $query->result_array();

    }

    public function select_acc_codes()
    {
        $query = $this->db->get('account_code');
        return $query->result_array();
    }

    public function distrib($position,$dept)
    {

        $this->db->select('count(PR_no) as PR_no');
        $this->db->where('dept_id',$dept);
        $query = $this->db->get('distribution')->row();
        $PR_no =intval($query->PR_no)+1;

        $serial_data = [];
        $id = $this->input->post('id');
        $serial = $this->input->post('serial');
        $quantity = count($serial);
        $user = $this->session->userdata['logged_in']['user_id'];

        if ($quantity == 0) {
            $quantity = $this->input->post('quantity');
        } else {
            $quantity = count($serial);
        }
        if ($position === 'Custodian') {

            $this->db->set('quantity', 'quantity-' . $quantity, FALSE);
            $this->db->where('item_det_id', $id);
            $this->db->update('itemdetail');

            $item_id = $this->db->select('item_id')->where('item_det_id', $id)->get('itemdetail')->row_array();
            $this->db->set('quantity', 'quantity-' . $quantity, FALSE);
            $this->db->where($item_id);
            $this->db->update('item');
            $data = array(
                'dept_id' => $this->input->post('dept'),
                'ac_id' => $this->input->post('Code'),
                'quantity_distributed' => $quantity,
                'receiver' => $this->input->post('owner'),
                'date_received' => $this->input->post('date'),
                'PR_no' => $PR_no,
                'OBR_no' => $this->input->post('obr'),
                'item_id' => $item_id['item_id'],
                'user_id' => $user
            );
            $this->db->insert('distribution', $data);
            $insert_id = $this->db->insert_id();
            //use dist id instead
            // if item type is CO but with serial
            if (count($serial) != 0) {
                //for capital outlay with serial
                for ($i = 0; $i < $quantity; $i++) {
                    $serial_data[] = array(
                        'serial' => $serial[$i],
                        'dist_id' => $insert_id,
                        'item_status' => 'Distributed'
                    );
                }
                $this->db->update_batch('serial', $serial_data, 'serial');
            }
            $this->db->insert('logs.decreaselog', array('userid' => $user, 'dist_id' => $insert_id, 'item_det_id' => $id,
            ));
            //        for ($i = 0; $i < $quantity; $i++) {
            //            $serial_data[] = array(
            //                'serial' => $serial[$i],
            //
            //            );
            //        }
            //        //for mooe
            //        $item = $this->db->get_where('item', array('item_id' => $id))->row();
            //        $type = array('item_type' => $item->item_type);
            //        $item_type = implode($type);
            //

            //            $get_serial = implode($serial);
            //            $get_serial_id = $this->db->get_where('serial', array('serial' => $get_serial))->row();
            //            $serial_id = array('serial_id' => $get_serial_id->serial_id);
            //            $ser_id = implode($serial_id);
            //            $this->db->update_batch('serial', $serial_data, 'serial');
            //            $this->db->insert('logs.decreaselog', array('userid' => $user, 'serial_id' => $ser_id));
            //        }
            //        // if item type is capital outlay but without serial
            //       elseif (count($serial) == 0 && $item_type == 'CO') {
            //           $this->db->insert('mooedistribution', array('quantity_distributed' => $quantity,'dist_id' => $insert_id, 'employee' => $user));
            //       }
        }else{
            $employee = $this->input->post('owner');
            if (count($serial) != 0) {
                $this->db->set('employee', $employee);
                $this->db->where_in('serial', $serial);
                $this->db->update('serial');
            }else{
                var_dump($id);
                $quantity = $this->input->post('quantity');
                $mooedata = array('dist_id'=>$id,'employee'=>$employee,'quantity'=>$quantity);
                $this->db->insert('mooedistribution',$mooedata);
            }
        }

    }

    public function return_item()
    {
        $query = $this->db->get('return');
        return $query->result_array();
    }

    public function getSerial($det_id, $position)
    {

        $this->db->select('item.serial as serialStatus,serial_id,serial.serial,item_status');
        $this->db->join('itemdetail', 'itemdetail.item_det_id = serial.item_det_id', 'inner');
        $this->db->join('item', 'item.item_id = itemdetail.item_id', 'inner');
        if ($position === 'Custodian') {
            $this->db->where('item_status !=', 'Distributed');
        } else {
            $this->db->join('distribution', 'distribution.dist_id = serial.dist_id');
        }
        $this->db->where('serial.item_det_id', $det_id);
        $query = $this->db->get('serial');
        return $query->result_array();
    }

    public function addSerial()
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
        $this->db->update_batch('serial', $data, 'serial_id');
    }

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

    public function accept(){
        $user_id = $this->session->userdata['logged_in']['user_id'];
        $id = $this->input->post('id');
        $remarks = $this->input->post('remarks');
        $accept = 'Accepted';


        $this->db->set('accept',$accept);
        $this->db->set('remarks',$remarks);
        $this->db->where('item_id', $id);
        $this->db->update('item');

    }
    public function mobiledetail(){
        $this->db->select('serial.serial_id, item.item_name, serial.serial, account_code.description, item.item_description, itemdetail.unit_cost, item.item_type, itemdetail.expiration_date');
        $this->db->join('itemdetail','itemdetail.item_id = item.item_id','left');
        $this->db->join('serial','serial.item_det_id = itemdetail.item_det_id','left');
        $this->db->join('distribution','distribution.item_id = item.item_id','left');
        $this->db->join('account_code','account_code.ac_id = distribution.ac_id','left');
        $query = $this->db->get('item');
        return $query->result_array();
    }


}
