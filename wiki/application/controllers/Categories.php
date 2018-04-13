<?php
/*
 * /*@author Alex Marriott s4816928,
 * 10/4/2018.
 * filename: Categories.php
 * The Categories.php file is the controller for the categories.
 * Within this controller, we are able to display the necessary categories and sub-categories pages along with the creation of sub-categories along with displaying the posts page with the sub-categories filter.
 */
    class Categories extends CI_Controller{


        //Main index function, displays the categories for the user to further explore.
        public function index(){
            $data['title'] = 'Categories';
            //uses the post_model
            $data['categories'] = $this->post_model->get_categories();

            $this->load->view('templates/header');
            $this->load->view('categories/index', $data);
            $this->load->view('templates/footer');
        }

        //Deliveries the subcategories page and get all of the sub_categories.
        public function subcategories(){
            $slug = urldecode($this->uri->segment(3));
            $data['title'] = 'Subcategories';

            $data['sub_categories'] = $this->post_model->get_sub_categories($slug);

            $this->load->view('templates/header');
            $this->load->view('categories/index', $data);
            $this->load->view('templates/footer');
        }

        //Creates the sub-categories for the main categories.
        public function create(){
            if (!$this->session->userdata('logged_in')){
                redirect('users/login');
            }
            $data['title'] = 'Create Sub-Category';
            $data['categories'] = $this->post_model->get_categories();

            $this->form_validation->set_rules('sub-category-field', 'Name', 'required' );

            if($this->form_validation->run() == false){

                $this->load->view('templates/header');
                $this->load->view('categories/create', $data);
                $this->load->view('templates/footer');
            }else{
                $this->category_model->create_sub_category();
                $this->session->set_flashdata('category_created', 'The Category was created!');
                redirect(base_url());
            }
        }
        //supplies the data for the main index pages. This is used for when searching posts by a sub_category
        public function posts($sub_category_name){

            //This is to ensure that spaces are taken into consideration when creating a name of a sub-category.
            $sub_category_name = urldecode($sub_category_name);
            $data['title'] = $this->category_model->get_sub_category($sub_category_name)->sub_category_name;
            $data['sub_category_id'] = $this->category_model->get_sub_category($sub_category_name)->sub_category_id;

            $data['posts'] = $this->post_model->get_posts_by_sub_category($data['sub_category_id']);

            $this->load->view('templates/header');
            //supplies the data to the index page.
            $this->load->view('posts/index', $data);
            $this->load->view('templates/footer');
        }
    }