<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
    // Load database
        $this->load->model('user_db');
        $this->load->library('form_validation');

    }

// Show login page
    public function index()
    {
        if (isset($this->session->userdata['logged_in'])) {
            redirect(base_url().'dashboard');
        } else {
            $this->load->view('login');
        }
    }

    // Check for user login process

    public function user_login_process() {

        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            if(isset($this->session->userdata['logged_in'])){
                $this->load->view('templates/header');
            }else{
                $this->load->view('login');
            }
        } else {
            $data = array(
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password')
            );
            $result = $this->user_db->login($data);
            if ($result == TRUE) {

                $username = $this->input->post('username');
                $result = $this->user_db->read_user_information($username);
                if ($result != false) {
                    $session_data = array(
                        'username' => $result[0]->username,
                        'position' => $result[0]->position,
                        'userid' => $result[0]->user_id,
                        'department' => $result[0]->department,
                        'dept_id' => $result[0]->dept_id,
                        'password' => $result[0]->password,

                    );
// Add user data in session
                    $user_data = array(
                        'firstname' => $result[0]->first_name,
                        'lastname' => $result[0]->last_name,
                        'email' => $result[0]->email,
                        'contact_no' => $result[0]->contact_no,);

                    $image_data = array('image' => $result[0]->image);

                    $this->session->set_userdata('user_in',$user_data);
                    $this->session->set_userdata('logged_in', $session_data);
                    $this->session->set_userdata('image_in', $image_data);
                    if($result[0]->position == 'admin'){
                        redirect(base_url().'admin/dashboard');
                    }else if($result[0]->position == 'custodian'){
                        redirect(base_url().'custodian/dashboard');
                    }else{
                        redirect(base_url().'department_head/dashboard');
                    }
                }
            } else {
                $data = array(
                    'error_message' => 'Invalid Username or Password'
                );
                $this->load->view('login', $data);
            }
        }
    }

// Logout from admin page
    public function logout() {

// Removing session data
        $sess_array = array(
            'username' => ''
        );
        $this->session->unset_userdata('logged_in', $sess_array);
        $this->session->sess_destroy();
        $data['message_display'] = 'Successfully Logout';
        $this->load->view('login', $data);
    }
}