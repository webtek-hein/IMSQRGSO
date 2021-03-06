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

    //add item
    public function save($counter)
    {
        echo $this->inv->add_item($counter - 1);
    }

    //add bulk of item
    public function saveAll()
    {
        $this->inv->saveAll();
        redirect('inventory');
    }

    function import()
    {
        $this->inv->insert();
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
            $cost = "PHP ".number_format($item['cost'],2);
            $totalCost = "PHP ".number_format($item['totalcost'],2);
            if($item['serialStatus'] === '1'){
                $serialStatus = 'Yes';
            }else{
                $serialStatus = 'No';
            }
            ;
            if ($position === 'Supply Officer') {
                $quantity = $item['quant'];
            } else {
                $quantity = $item['quantity'];
            }
            $data[] = array(
                'id' => $item['item_id'],
                'item' => $item['item_name'],
                'description' => $item['item_description'],
                'quantity' => $quantity,
                'unit' => $item['unit'],
                'position' => $position,
                'cost' => $cost,
                'totalcost' => $totalCost,
                'serialStatus' => $serialStatus,
                'button' => 'Accept'
            );
        }
        echo json_encode($data);
    }

    public function addquant($item_det_id, $counter)
    {
        $list = $this->inv->addquant($item_det_id, $counter);
        $data = [];
        foreach ($list as $val) {
            $data[] = '<td>' . $val . '</td>';
        }
        echo json_encode($data);
    }

    public function distribute()
    {
        $position = $this->session->userdata['logged_in']['position'];
        $user = $this->session->userdata['logged_in']['user_id'];

        $this->inv->distrib($position,$user);
        redirect('inventory');
    }

    public function edititem()
    {
        $this->inv->edititem();
        redirect('inventory');
    }

    public function detail($dept, $id)
    {
        $position = $this->session->userdata['logged_in']['position'];
        $dept_id = $this->session->userdata['logged_in']['dept_id'];

        if ($position === 'Supply Officer' || $dept === 'dept') {
            $list = $this->inv->viewDetailperDept($dept,$id,$dept_id,$position);
        } else {
            $list = $this->inv->viewdetail($id,$position);
        }
        $data = array();
        $viewser = "";
        $action = "";

        foreach ($list as $detail) {
            //if there is a serial
            if ($detail['serialStatus'] === '1') {
                $viewser = "<a class=\"serialdrop dropdown-item\" onclick='viewSerial($detail[item_det_id])' data-toggle=\"collapse\" 
                    href=\"#serialpage\" role=\"button\" aria-expanded=\"false\" aria-controls=\"serialpage\"><i class=\"fa fa-folder-open\"></i>
                              </i > View Serial</a>";
            }

            if ($this->session->userdata['logged_in']['position'] !== 'none') {
                if ($this->session->userdata['logged_in']['position'] === 'Admin') {
                    $action = "<a data-toggle=\"dropdown\" class=\"btn btn-default btn-s dropdown-toggle\" type=\"button\" aria-expanded=\"false\"
                        <span class=\"caret\"></span></a>";

                } elseif ($position === 'Supply Officer') {
                    if ($detail['dist_stat'] !== 'Accepted') {
                        if($detail['serialStatus'] !== '1'){
                            $action = "<a href=\'#\' type=\'button\' data-toggle=\"modal\" 
                            data-target=\".Accept\" onclick=\"getserial($detail[item_det_id])\" data-id='$detail[dist_id]' 
                            class=\"btn btn-success\">Accept</a><a href=\'#\' type=\'button\' data-toggle=\"modal\" 
                            data-target=\".Return\" onclick=\"noserial($detail[item_det_id])\" data-id='$detail[dist_id]'  
                            class=\"btn btn-danger\">Return</a>";
                        }else{
                            $action = "<a href=\'#\' type=\'button\' data-toggle=\"modal\" 
                            data-target=\".Accept\" onclick=\"getserial($detail[item_det_id])\" data-id='$detail[dist_id]' 
                            class=\"btn btn-success\">Accept</a><a href=\'#\' type=\'button\' data-toggle=\"modal\" 
                            data-target=\".Return\" onclick=\"getserial($detail[item_det_id])\" data-id='$detail[dist_id]'  
                            class=\"btn btn-danger\">Return</a>";
                        }

                    } else {
                        if($detail['serialStatus'] !== '1') {
                            $action =
                                "<a href=\'#\' type=\'button\' data-toggle=\"modal\" data-target=\".DistributeSP\" onclick=\"noserial($detail[item_det_id])\" data-id='$detail[dist_id]' class=\"btn btn-success\">Distribute</a>
                            <a href=\'#\' type=\'button\' data-toggle=\"modal\" data-target=\".Return\" onclick=\"noserial($detail[item_det_id])\" data-id='$detail[dist_id]' class=\"btn btn-danger\">Return</a></br>
                            <a href=\"./are\" type=\'button\' class=\"btn btn-primary\">Generate Form (ARE)</a>";
                        }else{
                            $action =
                                "<a href=\'#\' type=\'button\' data-toggle=\"modal\" data-target=\".DistributeSP\" onclick=\"getserial($detail[item_det_id])\" data-id='$detail[dist_id]' class=\"btn btn-success\">Distribute</a>
                            <a href=\'#\' type=\'button\' data-toggle=\"modal\" data-target=\".Return\" onclick=\"getserial($detail[item_det_id])\" data-id='$detail[dist_id]' class=\"btn btn-danger\">Return</a></br>
                            <a href=\"./are\" type=\'button\' class=\"btn btn-primary\">Generate Form (ARE)</a>";
                        }
                    }

                }elseif ($dept === 'dept'){
                    $action = $detail['dist_stat'];
                } elseif($detail['serialStatus'] !== '1') {
                    $action = "<div class=\"dropdown\">
                            <a data-toggle=\"dropdown\" class=\"btn btn-default btn-sm dropdown-toggle\" type=\"button\" aria-expanded=\"false\"><span class=\"caret\"></span></a>
                            <div id=\"DetailDropDn\" role=\"menu\" class=\"dropdown-menu\">
                            <a class=\"dropdown-item\"  href=\"#\" onclick=\"noserial($detail[item_det_id])\"data-toggle=\"modal\" data-id='$detail[item_det_id]'data-target=\" .Distribute\">
                            <i class=\" fa fa-share-square-o\" ></i > Distribute</a >
                            <a class=\"dropdown-item\" data-toggle=\"modal\" onclick=\"removeDetail($detail[item_det_id],$detail[serialStatus])\" data-target=\" . Edit\">
                            <i class=\"fa fa - remove\" ></i > Remove Item</a >
                            </div>
                            $viewser
                            </div>
                            </div>";
                }else{
                    $action = "<div class=\"dropdown\">
                            <a data-toggle=\"dropdown\" class=\"btn btn-default btn-sm dropdown-toggle\" type=\"button\" aria-expanded=\"false\"><span class=\"caret\"></span></a>
                            <div id=\"DetailDropDn\" role=\"menu\" class=\"dropdown-menu\">
                            <a class=\"dropdown-item\"  href=\"#\" onclick=\"getserial($detail[item_det_id])\"data-toggle=\"modal\" data-id='$detail[item_det_id]'data-target=\" .Distribute\">
                            <i class=\" fa fa-share-square-o\" ></i > Distribute</a >
                            $viewser
                            <a class=\"dropdown-item\" data-toggle=\"modal\" onclick=\"removeDetail($detail[item_det_id],$detail[serialStatus])\" data-target=\" .Edit\">
                            <i class=\"fa fa-remove\" ></i > Remove Item</a >
                            </div>
                            </div>";
                }
            }
            if ($dept === 'dept') {
                $data[] = array(
                    'PR' => $detail['PR_no'],
                    'receiver' => $detail['receiver'],
                    'quant' => $detail['quantity_distributed'],
                    'rec' => $detail['date_received'],
                    'exp' => $detail['expiration_date'],
                    'cost' => $detail['cost'],
                    'sup' => $detail['supplier_name'],
                    'or' => $detail['OR_no'],
                    'action' => $action
                );
            } else {
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
                'account_code' => $list['account_code'] . "\n" . $list['description'],
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

        $list = $this->inv->getSerial($det_id, $position);

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
        echo json_encode($this->inv->addSerial());
    }

    public function viewDept($type, $id)
    {
        $list = $this->inv->departmentInventory($type, $id);
        $position = $this->session->userdata['logged_in']['position'];
        $data = array();
        foreach ($list as $item) {
            $data[] = array(
                'position' => $position,
                'id' => $item['item_id'],
                'name' => $item['item_name'],
                'description' => $item['item_description'],
                'quant' => $item['quant'],
                'unit' => $item['unit']
            );
        }
        echo json_encode($data);

    }
    public function reconcileview($type, $id)
    {
        $list = $this->inv->reconcile($type, $id);
        $data = array();
        foreach ($list as $item) {

            $ps = $item['physicalcount'];
            $q = $item['quant'];
            $remarks = $item['remarks'];
            $result = ($q) - $ps;

            $count_input = "<input autofocus type='text' name='reconcileitem[]' value='$ps' >";

            $remarks_input = "<textarea autofocus type='text' name='remarks[]' >$remarks</textarea>";

            if(($result) == 0){
                $result = 'equal';
            }elseif(($result) > 0){
                $result = ($result) . ' missing';
            }elseif (($result) <0){
                $result = 'more than ' . abs($result);
            }else{
                $result = '';
            }
            $data[] = array(
                'id' => $item['item_id'],
                'name' => $item['item_name'],
                'date' => $item['date_received'],
                'description' => $item['item_description'],
                'quant' => $item['quant'],
                'count' => $count_input,
                'result' => $result,
                'remarks' => $remarks_input
            );
        }
        echo json_encode($data);

    }

    public function compare(){

        echo json_encode($this->inv->compareitem());
        redirect('department');

    }

    public function getItem($dept, $id)
    {
        $list = $this->inv->getItem($dept, $id);
        $minimum = $this->inv->countItem($id);
        $quantity = 0;
        if ($dept === 'dept') {
            $quantity = $list->quant;
        } else {
            $quantity = $list->quantity;
        }
        $data = array(
            'name' => $list->item_name,
            'description' => $list->item_description,
            'quant' => $quantity,
            'min' => $minimum->min,
            'unit' => $list->unit,
            'item_type' => $list->item_type,
            'initialStock' => $list->initialStock,
            'initialCost' => $list->initialCost
        );
        echo json_encode($data);
    }

    public function editquantity()
    {
        $this->inv->editquant();
        redirect('inventory');
    }

    public function acceptitem()
    {
        $this->inv->accept();
        redirect('inventory');
    }

    public function deptreturn()
    {
        $this->inv->returnitem();
        redirect('inventory');
    }

    public function getLedger($id)
    {
        $list = $this->inv->ledger($id);
        $data = [];
        foreach ($list as $item) {
            $cost = "PHP ".number_format($item['unit_cost'],2);

            $data[] = array(
                'date' => $item['date'],
                'transaction_number' => $item['transaction_number'],
                'increased' => $item['increased'],
                'decreased' => $item['decreased'],
                'price' => $cost,
                'transaction' => $item['transaction']
            );
        }
        echo json_encode($data);
    }

    public function viewReturn(){
        $position = $this->session->userdata['logged_in']['position'];
        $department = $this->session->userdata['logged_in']['dept_id'];

        $action = "";
        $list = $this->inv->returns($department,$position);
        $data = [];

        foreach ($list as $rets){
            if($position === 'Custodian'){
                $action ='<button onclick="return_action(0,'.$rets['return_id'].')" class="btn btn-primary">Accept</button> 
                <button onclick="return_action(1,'.$rets['return_id'].')" class="btn btn-danger">Decline</button>';

            }else if($position === 'Supply Officer'){
                $action ='<button onclick="return_action(2,'.$rets['return_id'].')" class="btn btn-primary">Cancel</button>';
            }
            $data[] = array(
                'date'=> $rets['date_returned'],
                'dept' => $rets['department'],
                'item'=> $rets['item_name'],
                'desc'=> $rets['item_description'],
                'reason'=> $rets['remarks'],
                'returnperson'=> $rets['receiver'],
                'receiver'=> $rets['receiver'],
                'status' => $rets['status'],
                'action'=>$action
            );
        }
        echo json_encode($data);
    }
    //actions for returning
    public function return_actions(){
        $action = $this->input->post('action');
        $return_id = $this->input->post('return_id');
        //accept
        if($action === '0'){
            echo $this->inv->acceptReturn($return_id);
            // decline
        }elseif ($action === '1'){
            echo $this->inv->declineReturn($return_id);
            //cancel
        }else{
            echo $this->inv->cancelReturn($return_id);
        }
    }

    //count items received dash custodian
    public function itemsReceived(){
        $itemsreceivedCount = $this->inv->itemsrec();
        $data = array();
        foreach ($itemsreceivedCount as $list){
            $data[] = array(
                'itemsreceivedCount' => $list['countInc'],
            );
        }
        echo json_encode($data);
    }

    //count issued items dash custodian
    public function issuedItems(){
        $issueditemsCount = $this->inv->issued();
        $data = array();
        foreach ($issueditemsCount as $list){
            $data[] = array(
                'issuedCount' => $list['issued'],
            );
        }
        echo json_encode($data);
    }

    //count returned items dash custodian
    public function returnedItems(){
        $returneditemsCount = $this->inv->returndash();
        $data = array();
        foreach ($returneditemsCount as $list){
            $data[] = array(
                'returnedCount' => $list['returned'],
            );
        }
        echo json_encode($data);
    }

    //sum total cost dash custodian
    public function totalCost(){
        $totalcostSum = $this->inv->totalcost();
        $data = array();
        foreach ($totalcostSum as $list){
            $data[] = array(
                'totalcostSum' => $list['total cost'],
            );
        }
        echo json_encode($data);
    }

    //remove detail
    public function removeDetail($id,$serialStatus){
        $this->inv->rmDet($id,$serialStatus);
    }

    //show removed items
    public function showRemovedItems($id){
        $list = $this->inv->rmItems($id);
        $data = [];
        foreach ($list as $removedItems){
            $data[] = array(
                'PO' => $removedItems['PO_number'],
                'quant' => $removedItems['quantity'],
                'del' => $removedItems['date_delivered'],
                'rec' => $removedItems['date_received'],
                'exp' => $removedItems['expiration_date'],
                'cost' => $removedItems['unit_cost'],
                'sup' => $removedItems['supplier_name'],
                'or' => $removedItems['OR_no'],
                'action' => "<button onclick=\"revertDetail($removedItems[item_det_id],$removedItems[serialStatus])\" class=\"btn btn-success\">Revert</button>",
            );
        }
    echo json_encode($data);
    }
    //revert removed details
    public function revert($id,$serialStatus){
        $this->inv->revert($id,$serialStatus);
    }
    //get list of supply officer

    public function getSupplyOfficers($id){
        $list = $this->inv->getSuppOfficers($id);

        echo json_encode($list);
    }
}