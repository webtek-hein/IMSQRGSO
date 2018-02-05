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
        //counter initialize
        $counter = 1;

        foreach ($list as $item){
            $row = array();
            $row['number'] = $counter;
            $row['item'] =  "<a data-toggle=\"collapse\" href=\"#collapseExample\" 
            role=\"button\" aria-expanded=\"false\" aria-controls=\"collapseExample\">".$item['item_name']."</a>";
            $row['description'] = $item['item_description'];
            $row['quantity'] = $item['quantity'];
            $row['unit'] = $item['unit'];
            $row['type'] = $item['item_type'];
            //ADD Quantity Action button
            $row['action'] = "<a href=\"#\" data-toggle=\"modal\" data-target=\".Add_Item\" 
                              class=\"btn btn-primary btn-xs\"><i class=\"fa fa-plus-circle\">
                              </i> Add Quantity</a>".
                             "<a href=\"#\" data-id=\"".$item['item_id']."\" data-toggle=\"modal\" data-target=\".Edit\" 
                              class=\"btn btn-warning btn-xs\"><i class=\"fa fa-pencil-square-o\"></i> Edit</a></td>";
            $data[] = $row;
            $counter++;
        }

//        $list = array('items'=>$data);
        echo json_encode($data);
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
    public function detail($id = 1){
        $list = $this->inv->viewdetail($id);
        $data=array();
        foreach ($list as $detail){
            $row['del']  = $detail['delivery_date'];
            $row['rec']  = $detail['date_received'];
            $row['exp']  = $detail['expiration_date'];
            $row['cost'] = $detail['unit_cost'];
            $row['sup']  = $detail['supplier_id'];

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
