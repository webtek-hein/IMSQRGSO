<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form','url'));
        $this->load->model('Inventory_model','inv');
    }

    public function view($page = 'dashboard')
    {
        if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
            show_404();
        }

        $data['title'] = ucfirst($page);
        if($page === 'inventory' || $page === 'departments'){
            $data['departments'] = $this->inv->select_departments();
            $data['ac_code'] = $this->inv->select_acc_codes();
        }

        $this->load->view('templates/header',$data);
        $this->load->view('pages/'.$page, $data);
        $this->load->view('templates/footer');

    }
}
