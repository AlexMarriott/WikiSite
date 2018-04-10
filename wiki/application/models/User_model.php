<?php
/*
 * /*@author Alex Marriott s4816928,
 * 10/4/2018.
 * filename: user_model.php
 * The user_model.php is the model for the user controller.
 * This model deals with all the database interactions as well as using the password_verify function to check the users password against the password stored in the database.
 */

    class User_model extends CI_Model{

        //inserts the new user account.
        public function register($enc_password){
            $data = array(
                'email_address' => $this->input->post('email_address'),
                'account_password' => $enc_password,
                'user_name' => $this->input->post('user_name'),
            );

            if ($this->db->insert('users', $data)){
                return true;
            }else{
                return false;
            }

        }
        //checks the users details with the password in the database.
        public function login($username, $password)
        {
            $this->db->where("user_name", $username);

            $result = $this->db->get("users");

            $password_in_database = $result->row(0)->account_password;
            if (password_verify($password, $password_in_database)) {
                return $result->row(0)->user_id;
            } else {
                return false;
            }
        }

        //used for setting the users session data.
        public function get_user_id($username){
        $this->db->where('user_name', $username);
        $query = $this->db->get_where('users', 'user_id');
        return $query->result_array();

    }

    /*public function get_user($user_id){
            $this->db->where('user_id', $user_id);
        $result = $this->db->get('users');
        return $result->row(0)->user_id;
    }*/

        //Callback function which allows us to check if the username is unique and not already in the database.
        //unique has also been put under the username column within the database to prevent duplication in the usernames.
        public function check_username_exists($username){
            $query = $this->db->get_where('users', array('user_name' => $username));
            if($query->row_array() == null){
                return true;
            } else {
                return false;
            }
        }

        public function check_email_address_exists($email_address){
            $query = $this->db->get_where('users', array('email_address' => $email_address));
            if($query->row_array() == null){
                return true;
            } else {
                return false;
            }
        }
    }