<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier_model extends CI_Model{
    public function insertSupplier(){

        $contact = implode(',',$this->input->post('contact'));
            $data = array(
                'supplier_name' => $this->input->post('supplier'),
                'contact' =>$contact,
                'location' => $this->input->post('address'),
                'postal_code' => $this->input->post('postal'),
                'email' => $this->input->post('email'),
                'tin' => $this->input->post('tin'),
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

    public function editSupplier()
    {
        $user_id = $this->session->userdata['logged_in']['user_id'];
        $supplier_id = $this->input->post('id');
        $contact = implode(',',$this->input->post('contact'));

        $data = array(
            'supplier_name' => $this->input->post('supplier'),
            'contact' =>$contact,
            'location' => $this->input->post('address'),
            'postal_code' => $this->input->post('postal'),
            'email' => $this->input->post('email'),
            'tin' => $this->input->post('tin'),
        );
        $this->db->set($data);
        $this->db->where('supplier_id', $supplier_id);
        $this->db->update('supplier');

    }
}