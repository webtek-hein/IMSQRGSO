<?php
class User_db extends CI_Model {
    /**
     * This verifies if the username and password
     * entered by the user is valid.
     *
     * @param  string   $data Data entered by user.
     * @return bool     Returns true if user is valid.
     *
     */
    public function login($data)
    {
        $this->db->select('*')
            ->where('username like binary', $data['username'])
            ->where('status', 'active')
            ->limit(1);
        $uname = $this->db->get('user')->row();

        $password = $data['password'];
        if ($uname == true) {
            if (password_verify($password, $uname->password)) {
                return true;
            }
        }
            return false;
    }

    /**
     *This checks if the entered username is registered in database
     *then it will display the users data if it matches.
     *
     * @param string    $username Check username if registered in database.
     * @return bool     Return query of user if it matches the username.
     */
    public function read_user_information($username) {
        $this->db->select('CONCAT(user.first_name," ", user.last_name) AS name,user.first_name,user.last_name,user.user_id,user.email,
        user.contact_no,user.username,user.position,department.department,department.dept_id,user.image,user.password');
        $this->db->join('department', 'department.dept_id = user.dept_id', 'left')
                 ->where('username',$username)
                 ->limit(1);
        $query = $this->db->get('user');

        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }

    /**
     * This will get the users registered in the
     * database to display.
     *
     * @return mixed[] Array of users for display.
     */
    public function get_users()
    {
         $this->db->select('user_id,CONCAT(user.first_name," ", user.last_name) AS name,user.email,user.contact_no,
         user.username,user.position,dept.department,user.status,user.date_created');
        $this->db->join('gsois.department dept','dept.dept_id = user.dept_id','left');
        $query = $this->db->get('user');
        return $query->result_array();
    }

    /**
     * This will return data of the entered username.
     *
     * @param  string   $username It will display data of username that it matches.
     * @return mixed[]  Returns the data of the matched user.
     */
    public function getmobileuser($username)
    {
        $this->db->select('CONCAT(user.first_name," ", user.last_name) AS name,user.email,user.contact_no,user.position,dept.department');
        $this->db->where('username',$username);
        $this->db->join('gsois.department dept','dept.dept_id = user.dept_id', 'left');
        $query = $this->db->get('user');
        return $query->result_array();
    }

    /**
     * This will register a user in the database. It also hash the password
     * before it will register in to the database.
     */
    public function insertUser(){
        $password = $this->input->post('password');
        $options = ['cost' => 12];
        $hashpassword =  password_hash($password, PASSWORD_DEFAULT, $options);
        $position = $this->input->post('position');
        if($position === 'supply officer'){
            $dept = $this->input->post('dment');
        }else{
            $dept = 13;
        }
        $data = array(
            'first_name'=> $this->input->post('firstname'),
            'last_name' => $this->input->post('lastname'),
            'email'=>$this->input->post('email'),
            'contact_no'=>$this->input->post('contactno'),
            'username'=>$this->input->post('username'),
            'password' => $hashpassword,
            'position'=>$position,
            'dept_id'=>$dept,
        );
        $this->db->insert('user',$data);
    }

    /**
     * This allows a user's first name, last name, email, contact
     * number, password, and status to be edited by the admin.
     */
    public function edituser()
    {
        $user_id = $this->session->userdata['logged_in']['user_id'];
        $password = $this->input->post('pword');
        $options = array('cost' => 12);
        $hashpassword =  password_hash($password, PASSWORD_DEFAULT, $options);
        $id = $this->input->post('id');
        // select user
        $user = $this->db->get_where('user', array('user_id' => $user_id))->row();

        // convert to array
        $data1 = array(
            'first_name' => $user->first_name,
            'last_name' => $user->last_name,
            'email' => $user->email,
            'contact_no' => $user->contact_no,
            'password' => $user->password,
            'status' => $user->status
        );
        // update user
        $data = array(
            'first_name' => $this->input->post('first'),
            'last_name' => $this->input->post('last'),
            'email' => $this->input->post('em'),
            'contact_no' => $this->input->post('cno'),
            'password' => $hashpassword,
            'status' => $this->input->post('Stat')
        );
        $this->db->set($data);
        $this->db->where('user_id', $id);
        $this->db->update('user');

        // compare the data
        $result1 = array_diff($data1, $data);
        $result2 = array_diff($data, $data1);
        foreach ($result1 as $key => $value) {
            $values[] = array(
                'field_edited' => $key,
                'old_value' => $value,
                'new_value' => $result2[$key],
                'userid' => $user_id,
            );
        }
    }

    /**
     * This will return data of the user with the matched ID.
     *
     * @param  int      $id Look for user with the matched ID.
     * @return mixed[]    Return the data with the matched ID.
     */
    public function getUser($id)
    {
        $this->db->select('CONCAT(user.first_name," ", user.last_name) AS name,user.*');
        $this->db->where('user_id', $id);
        $query = $this->db->get('user');
        return $query->row();
    }
     public function getUsername($username)
     {
      $this->db->where('username' , $username);
      $query = $this->db->get('user');
      if($query->num_rows()>0){
       return true;
      }
      else {
       return false;
      }
     }

    /**
     * This allows editing of users profile.
     *
     * @param string    $data Users data will be edited.
     * @param int       $userid Matches the user's ID that it will change.
     */
    public function edit_profile($data, $userid)
    {
        $this->db->set('password', $data[password]);
        $this->db->where('user_id', $userid);
        $this->db->update('user');
    }

    /**
     *
     * This method allows account password to be edited.
     *
     * @param string    $data new data entered password
     * @param int       $userid ID of the user
     */
    public function edit_password($data, $userid)
    {
        $this->db->set('password', $data);
        $this->db->where('user_id', $userid);
        $this->db->update('user');
    }

    /**
     *
     * This method allows accounts information to be edited.
     *
     * @param $data data that will be edited
     * @param $userid ID of the user
     */
    public function edit_info($data, $userid)
    {
        $this->db->where('user_id', $userid);
        $this->db->update('user',$data);
    }

    /**
     *
     * This method retrieves the account with
     * email matching with email from database.
     *
     * @param $email email of the user.
     * @return mixed result of the query.
     */
    public function get_email($email)
    {
        $this->db->select('*')
            ->where('email', $email)
            ->limit(1);
        return $this->db->get('user')->row();

    }

    /**
     *
     * This method is for editing  profile pictures.
     *
     * @param string    $name name of the owner of the image
     * @param int       $user_id ID of the user
     */
    public  function edit_image($name,$user_id){
        $this->db->where('user_id', $user_id);
        $this->db->update('user',$name);
    }

    /**
     *
     * This method gets the image of the user.
     *
     * @param int   $user_id ID of the user.
     * @return mixed result of the query.
     */
    public function get_image($user_id){
        $this->db->select('image')
            ->where('user_id', $user_id);
        return $this->db->get('user')->row();
    }
}