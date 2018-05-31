<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->model('Supplier_model', 'supp');
    }

    /**
     * This is for adding supplier.
     */
    public function addSupplier()
    {
        $this->supp->insertSupplier();
        redirect('supplier');
    }

    /**
     * This allows the list of suppliers to be displayed.
     */
    public function viewSuppliers()
    {
        $list = $this->supp->getSupplier();
        $data = array();
        foreach ($list as $suppliers) {
            $row = array();
            $row['id'] = $suppliers['supplier_id'];
            $row['supplier'] = $suppliers['supplier_name'];
            $row['contact'] = $suppliers['contact'];
            $row['address'] = $suppliers['location'];
            $row['postal'] = $suppliers['postal_code'];
            $row['email'] = $suppliers['email'];
            $row['tin'] = $suppliers['tin'];
            $row['status'] = $suppliers['status'];
            $row['contactInput'] =  implode(array_map(function ($contact) {
                return ('<input class="item form-control" name="contact[]" value=' . $contact . ' //><br>');
            },
                explode(',', $suppliers['contact'])));
            $row['emailInput'] =  implode(array_map(function ($email) {
                return ('<input  type="email" class="item form-control" name="email[]" value=' . $email . ' //><br>');
            },
                explode(',', $suppliers['email'])));
            $row['contactList'] = implode(array_map(function ($contact) {
                return ('<li>'.$contact.'</li>');
            },
                explode(',', $suppliers['contact'])));
            $row['emailList'] = implode(array_map(function ($email) {
                return ('<li>'.$email.'</li>');
            },
                explode(',', $suppliers['email'])));
            $data[] = $row;
        }
        echo json_encode($data);
    }

    /**
     * This allows the viewing of account code.
     */
    public function viewAccountCode()
    {
        $list = $this->supp->getAccountCodes();
        $data = array();

        foreach ($list as $suppliers) {
            $row = array();
            $row['supplier'] = $suppliers['supplier_name'];
            $row['contact'] = $suppliers['contact'];
            $row['address'] = $suppliers['location'];
            $data[] = $row;
        }
        echo json_encode($data);
    }

    /**
     * This is for displaying data of a supplier.
     */
    public function supplierOption()
    {
        $list = $this->supp->getSupplier();
        $data = array();
        foreach ($list as $supplier) {
            $row = array();
            $row['id'] = $supplier['supplier_id'];
            $row['supplier'] = $supplier['supplier_name'];
            $data[] = $row;
        }
        echo json_encode($data);

    }

    /**
     *
     * This gets the data of a supplier for displaying.
     *
     * @param int   $id ID of the method.
     */
    public function getSupplier($id)
    {
        $list = $this->supp->retrieveSupplier($id);

        $data = array(
            'id' => $list->supplier_id,
            'name' => $list->supplier_name,
            'contact' => $list->contact,
            'location' => $list->location,
            'email' => $list->email,
            'postal' => $list->postal_code,
            'tin' => $list->tin,
            'status' => $list->status

        );
        echo json_encode($data);
    }

    /**
     * Allows data on the supplier to be edited.
     */
    public function editSupplier()
    {
        $this->supp->editSupplier();
        redirect('supplier');
    }
}
