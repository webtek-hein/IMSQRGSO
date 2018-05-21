
<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: markr
 * Date: 20/05/2018
 * Time: 11:29 AM
 */


class Forget extends CI_Controller
{

    public function __construct() {
        parent::__construct();
        // Load database
        $this->load->model('user_db');
        $this->load->library('form_validation');
        $this->load->helper('string');
        $this->load->helper('url');
        $this->load->library('email');

    }

    public function doforget()
    {
        $email = $this->input->post('email');
        $user = $this->user_db->get_email($email);
        if ($user == true) {
            $this->resetpassword($user);
            $success = array(
                'success_message' => 'Password has been reset and has been sent to email : '. $email
            );
            $this->load->view('pages/forgot', $success);
        } else {
            $error = array(
                'error_message' => 'Email not found'
            );
            $this->load->view('pages/forgot', $error);
        }
    }

    public function resetpassword($user){

        date_default_timezone_set('GMT');

        $password= random_string('alnum', 5);
        $options = ['cost' => 12];
        $hashpassword = array(
            'password' => password_hash($password, PASSWORD_DEFAULT, $options)
        );

        $userid = ($user->user_id);

        $this->user_db->edit_profile($hashpassword,$userid);

        $this->email->from('emailpassswordsup@gmail.com', 'testing');
        $this->email->to($user->email);
        $this->email->subject('Password reset');
        $this->email->message('You have requested the new password, Here is you new password:'. $password);
        $this->email->send();
        echo $this->email->print_debugger();

    }
}
