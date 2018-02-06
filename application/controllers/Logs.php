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
            $inc = $this->logs->increase_log();
            $counter = 1;
            foreach ($inc as $list){
                $row = array();
                $row['item'] = $list['item_name'];
                $row['description'] = $list['item_description'];
                $row['type'] = $list['item_type'];
                $row['quantity'] = $list['quantity'];
                $row['unit'] = $list['unit'];
                $row['delivery_date'] = $list['delivery_date'];
                $row[''] = $list['date_received'];
                $row[''] = $list['expiration_date'];
                $row['cost'] = $list['unit_cost'];

                $data[] = $row;
                $counter++;
            }
            echo json_encode($inc);
    }
        public function decreaseLog()
    {
            $this->logs->decrease_log();
            $counter = 1;
            foreach ($dec as $list){
                $row = array();
                $row['decreasedate'] = $list['decrease_date'];
                $row['item'] = $list['item_name'];
                $row['description'] = $list['item_description'];
                $row['serial'] = $list['serial'];
                $row['dateacquired'] = $list['date_acquired'];
                $row['receivedby'] = $list['receivedby'];
                $row['receivedfrom'] = $list['received_from'];
                $row['accountcode'] = $list['account_code'];
                $row['department'] = $list['department'];
                $row['unit'] = $list['unit'];
                $row['type'] = $list['item_type'];
                $row['status'] = $list['item_status'];

                $data[] = $row;
                $counter++;
            }
            echo json_encode($dec);
    }

        public function editLog()
    {
        $this->logs->edit_log();
        redirect('edit');
    }

        public function returnLog()
    {
        $this->logs->return_log();
        redirect('return');
    }
 }