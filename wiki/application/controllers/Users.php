<?php

    class Users extends CI_Controller{

        public function register(){

            $this->load->helper('form');
            $this->load->library('form_validation');
            $data['title'] = 'Sign Up';


            $this->form_validation->set_rules('user_name', 'Username', 'required|callback_check_username_exists');
            $this->form_validation->set_rules('email_address', 'Email', 'required|callback_check_email_address_exists');
            $this->form_validation->set_rules('account_password', 'Password', 'required');
            $this->form_validation->set_rules('account_password2', 'Confirm Password', 'matches[account_password]');

            if($this->form_validation->run() === false){
                $this->load->view('templates/header');
                $this->load->view('users/register', $data);
                $this->load->view('templates/footer');
            }else{
                //encrypting the password
                $username = $this->input->post('user_name');
                $password = $this->input->post('account_password');
                $enc_password = password_hash($password,PASSWORD_BCRYPT);

                if ($this->User_model->register($enc_password)){
                        $user_data = array('user_id' => $this->User_model->get_user_id($username),
                            'user_name' => $username,
                            'logged_in' => true);
                        $this->session->set_userdata($user_data);
                    //setting message
                    $this->session->set_flashdata('user_registered', 'Account creation completed!');
                    redirect('posts');

                }else{
                    $this->session->set_flashdata('generic_error', "Something went wrong... I'm not really sure what that was...
                     Please contact the administrator if this issue persists.");
                    redirect('users/login');
                }
            }
        }
        public function login(){

            $this->load->helper('form');
            $this->load->library('form_validation');
            $data['title'] = 'Sign In';

            $this->form_validation->set_rules('user_name', 'Username', 'required');
            $this->form_validation->set_rules('account_password', 'Password', 'required');

            if($this->form_validation->run() === false){
                $this->load->view('templates/header');
                $this->load->view('users/login', $data);
                $this->load->view('templates/footer');
            }else{
                $username = $this->input->post('user_name');
                $password = $this->input->post('account_password');

                $user_id = $this->User_model->login($username,$password);

                if($user_id){
                    $user_data = array('user_id' => $user_id,
                        'user_name' => $username,
                        'logged_in' => true);

                    $this->session->set_userdata($user_data);
                    $this->session->set_flashdata('user_logged_in', 'You are now logged into the server!');
                    redirect('posts');

                }else{

                    $this->session->set_flashdata('generic_error','memes');
                    //$this->session->set_flashdata('failed_login', 'Incorrect username or password!');
                    redirect('users/login');
                }
                //setting message
            }
        }

        public function view($user_id){


        }
        public function logout(){
            $this->session->unset_userdata('logged_in');
            $this->session->unset_userdata('user_id');
            $this->session->unset_userdata('user_name');

            $this->session->set_flashdata('user_logged_out', 'You are now logged out.');
            redirect('posts/');

        }
        public function check_username_exists($username){
            $this->form_validation->set_message('check_username_exists', 'Username is currently in use.... please try another one');
            if($this->User_model->check_username_exists($username)){
                return true;
            } else {
                return false;
            }
        }
        public function check_email_address_exists($email_address){
            $this->form_validation->set_message('check_email_address_exists', 'Email is currently in use.... please try another one');
            if($this->User_model->check_email_address_exists($email_address)){
                return true;
            } else {
                return false;
            }
        }
    }