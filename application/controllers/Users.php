<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Users extends CI_Controller {

    public function __construct() 
    {
        parent::__construct();
        $this->load->model('user_db');
    }

    public function index()
    {
        $this->load->view('templates/header');
        $this->load->view('pages/Accounts');
        $this->load->view('templates/footer');
    }

    public function display_users()
    {
        $users = $this->user_db->get_users();

        $data = array();
        foreach ($users as $list) {
            $row = array();
            $row[] = $list['first_name'];
            $row[] = $list['last_name'];
            $row[] = $list['email'];
            $row[] = $list['contact_no'];
            $row[] = $list['position'];
            $data[] = $row;
        }
        $list = array('data'=>$data);
        echo json_encode($list);
    }

    public function deactivate()
    {
        $id = $this->input->post('user_id');
        $this->user_db->deactivate_user($id);
        header('Location: '. base_url() . 'users');
    }
    public function activate()
    {
        $id = $this->input->post('user_id');
        $this->user_db->activate_user($id);
        header('Location: '. base_url() . 'users');
    }

}