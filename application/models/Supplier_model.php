<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier_model extends CI_Model{
    public function insertSupplier(){
        $data = array(
            'supplier_name'=> $this->input->post('supplier'),
            'contact' => $this->input->post('contact'),
            'location'=>$this->input->post('address')
        );
        $this->db->insert('supplier',$data);
    }
    public function getSupplier(){
        $query = $this->db->get('supplier');
        return $query->result_array();
    }
    public function retrieveSupplier($id){
        $this->db->where('supplier_id',$id);
        $query = $this->db->get('supplier');
        return $query->row();
    }
}