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
            $cost = "PHP " . number_format($list['unit_cost'], 2);
            $timestamp =  date("d F Y H:i:s", strtotime ($list['timestamp']));
            $data[] = array(
                'timestamp' => $timestamp,
                'item' => $list['item_name'],
                'description' => $list['item_description'],
                'quantity' => $list['quantity'],
                'unit' => $list['unit'],
                'del' => $list['date_delivered'],
                'rec' => $list['date_received'],
                'exp' => $list['expiration_date'],
                'cost' => $cost,
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
            if($position !== 'Admin'){
                $receiver = $list['receiver'];
            }else{
                $receiver = '';
            }
            $timestamp =  date("d F Y H:i:s", strtotime ($list['timestamp']));
            $data[] = array(
                'timestamp' => $timestamp,
                'department' => $list['department'],
                'item' => $list['item_name'],
                'description' => $list['item_description'],
                'quantity' => $list['quantity_distributed'],
                'unit' => $list['unit'],
                'date' => $list['date_received'],
                'accountcode' => $list['account_code'],
                'receivedfrom' =>$receiver ,
            );
        }
        echo json_encode($data);
    }

    public function editlogitem($type){
        $position = $this->session->userdata['logged_in']['position'];
        $user_id = $this->session->userdata['logged_in']['user_id'];
        $edit = $this->logs->edit_log_item($type,$position,$user_id);

        foreach ($edit as $list) {

            $data[] = array(
                'id' =>$list['item_id'],
                'name' => $list['item_name'],
                'description' => $list['item_description'],
                'type' => $list['item_type'],
                'unit' => $list['unit'],
            );
        }
        echo json_encode($data);
    }
    public function editLog($itemid)
    {
        $position = $this->session->userdata['logged_in']['position'];
        $user_id = $this->session->userdata['logged_in']['user_id'];

        $edit = $this->logs->edit_log($itemid,$position,$user_id);
        $data = [];
        foreach ($edit as $list) {
            $timestamp =  date("d F Y H:i:s", strtotime ($list['timestamp']));
            $data[] = array(
                'timestamp' => $timestamp,
                'fieldedited' => $list['field_edited'],
                'oldvalue' => $list['old_value'],
                'newvalue' => $list['new_value'],
            );
        }
        echo json_encode($data);
    }

    public function returnLog($type)
    {
        $dept_id = $this->session->userdata['logged_in']['dept_id'];
        $position = $this->session->userdata['logged_in']['position'];
        $ret = $this->logs->return_log($dept_id,$position,$type);
        $data = [];
        foreach ($ret as $list) {
            $timestamp =  date("d F Y H:i:s", strtotime ($list['timestamp']));
            $data[] = array(
                'timestamp' => $timestamp,
                'item' => $list['item_name'],
                'description' => $list['item_description'],
                'datereturned' => $list['date_returned'],
                'reason' => $list['remarks'],
                'returnedby' => $list['receiver'],
                'receivedby' => $list['receiver'],
                'status' => $list['status'],
            );
        }
        echo json_encode($data);
    }

    public function gettransfer($serialid){
        $dept_id = $this->session->userdata['logged_in']['dept_id'];
        $position = $this->session->userdata['logged_in']['position'];
        $transfer = $this->logs->transfer_log($serialid);
        $data = [];
        foreach ($transfer as $list) {
            $data[] = array(
                'serial' => $list['serial'],
                'transfer_date' => $list['transfer_date'],
                'current_owner' => $list['current_owner'],
                'last_owner' => $list['last_owner']
            );
        }
        echo json_encode($data);
    }
}