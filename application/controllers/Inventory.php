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
        $data = array();

        $counter = 1;

        foreach ($list as $item){
            $row = array();
            $row[] = " <tr><th>".$counter."</th><td><a onclick='detail($item[item_id])' role=\"tab\" id=\"headingOne\" 
            data-toggle=\"collapse\" data-parent=\"#accordion\" href=\"#data".$item['item_id']."\" aria-expanded=\"true\" 
            aria-controls=\"collapseOne\">".$item['item_name']."</a></td><td>".$item['item_description']."</td>
            <td>".$item['quantity']."</td><td>".$item['unit']."</td><td><a href=\"#\" data-toggle=\"modal\" 
            data-target=\".Add_Item\" class=\"btn btn-primary btn-xs\">
            <i class=\"fa fa-plus-circle\"></i> Add Quantity</a><a href=\"#\" data-id=\"".$item['item_id']."\" 
            data-toggle=\"modal\" data-target=\".Edit\" class=\"btn btn-warning btn-xs\"><i 
            class=\"fa fa-pencil-square-o\"></i> Edit</a></td></tr><tr id=\"det".$item['item_id']."\"></tr>";
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
            $row[] ="  <tr><td colspan=\"12\"><div id=\"data".$id."\" class=\"panel-collapse collapse in\" role=\"tabpanel\" 
                        aria-labelledby=\"headingOne\"><div class=\"panel-body\"><div class=\"col-md-12 col-sm-12 
                        col-xs-12\"><div class=\"x_content\"><div class=\"table-responsive\"><table id=\"details\" 
                        class=\"table table-striped jambo_table bulk_action\"><thead><tr class=\"headings\">
                        <th class=\"column-title\">Delivery Date</th><th class=\"column-title\">Date Received</th><th 
                        class=\"column-title\">Expiration Date</th><th class=\"column-title\">Cost</th><th 
                        class=\"column-title no-link last\"><span class=\"nobr\">Supplier</span></th><th 
                        class=\"bulk-actions\" colspan=\"11\"><a class=\"antoo\" style=\"color:#fff; font-weight:00;\">
                        ( <span class=\"action-cnt\"> </span> ) <i class=\"fa fa-chevron-down\"></i></a></th></tr>
                        </thead><tbody> <tr class=\"even pointer\"><div class=\"a-center \">
                        <td>".$detail['delivery_date']."</td>
                        <td class=\" \">".$detail['date_received']."</td>
                        <td class=\" \">".$detail['expiration_date']."</td>
                        <td class=\" \">".$detail['unit_cost']."</td>
                        <td>".$detail['supplier_id']."</td>
                        </tr></tbody></table> <div ><div class=\"col-sm-12 text-center\"><a href=\"#\" 
                        data-toggle=\"modal\" data-target=\".Distribute\" class=\"btn btn-info btn-md\">
                        <i class=\"fa fa-minus-circle\"></i> Distribute</a></div></div>";
            $data[] = $row;
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
