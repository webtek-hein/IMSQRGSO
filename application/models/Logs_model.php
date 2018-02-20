<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logs_model extends CI_Model{
    //forlogs
    public function increase_log(){
        $this->db->Select Select ('logs.increaselog.timestamp,gsois.item.item_name,gsois.item.item_description,gsois.item.quantity,gsois.item.unit,gsois.item.item_type,gsois.itemdetail.date_delivered,gsois.itemdetail.date_received,gsois.itemdetail.unit_cost,gsois.itemdetail.expiration_date');
        $this->db->from('gsois.item');
        $this->db->join('gsois.itemdetail','item.item_id = itemdetail.itemid');
        $this->db->join('logs.increaselog','itemdetail.item_det_id = increaselog.item_det_id');
        $this->db->group_by('item.item_name');
        $query = $this->db->get('logs.increaselog');
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