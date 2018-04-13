<?php
/*
 * /*@author Alex Marriott s4816928,
 * 10/4/2018.
 * filename: users.php
 * The users.php is the user controller which deals with all the users logins, registrations and the users data.
 * The user_model is the model for this controller and deals with the database connections.
 *
 */
    class Users extends CI_Controller{

        //This function checks the registering users details and enforces rules and handles the password hashing of Bcrpyt, which is then stored in the database.
        public function register(){

            $this->load->helper('form');
            $this->load->library('form_validation');
            $data['title'] = 'Sign Up';

            // checks that
            $this->form_validation->set_rules('user_name', 'Username', 'required|callback_check_username_exists');
            $this->form_validation->set_rules('email_address', 'Email', 'required|callback_check_email_address_exists');
            $this->form_validation->set_rules('account_password', 'Password', 'trim|required|min_length[8]|callback_account_password_check');
            $this->form_validation->set_rules('account_password2', 'Confirm Password', 'matches[account_password]');

            if($this->form_validation->run() === false){

                $this->load->view('templates/header');
                $this->load->view('users/register', $data);
                $this->load->view('templates/footer');
            }else{

                //Image upload.
                $config['upload_path'] = './assets/images/users';
                $config['allowed_types'] = 'png|jpg';
                $config['max_size'] = '2048';
                $config['max_width'] = '2000';
                $config['max_height'] = '2000';

                $this->upload->initialize($config);

                if (!$this->upload->do_upload()) {
                    //https://fthmb.tqn.com/U-x-js7YTZbjIpXk7jDQL8nUrj8=/3865x2576/filters:fill(auto,1)/illuminated-server-room-panel-660495303-5a24933d4e46ba001a771cd1.jpg <-- image used for  default
                    $user_image = 'user_image.png';
                    $user_image_error = $this->upload->display_errors();
                } else {
                    $user_image_success = $this->upload->data();
                    $user_image = $_FILES['userfile']['name'];
                }

                //encrypting the password
                $username = $this->input->post('user_name');
                $password = $this->input->post('account_password');
                $enc_password = password_hash($password,PASSWORD_BCRYPT);

                //If the registering is successful, the userdata is then set in the current session.
                if ($this->user_model->register($enc_password,$user_image)){

                    //creates an array which breaks most of the site so I'm doing it this way, sorry.
                    $user_id = $this->user_model->get_user_id($username);

                    $this->session->set_userdata('user_id' , $user_id['user_id']);
                    $this->session->set_userdata('user_name' , $username);
                    $this->session->set_userdata('logged_in' , true);

                    //setting flash message
                    $this->session->set_flashdata('user_registered', 'Account creation completed!');
                    if (empty($user_image_error)){
                        $this->session->set_flashdata('image_upload_successful', strip_tags($user_image_success));
                    } else{
                        $this->session->set_flashdata('image_upload_failed', strip_tags($user_image_error));
                    }
                    redirect('posts');


                }else{
                    $this->session->set_flashdata('generic_error', "Something went wrong... I'm not really sure what that was...
                     Please contact the administrator if this issue persists.");
                    redirect('users/login');
                }
            }
        }


        //call back function to check the password being passed in.
        public function account_password_check($str){
            $uppercase = preg_match('@[A-Z]@', $str);
            $lowercase = preg_match('@[a-z]@', $str);
            $number    = preg_match('@[0-9]@', $str);
            if(!$uppercase || !$lowercase || !$number || strlen($str) < 8) {
                $this->form_validation->set_message('account_password_check', 'The password does not match the required format. Please enter a password longer than 8 charectes with an Uppercase, lowercase and a number.');
                return false;
            }
            return true;
        }
        //call back function to check the username being passed in.
        public function check_username_exists($username){
            if($this->user_model->check_username_exists($username)){
                return true;
            } else {
                $this->form_validation->set_message('check_username_exists', 'Username is currently in use.... please try another one');
                return false;
            }
        }
        //call back function to check the email being passed in.
        public function check_email_address_exists($email_address){
            if($this->user_model->check_email_address_exists($email_address)){
                return true;
            } else {
                $this->form_validation->set_message('check_email_address_exists', 'Email is currently in use.... please try another one');
                return false;
            }
        }


        //login function which enforces rules on the min_length of the username and password. Sets the userdata for the session if the login is successful.
        public function login(){
            $this->load->helper('form');
            $this->load->library('form_validation');
            $data['title'] = 'Sign In';

            $this->form_validation->set_rules('user_name', 'Username', 'trim|required|min_length[4]');
            $this->form_validation->set_rules('account_password', 'Password', 'trim|required|min_length[8]');

            if($this->form_validation->run() === false){
                $this->load->view('templates/header');
                $this->load->view('users/login', $data);
                $this->load->view('templates/footer');
            }else{
                $username = $this->input->post('user_name');
                $password = $this->input->post('account_password');

                $user_id = $this->user_model->login($username,$password);


                if($user_id){
                    $user_id = $this->user_model->get_user_id($username);

                    $this->session->set_userdata('user_id' , $user_id['user_id']);
                    $this->session->set_userdata('user_name' , $username);
                    $this->session->set_userdata('logged_in' , true);

                    $this->session->set_flashdata('user_logged_in', 'You are now logged into the server!');
                    echo "blah";
                    redirect('posts');

                }else{
                    $this->session->set_flashdata('failed_login', 'Incorrect username or password!');
                    redirect('users/login');
                }
            }
        }

        public function user_account(){
        //This function changes the user account details, I have commented out the functional parts since I don't tend to make this work for the hand in.
                $this->load->helper('form');
                $this->load->library('form_validation');
                $user_id = $this->uri->segment(3);
                // checks that
                $this->form_validation->set_rules('email_address', 'Email', 'callback_check_email_address_exists');
                $this->form_validation->set_rules('account_password', 'Password', 'trim|min_length[8]|callback_account_password_check');
                $this->form_validation->set_rules('account_password2', 'Confirm Password', 'matches[account_password]');

                if($this->form_validation->run() === false){
                    $data['user_info'] = $this->user_model->get_user_details($user_id);
                    $this->load->view('templates/header');
                    $this->load->view('users/user_account', $data);
                    $this->load->view('templates/footer');
                }
                /*else{
                    //Image upload.
                    $config['upload_path'] = './assets/images/users';
                    $config['allowed_types'] = 'png|jpg';
                    $config['max_size'] = '2048';
                    $config['max_width'] = '2000';
                    $config['max_height'] = '2000';

                    $this->upload->initialize($config);

                    if (!$this->upload->do_upload()) {
                        //https://fthmb.tqn.com/U-x-js7YTZbjIpXk7jDQL8nUrj8=/3865x2576/filters:fill(auto,1)/illuminated-server-room-panel-660495303-5a24933d4e46ba001a771cd1.jpg <-- image used for  default
                        $user_image = 'user_image.png';
                        $user_image_error = $this->upload->display_errors();
                    } else {
                        $user_image_success = $this->upload->data();
                        $user_image = $_FILES['userfile']['name'];
                    }

                    $user_name = $this->post->input('user_name');
                    $email_address = $this->post->input('email_address');

                    //If the registering is successful, the userdata is then set in the current session.
                    if ($this->user_model->update_details($user_name,$email_address,$user_image,$user_id)){
                        //setting flash message
                        $this->session->set_flashdata('user_account_updated', 'Account updated!');
                        if (empty($user_image_error)){
                            $this->session->set_flashdata('image_upload_successful', strip_tags($user_image_success));
                        } else{
                            $this->session->set_flashdata('image_upload_failed', strip_tags($user_image_error));
                        }
                        $data['user_info'] = $this->user_model->get_user_details($user_id);
                        echo 'blah2';

                        redirect('users/user_account/', $data);


                    }else{
                        $this->session->set_flashdata('generic_error', "Something went wrong... I'm not really sure what that was...
                     Please contact the administrator if this issue persists.");
                        $data['user_info'] = $this->user_model->get_user_details($user_id);
                        echo 'blah1';

                        redirect('users/user_account', $data);
                    }
                }*/
            }

        //Unsets all the users data on logout.
        public function logout(){
            $this->session->unset_userdata('logged_in');
            $this->session->unset_userdata('user_id');
            $this->session->unset_userdata('user_name');
            $this->session->unset_userdata('rating');
            $this->session->unset_userdata('post_count');


            $this->session->set_flashdata('user_logged_out', 'You are now logged out.');
            redirect('posts/');

        }

    }