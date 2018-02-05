<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logs extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form','url'));
        $this->load->library('form_validation');
        $this->load->model('Logs_model','logs');
    }
        public function increaseLog()
    {
            $this->logs->increase_log();
            redirect('increased');
    }
        public function decreaseLog()
    {
            $this->logs->decrease_log();
            redirect('decreased');
    }

 }