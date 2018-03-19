<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier_model extends CI_Model{
    public function insertSupplier(){
        $id = $this->input->post('id');
        $data = array(
            'supplier_name'=> $this->input->post('supplier'),
            'contact' => $this->input->post('contact'),
            'location'=>$this->input->post('address')
        );
        $this->db->where('supplier_id',$id);
        $this->db->update('supplier',$data);
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