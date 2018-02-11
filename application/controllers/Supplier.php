<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form','url'));
        $this->load->library('form_validation');
        $this->load->model('Supplier_model','supp');
    }
    public function addSupplier(){
        $this->supp->insertSupplier();
        redirect('supplier');
    }
    public function viewSuppliers(){
        $list = $this->supp->getSupplier();
        $data = array();

        foreach ($list as $suppliers){
            $row = array();
            $row['supplier'] = $suppliers['supplier_name'];
            $row['contact'] = $suppliers['contact'];
            $row['address'] = $suppliers['location'];
            $data[] = $row;
        }
        echo json_encode($data);
    }
}
