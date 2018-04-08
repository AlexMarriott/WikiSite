<?php

    class User_model extends CI_Model{

        public function register($enc_password){
            // user data array

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

        public function get_user_id($username){
        $this->db->where('user_name', $username);
        $query = $this->db->get_where('users', 'user_id');
        return $query->result_array();

    }

    public function get_user($user_id){
            $this->db->where('user_id', $user_id);
        $result = $this->db->get('users');
        return $result->row(0)->user_id;
    }

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