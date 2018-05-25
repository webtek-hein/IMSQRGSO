<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Profile extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // Load database
        $this->load->model('user_db');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
    }

    public function index()
    {
        $userid = ($this->session->userdata['logged_in']['userid']);
        $data['image'] = $this->user_db->get_image($userid);
        $this->load->view('templates/header');
        $this->load->view('profile',$data);
        $this->load->view('templates/footer');

    }
    public function profile_update()
    {
            $userid = ($this->session->userdata['logged_in']['user_id']);
            $data = array(
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'email' => $this->input->post('email'),
                'contact_no' => $this->input->post('contact_no'),
            );

            $this->user_db->edit_info($data, $userid);
            $this->session->set_flashdata('profilemsg', 'Successfully updated profile!');

        $usersession = $this->user_db->getUser($userid);
       // print_r($usersession);
        $userdata = array(
            'name' => $usersession->name,
            'firstname' => $usersession->first_name,
            'lastname' => $usersession->last_name,
            'contact_no' => $usersession->contact_no,
            'email' => $usersession->email);
        $this->session->set_userdata('user_in', $userdata);

        header('Location: ' . base_url() . 'profile');


    }
    public function changepass(){
        $this->form_validation->set_rules('old_password', 'Password', 'callback_verifypass');
        $this->form_validation->set_rules('new_password', 'Password', 'required');
        $this->form_validation->set_rules('con_new_password', 'Confirm Password', 'matches[new_password]');
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('response',"Password does not match");
            header('Location: ' . base_url() . 'profile');
        } else {

            $userid = ($this->session->userdata['logged_in']['user_id']);
            $password = $this->input->post('con_new_password');
            $options = array('cost' => 12);

            $hashpassword = password_hash($password, PASSWORD_DEFAULT, $options);

            $this->user_db->edit_password($hashpassword, $userid);
            $this->session->set_flashdata('passwordmsg', 'Update will take effect on next login.');
            header('Location: ' . base_url() . 'profile');
        }
    }
    public function upload_image(){


          $config = array(
              'upload_path' =>'./images',
              'allowed_types' => "gif|jpg|png|jpeg",
              'overwrite' => TRUE,
              'max_size' => "2048000", 
              'max_height' => "5768",
              'max_width' => "5024",
              'encrypt_name' => TRUE
          );

          $this->load->library('upload', $config);
          $this->upload->initialize($config);

          if ( ! $this->upload->do_upload('userfile'))
          {
              header('Location: '. base_url() . 'profile');
          }
          else
          {
              $userid = ($this->session->userdata['logged_in']['user_id']);
              $name = array(
                  'image' => $this->upload->data('file_name'));


              $this->session->set_flashdata('mesg', 'Profile Picture changed!');
             $this->user_db->edit_image($name,$userid);
             $imagesession = $this->user_db->get_image($userid);
             $imagedata = $imagesession->image;
             $image['image'] = $imagedata;
             $this->session->set_userdata('image_in', $image);

              header('Location: '. base_url() . 'profile');
          }

    }
    public function verifypass($oldpass){

        $pass = ($this->session->userdata['logged_in']['password']);
        $hashpass = password_verify($oldpass,$pass);
        if ($oldpass != $hashpass){
            $this->form_validation->set_message('verifypass', 'Input current password for old password field');
            return FALSE;
        }
        else
        {
            return TRUE;
        }
        }



}