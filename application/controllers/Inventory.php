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

        $list = $this->inv->select_item($type);
        $data = array();
        //counter initialize
        $counter = 1;

        foreach ($list as $item) {
            $data[] = array(
                'number' => "<a href='details' onclick=\"detail($item[item_id])\">" .
                    $counter,
                'item' => "<a onclick=\"detail($item[item_id])\">" .
                    $item['item_name'] . "</a>",
                'description' => "<a href='' onclick=\"detail($item[item_id])\">" .
                    $item['item_description'] . "</a>",
                'quantity' => "<a href='' onclick=\"detail($item[item_id])\">" .
                    $item['quantity'] . "</a>",
                'unit' => "<a href='' onclick=\"detail($item[item_id])\">" .
                    $item['unit'] . "</a>",
                'action' => "<a  href=\"#\" data-id=\"" . $item['item_id'] . "\" data-toggle=\"modal\" data-target=\"#addquant\" 
                     class=\"btn btn-primary btn-xs\"><i class=\"fa fa-plus-circle\">
                     </i> Add Quantity</a>" .
                    "<a href=\"#\" data-name=\"" . $item['item_name'] . "\" data-id=\"" . $item['item_id'] . "\" 
                     data-description=\"" . $item['item_description'] . "\" data-unit=\"" . $item['unit'] . "\"
                     data-type=\"" . $item['item_type'] . "\" data-toggle=\"modal\" data-target=\".Edit\" 
                      class=\"btn btn-warning btn-xs\"><i class=\"fa fa-pencil-square-o\"></i> Edit</a></td>");
            $counter++;
        }
        echo json_encode($data);
    }

    public function addquant()
    {
        $this->inv->addquant();
        redirect('inventory');
    }

    public function distribute()
    {
        $this->inv->distrib();
        redirect('inventory');
    }

    public function edititem()
    {
        $this->inv->edititem();
        redirect('inventory');
    }

    public function detail($id)
    {
        $list = $this->inv->viewdetail($id);
        $data = array();

        foreach ($list as $detail) {
            if ($this->session->userdata['logged_in']['position'] === 'Custodian') {
                $action = "<a href=\"#\" data-toggle=\"modal\" data-id='$detail[item_det_id]' data-target=\".Distribute\" 
                              class=\"btn btn-modal btn-default btn-xs\"><i class=\"fa fa-plus-circle\"></i> Distribute</a>
                             
                              <a id=\"anchor-serial\" onclick=\"viewSerial($detail[item_det_id])\" class=\"btn btn-modal btn-default btn-xs\" role=\"tab\" id=\"headingOne\"
                               href=\"#data1\" 
                              aria-expanded=\"true\" aria-controls=\"collapseOne\"><li class=\"fa fa-folder-open\">
                              </li> View Serial</a>";
            } else {
                $action = "<a id=\"anchor-serial\" onclick=\"viewSerial($detail[item_det_id])\" class=\"btn btn-modal btn-default btn-xs\" role=\"tab\" id=\"headingOne\"
                               href=\"#data1\" aria-expanded=\"true\" aria-controls=\"collapseOne\"><li class=\"fa fa-folder-open\">
                              </li> View Serial</a>";
            }
            $data[] = array(
                'quant' => $detail['quantity'],
                'del' => $detail['date_delivered'],
                'rec' => $detail['date_received'],
                'exp' => $detail['expiration_date'],
                'cost' => $detail['unit_cost'],
                'sup' => $detail['supplier_name'],
                'action' => $action,
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
        $user_id = $this->session->userdata['logged_in']['userid'];

        $list = $this->inv->getSerial($det_id);

        $data = array();
        foreach ($list as $serial) {
            $data[] = array(
                'serial_id' => $serial['serial_id'],
                'serial' => $serial['serial'],
                'position' => $position,
            );
        }
        echo json_encode($data);
    }

    public function addSerial()
    {
        $this->inv->addSerial();
        redirect('inventory');
    }

    public function viewDept()
    {
        $list = $this->inv->departmentInventory();
        $data = array();
        foreach ($list as $item) {
            $data[] = array('item_name' => $item['item_name'],
                'item_description' => $item['item_description'],
                'quantity_distributed' => $item['quantity_distributed'],
                'date_received' => $item['date_received'],
                'unit' => $item['unit']
            );
        }
        echo json_encode($data);

    }
}