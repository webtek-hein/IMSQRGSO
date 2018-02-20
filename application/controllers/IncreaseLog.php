<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Increaselog extends CI_Controller {
			public function __construct()
    {
      	parent::__construct();
        $this->load->model('Logs_model');
    }
	public function index()
	{
        $this->load->view('templates/header');
		$this->load->view('pages/increased');
		$this->load->view('templates/footer');
	}

    public function increase_log_list()
    {
        $position = $this->session->userdata['logged_in']['position'];
        $user_id = $this->session->userdata['logged_in']['userid'];

        $increase = $this->logs_model->increase_log();

        $data = array();
        foreach ($increase as $list) {
            $row = array();
            $row[] = $list['item_name'];
            $row[] = $list['item_description'];
            $row[] = $list['quantity'];
            $row[] = $list['unit'];
            $row[] = $list['item_type'];
            $row[] = $list['date_received'];
            $row[] =  "&#8369; ".number_format((int)$list['unit_cost'],2)."<br>";
            $row[] = $list['expiration_date'];
            }
            $data[] = $row;
    }
        $list = array('data'=>$data);
        echo json_encode($list);
    }
}
