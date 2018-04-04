<?php

    class User_model extends CI_Model{

        public function register($enc_password){
            // user data array

            $data = array(
                'email_address' => $this->input->post('email_address'),
                'account_password' => $enc_password,
                'user_name' => $this->input->post('user_name'),
            );

            return $this->db->insert('users', $data);

        }
    }