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

        if($page == 'login'){
            $this->load->view('pages/login');
            if (isset($this->session->userdata['logged_in'])) {
                redirect('dashboard');
            }
        }else {
            $data['title'] = ucfirst($page);
            $data['name'] = $this->session->userdata['user_in']['name'];

            $this->load->view('templates/header', $data);
            $this->load->view('pages/' . $page, $data);
            $this->load->view('templates/footer');
        }
    }
}
