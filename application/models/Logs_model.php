<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logs_model extends CI_Model{
    //forlogs
    public function increase_log($type,$position,$id){
        $this->db->Select('increase.timestamp,item.item_name,item.item_description,increase.quantity,item.unit,
        item.item_type,detail.date_delivered,detail.date_received,detail.unit_cost,detail.expiration_date');
        $this->db->join('gsois.itemdetail detail','detail.item_det_id = increase.item_det_id');
        $this->db->join('gsois.item item','item.item_id = detail.item_id');
        if($position !== 'Admin'){
            $this->db->join('gsois.user u','increase.userid ='.$id);
        }
        $this->db->group_by('increase.timestamp,item.item_name,item.item_description,increase.quantity,item.unit,
        item.item_type,detail.date_delivered,detail.date_received,detail.unit_cost,detail.expiration_date');
        $query = $this->db->get_where('logs.increaselog increase',
                array('item.item_type'=>$type));

        return $query->result_array();
    }
    public function decrease_log($type,$position,$id){
        $this->db->Select('decrease.timestamp,dept.department,item.item_name,item.item_description,
        dist.quantity_distributed,item.unit,item.item_type,dist.date_received,dist.receiver,ac.account_code');

        $this->db->join('gsois.itemdetail detail','detail.item_det_id = decrease.item_det_id');
        $this->db->join('gsois.item item','item.item_id = detail.item_id');
        $this->db->join('gsois.distribution dist','dist.dist_id = decrease.dist_id');
        $this->db->join('gsois.department dept','dist.dept_id = dept.dept_id');
        $this->db->join('gsois.account_code ac','dist.ac_id = ac.ac_id');

        if($position !== 'Admin'){
            $this->db->join('gsois.user u','decrease.userid ='.$id);
        }
        $this->db->group_by('dist.dist_id,decrease.dec_log_id');
        $query = $this->db->get_where('logs.decreaselog decrease',
            array('item.item_type'=>$type));
        return $query->result_array();
    }

    public function edit_log($type,$position,$id){
        $this->db->select('edit.item_id,edit.timestamp,edit.field_edited,edit.old_value,edit.new_value');
        $this->db->join('gsois.item item','item.item_id = edit.item_id');
        if($position !== 'Admin'){
            $this->db->join('gsois.user u','edit.userid ='.$id);
        }
        $this->db->where('item.item_type',$type);
        $this->db->group_by('edit.userid,edit.item_id,edit.timestamp,edit.field_edited,edit.old_value,edit.new_value');
        $query = $this->db->get('logs.editlog edit');
        return $query->result_array();

    }
    public function return_log(){
        $query = $this->db->get('logs.returnlog');
        return $query->result_array();
    }
}