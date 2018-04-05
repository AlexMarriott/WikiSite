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
            $this->db->where("account_password", $password);

            $result = $this->db->get("users");

            if ($result->num_rows() == 1) {
                return $result->row(0)->user_id;
            } else {
                return false;
            }
        }

        public function get_user_id($username){
        $this->db->where("user_name", $username);
        $result = $this->db->get_where("users", 'user_id');
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