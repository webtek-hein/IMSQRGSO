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
    public function addItem()
    {
            $this->inv->add_item();
            redirect('inventory');
    }
    public function viewItem(){
        $list = $this->inv->select_item();
        $list1 = $this->inv->selectdetails();
        $data = array();
        $data1 = array();

        $counter = 1;

        foreach ($list as $item){
            $row = array();
            $row[] = " <tr><th>".$counter."</th><td><a role=\"tab\" id=\"headingOne\" data-toggle=\"collapse\" 
            data-parent=\"#accordion\" href=\"#data1\" aria-expanded=\"true\" 
            aria-controls=\"collapseOne\">".$item['item_name']."</a></td><td>".$item['item_description']."</td>
            <td>".$item['quantity']."</td><td>".$item['unit']."</td><td><a href=\"#\" data-toggle=\"modal\" 
            data-target=\".Add_Item\" class=\"btn btn-primary btn-xs\">
            <i class=\"fa fa-plus-circle\"></i> Add Quantity</a><a href=\"#\" data-toggle=\"modal\" 
            data-target=\".Edit\" class=\"btn btn-warning btn-xs\"><i class=\"fa fa-pencil-square-o\"></i> Edit</a>
            </td></tr>";

            $data[] = $row;
            $counter++;
        }

        $list = array('items'=>$data);
        echo json_encode($list);
    }
    public function addquant(){
        $this->inv->addquant();
        redirect('inventory');
    }
    public function distribute(){
        $this->inv->distrib();
    }
    public function edititem(){
        $this->inv->edititem();
        redirect('inventory');
    }
    public function detail($id){
        $list = $this->inv->viewdetail($id);
        $data=array();
        foreach ($list as $detail){
            $row[] ="<tr><td colspan=\"12\"><div id=\"data".$counter."\" class=\"panel-collapse collapse \" role=\"tabpanel\"
                       aria-labelledby=\"headingOne\"><div class=\"panel-body\"><div class=\"col-md-12 col-sm-12 col-xs-12\">
                        <div class=\"x_panel\"><div class=\"x_content\">
                         <table class=\"table table-bordered\">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Delivery Date</th>
                                    <th>Date Received</th>
                                    <th>Expiration Date</th>
                                    <th>Cost</th>
                                    <th>PO Number</th>
                                    <th>PR Number</th>
                                    <th>OBR Number</th>
                                    <th>Supplier</th>
                                    <th>Action</th>
                                 </tr>
                            </thead>
                            <tbody>
                                <tr>
                                <th scope=\"row\">1</th>
                                <td>".$detail['delivery_date']."</td>
                                <td>".$detail['date_received']."</td>
                                <td>".$detail['expiration_date']."</td>
                                <td>".$detail['unit_cost']."</td>
                                <td>".$detail['PO_no']."</td>
                                <td>".$detail['PR_no']."</td>
                                <td>".$detail['OBR_no']."</td>
                                <td>".$detail['delivery_date']."</td>
            
                                <td>".$detail['supplier_id']."</td>
                                <td>
                                <a href=\"#\" data-toggle=\"modal\" data-target=\".Distribute\" class=\"btn btn-info btn-xs\"><i class=\"fa fa-minus-circle\"></i> Distribute</a>
                                </td>
                                </tr>
                                </tbody>
                                </table>
                                </div>
                                </div>
                                </div>
                                </div>
                                </div>
                                </td></tr>";
            $data1[] = $row;
        }
        $list = array('detail' => $data);
        echo json_encode($list);
    }
    function getdept(){
        $departments = $this->inv->select_departments();
        foreach ($departments as $list){
            $data[] = array(
                'dept_id' => $list['dept_id'],
                'res_center_code' => $list['res_center_code'],
                'department' => $list['department']
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
}
