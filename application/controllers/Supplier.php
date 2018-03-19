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

    public function addSupplier()
    {
        $this->supp->insertSupplier();
        redirect('supplier');
    }

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
            $data[] = $row;
        }
        echo json_encode($data);
    }

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

    public function getSupplier($id)
    {
        $list = $this->supp->retrieveSupplier($id);

        $data = array(
            'id' => $list->supplier_id,
            'name' => $list->supplier_name,
            'contact' => $list->contact,
            'location' => $list->location
        );
        echo json_encode($data);
    }
}
