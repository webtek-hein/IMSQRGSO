<?php
class User_db extends CI_Model {
// Read data using username and password
    public function login($data)
    {
        $condition = "username =" . "'" . $data['username'] . "' AND " . "password =" . "'" . $data['password'] . "'";
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where($condition);
        $this->db->limit(1);
        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            return true;
        } else {
            return false;
        }
    }

// Read data from database to show data in admin page
    public function read_user_information($username) {
        $this->db->select('CONCAT(user.first_name, , user.last_name) AS name,user.user_id,user.email,
        user.contact_no,user.username,user.position,department.department,department.dept_id');
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

    public function get_users()
    {
         $this->db->select('CONCAT(user.first_name," ", user.last_name) AS name,user.email,user.contact_no,
         user.username,user.position,dept.department,user.status');
        $this->db->join('gsois.department dept','dept.dept_id = user.dept_id');
        $query = $this->db->get('user');
        return $query->result_array();
    }
    public function insertUser(){
        $data = array(
            'first_name'=> $this->input->post('firstname'),
            'last_name' => $this->input->post('lastname'),
            'email'=>$this->input->post('email'),
            'contact_no'=>$this->input->post('contactno'),
            'username'=>$this->input->post('username'),
            'password'=>$this->input->post('password'),
            'position'=>$this->input->post('position'),
            'dept_id'=>$this->input->post('dment'),
        );
        $this->db->insert('user',$data);
    }
    public function edituser()
    {
        $user_id = $this->session->userdata['logged_in']['user_id'];
        $values = [];
        $user_id = $this->input->post('id');
        // select user
        $user = $this->db->get_where('user', array('user_id' => $user_id))->row();

        // convert to array
        $data1 = array(
            'email' => $user->email,
            'contact_no' => $user->contact_no,
            'password' => $user->password,
            'status' => $status
        );
        // update user
        $data = array(
            'email' => $this->input->post('email'),
            'contact_no' => $this->input->post('contact_no'),
            'password' => $this->input->post('password'),
            'status' => $this->input->post('status')
        );
        $this->db->set($data);
        $this->db->where('user_id', $user_id);
        $this->db->update('user');

        // compare data
        $result1 = array_diff($data1, $data);
        $result2 = array_diff($data, $data1);
        foreach ($result1 as $key => $value) {
            $values[] = array(
                'field_edited' => $key,
                'old_value' => $value,
                'new_value' => $result2[$key],
                'userid' => $user_id,
                'user_id' => $user_id
            );
        }

        //insert to edit log table
        $this->db->insert_batch('logs.editLog', $values);
    }
}