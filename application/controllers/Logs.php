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
            echo json_encode($data);
    }

        public function editLog()
    {
        $edit = $this->logs->edit_log();
            $counter = 1;
            foreach ($edit as $list){
                $row = array();
                $row['beforeitem'] = $list['before_item_name'];
                $row['afteritem'] = $list['after_item_name'];
                $row['beforedescription'] = $list['before_item_description'];
                $row['afterdescription'] = $list['after_item_description'];
                $row['beforeunit'] = $list['before_unit'];
                $row['afterunit'] = $list['after_unit'];
                $row['beforetype'] = $list['before_item_type'];
                $row['aftertype'] = $list['after_item_type'];

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
            $row['item'] = $list['item_name'];
            $row['description'] = $list['item_description'];
            $row['datereturn'] = $list['date_return'];
            $row['reason'] = $list['reason'];
            $row['receivedfrom'] = $list['received_from'];
            $row['receivedby'] = $list['received_by'];
            $row['status'] = $list['status_return'];

            $data[] = $row;
            $counter++;
        }
        echo json_encode($data);
    }
}