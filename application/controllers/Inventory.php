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

    /**
     *
     *This allows an item to be saved.
     *
     * @param int   $counter  Saves an item.
     */
    public function save($counter)
    {
        echo $this->inv->add_item($counter - 1);
    }

    /**
     *
     * This will insert the data of the items
     * in to the inventory.
     *
     * .*/
    public function saveAll()
    {
        $this->inv->saveAll();
        redirect('inventory');
    }

    function import()
    {
        $this->inv->insert();
    }

    /**
     *
     * This allows viewing of the items in
     * the inventory.
     *
     * @param $type If the item is CO/MMOE.
     *
     */
    public function viewItem($type)
    {
        $position = $this->session->userdata['logged_in']['position'];
        $department = $this->session->userdata['logged_in']['dept_id'];
        $z = $this->session->userdata['logged_in']['dept_id'];
        if ($position === 'Supply Officer') {
            $list = $this->inv->departmentInventory($type, $department);
        } else {
            $list = $this->inv->select_item($type);
        }
        $data = array();

        foreach ($list as $item) {
            $count_input = "<input autofocus type='number' min='0' name='reconcileitem[]' class='reconitem form-control' value=''>";

            $remarks_input = "<textarea autofocus type='text' name='remarks[]' class='remarks'></textarea>";
            $cost = "PHP " . number_format($item['cost'], 2);
            $totalCost = "PHP " . number_format($item['totalcost'], 2);
            if ($item['serialStatus'] === '1') {
                $serialStatus = 'Yes';
            } else {
                $serialStatus = 'No';
            };
            if ($position === 'Supply Officer') {
                $quantity = $item['quant'];
            } else {
                $quantity = $item['quantity'];
            }
            $data[] = array(
                'id' => $item['recon_id'],
                'item_id' => $item['item_id'],
                'item' => $item['item_name'],
                'description' => $item['item_description'],
                'quantity' => $quantity,
                'unit' => $item['unit'],
                'position' => $position,
                'cost' => $cost,
                'totalcost' => $totalCost,
                'serialStatus' => $serialStatus,
                'button' => 'Accept',
                'count' => $count_input,
                'result' => 'Enter physical count',
                'remarks' => $remarks_input
            );
        }
        echo json_encode($data);
    }

    /**
     *
     * This will allow the adding of quantity of the items.
     *
     * @param $item_det_id Retrieve the item detail ID.
     * @param $counter  Counts the quantity to be added.
     *
     */
    public function addquant($item_det_id, $counter)
    {
        $list = $this->inv->addquant($item_det_id, $counter);
        $data = [];
        foreach ($list as $val) {
            $data[] = '<td>' . $val . '</td>';
        }
        echo json_encode($data);
    }

    /**
     *
     * This will inventory of the receiver
     * of the distributed items.
     *
     */
    public function distribute()
    {
        $position = $this->session->userdata['logged_in']['position'];
        $user = $this->session->userdata['logged_in']['user_id'];

        $this->inv->distrib($position, $user);
        redirect('inventory');
    }

    /**
     *
     *This connects the edit model for items to be edited.
     * Then will be redirected to the inventory.
     *
     */
    public function edititem()
    {
        $this->inv->edititem();
        redirect('inventory');
    }

    /**
     *
     * This function is for the viewing of details,
     * adding details and distribution of items with or
     * without serial.
     *
     * @param $dept Departments available in the database.
     * @param $id   ID for viewing the detail for each item.
     * @param $dept_id Selected department will be displayed.
     *
     */
    public function detail($dept, $id, $dept_id)
    {
        $position = $this->session->userdata['logged_in']['position'];

        if ($position === 'Supply Officer') {
            $dept_id = $this->session->userdata['logged_in']['dept_id'];
            $list = $this->inv->viewDetailperDept($id, $dept_id);
        } elseif ($position === 'Custodian' && $dept === 'dept') {
            $list = $this->inv->viewDetailperDept($id, $dept_id);
        } else {
            $list = $this->inv->viewdetail($id, $position);
            $serial = $this->inv->getSerialNull($id, $position);
        }

        //$serialvalue = ($serial[0]['serial']);
        $data = array();
        $viewser = "";
        $action = "";
        foreach ($list as $detail) {

            if (array_key_exists('dist_id', $detail)) {
                $returnquant = $this->inv->retquant($dept_id, $id, $detail['dist_id']);
            }else {
                $returnquant = $this->inv->retquant1($dept_id, $id);
            }
            //if there is a serial
            if ($detail['serialStatus'] === '1') {
                $viewser = "<a class=\"serialdrop dropdown-item\" onclick='viewSerial($detail[item_det_id])' data-toggle=\"collapse\" 
                    href=\"#serialpage\" role=\"button\" aria-expanded=\"false\" aria-controls=\"serialpage\"><i class=\"fa fa-folder-open\"></i>
                              </i > View Serial</a>";
            }

            if ($this->session->userdata['logged_in']['position'] !== 'none') {
                if ($this->session->userdata['logged_in']['position'] === 'Admin') {

                } elseif ($position === 'Supply Officer') {
                    $returnquant = $this->inv->retquant($dept_id, $id,$detail['dist_id']);

                    foreach ($returnquant as $ret) {
                        if ($detail['serialStatus'] !== '1') {
                            $action =
                                "<a href=\'#\' type=\'button\' data-toggle=\"modal\" data-target=\".Return\" onclick=\"noserial($detail[item_det_id],$detail[quantity_distributed],$ret[retq])\" data-id='$detail[dist_id]' class=\"btn btn-danger\">Return</a>";
                        } else {
                            $action =
                                "<button onclick='accountability($detail[dist_id])' id=\"accountButton\" type=\'button\' data-toggle=\"tooltip\" data-placement=\"bottom\" title=\"Accountability\"
                                        class=\"btn btn-success btn-sm\"><i class='fa fa-user-o'></i> </button>
                                <a href=\'#\' type=\'button\' data-toggle=\"modal\" data-target=\".Return\" onclick=\"getserialreturn($detail[item_det_id],$detail[dist_id])\" 
                                        data-toggle=\"tooltip\" data-placement=\"bottom\" title=\"Return\" data-id='$detail[dist_id]' class=\"btn btn-danger btn-sm\"><i class='fa fa-refresh'></i></a>
                                <a href=\"./are\" type=\'button\' class=\"btn btn-primary btn-sm\"  data-toggle=\"tooltip\" 
                                data-placement=\"bottom\" title=\"Generate ARE\"><i class='fa fa-print'></i></a>";

                        }
                    }
                } elseif ($dept === 'dept') {
                    $action = $detail['dist_stat'];
                } elseif ($detail['serialStatus'] !== '1') {
                        $action = "<div class=\"dropdown\">
                            <a data-toggle=\"dropdown\" class=\"btn btn-default btn-sm dropdown-toggle\" type=\"button\" aria-expanded=\"false\">
                            <span class=\"caret\"></span></a>
                            <div id=\"DetailDropDn\" role=\"menu\" class=\"dropdown-menu\">
                            <a class=\"dropdown-item\"  href=\"#\" onclick=\"noserial($detail[item_det_id],$detail[quantity],0)\"data-toggle=\"modal\" 
                            data-id='$detail[item_det_id]'data-target=\" .Distribute\" data-quantity=\"$detail[quantity]\">
                            <i class=\" fa fa-share-square-o\" ></i > Distribute</a >
                            </div>
                            $viewser
                            </div>
                            </div>";
                } else {
                    if(empty($serial)) {
                        $action = "<div class=\"dropdown\">
                            <a data-toggle=\"dropdown\" class=\"btn btn-default btn-sm dropdown-toggle\" type=\"button\" aria-expanded=\"false\"><span class=\"caret\"></span></a>
                            <div id=\"DetailDropDn\" role=\"menu\" class=\"dropdown-menu\">
                        
                            $viewser
                            </div> 
                          </div>";
                    }else{
                        $action = "<div class=\"dropdown\">
                            <a data-toggle=\"dropdown\" class=\"btn btn-default btn-sm dropdown-toggle\" type=\"button\" aria-expanded=\"false\"><span class=\"caret\"></span></a>
                            <div id=\"DetailDropDn\" role=\"menu\" class=\"dropdown-menu\">
                            <a class=\"dropdown-item\"  href=\"#\" onclick=\"getserial($detail[item_det_id])\"data-toggle=\"modal\"
                             data-id='$detail[item_det_id]'data-target=\" .Distribute\" data-quantity=\"$detail[quantity]\">
                            <i class=\" fa fa-share-square-o\" ></i > Distribute</a >
                            $viewser
                            </div> 
                          </div>";
                    }
                }
            }
            if ($dept === 'dept') {
                $cost = "PHP " . number_format($detail['cost'], 2);
                $data[] = array(
                    'dist_id' => $detail['dist_id'],
                    'PR' => $detail['PR_no'],
                    'receiver' => $detail['receiver'],
                    'quant' => $detail['quantity_distributed'],
                    'rec' => $detail['date_received'],
                    'exp' => $detail['expiration_date'],
                    'cost' => $cost,
                    'sup' => $detail['supplier_name'],
                    'or' => $detail['OR_no'],
                    'action' => $action
                );
            } elseif ($position === 'Admin') {
                $cost = "PHP " . number_format($detail['unit_cost'], 2);
                $data[] = array(
                    'PO' => $detail['PO_number'],
                    'quant' => $detail['quantity'],
                    'del' => $detail['date_delivered'],
                    'rec' => $detail['date_received'],
                    'exp' => $detail['expiration_date'],
                    'cost' => $cost,
                    'sup' => $detail['supplier_name'],
                    'or' => $detail['OR_no'],
                );
            } else {
                $cost = "PHP " . number_format($detail['unit_cost'], 2);
                $data[] = array(
                    'remove' => '<a onclick="removeDetail(' . $detail['item_det_id'] . ',' . $detail['serialStatus'] . ')"> 
                                    <i class="fa fa-remove" style="color:red"></i></a>',
                    'PO' => $detail['PO_number'],
                    'quant' => $detail['quantity'],
                    'del' => $detail['date_delivered'],
                    'rec' => $detail['date_received'],
                    'exp' => $detail['expiration_date'],
                    'cost' => $cost,
                    'sup' => $detail['supplier_name'],
                    'or' => $detail['OR_no'],
                    'action' => $action,
                );
            }


        }
        echo json_encode($data);
    }

    /**
     * This gets the data of the item for
     * mobile detail.
     */
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

    /**
     *This will get data of a selected department.
     */
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

    /**
     *
     */
    public function getacccodes()
    {
        $data = array();
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

    /**
     * This allows the supply officer to return items
     * to the custodian.
     */
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

    /**
     * This allows distribution of items to departments.
     */
    public function userDistribute()
    {
        $position = $this->session->userdata['logged_in']['position'];
        $user = $this->session->userdata['logged_in']['user_id'];

        $this->inv->userdistrib($position, $user);
        redirect('department');
    }

    /**
     *
     * This allows a supply  officer to get the owner of the item
     * to be transfered to other end user.
     *
     * @param int   $dist_id ID of the receiver of the distributed item.
     */
    public function getEndUser($dist_id)
    {
        //supply officer
        $position = $this->session->userdata['logged_in']['position'];
        $user_id = $this->session->userdata['logged_in']['user_id'];

        $list = $this->inv->getEndUserDist($dist_id);

        $data = array();
        foreach ($list as $serial) {
            $action = "<button onclick=gettransfer($serial[serial_id]);  id=\"transferButton\" class=\"btn btn-success\"  data-id='$serial[serial_id]' data-toggle=\"modal\" data-target=\".transfer\">Transfer</button>
                            <button onclick=gettransferlog($serial[serial_id]); type=\"button\" id=\"historyButton\" class=\"btn btn-primary\" data-id='$serial[serial_id]'>History</button>";

            $data[] = array(
                'serial_id' => $serial['serial_id'],
                'serial' => $serial['serial'],
                'owner' => $serial['name'],
                'date' => $serial['accountability_date'] . ' to ' . date("Y-m-d"),
                'action' => $action
            );
        }

        echo json_encode($data);
    }

    /**
     *
     *This get the data of the next owner of the item.
     *
     * @param int   $serialid ID for the items.
     */
    public function getTransfer($serialid)
    {
        $name = $this->inv->getTrans($serialid);
        foreach ($name as $owner) {
            $data[] = array(
                'currentname' => $owner['name'],
                'serial' => $owner['serial'],
                'serial_id' => $owner['serial_id']);
        }
        echo json_encode($data);
    }

    /**
     *
     * This gets the data if the item and serial for display.
     *
     * @param int   $det_id This is the department ID.
     * @param int   $sid This is the serial ID.
     */
    public function getSerialreturn($det_id, $sid)
    {
        //supply officer
        $position = $this->session->userdata['logged_in']['position'];
        $user_id = $this->session->userdata['logged_in']['user_id'];

        $list = $this->inv->getSerialReturn($det_id, $sid);

        $data = array();
        foreach ($list as $serial) {
            $data[] = array(
                'serialStatus' => $serial['serialStatus'],
                'serial_id' => $serial['serial_id'],
                'serial' => $serial['serial'],
                'position' => $position,
                'item_status' => $serial['item_status'],
                'dist_id' => $serial['dist_id'],
                'item_det_id' => $serial['item_det_id']
            );
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

    /**
     *
     * This get the data of the serial button to display
     * the list of serials of an item.
     *
     * @param int   $det_id Department ID
     * @param int   $sid    Serial ID.
     */
    public function getSerialbtn($det_id, $sid)
    {
        //supply office
        $position = $this->session->userdata['logged_in']['position'];
        $user_id = $this->session->userdata['logged_in']['user_id'];

        $list = $this->inv->getSerialbtn($det_id, $position, $sid);

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

    /**
     * This allows adding of serial to some items.
     */
    public function addSerial()
    {
        echo json_encode($this->inv->addSerial());
    }

    /**
     *
     * This allows the viewing of departments together
     * with their inventory.
     *
     * @param string    $type Type of the item.
     * @param int       $id ID of the the method.
     */
    public function viewDept($type, $id)
    {
        $department = $this->session->userdata['logged_in']['dept_id'];
        $position = $this->session->userdata['logged_in']['position'];
        if ($position == 'Supply Officer') {
            $list = $this->inv->departmentInventory($type, $department);
        } else {
            $list = $this->inv->departmentInventory($type, $id);
            $department = $id;
        }
        $data = array();
        foreach ($list as $item) {
            $data[] = array(
                'dept_id' => $department,
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

    /**
     *
     * This allows viewing of the reconciled items.
     *
     * @param string    $type Type of the item.
     * @param int       $id ID for the method.
     */
    public function reconcileview($type, $id)
    {
        $list = $this->inv->reconcile($type, $id);
        $data = array();
        foreach ($list as $item) {

            $ps = $item['pc'];
            $q = $item['quant'];
            $remarks = $item['remarks'];

            $count_input = "<input autofocus type='number' min='0' name='reconcileitem[]' class='reconitem form-control' value='$ps'>";

            $remarks_input = "<textarea autofocus type='text' name='remarks[]' class='remarks'>$remarks</textarea>";

            $data[] = array(
                'id' => $item['recon_id'],
                'name' => $item['item_name'],
                'description' => $item['item_description'],
                'quant' => $item['quant'],
                'count' => $count_input,
                'result' => 'Enter physical count',
                'remarks' => $remarks_input
            );
        }
        echo json_encode($data);

    }

    /**
     * This is for reconciling items.
     */
    public function reconcile()
    {
        echo json_encode($this->inv->endingInventory());

    }

    /**
     *
     * This allows the item's data to be displayed.
     *
     * @param string    $dept Department.
     * @param int       $id ID for the method.
     * @param int       $dept_id Department ID.
     */
    public function getItem($dept, $id, $dept_id)
    {
        $list = $this->inv->getItem($dept, $id, $dept_id);
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

    /**
     * This allows item's quantity to be edited.
     */
    public function editquantity()
    {
        $this->inv->editquant();
        redirect('inventory');
    }

    /**
     * This allows a supply officer the accepting of items.
     */
    public function acceptitem()
    {
        $this->inv->accept();
        redirect('inventory');
    }

    /**
     * This allows a supply officer to return items.
     */
    public function deptreturn()
    {
        $this->inv->returnitem();
        redirect('department');
    }

    /**
     *
     *This allows data of the general ledger to be displayed.
     *
     * @param int   $id Parameter for the ID.
     */
    public function getLedger($id)
    {
        $list = $this->inv->ledger($id);
        $data = [];
        foreach ($list as $item) {
            $cost = "PHP " . number_format($item['unit_cost'], 2);
            $balance = "PHP " . number_format($item['running_quantity'] * $item['unit_cost'], 2);
            if ($item['transaction'] !== 'added') {
                $refIndication = 'PR #';
            } else {
                $refIndication = 'OR #';
            }
            $data[] = array(
                'date' => $item['date'],
                'quantity' => $item['quantity'],
                'reference' => $refIndication . " " . $item['transaction_number'],
                'increased' => $item['increased'],
                'decreased' => $item['decreased'],
                'running_quantity' => $item['running_quantity'],
                'running_balance' => $balance,
                'price' => $cost,
                'transaction' => $item['transaction']
            );
        }
        echo json_encode($data);
    }

    /**
     * This allows the data of the returned items to be displayed.
     */
    public function viewReturn()
    {
        $position = $this->session->userdata['logged_in']['position'];
        $department = $this->session->userdata['logged_in']['dept_id'];

        $action = "";
        $list = $this->inv->returns($department, $position);
        $data = [];

        foreach ($list as $rets) {
            if ($position === 'Custodian') {
                $action = '<a type="button" data-func="return_action(0,' . $rets['return_id'] . ',' . $rets['serialStatus']
                                . ')" onclick="retData(' . $rets['serialStatus'] . ',' . $rets['return_id'] . ')" 
                                data-toggle="modal" data-target=".AcceptReturn" class=" btn btn-success btn-sm" 
                                data-toggle="tooltip" data-placement="bottom" title="Accept"><i class="	fa fa-check-square-o"></i></a>
                           <button onclick="return_action(1,' . $rets['return_id'] . ')" class="btn btn-danger btn-sm"><i class="fa fa-times-rectangle"
                                data-toggle="tooltip" data-placement="bottom" title="Decline"></i></button>';

            } else if ($position === 'Supply Officer') {
                $action = '<button onclick="return_action(2,' . $rets['return_id'] . ')" class="btn btn-primary">Cancel</button>';
            }
            $data[] = array(
                'date' => $rets['date_returned'],
                'quantity' => $rets['return_quantity'],
                'dept' => $rets['department'],
                'item' => $rets['item_name'],
                'desc' => $rets['item_description'],
                'reason' => $rets['remarks'],
                'receiver' => $rets['receiver'],
                'status' => $rets['status'],
                'action' => $action
            );
        }
        echo json_encode($data);
    }

    /**
     * This allows the returned item to be accepted, returned or canceled.
     */
    public function return_actions()
    {
        $action = $this->input->post('action');
        $serial = $this->input->post('serial');
        $return_id = $this->input->post('return_id');
        //accept
        if ($action === '0') {
            echo $this->inv->acceptReturn($return_id, $serial);
            // decline
        } elseif ($action === '1') {
            echo $this->inv->declineReturn($return_id);
            //cancel
        } else {
            echo $this->inv->cancelReturn($return_id);
        }
    }

    /**
     * This gets the total items received for custodian and admin dashboard.
     */
    public function itemsReceived()
    {
        $itemsreceivedCount = $this->inv->itemsrec();
        foreach ($itemsreceivedCount as $list) {
            $data[] = array(
                'countinc' => $list['countInc'],
                'itemname' => $list['item_name'],
                'custodian' => $list['custodian']
            );
        }
        echo json_encode($data);
    }

    /**
     * This gets the total issued items for custodian and admin dashboard.
     */
    public function issuedItems()
    {
        $issueditemsCount = $this->inv->issued();
        foreach ($issueditemsCount as $list) {
            $data[] = array(
                'issuedcount' => $list['countDec'],
                'itemname' => $list['item_name'],
                'custodian' => $list['custodian'],
                'department' => $list['department']
            );
        }
        echo json_encode($data);
    }

    /**
     * This gets the total returned item for custodian and admin.
     */
    public function returnedItems()
    {
        $returneditemsCount = $this->inv->returndash();
        foreach ($returneditemsCount as $list) {
            $data[] = array(
                'returncount' => $list['countRet'],
                'itemname' => $list['item_name'],
                'department' => $list['department']
            );
        }
        echo json_encode($data);
    }

    /**
     * This get the total cost of items in the inventory for custodian and admin.
     */
    public function totalCost()
    {
        $totalcostSum = $this->inv->totalcost();
        foreach ($totalcostSum as $list) {
            $totalcost = (int)$list['totalcost'];
            if ($totalcost >= 1000000000000) echo "&#8369; " . round(($totalcost / 1000000000000), 2) . ' trillion';
            else if ($totalcost >= 1000000000) echo "&#8369; " . round(($totalcost / 1000000000), 2) . ' billion';
            else if ($totalcost >= 1000000) echo "&#8369; " . round(($totalcost / 1000000), 2) . ' million';
            else echo "&#8369; " . number_format($totalcost, 2);

        }
    }

    /**
     * This gets the total expired items for custodian and admin.
     */
    public function totalExpired()
    {
        $totalexpiredCount = $this->inv->totalexpired();
        foreach ($totalexpiredCount as $list) {
            $data[] = array(
                'expirecount' => $list['countExp'],
                'itemname' => $list['item_name']
            );
        }
        echo json_encode($data);
    }
    /**
     * This gets the total users registered.
     */
    public function totalUser()
    {
        $totaluserCount = $this->inv->totaluser();
        foreach ($totaluserCount as $list) {
            echo $list['totaluser'];
        }
    }

    /**
     *
     * This allows a detail of an item to be removed.
     *
     * @param int       $id ID for the method.
     * @param string    $serialStatus Status of the serial.
     */
    public function removeDetail($id, $serialStatus)
    {
        $this->inv->rmDet($id, $serialStatus);
    }

    /**
     *
     * This allows the data of removed items to be displayed.
     *
     * @param $id ID for the method
     */
    public function showRemovedItems($id)
    {
        $list = $this->inv->rmItems($id);
        $data = [];
        foreach ($list as $removedItems) {
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

    /**
     *
     * Allows the deleted item details to be reverted.
     *
     * @param int       $id ID of the method.
     * @param string    $serialStatus Status of the serial.
     */
    public function revert($id, $serialStatus)
    {
        $this->inv->revert($id, $serialStatus);
    }

    /**
     *
     * This gets the list of supply officer.
     *
     * @param int   $id ID for the method.
     */
    public function getSupplyOfficers($id)
    {
        $list = $this->inv->getSuppOfficers($id);

        echo json_encode($list);
    }

    /**
     * This count items issued for the supplier for this day
     * for the supply officer dashboard.
     */
    public function itemsThisDay()
    {
        $itemsIssuedCount = $this->inv->itemsThisDay();
        foreach ($itemsIssuedCount as $list) {
            echo $list['totalItems'];
        }
    }

    /**
     * This count pending items for the supplier
     * for the supply officer dashboard.
     */
    public function pendingItems()
    {
        $itemsPendCount = $this->inv->pendingItem();
        foreach ($itemsPendCount as $list) {
            echo $list['totalItems'];
        }
    }

    /**
     * This count items returned for this day
     * for the supply officer dashboard.
     */
    public function itemsReturnedThisDay()
    {
        $totalReturned = $this->inv->itemsReturnedThisDay();
        foreach ($totalReturned as $list) {
            echo $list['totalItemsReturned'];
        }
    }

    /**
     * This items expired as of the day
     * for the supply officer dashboard.
     */
    public function itemsExpiredSO()
    {
        $totalEx = $this->inv->itemsExpired();
        foreach ($totalEx as $list) {
            echo $list['totalItemsExpired'];
        }
    }

    /**
     * This is for computing the total cost of
     * items in the supply officer inventory.
     */
    public function itemTcostSO()
    {
        $totalcostSum = $this->inv->itemsTcost();
        foreach ($totalcostSum as $list) {
            $itemTcost = (int)$list['itemTcost'];
            if ($itemTcost >= 1000000000000) echo "&#8369; " . round(($itemTcost / 1000000000000), 2) . ' trillion';
            else if ($itemTcost >= 1000000000) echo "&#8369; " . round(($itemTcost / 1000000000), 2) . ' billion';
            else if ($itemTcost >= 1000000) echo "&#8369; " . round(($itemTcost / 1000000), 2) . ' million';
            else echo "&#8369; " . number_format($itemTcost, 2);

        }
    }

    /**
     *
     * This allows the data to be displayed for the reports.
     *
     * @param int       $report For counting reports.
     * @param string    $type Type of the item.
     */
    public function getReport($report, $type)
    {
        if ($report === '0') {
            echo json_encode($this->inv->deliveredReports($type));
        } elseif ($report === '1') {
            echo json_encode($this->inv->issuedReports($type));
        } elseif ($report === '2') {
            echo json_encode($this->inv->returnedReports($type));
        } else {
            echo json_encode($this->inv->supplierReport($type));
        }
    }

    /**
     *
     * This allows the generating of reports with date
     * included.
     *
     * @param int       $report The count of reports.
     * @param string    $type The type of item.
     * @param string    $from The sender of the report.
     * @param string    $to The receiver of the report.
     */
    public function getReportWithDate($report, $type,$from,$to)
    {
        if ($report === '0') {
            echo json_encode($this->inv->deliveredReportsWithDate($type,$from,$to));
        } elseif ($report === '1') {
            echo json_encode($this->inv->issuedReportsWithDate($type,$from,$to));
        } elseif ($report === '2') {
            echo json_encode($this->inv->returnedReportsWithDate($type,$from,$to));
        } else {
            echo json_encode($this->inv->supplierReportWithDate($type,$from,$to));
        }
    }

    /**
     * This is for getting inventory dates.
     */
    public function getInvDates()
    {
        echo json_encode($this->inv->getInventoryDates());
    }

    /**
     *
     * Gets the data of the return.
     *
     * @param string    $status Status of the serial.
     * @param int       $id ID for the method.
     */
    function getRetData($status, $id)
    {
        echo json_encode($this->inv->getRetData($status, $id));
    }

    /**
     * This is for reconciling inventory.
     * For items only with no discrepancy
     */
    function reconcileInventory()
    {
        echo json_encode($this->inv->reconcileInv());
    }

    /**
     * This is for getting discrepancy of items.
     */
    function getDiscrepancy()
    {
        $list = $this->inv->getDiscrepancy();

        $data = array();
        foreach ($list as $item) {
            $data[] = array(
                'item_name' => $item['item_name'],
                'item_id' => $item['item_id'],
                'serials' => implode(array_map(function ($serial) {
                    return ('<input class="item" type="checkbox" value=' . $serial . ' //>' . $serial . '<br>');
                },
                    explode(',', $item['serials'])))
            );
        }

        echo json_encode($data);
    }

    /**
     * This is for recording serialized items.
     */
    function recSerializedItems()
    {
        $this->inv->recSerializedItems();
    }

    /**
     *
     * This allows viewing of item per status.
     *
     * @param String    $status Status of the serial.
     */
    function viewItemPerStatus($status)
    {
        $list = $this->inv->viewItemPerSerial($status);
        $data = array();
        foreach ($list as $item) {
            $count_input = "<input type='number' 
            autofocus type='number' data-parsley-group=".$status." min='0' max=".$item['quantity']." 
            name='reconcileitem[]' class='reconitem recQuant form-control' 
            required>";

            $remarks_input = "<textarea autofocus type='text' name='remarks[]' class='remarks'></textarea>";
            $cost = "PHP " . number_format($item['cost'], 2);
            $totalCost = "PHP " . number_format($item['totalcost'], 2);
            if ($item['serialStatus'] === '1') {
                $serialStatus = 'Yes';
            } else {
                $serialStatus = 'No';
            };

            $data[] = array(
                'id' => $item['recon_id'],
                'item_id' => $item['item_id'],
                'item' => $item['item_name'],
                'description' => $item['item_description'],
                'quantity' => $quantity = $item['quantity'],
                'unit' => $item['unit'],
                'cost' => $cost,
                'totalcost' => $totalCost,
                'serialStatus' => $serialStatus,
                'button' => 'Accept',
                'count' => $count_input,
                'result' => 'Enter physical count',
                'remarks' => $remarks_input
            );
        }
        echo json_encode($data);
    }

    /**
     * This is for reconciliation of items with no serial.
     */
    public function reconcileNS()
    {
        $this->inv->nonSerializedRec();
    }

    public function getOR(){
        echo json_encode($this->inv->getOR());
    }
    public function createAIR($or){
        echo json_encode($this->inv->createAIR($or));
    }

}