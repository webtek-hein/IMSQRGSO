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
                $row['number']=$counter;
                $row['timestamp']= $list['timestamp'];
                $row['item'] = $list['item_name'];
                $row['description'] = $list['item_description'];
                $row['quantity'] = $list['quantity'];
                $row['unit'] = $list['unit'];
                $row['type'] = $list['item_type'];
                $row['delivery_date'] = $list['date_delivered'];
                $row['date_received'] = $list['date_received'];
                $row['expiration_date'] = $list['expiration_date'];
                $row['cost'] = $list['unit_cost'];

                $data[] = $row;
                $counter++;
            }
            echo json_encode($data);
    }
        public function decreaseLog()
    {
            $dec = $this->logs->decrease_log();
            $counter = 1;
            foreach ($dec as $list){
                $row = array();
                $row['number']=$counter;
                $row['timestamp']= $list['timestamp'];
                $row['serial'] = $list['serial'];
                $row['item'] = $list['item_name'];
                $row['description'] = $list['item_description'];
                $row['type'] = $list['item_type'];
                $row['department'] = $list['department'];
                $row['dateacquired'] = $list['date_acquired'];
                $row['accountcode'] = $list['account_code'];
                $row['unit'] = $list['unit'];
                $row['quantity'] = $list['quantity'];
                $row['receivedfrom'] = $list['received_from'];
                $data[] = $row;
                $counter++;
            }
            echo json_encode($data);
    }

        public function editLog()
    {
        $edit = $this->logs->edit_log();
            $counter = 1;
            foreach ($edit as $list){
                $row = array();
                $row['timestamp'] = $list['timestamp'];
                $row['fieldedited'] = $list['field_edited'];
                $row['oldvalue'] = $list['old_value'];
                $row['newvalue'] = $list['new_value'];

                $data[] = $row;
                $counter++;
            }
            echo json_encode($data);
    }

    public function returnLog()
    {
        $ret = $this->logs->return_log();
        $counter = 1;
        foreach ($ret as $list){
            $row = array();
            $row['timestamp'] = $list['timestamp'];
            $row['serial'] = $list['serial'];
            $row['item'] = $list['item_name'];
            $row['description'] = $list['item_description'];
            $row['datereturned'] = $list['date_returned'];
            $row['reason'] = $list['reason'];
            $row['returnedby'] = $list['returned_by'];
            $row['receivedby'] = $list['received_by'];
            $row['status'] = $list['returned_status'];

            $data[] = $row;
            $counter++;
        }
        echo json_encode($data);
    }
}