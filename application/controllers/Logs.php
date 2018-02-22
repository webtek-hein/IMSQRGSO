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

        $inc = $this->logs->increase_log();

        $data = array();
            foreach ($inc as $list){
                $data[] = array(
                'timestamp'=> $list['timestamp'],
                'item' => $list['item_name'],
                'description' => $list['item_description'],
                'quantity' => $list['quantity'],
                'unit' => $list['unit'],
                'type' => $list['item_type'],
                'del' => $list['date_delivered'],
                'rec' => $list['date_received'],
                'exp' => $list['expiration_date'],
                'cost' => $list['unit_cost'],
            );
            }
            echo json_encode($data);
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