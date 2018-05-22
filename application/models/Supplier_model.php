<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier_model extends CI_Model{
    public function insertSupplier(){

        $contact = implode(',',$this->input->post('contact'));
            $data = array(
                'supplier_name' => $this->input->post('supplier'),
                'contact' => $contact,
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
        $values = [];
        $supplier_id = $this->input->post('id');
        // select supplier
        $supplier = $this->db->get_where('supplier', array('supplier_id' => $supplier_id))->row();

        // convert to array
        $data1 = array(
            'supplier_name' => $supplier->supplier_name,
            'contact' => $supplier->contact,
            'location' => $supplier->location
        );
        // update item
        $data = array(
            'supplier_name'=> $this->input->post('supplier'),
            'contact' => $this->input->post('contact'),
            'location'=>$this->input->post('address')
        );
        $this->db->set($data);
        $this->db->where('supplier_id', $supplier_id);
        $this->db->update('supplier');

        // compare data
        $result1 = array_diff($data1, $data);
        $result2 = array_diff($data, $data1);

        foreach ($result1 as $key => $value) {
            $values[] = array(
                'field_edited' => $key,
                'old_value' => $value,
                'new_value' => $result2[$key],
                'userid' => $user_id,
                'item_id' => $supplier_id
            );
        }
        //insert to edit log table
        $this->db->insert_batch('logs.editLog', $values);
    }
}