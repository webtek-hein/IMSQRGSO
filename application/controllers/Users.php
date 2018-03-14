<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Users extends CI_Controller {

    public function __construct() 
    {
        parent::__construct();
        $this->load->model('user_db');
    }

    public function display_users()
    {
        $users = $this->user_db->get_users();
        foreach ($users as $list) {
            $data[] = array(
            'name' => $list['name'],
            'email' => $list['email'],
            'contactno' => $list['contact_no'],
            'username' => $list['username'],
            'position' => $list['position'],
            'department' => $list['department'],
            'status' => $list['status']
        );
        }
        echo json_encode($data);
    }

    public function getmobileuser($username)
    {
        $users = $this->user_db->getmobileuser($username);
        foreach ($users as $list) {
            $data[] = array(
            'name' => $list['name'],
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

    public function addUser(){
        $this->user_db->insertUser();
        redirect('accounts');

    }
        public function editUser()
    {
        $this->user_db->edituser();
        redirect('accounts');
    }

}