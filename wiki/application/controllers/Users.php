<?php

    class Users extends CI_Controller{

        public function register(){

            $this->load->helper('form');
            $this->load->library('form_validation');
            $data['title'] = 'Sign Up';

            $this->form_validation->set_rules('email_address', 'Email', 'required');
            $this->form_validation->set_rules('account_password', 'Password', 'required');
            $this->form_validation->set_rules('account_password2', 'Confirm Password', 'matches[account_password]');
            $this->form_validation->set_rules('username', 'Username', 'required');

            if($this->form_validation->run() === false){
                $this->load->view('templates/header');
                $this->load->view('users/register', $data);
                $this->load->view('templates/footer');
            }else{
                die('Continue');
            }


        }
    }