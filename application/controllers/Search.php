<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Search extends CI_Controller {

 public function index()
 {
  $this->load->view('accounts');
 }

 public function checkUsername()
 {
  	$this->load->model('user_db');
  	if($this->user_db->getUsername($_POST['username'])){
   		echo '<label class="text-danger"><span><i class="fa fa-times" aria-hidden="true"></i> This user is already registered</span></label>';
  }
  else {
   echo '<label class="text-success"><span><i class="fa fa-check-circle-o" aria-hidden="true"></i> Username is unique</span></label>';
  }
 }

}