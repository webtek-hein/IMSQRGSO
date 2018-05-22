<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        // Load database
        $this->load->model('user_db');
        $this->load->library('form_validation');
    }

    /**
     * It will validate the entered username and password
     * then it will create a session if it is valid and
     * redirect it to home page.
     */
    public function user_login_process()
    {

        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            if (isset($this->session->userdata['logged_in'])) {
                $this->load->view('templates/header');
            } else {
                $this->load->view('pages/login');
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
                    /** Add data of the user to session*/
                    $session_data = array(
                        'username' => $result[0]->username,
                        'position' => $result[0]->position,
                        'user_id' => $result[0]->user_id,
                        'department' => $result[0]->department,
                        'dept_id' => $result[0]->dept_id,
                        'password' => $result[0]->password,
                    );
                    $user_data = array(
                        'name' => $result[0]->name,
                        'email' => $result[0]->email,
                        'contact_no' => $result[0]->contact_no,);
                    $this->session->set_userdata('user_in', $user_data);
                    $this->session->set_userdata('logged_in', $session_data);
                    if ($result[0]->position == 'supplyofficer') {
                        redirect(base_url() . 'supplyofficer/dashboard');
                    } else if ($result[0]->position == 'admin') {
                        redirect(base_url() . 'admin/dashboard');
                    } else {
                        redirect(base_url() . 'dashboard');
                    }
                }
            } else {
                $data = array(
                    'error_message' => 'Invalid Username or Password'
                );
                $this->load->view('pages/login', $data);
            }
        }
    }

    /**
     * Destroy session of a logged-in user
     * then will be redirected to the
     * login page.
     */
    public function logout()
    {
        $sess_array = array(
            'username' => ''
        );
        $this->session->unset_userdata('logged_in', $sess_array);
        $this->session->sess_destroy();
        $data['message_display'] = 'Successfully Logout';
        redirect('login');
    }
}