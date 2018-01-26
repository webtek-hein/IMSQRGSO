<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventory_model extends CI_Model{
    public function add_item(){
        $type = $this->input->post('Type');
        $quantity = $this->input->post('quant');
        $data = array(
          'item_name' => $this->input->post('item'),
          'item_description' => $this->input->post('description'),
          'quantity' => $quantity,
          'unit' => $this->input->post('Unit'),
          'item_type' => $type
        );
        $this->db->insert('item',$data);
        $insert_id = $this->db->insert_id();
        $data1 = array(
            'delivery_date' => $this->input->post('del'),
            'date_received' => $this->input->post('rec'),
            'unit_cost'=> $this->input->post('cost'),
            'expiration_date' => $this->input->post('exp'),
            'supplier_id' => $this->input->post('supp'),
            'item_id' => $insert_id,
        );
        if($type === 'Capital Outlay'){
            $item_det = array_fill(1, $quantity, $data1);
            $this->db->insert_batch('itemdetail',$item_det);
        }else{
            $this->db->insert('itemdetail',$data1);
        }
    }
    public function select_item(){
        $query = $this->db->get('item');
        return $query->result_array();
    }
    public function addquant(){
        $temp = explode(",",$this->input->post('tempdata'));
        $id = $temp[0];
        $type = $temp[1];
        $quantity = $this->input->post('quant');
        $this->db->set('quantity','quantity+'.$quantity,FALSE);
        $this->db->where('item_id',$id);
        $this->db->update('item');
        $data = array(
            'delivery_date' => $this->input->post('del'),
            'date_received' => $this->input->post('rec'),
            'unit_cost'=> $this->input->post('cost'),
            'expiration_date' => $this->input->post('exp'),
            'supplier_id' => $this->input->post('supp'),
            'item_id' => $id,
        );
        if($type === 'Capital Outlay'){
            $item_det = array_fill(1, $quantity, $data);
            $this->db->insert_batch('itemdetail',$item_det);
        }else{
            $this->db->insert('itemdetail',$data);
        }
    }
}
