<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Users extends CI_Controller {

    public function __construct() 
    {
        parent::__construct();
        $this->load->model('user_db');
        $this->load->model('inventory_model');
        $this->load->library('form_validation');        
    }
    public function index()
    {
        $data['departments'] = $this->inventory_model->get_department_list();
        $this->form_validation->set_rules('FirstName', 'First Name', 'required');
        $this->form_validation->set_rules('LastName', 'Last Name', 'required');
        $this->form_validation->set_rules('Email', 'Email', 'required|valid_email|is_unique[user.email]');
        $this->form_validation->set_rules('contactno', 'Contact Number', 'required');
        $this->form_validation->set_rules('Username', 'Username', 'required|is_unique[user.username]');
        $this->form_validation->set_rules('Password', 'Password', 'required');
        $this->form_validation->set_rules('position', 'User Type', 'required');
        $position = $this->input->post('dment');
        if ($position === 'Supply Officer') {
            $this->form_validation->set_rules('dment', 'Department', 'required');
        }
        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('accounts#addUser',$data);
        }
        else
        {
            $password = $this->input->post('Password');
            $options = ['cost' => 12];
            $hashpassword =  password_hash($password, PASSWORD_DEFAULT, $options);
            $data = array(
            'first_name' => $this->input->post('FirstName'),
            'last_name' => $this->input->post('LastName'),
            'email' => $this->input->post('Email'),
            'contact_no' => $this->input->post('contactno'),
            'username' => $this->input->post('Username'),
            'password' => $hashpassword,
            'position' => $this->input->post('position'),
            'dept_id' => $this->input->post('dment'),
            );

            $this->user_db->register($data);
            $this->session->set_flashdata('msg', 'Registration sent! Please wait for confirmation.');
            $this->load->view('accounts');
        }
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
        redirect('accounts');
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