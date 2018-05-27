<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier_model extends CI_Model{

    /**
     * This method allows supplier to be
     * inserted in to the database.
     */
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

    /**
     *
     * This gets the supplier's data from database.
     *
     * @return mixed result of the query
     */
    public function getSupplier(){
        $query = $this->db->get('supplier');
        return $query->result_array();
    }

    /**
     *
     * This is for retrieving supplier through
     * its ID.
     *
     * @param int   $id ID for the method
     * @return mixed result of the query
     */
    public function retrieveSupplier($id){
        $this->db->where('supplier_id',$id);
        $query = $this->db->get('supplier');
        return $query->row();
    }

    /**
     * This method allows the edited data of the supplier
     * to be saved in to the database.
     */
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