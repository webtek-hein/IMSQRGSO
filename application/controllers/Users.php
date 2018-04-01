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
            'id' => $list['user_id'],
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
    public function getUser($id)
    {
        $list = $this->user_db->getUser($id);
        $data = array(
            'firstname' => $list->first_name,
            'lastname' => $list->last_name,
            'email' => $list->email,
            'contactno' => $list->contact_no,
            'username' => $list->username,
            'password' => $list->password,
            'status' => $list->status,

        );
        echo json_encode($data);
    }
    public function edituser()
    {
        $this->user_db->edituser();
        redirect('Accounts');
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
            'department' => ucwords(strtolower($list['department']))
        );
        }
        echo json_encode($data);
    }

    public function addUser(){
        $this->user_db->insertUser();
        redirect('accounts');

    }
 

}