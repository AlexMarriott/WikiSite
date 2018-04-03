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
            $data['title'] = 'Subcategories';

            $data['sub_categories'] = $this->Post_model->get_sub_categories();

            $this->load->view('templates/header');
            $this->load->view('categories/index', $data);
            $this->load->view('templates/footer');
        }

        public function create(){
            $this->load->helper('form');
            $this->load->library('form_validation');
            $data['title'] = 'Create Category';

            $this->form_validation->set_rules('name', 'Name', 'required' );

            if($this->form_validation->run() == false){
                $this->load->view('templates/header');
                $this->load->view('categories/create', $data);
                $this->load->view('templates/footer');
            }else{
                $this->Category_model->create_category();
                redirect('categories');
            }
        }

        public function posts($sub_category_id){
            $data['title'] = $this->Category_model->get_category($sub_category_id)->sub_category_name;

            $data['posts'] = $this->Post_model->get_posts_by_sub_category($sub_category_id);

            $this->load->view('templates/header');
            $this->load->view('pages/home', $data);
            $this->load->view('templates/footer');
        }
    }