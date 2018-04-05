<?php

    class Categories extends CI_Controller{


        public function index(){
            $data['title'] = 'Categories';

            $data['categories'] = $this->Post_model->get_categories();

            $this->load->view('templates/header');
            $this->load->view('categories/index', $data);
            $this->load->view('templates/footer');
        }

        public function subcategories(){
            $slug = $this->uri->segment(3);
            $data['title'] = 'Subcategories';

            $data['sub_categories'] = $this->Post_model->get_sub_categories($slug);

            $this->load->view('templates/header');
            $this->load->view('categories/index', $data);
            $this->load->view('templates/footer');
        }

        public function create(){
            if (!$this->session->userdata('logged_in')){
                redirect('users/login');
            }
            $this->load->helper('form');
            $this->load->library('form_validation');
            $data['title'] = 'Create Sub-Category';
            $data['categories'] = $this->Post_model->get_categories();

            $this->form_validation->set_rules('category', 'Name', 'required' );

            if($this->form_validation->run() == false){
                $this->load->view('templates/header');
                $this->load->view('categories/create', $data);
                $this->load->view('templates/footer');
            }else{
                $this->Category_model->create_sub_category();
                $this->session->set_flashdata('categroy_created', 'The Categroy was created!');
                redirect(base_url());
            }
        }

        public function posts($sub_category_name){
            $data['title'] = $this->Category_model->get_category($sub_category_name)->sub_category_name;
            $data['sub_category_id'] = $this->Category_model->get_category($sub_category_name)->sub_category_id;

            $data['posts'] = $this->Post_model->get_posts_by_sub_category($data['sub_category_id']);

            $this->load->view('templates/header');
            $this->load->view('posts/index', $data);
            $this->load->view('templates/footer');
        }
    }