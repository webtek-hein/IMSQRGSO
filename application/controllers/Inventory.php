<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventory extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form','url'));
        $this->load->library('form_validation');
        $this->load->model('Inventory_model','inv');
    }

    public function save($counter)
    {
        echo $this->inv->add_item($counter-1);
    }
    public function saveAll(){
        $this->inv->saveAll();
    }
    public function viewItem($type){

        $list = $this->inv->select_item($type);
        $data = array();

        //counter initialize
        $counter = 1;
        foreach ($list as $item){
            $data[] = array(
                'number'    => "<a href=\"details\" onclick=\"detail($item[item_id])\">".
                                $counter,
                'item'      =>  "<a href=\"details\" onclick=\"detail($item[item_id])\">".
                                $item['item_name']."</a>",
                'description'=> "<a href=\"details\" onclick=\"detail($item[item_id])\">".
                                $item['item_description']."</a>",
                'quantity'   => "<a href=\"details\" onclick=\"detail($item[item_id])\">".
                                $item['quantity']."</a>",
                'unit'       => "<a href=\"details\" onclick=\"detail($item[item_id])\">".
                                $item['unit']."</a>",
                    'action' => "<a href=\"#\" data-id=\"".$item['item_id']."\" data-toggle=\"modal\" data-target=\"#addquant\" 
                     class=\"btn btn-primary btn-xs\"><i class=\"fa fa-plus-circle\">
                     </i> Add Quantity</a>".
                     "<a href=\"#\" data-name=\"".$item['item_name']."\" data-id=\"".$item['item_id']."\" 
                     data-description=\"".$item['item_description']."\" data-unit=\"".$item['unit']."\"
                     data-type=\"".$item['item_type']."\" data-toggle=\"modal\" data-target=\".Edit\" 
                      class=\"btn btn-warning btn-xs\"><i class=\"fa fa-pencil-square-o\"></i> Edit</a></td>");
            $counter++;
        }
        echo json_encode($data);
    }
    public function addquant(){
        $this->inv->addquant();
        redirect('inventory');
    }
        public function distribute(){
        $this->inv->distrib();
        redirect('inventory');
    }
    public function edititem(){
        $this->inv->edititem();
        redirect('inventory');
    }
    public function detail($id){
        $list = $this->inv->viewdetail($id);
        $data=array();
        foreach ($list as $detail){
            $data[] = array('quant'  => $detail['quantity'],
            'del'  => $detail['date_delivered'],
            'rec'  => $detail['date_received'],
            'exp' => $detail['expiration_date'],
            'cost' => $detail['unit_cost'],
            'sup'  => $detail['supplier_name'],
            'action' => "<a href=\"#\" data-toggle=\"modal\" data-id='$detail[item_det_id]' data-target=\".Distribute\" class=\"btn btn-modal btn-default btn-xs\">
                            <i class=\"fa fa-plus-circle\"></i> Distribute</a>"
            );
        }
        echo json_encode($data);
    }
    function getdept(){
        $departments = $this->inv->select_departments();
        $data = array();
         foreach ($departments as $list){
            $data[] = array(
                'dept_id' => $list['dept_id'],
                'res_center_code' => $list['res_center_code'],
                'department' => ucwords(strtolower($list['department']))
            );
        }
        echo json_encode($data);
    }
    function getacccodes(){
        $acc_code = $this->inv->select_acc_codes();
        foreach ($acc_code as $list){
            $data[] = array(
                'ac_id' => $list['ac_id'],
                'account_code' => $list['account_code'],
                'description' => $list['description']
            );
        }
        echo json_encode($data);
    }
            public function returnitem()
    {
        //supply officer
        $position = $this->session->userdata['logged_in']['position'];
        $user_id = $this->session->userdata['logged_in']['userid'];

        if($position == 'Custodian' || $position == 'Admin'){
            $return = $this->Inventory_model->return_item();
        }else{
            $return = $this->Inventory_model->get_returned_per_user($user_id);
        }
            $rec = $this->inv->return_item();
            $counter = 1;
            foreach ($rec as $list){
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
                    'action' => $list['action']);
                $counter++;
            }
            echo json_encode($data);
    }
    //get serial
    public function getSerial($det_id){
        //supply officer
        $position = $this->session->userdata['logged_in']['position'];
        $user_id = $this->session->userdata['logged_in']['userid'];

        if($position == 'Custodian'){
            $serial = $this->Inventory_model->getSerial($user_id);
        }

        $list = $this->inv->getSerial($det_id);
        $data = array();
        foreach ($list as $serial){
           $data[] = array($serial['serial']);
        }
        echo json_encode($data);
    }
}
