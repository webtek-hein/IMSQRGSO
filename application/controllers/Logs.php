<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logs extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->model('Logs_model', 'logs');
    }

    public function increaseLog($type)
    {
        //supply officer
        $position = $this->session->userdata['logged_in']['position'];
        $userid = $this->session->userdata['logged_in']['user_id'];

        $inc = $this->logs->increase_log($type,$position,$userid);
        $data = [];
        foreach ($inc as $list) {
            $data[] = array(
                'timestamp' => $list['timestamp'],
                'item' => $list['item_name'],
                'description' => $list['item_description'],
                'quantity' => $list['quantity'],
                'unit' => $list['unit'],
                'del' => $list['date_delivered'],
                'rec' => $list['date_received'],
                'exp' => $list['expiration_date'],
                'cost' => $list['unit_cost'],
            );
        }
        echo json_encode($data);
    }

    public function decreaseLog($type)
    {
        //supply officer
        $position = $this->session->userdata['logged_in']['position'];
        $user_id = $this->session->userdata['logged_in']['user_id'];

        $data = array();
        $dec = $this->logs->decrease_log($type,$position,$user_id);
        foreach ($dec as $list) {
            $data[] = array(
                'timestamp' => $list['timestamp'],
                'department' => $list['department'],
                'item' => $list['item_name'],
                'description' => $list['item_description'],
                'quantity' => $list['quantity_distributed'],
                'unit' => $list['unit'],
                'date' => $list['date_received'],
                'accountcode' => $list['account_code'],
                'receivedfrom' => $list['receiver'],
            );
        }
        echo json_encode($data);
    }

    public function editLog()
    {
        $edit = $this->logs->edit_log();
        $data = [];
        foreach ($edit as $list) {
            $data[] = array(
                'timestamp' => $list['timestamp'],
                'fieldedited' => $list['field_edited'],
                'oldvalue' => $list['old_value'],
                'newvalue' => $list['new_value'],
            );
        }
        echo json_encode($data);
    }

    public function returnLog()
    {
        $ret = $this->logs->return_log();
        $data = [];
        foreach ($ret as $list) {
            $data[] = array(
                'timestamp' => $list['timestamp'],
                'serial' => $list['serial'],
                'item' => $list['item_name'],
                'description' => $list['item_description'],
                'datereturned' => $list['date_returned'],
                'reason' => $list['reason'],
                'returnedby' => $list['returned_by'],
                'receivedby' => $list['received_by'],
                'status' => $list['returned_status'],
            );
        }
        echo json_encode($data);
    }
}