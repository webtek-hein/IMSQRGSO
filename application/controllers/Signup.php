<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Signup extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Signup_model');
        $this->load->model('Inventory_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['departments'] = $this->Inventory_model->get_department_list();
        $this->form_validation->set_rules('FirstName', 'First Name', 'required');
        $this->form_validation->set_rules('LastName', 'Last Name', 'required');
        $this->form_validation->set_rules('Email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('contactno', 'Contact Number', 'required');
        $this->form_validation->set_rules('Username', 'Username', 'required|is_unique[user.username]');
        $this->form_validation->set_rules('Password', 'Password', 'required');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[Password]');
        $this->form_validation->set_rules('type', 'User Type', 'required');
        $position = $this->input->post('type');
        if ($position === 'department head') {
            $this->form_validation->set_rules('dment', 'Department', 'required');
        }
        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('signup',$data);
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
            'position' => $this->input->post('type'),
            'dept_id' => $this->input->post('dment'),
            );

            $this->Signup_model->register($data);
            $this->session->set_flashdata('msg', 'Registration sent! Please wait for confirmation.');
            $this->load->view('signup');
        }
    }
}
