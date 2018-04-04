<?php

class Posts extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        //TODO, check to see if these can be autoloaded rather than loaded each time the file is called.
        $this->load->model('Post_model');
        $this->load->helper('url_helper');
        $this->load->library('session','upload');
    }


    public function view($slug = NULL)
    {
        $data['post_item'] = $this->Post_model->get_post($slug);
        //$post_id = $data['post_item']['post_id'];
        $data['comments'] = $this->Comment_model->get_comments($data['post_item']['post_id']);

        $data['count'] = $this->Post_model->comment_count();

        if (empty($data['post_item']) || $data['post_item'] == null) {
            show_404();
        }
        $this->load->view('templates/header', $data);
        $this->load->view('posts/view', $data);
        $this->load->view('templates/footer');
    }

    public function create()
    {
        if (!$this->session->userdata('logged_in')){
            redirect('users/login');
        }
        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['title'] = 'Create a posts item';
        $data['sub_categories'] = $this->Post_model->get_sub_categories();
        $data['categories'] = $this->Post_model->get_categories();

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('body', 'Body', 'required');

        //Checking form validation.
        if ($this->form_validation->run() === false) {
            $this->load->view('templates/header', $data);
            $this->load->view('posts/create');
            $this->load->view('templates/footer');
        } else {
            //Image upload.
            $config['upload_path'] = './assets/images/posts';
            $config['allowed_types'] = 'png|jpg';
            $config['max_size'] = '2048';
            $config['max_width'] = '1024';
            $config['max_height'] = '768';


            $this->upload->initialize($config);


            if ( ! $this->upload->do_upload()) {
                $errors = array('error' => $this->upload->display_errors());
                //https://fthmb.tqn.com/U-x-js7YTZbjIpXk7jDQL8nUrj8=/3865x2576/filters:fill(auto,1)/illuminated-server-room-panel-660495303-5a24933d4e46ba001a771cd1.jpg
                $post_image = 'default_image.jpg';
            } else {
                $data = array(
                    'upload_data' => $this->upload->data());
                $post_image = $_FILES['userfile']['name'];
            }

            if ($this->Post_model->create_post($post_image) === false) {
                $data['error'] = "This post title has already been used, please give the post a different name.";
                $this->load->view('templates/header', $data);
                $this->load->view('posts/create', $data);
                $this->load->view('templates/footer');
            } else {
                $this->session->set_flashdata('post_created', 'The Post was create successfully!');
                redirect('posts');
            }
        }
    }

    public function delete($post_id){
        if (!$this->session->userdata('logged_in')){
            redirect('users/login');
        }
        $this->Post_model->delete_post($post_id);
        redirect('posts');

    }

    public function edit($slug){
        if (!$this->session->userdata('logged_in')){
            redirect('users/login');
        }
        $data['post_item'] = $this->Post_model->get_post($slug);

        // Check user
        if($this->session->userdata('user_id') != $data['post_item']['user_id']){
            redirect('posts');

        }
        $data['sub_categories'] = $this->Post_model->get_sub_categories();
        $data['categories'] = $this->Post_model->get_categories();

        if (empty($data['post_item']) || $data['post_item'] == null) {
            show_404();
        }

        $data['post_title'] = 'Edit Post';
        $this->load->view('templates/header', $data);
        $this->load->view('posts/edit', $data);
        $this->load->view('templates/footer');
    }

    public function update(){
        if (!$this->session->userdata('logged_in')){
            redirect('users/login');
        }
        $this->Post_model->update_post();
        $this->session->set_flashdata('post_update', 'The Post was create updated!');
        redirect('posts');
    }


}