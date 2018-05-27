<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logs_model extends CI_Model
{
    /**
     *
     * This method gets the data of the increase log that will be displayed.
     *
     * @param string    $type type of item
     * @param string    $position position of the user
     * @param int       $id id of the method
     * @return mixed result of query
     */
    public function increase_log($type, $position, $id)
    {
        $this->db->Select('increase.timestamp,item.item_name,item.item_description,increase.quantity,item.unit,
        item.item_type,detail.date_delivered,detail.date_received,detail.unit_cost,detail.expiration_date');
        $this->db->join('gsois.itemdetail detail', 'detail.item_det_id = increase.item_det_id');
        $this->db->join('gsois.item item', 'item.item_id = detail.item_id');
        if ($position !== 'Admin') {
            $this->db->join('gsois.user u', 'increase.userid =' . $id);
        }
        $this->db->group_by('increase.timestamp,item.item_name,item.item_description,increase.quantity,item.unit,
        item.item_type,detail.date_delivered,detail.date_received,detail.unit_cost,detail.expiration_date');
        $query = $this->db->get_where('logs.increaselog increase',
            array('item.item_type' => $type));

        return $query->result_array();
    }

    /**
     *
     * This method gets the data of the decrease log that will be displayed.
     *
     * @param string    $type type of item
     * @param string    $position position of the user
     * @param int       $id id of the method
     * @return mixed result of query
     */
    public function decrease_log($type, $position, $id)
    {
        if ($position !== 'Admin') {
            $this->db->Select('dist.quantity_distributed,timestamp,dept.department,i.*,account_code,
        dist.date_received,CONCAT(u.first_name," ",u.last_name) as receiver');
        }else{
            $this->db->Select('dist.quantity_distributed,timestamp,dept.department,i.*,account_code,
        dist.date_received');
        }
        $this->db->join('gsois.distribution dist', 'decreaselog.dist_id = dist.dist_id');
        $this->db->join(' gsois.department dept', 'dist.dept_id = dept.dept_id');
        $this->db->join('gsois.itemdetail det', 'det.item_det_id = dist.item_det_id');
        $this->db->join('gsois.item i', 'det.item_id = i.item_id');
        $this->db->join('gsois.account_code ac', 'dist.ac_id = ac.ac_id');
        $this->db->join('gsois.user u', ' u.user_id = decreaselog.userid');
        $query = $this->db->get_where('logs.decreaselog', array('i.item_type' => $type));
        return $query->result_array();
    }

    /**
     *
     * This method gets the data of the edit log of item that will be displayed.
     *
     * @param string    $type type of item
     * @param string    $position position of the user
     * @param int       $id id of the method
     * @return mixed result of query
     */
    public function edit_log_item($type, $position, $id){
        $this->db->select('editlog.item_id,item.item_name,item.item_description,item.item_type,item.unit');
        $this->db->join('gsois.item ','item.item_id = editlog.item_id');
        if ($position !== 'Admin') {
            $this->db->join('gsois.user u', 'editlog.userid =' . $id);
        }
        $this->db->where('item.item_type', $type);
        $this->db->group_by('editlog.item_id');
        $query = $this->db->get('logs.editlog');
        return $query->result_array();
    }

    /**
     *
     * This method gets the data of the increase log that will be displayed.
     *
     * @param string    $type type of item
     * @param string    $position position of the user
     * @param int       $id id of the method
     * @return mixed result of query
     */
    public function edit_log($itemid, $position, $id)
    {
        $this->db->select('edit.item_id,edit.timestamp,edit.field_edited,edit.old_value,edit.new_value');
        $this->db->join('gsois.item item', 'item.item_id = edit.item_id');
        if ($position !== 'Admin') {
            $this->db->join('gsois.user u', 'edit.userid =' . $id);
        }
        $this->db->where('item.item_id', $itemid);
        $this->db->group_by('edit.userid,edit.item_id,edit.timestamp,edit.field_edited,edit.old_value,edit.new_value');
        $query = $this->db->get('logs.editlog edit');
        return $query->result_array();

    }

    /**
     *
     * This method gets the data of the return log that will be displayed.
     *
     * @param string    $type type of item
     * @param string    $position position of the user
     * @param int       $id id of the method
     * @return mixed result of query
     */
    public function return_log($position, $dept,$type)
    {

        $this->db->select('retlog.*,department,item_name,item_description,ret.*');
        $this->db->join('gsois.returnitem ret', 'ret.return_id = retlog.return_id', 'inner');
        $this->db->join('gsois.distribution dist', ' dist.dist_id = ret.dist_id', 'inner');
        $this->db->join('gsois.department dept', ' dist.dept_id = dept.dept_id', 'inner');
        $this->db->join('gsois.itemdetail det', ' det.item_det_id = dist.item_det_id', 'inner');
        $this->db->join('gsois.item i', ' i.item_id = det.item_id', 'inner');
        if ($position === 'Supply Officer') {
            $this->db->where('dist.dept_id', $dept);
        }
        $this->db->where('i.item_type',$type);
        $query= $this->db->get('logs.returnlog retlog');
        return $query->result_array();
    }

    /**
     *
     * This method gets the data of the transfered items to be
     * displayed.
     *
     * @param int   $serialid ID of the serial.
     * @return mixed result of the query
     */
    public function transfer_log($serialid){

        $this->db->select('transferlog.*,serial.serial');
        $this->db->join('gsois.serial','serial.serial_id = transferlog.serial_id','inner');
        $this->db->where('transferlog.serial_id',$serialid);
        $query = $this->db->get('logs.transferlog');

        return $query->result_array();
    }
}