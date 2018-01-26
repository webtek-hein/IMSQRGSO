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
        foreach ($list as $item){
            $row = array();
            $row[] = $item['item_name'];
            $row[] = $item['item_description'];
            $row[] = $item['quantity'];
            $row[] = $item['unit'];
            $row[] = $item['item_type'];
                    //add quantity
            $row[] = "<button class=\"btn btn-success\" data-tempdata = '$item[item_id],$item[item_type]'
                     data-toggle=\"modal\" data-target=\"#addqty\"><span class=\"glyphicon glyphicon-plus\"></span>
                     </button>" .
                    //subtract quantity
                     "<button class=\"btn btn-warning\" data-toggle=\"modal\" data-target=\"#subqty\"><span 
                      class=\"glyphicon glyphicon-minus\"></span></button>" .
                    //edit item
                     "<button class=\"btn btn-danger\"><span data-name='$item[item_name]' data-id='$item[item_id]'
                      data-description='$item[item_description]' data-unit='$item[unit]' data-type='$item[item_type]' 
                      class=\"glyphicon glyphicon-pencil\" data-toggle=\"modal\" data-target=\"#edit\">
                      </span></button>" .
                    //item detail
                     "<button class=\"btn btn-primary\"><span data-id='$item[item_id]'  data-name='$item[item_name]'
                      class=\"glyphicon glyphicon-info-sign\" 
                      data-toggle=\"modal\" data-target=\"#itemdetails\"></span></button>";
            $data[] = $row;
        }
        $list = array('data' => $data);
        echo json_encode($list);
    }
    public function addquant(){
        $this->inv->addquant();
        redirect('inventory');
    }
    public function edititem(){
        $this->inv->edititem();
        redirect('inventory');
    }
    public function detail($id){
        $details = $this->inv->viewdetail($id);
        foreach ($details as $list){
            $row = array();
            $row[] = $list['serial'];
            $row[] = $list['delivery_date'];
            $row[] = $list['expiration_date'];
            $row[] = $list['date_received'];
            $row[] = $list['unit_cost'];
            $row[] = $list['PO_no'];
            $row[] = $list['PR_no'];
            $row[] = $list['OBR_no'];
            $row[] = $list['acc_code_id'];
            $row[] = $list['supplier_id'];
            $data[] = $row;
        }
        $list = array('data' => $data);
        echo json_encode($list);
    }
}
