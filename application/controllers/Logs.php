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
        //supply officer
        $position = $this->session->userdata['logged_in']['position'];
        $userid = $this->session->userdata['logged_in']['userid'];

        if($position == 'Supply Officer'){
            $inc = $this->Logs_model->increase_log();
        } else {
            $inc = $this->Logs_model->get_increase_log_per_department($dept_id);
        }
        $data = array();
            foreach ($inc as $list){
                $row = array();
                $row[]= $list['timestamp'];
                $row[] = $list['item_name'];
                $row[] = $list['item_description'];
                $row[] = $list['quantity'];
                $row[] = $list['unit'];
                $row[] = $list['item_type'];
                $row[] = $list['date_delivered'];
                $row[] = $list['date_received'];
                $row[] = $list['expiration_date'];
                $row[] = $list['unit_cost'];
                $data[] = $row;
            }
            $list = array('data'=>$data);
            echo json_encode($list);
    }
        public function decreaseLog()
    {
        //supply officer
        $position = $this->session->userdata['logged_in']['position'];
        $dept_id = $this->session->userdata['logged_in']['dept_id'];

        if($position == 'Supply Officer'){
            $decrease = $this->Logs_model->decrease_log();
        } else {
            $decrease = $this->Logs_model->get_decrease_log_per_department($dept_id);
        }
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