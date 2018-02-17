<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventory_model extends CI_Model{
    //Adding of Item to the inventory
    public function  viewincrease(){
        $query = $this->db->get('item');
        return $query->result_array();

    }
    public function add_item($counter){
        $item_name = $this->input->post('item')[$counter];
        $quantity = $this->input->post('quant')[$counter];
        $supplier_id = $this->input->post('supp')[$counter];

        $this->db->select('supplier_name');
        $this->db->where('supplier_id',$supplier_id);
        $query = $this->db->get('supplier');
        $supplier_name = $query->row_array();

        $data = array(
            'item_name' => $item_name,
            'quantity' => $quantity,
            'item_description' => $this->input->post('description')[$counter],
            'unit' => $this->input->post('Unit')[$counter],
            'item_type' => $this->input->post('Type')[$counter],
        );

        $data1 = array(
            'date_delivered' => $this->input->post('del')[$counter],
            'date_received' => $this->input->post('rec')[$counter],
            'unit_cost'=> $this->input->post('cost')[$counter],
            'quantity' => $quantity,
            'expiration_date' => $this->input->post('exp')[$counter],
//            'or_no' => $this->input->post('or')[$counter]
        );
        //  1. Insert into item
        $this->db->insert('item',$data);
        //item insert id
        $insert_id = array('item_id' => $this->db->insert_id());
        // 2. Insert to item detail
        $this->db->insert('itemdetail',$data1+$insert_id+array('supplier_id' => $supplier_id));
        //item detail insert id
        $insert_id = $this->db->insert_id();
        // 3. Insert into logs
        $this->db->insert('logs.increaselog',$data+$data1+$supplier_name);
    }

    public function saveAll(){
        $item_name = $this->input->post('item');
        $supplier_id = array();


        foreach ($item_name as $key => $value){
            $quantity = $this->input->post('quant')[$key];
            $data[] = array(
                'item_name' => $item_name[$key],
                'quantity' => $quantity,
                'item_description' => $this->input->post('description')[$key],
                'unit' => $this->input->post('Unit')[$key],
                'item_type' => $this->input->post('Type')[$key],
            );
            $data1[] = array(
                'date_delivered' => $this->input->post('del')[$key],
                'date_received' => $this->input->post('rec')[$key],
                'unit_cost'=> $this->input->post('cost')[$key],
                'quantity' => $quantity,
                'expiration_date' => $this->input->post('exp')[$key],
//            'or_no' => $this->input->post('or')[$key]
            );
            $supplier_id[] = array('supplier_id' => $this->input->post('supp')[$key]);
        }

        $this->db->select('supplier_name');
        $this->db->where_in($supplier_id);
        $query = $this->db->get('supplier');
        $supplier_name = $query->row_array();
        var_dump($supplier_id);

        $this->db->trans_start();
            // 1. Insert into item
           $count = count($data);
           $this->db->insert_batch('item',$data);
           //item insert id
           $id = $this->db->insert_id();
           //last insert id
           $last_insert_id = ($count-1) + $id;
           $insert_id [] = range($id,$last_insert_id);
           // 2. Insert to item detail
           $this->db->insert('itemdetail',$data1+$insert_id);
           //item detail isnert id
           $insert_id = array('item_det_id' => $this->db->insert_id());
           // 3. Insert into serial
           $serial = array_fill(1, $quantity,$insert_id);
           $this->db->insert_batch('serial',$serial);
           // 4. Insert into logs
        $this->db->insert_batch('logs.increaselog',$data+$data1+$supplier_name);
        $this->db->trans_complete();

    }

    public function select_item($type){
        $this->db->where('item_type',$type);
        $query = $this->db->get('item');
        return $query->result_array();
    }
    //Add quantity to a specific item
    public function addquant(){
        $id = $this->input->post('id');
        //1. Get Quantity
        $quantity = $this->input->post('quant');

        $query=$this->db->get_where('item',array('item_id' => $id));
        $item = $query->row();

        $data=array(
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
            'unit_cost'=> $this->input->post('cost'),
            'expiration_date' => $this->input->post('exp'),
        );

        //2. Insert to item detail
        $this->db->insert('itemdetail',$data1+$item_id);

        //item detail isnert id
        $insert_id = $this->db->insert_id();

        //3. Insert into serial
        $serial = array_fill(1, $quantity, array('item_det_id' => $insert_id));
        $this->db->insert_batch('serial',$serial);

        //4. Insert into logs
        $this->db->insert('logs.increaselog',$data+$data1);

        //5. Update quantity
        $this->db->set('quantity','quantity+'.$quantity,FALSE);
        $this->db->where('item_id',$id);
        $this->db->update('item');
    }
    public function edititem(){
        $item_id = $this->input->post('id');
        // select item
        $item = $this->db->get_where('item',array('item_id' => $item_id));

        // convert to array
        $data1 = array();
        foreach ($item->result() as $row)
        {
            $data1 = array(
                'item_name' => $row->item_name,
                'item_description'  => $row->item_description,
                'unit'  => $row->unit,
                'item_type' => $row->item_type
            );
        }
        // update item
        $data = array(
            'item_name' => $this->input->post('item'),
            'item_description' => $this->input->post('description'),
            'unit' => $this->input->post('Unit'),
            'item_type' => $this->input->post('Type')
        );
        $this->db->set($data);
        $this->db->where('item_id',$item_id);
        $this->db->update('item');

        // compare data
        $result1 = array_diff($data1 , $data);
        $result2 = array_diff($data , $data1);

        //convert array to string
        $old = implode($result1);
        $new = implode($result2);

        // place values to an array
        $values = array(
            'field_edited' =>(key ($result1)),
             'old_value' => ($old),
              'new_value' =>($new),
       );
        //insert to edit log table
        $this->db->insert('logs.editLog', $values);
    }
    public function viewdetail($id){
        $this->db->join('itemdetail','item.item_id = itemdetail.item_id','inner');
        $this->db->join('supplier','supplier.supplier_id = itemdetail.supplier_id','inner');
        $query = $this->db->get_where('item',array('item.item_id'=>$id));;
        return $query->result_array();
    }
    public function selectdetails(){
        $this->db->join('itemdetail','item.item_id = itemdetail.item_id','inner');
        $query = $this->db->get('item');
        return $query->result_array();
    }
    public function select_departments(){
       $query = $this->db->get('department');
        return $query->result_array();
    }
    public function get_department_list(){
        $this->db->order_by('res_center_code');
        $query = $this->db->get('department');
        return $query->result_array();

    }    
    public function select_acc_codes(){
        $query = $this->db->get('account_code');
        return $query->result_array();
    }
    public function distrib(){
        $id = $this->input->post('id');
        print_r($id);
        $quantity = $this->input->post('quant');
        $data = array(
            'dept_id' => $this->input->post('dept'),
            'ac_id' => $this->input->post('Code'),
            'quantity_distributed' => $this->input->post('quant')

        );

        $this->db->insert('distribution',$data);
        $insert_id = $this->db->insert_id();
        $data1 = array(
            'PO_no' => $this->input->post('po'),
            'PR_no' => $this->input->post('pr'),
            'OBR_no' => $this->input->post('obr'),
        );
        $ser = $this->input->post('serial');


        for($i=0; $i < sizeof($ser); $i++){
            $serial_data = array(
                'end_user' => $this->input->post('owner')[$i],
                'serial' => $this->input->post('serial')[$i],
                'dist_id' => $insert_id
            );
            print_r($serial_data);
            $this->db->limit($quantity);
            $this->db->update('serial',$serial_data,array('item_det_id' => $id,));
        }

        $this->db->update('itemdetail',$data1,array('item_det_id' => $id));
    }

    public function return_item(){
        $query = $this->db->get('return');
        return $query->result_array();
    }
    public function getSerial($det_id){
        $this->db->where('item_status !=','Distributed');
        $this->db->where('item_det_id',$det_id);
        $query = $this->db->get('serial');
        return $query->result_array();
    }
}
