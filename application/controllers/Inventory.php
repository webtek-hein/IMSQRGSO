<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventory extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->model('Inventory_model', 'inv');
        //$this->load->library('csvimport');
    }
    function import()
    {
        $this->inv->insert();
    }

    public function save($counter)
    {
        echo $this->inv->add_item($counter - 1);
    }

    public function saveAll()
    {
        $this->inv->saveAll();
        redirect('inventory');
    }

    public function viewItem($type)
    {
        $position = $this->session->userdata['logged_in']['position'];
        $department = $this->session->userdata['logged_in']['dept_id'];
        if ($position === 'Supply Officer') {
            $list = $this->inv->departmentInventory($type, $department);
        } else {
            $list = $this->inv->select_item($type);
        }
        $data = array();

        foreach ($list as $item) {
            $data[] = array(
                'id' => $item['item_id'],
                'item' => $item['item_name'],
                'description' => $item['item_description'],
                'quantity' => $item['quantity'],
                'unit' => $item['unit'],
                'button' =>  'Accept'
            );
        }
        echo json_encode($data);
    }

    public function addquant($item_det_id)
    {
        $this->inv->addquant($item_det_id);
    }

    public function distribute()
    {
        $position = $this->session->userdata['logged_in']['position'];
        $dept = $this->session->userdata['logged_in']['dept_id'];
        $this->inv->distrib($position,$dept);
       redirect('inventory');
    }

    public function edititem()
    {
        $this->inv->edititem();
        redirect('inventory');
    }

    public function detail($id)
    {
        $position = $this->session->userdata['logged_in']['position'];
        if($position === 'Supply Officer'){
            $list = $this->inv->viewDetailperDept($id);
        }else{
            $list = $this->inv->viewdetail($id);
        }
        $data = array();
        $viewser = "";
        $editquants = "";
        foreach ($list as $detail) {
            if ($detail['item_type'] === 'CO' && $detail['serial'] === '1') {
                $viewser = "<li ><a onclick='viewSerial($detail[item_det_id])' data-toggle=\"collapse\" 
                    href=\"#serialpage\" role=\"button\" aria-expanded=\"false\" aria-controls=\"serialpage\">
                              </i > View Serial</a></li>";
            }
            if ($this->session->userdata['logged_in']['position'] !== 'none' ) {
                if ($this->session->userdata['logged_in']['position'] !== 'Custodian' ) {    
                 $action = "<a data-toggle=\"dropdown\" class=\"btn btn-default btn-s dropdown-toggle\" type=\"button\" aria-expanded=\"false\"><span class=\"caret\"></span></a>";
                }else{
                    $action = "<a data-toggle=\"dropdown\" class=\"btn btn-default btn-s dropdown-toggle\" type=\"button\" aria-expanded=\"false\"><span class=\"caret\"></span></a><ul id=\"DetailDropDn\" role=\"menu\" class=\"dropdown-menu\">
                            <li><a href=\"#\" onclick=\"getserial($detail[item_det_id])\"data-toggle=\"modal\" data-id='$detail[item_det_id]'data-target=\" .Distribute\">
                            <i class=\" fa fa-share-square-o\" ></i > Distribute</a ></li >
                            <li><a href=\"#\" data-toggle=\"modal\" data-quantity='$detail[quantity]' data-id='$detail[item_det_id]'data-target=\" .Edit\">
                            <i class=\"fa fa-adjust\" ></i > Edit Quantity</a ></li >$viewser
                    </ul>";
                }
            } else {
                    $action = "<a href=\'#\' type=\'button\' class=\" btn btn-modal btn-outline-success\" onclick=\"getserial($detail[item_det_id])\" data-toggle=\"modal\" data-id='$detail[dist_id]'data-target=\" .DistributeSP\">Distribute</a >
                               <a href=\'#\' type=\'button\' data-toggle=\"modal\" data-target=\".Accept\" onclick=\"getserial($detail[item_det_id])\" data-id='$detail[item_det_id]' class=\"btn btn-success\">Accept</a>
                               <a href=\'#\' type=\'button\' data-toggle=\"modal\" data-target=\".Return\" onclick=\"getserial($detail[item_det_id])\" data-id='$detail[item_det_id]'  class=\"btn btn-danger\">Return</a>";
            }

            $data[] = array(
                'PO' => $detail['PO_number'],
                'quant' => $detail['quantity'],
                'del' => $detail['date_delivered'],
                'rec' => $detail['date_received'],
                'exp' => $detail['expiration_date'],
                'cost' => $detail['unit_cost'],
                'sup' => $detail['supplier_name'],
                'or' => $detail['OR_no'],
                'action' => $action,
            );
        }
        echo json_encode($data);
    }

    public function mobiledetail()
    {
        $details = $this->inv->mobiledetail();
        $data = array();
        foreach ($details as $list) {
            $data[] = array(
                'id' => $list['serial_id'],
                'item_name' => $list['item_name'],
                'serial' => $list['serial'],
                'account_code' => $list['description'],
                'description' => $list['item_description'],
                'unit_cost' => $list['unit_cost'],
                'item_type' => $list['item_type'],
                'expiration' => $list['expiration_date'],
                'employee' => $list['employee']
            );
        }
        echo json_encode($data);
            
    }

    public function getdept()
    {
        $departments = $this->inv->select_departments();
        $data = array();
        foreach ($departments as $list) {
            $data[] = array(
                'dept_id' => $list['dept_id'],
                'res_center_code' => $list['res_center_code'],
                'department' => ucwords(strtolower($list['department']))
            );
        }
        echo json_encode($data);
    }

    public function getacccodes()
    {
        $acc_code = $this->inv->select_acc_codes();
        foreach ($acc_code as $list) {
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

        if ($position == 'Custodian' || $position == 'Admin') {
            $return = $this->Inventory_model->return_item();
        } else {
            $return = $this->Inventory_model->get_returned_per_user($user_id);
        }
        $rec = $this->inv->return_item();
        $counter = 1;
        foreach ($rec as $list) {
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
    public function getSerial($det_id)
    {
        //supply officer
        $position = $this->session->userdata['logged_in']['position'];
        $user_id = $this->session->userdata['logged_in']['user_id'];

        $list = $this->inv->getSerial($det_id,$position);

        $data = array();
        foreach ($list as $serial) {
            $data[] = array(
                'serialStatus' => $serial['serialStatus'],
                'serial_id' => $serial['serial_id'],
                'serial' => $serial['serial'],
                'position' => $position,
                'item_status' => $serial['item_status']
            );
        }
        echo json_encode($data);
    }

    public function addSerial()
    {
        $this->inv->addSerial();
        redirect('inventory');
    }

    public function viewDept($type, $id)
    {
        $list = $this->inv->departmentInventory($type, $id);
        $data = array();
        foreach ($list as $item) {
            $data[] = array(
                'id' => $item['item_id'],
                'name' => $item['item_name'],
                'description' => $item['item_description'],
                'quant' => $item['quantity'],
                'unit' => $item['unit']
            );
        }
        echo json_encode($data);

    }

    public function getItem($id)
    {
        $list = $this->inv->getItem($id);
        $minimum = $this->inv->countItem($id);
        $data = array(
            'name' => $list->item_name,
            'description' => $list->item_description,
            'quant' => $list->quantity,
            'min' => $minimum->min,
            'unit' => $list->unit,
            'item_type' => $list->item_type,
        );
        echo json_encode($data);
    }

    public function editquantity()
    {
        $this->inv->editquant();
        redirect('inventory');
    }

    public function acceptitem(){
        $this->inv->accept();
        redirect('inventory');
    }

    public function deptreturn(){
        $this->inv->returnitem();
        redirect('inventory');
    }





}