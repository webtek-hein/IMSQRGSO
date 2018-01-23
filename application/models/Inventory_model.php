<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventory_model extends CI_Model{
    public function add_item(){
        $data = array(
          'item_name' => $this->input->post('item'),
          'item_description' => $this->input->post('description'),
          'quantity' => $this->input->post('quant'),
          'unit' => $this->input->post('Unit'),
          'item_type' => $this->input->post('Type')
        );
        $this->db->insert('item',$data);
        $insert_id = $this->db->insert_id();
        $data = array(
            'delivery_date' => $this->input->post('del'),
            'date_received' => $this->input->post('rec'),
            'unit_cost'=> $this->input->post('cost'),
            'PO_no' => $this->input->post('po'),
            'PR_no' => $this->input->post('pr'),
            'OBR_no' => $this->input->post('obr'),
            'expiration_date' => $this->input->post('exp'),
            'supplier_id' => $this->input->post('supp'),
            'item_id' => $insert_id,
        );
        $this->db->insert('itemdetail',$data);

    }
    public function select_item(){
        $query = $this->db->get('item');
        return $query->result_array();
    }
}
