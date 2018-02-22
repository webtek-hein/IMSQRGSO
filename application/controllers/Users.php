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
        foreach ($users as $list) {
            $data[] = array(
            'firstname' => $list['first_name'],
            'lastname' => $list['last_name'],
            'email' => $list['email'],
            'contactno' => $list['contact_no'],
            'position' => $list['position'],
            'department' => $list['department']
        );
        }
        echo json_encode($data);
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