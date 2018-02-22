<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logs_model extends CI_Model{
    //forlogs
    public function increase_log(){
        $this->db->Select('increase.timestamp,item.item_name,item.item_description,item.quantity,item.unit,
        item.item_type,detail.date_delivered,detail.date_received,detail.unit_cost,detail.expiration_date');
        $this->db->join('gsois.itemdetail detail','detail.item_det_id = increase.item_det_id');
        $this->db->join('gsois.item item','item.item_id = detail.item_id');
        $this->db->group_by('increase.timestamp,item.item_name,item.item_description,item.quantity,item.unit,
        item.item_type,detail.date_delivered,detail.date_received,detail.unit_cost,detail.expiration_date');
        $query = $this->db->get('logs.increaselog increase');
        return $query->result_array();
    }
    public function decrease_log(){
        $query = $this->db->get('logs.decreaselog');
        return $query->result_array();
    }

    public function edit_log(){
        $query = $this->db->get('logs.editlog');
        return $query->result_array();

    }
    public function return_log(){
        $query = $this->db->get('logs.returnlog');
        return $query->result_array();
    }
}