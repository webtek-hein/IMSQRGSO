<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventory_model extends CI_Model{
    //Adding of Item to the inventory
    public function add_item(){
        $quantity = $this->input->post('quant');
        $data = array(
          'item_name' => $this->input->post('item'),
          'item_description' => $this->input->post('description'),
          'quantity' => $quantity,
          'unit' => $this->input->post('Unit'),
          'item_type' => $this->input->post('Type')
        );
        //1. Insert into item
        $this->db->insert('item',$data);
        //item insert id
        $insert_id = $this->db->insert_id();

        $data1 = array(
            'delivery_date' => $this->input->post('del'),
            'date_received' => $this->input->post('rec'),
            'unit_cost'=> $this->input->post('cost'),
            'quantity' => $quantity,
            'expiration_date' => $this->input->post('exp'),
            'supplier_id' => $this->input->post('supp'),
            'item_id' => $insert_id,
        );
        //2. Insert to item detail

        $this->db->insert('itemdetail',$data1);
        //item detail isnert id
        $insert_id = $this->db->insert_id();
        //3. Insert into serial
        $serial = array_fill(1, $quantity, array('item_det_id' => $insert_id));
        $this->db->insert_batch('serial',$serial);
        //4. Insert into logs
        $this->db->insert('logs.increaselog',$data+$data1);
    }
    //Select All items in the inventory
    public function select_item(){
        $query = $this->db->get('item');
        return $query->result_array();
    }
    //Add quantity to a specific item
    public function addquant(){
        $id = $this->input->post('id');
        $id=6;
        //1. Get Quantity
        $quantity = $this->input->post('quant');

        $query=$this->db->get_where('item',array('item_id' => $id));
        $item = $query->row();

        $data=array(
            'item_id' => $item->item_id,
            'item_name' => $item->item_name,
            'item_description' => $item->item_description,
            'quantity' => $quantity,
            'item_type' => $item->item_type,
            'unit' => $item->unit,
        );

        $data1 = array(
            'delivery_date' => $this->input->post('del'),
            'date_received' => $this->input->post('rec'),
            'quantity' => $quantity,
            'unit_cost'=> $this->input->post('cost'),
            'expiration_date' => $this->input->post('exp'),
            'supplier_id' => $this->input->post('supp'),
            'item_id' => $id,
        );

        //2. Insert to item detail
        $this->db->insert('itemdetail',$data1);

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
        $data = array(
            'item_name' => $this->input->post('item'),
            'item_description' => $this->input->post('description'),
            'unit' => $this->input->post('Unit'),
            'item_type' => $this->input->post('Type')
        );
        $this->db->set($data);
        $this->db->where('item_id',$item_id);
        $this->db->update('item');
    }
    public function viewdetail($id){
        $this->db->join('itemdetail','item.item_id = itemdetail.item_id','inner');
        $query = $this->db->get_where('item',array('item.item_id' => $id));
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
    public function get_department_list()
    {
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
        $quantity = $this->input->post('quant');
        $data = array(
            'dept_id' => $this->input->post('dept'),
            'ac_id' => $this->input->post('Code'),
            'quantity_distributed' => $quantity,
            'receivedby' => $this->input->post('owner')
        );
        $this->db->insert('distribution',$data);
        $insert_id = $this->db->insert_id();
        $data1 = array(
            'PO_no' => $this->input->post('po'),
            'PR_no' => $this->input->post('pr'),
            'OBR_no' => $this->input->post('obr'),
            'dist_id' => $insert_id
        );

        $this->db->update('itemdetail',$data1,array('item_id' => $id),$quantity);
    }
}
