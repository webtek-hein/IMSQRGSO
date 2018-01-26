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
            $row[] = "<button class=\"btn btn-success\" data-tempdata = '$item[item_id],$item[item_type]' data-toggle=\"modal\" data-target=\"#addqty\"><span class=\"glyphicon glyphicon-plus\"></span></button>" .
                     "<button class=\"btn btn-warning\" data-toggle=\"modal\" data-target=\"#subqty\"><span class=\"glyphicon glyphicon-minus\"></span></button>" .
                     "<button class=\"btn btn-danger\"><span class=\"glyphicon glyphicon-pencil\" data-toggle=\"modal\" data-target=\"#edit\"></span></button>" .
                     "<button class=\"btn btn-primary\"><span class=\"glyphicon glyphicon-info-sign\" data-toggle=\"modal\" data-target=\"#itemdetails\"></span></button>";
            $data[] = $row;
        }
        $list = array('data' => $data);
        echo json_encode($list);
    }
    public function addquant(){
        $this->inv->addquant();
        redirect('inventory');
    }
}
