<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logs_model extends CI_Model{
    //forlogs
    public function increase_log(){
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