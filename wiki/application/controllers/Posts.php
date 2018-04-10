<?php

class Posts extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        //TODO, check to see if these can be autoloaded rather than loaded each time the file is called.

        /*$this->load->model('Post_model');
        $this->load->helper('url_helper');
        $this->load->library('session','upload');
        $this->load->helper('cookie');*/
    }

    public function index($offset = 0){
        $config['base_url'] = base_url().'posts/index/';
        $config['total_rows'] = $this->db->count_all('posts');
        $config['per_page'] = 5;
        $config['url_segment'] = 3;
        $config['full_tag_open'] = '<div class="pagination justify-content-center mb-4">';
        $config['full_tag_close'] = '</div>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';


        $this->pagination->initialize($config);


        $config['full_tag_open'] = '<div class="pagination">';


        $data['title'] = 'Top Rated Posts';

        $data['posts'] = $this->Post_model->get_posts(false, $config['per_page'], $offset);
        $data['rating'] = $this->Post_model->get_avg_rating($this->session->userdata('user_id'));
        $data['post_count'] = $this->Post_model->count_all_users_posts($this->session->userdata('user_id'));
        $this->load->view('templates/header');
        $this->load->view('posts/index', $data);
        $this->load->view('templates/footer');
    }

    public function view($slug)
    {
        $data['post_item'] = $this->Post_model->get_posts($slug);
        $data['comments'] = $this->Comment_model->get_comments($data['post_item']['post_id']);
        $data['title'] = $data['post_item']['post_title'];
        $data['post_rating'] = $this->Post_model->get_avg_rating_of_post($data['post_item']['post_id']);

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
            $config['max_width'] = '2000';
            $config['max_height'] = '2000';


            $this->upload->initialize($config);


            if ( ! $this->upload->do_upload()) {
                //https://fthmb.tqn.com/U-x-js7YTZbjIpXk7jDQL8nUrj8=/3865x2576/filters:fill(auto,1)/illuminated-server-room-panel-660495303-5a24933d4e46ba001a771cd1.jpg
                $post_image = 'default_image.jpg';
                $error = array('error' => $this->upload->display_errors());
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
                $this->Post_model->create_rating();
                $this->session->set_flashdata('post_created', 'The Post was create successfully!');
                $this->session->set_flashdata('image_upload_failed',$error['error']);
                redirect('posts');
            }
        }
    }

    public function delete($post_id)
    {
        if (!$this->session->userdata('logged_in')) {
            redirect('users/login');
        }
        $this->Post_model->delete_post($post_id);
        redirect('posts');

    }

    public function edit($slug){
        if (!$this->session->userdata('logged_in')){
            $this->session->set_flashdata('login_to_edit', 'Please login to edit the post.');
            redirect('users/login');
        }
        $data['post_item'] = $this->Post_model->get_posts($slug);

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
            $this->session->set_flashdata('login_to_edit', 'Please login to edit the post.');
            redirect('users/login');
        }
        //Image upload.
        $config['upload_path'] = './assets/images/posts';
        $config['allowed_types'] = 'png|jpg';
        $config['max_size'] = '2048';
        $config['max_width'] = '1024';
        $config['max_height'] = '768';


        $this->upload->initialize($config);


        if ( ! $this->upload->do_upload()) {
            //https://fthmb.tqn.com/U-x-js7YTZbjIpXk7jDQL8nUrj8=/3865x2576/filters:fill(auto,1)/illuminated-server-room-panel-660495303-5a24933d4e46ba001a771cd1.jpg
            $post_image = 'default_image.jpg';
        } else {
            $post_image = $_FILES['userfile']['name'];
        }

        $slug = url_title($this->input->post('title'), 'dash', true);
        $this->Post_model->update_post($post_image);
        $this->session->set_flashdata('post_update', 'The Post was updated!');
        redirect('posts/view/'. $slug);
    }

    public function rate(){
        $post_id =  $this->uri->segment(3);
        $rating =  $this->uri->segment(4);
        $slug = $this->uri->segment(5);

        if (!$this->session->userdata('logged_in')) {
            $this->session->set_flashdata('login_to_rate', 'Please login to rate this post.');
            redirect('users/login');
        }
        $this->Post_model->rate_post($post_id, $rating);


        $this->session->set_flashdata('complete_rating', 'Thank you for rating the post :)');
        redirect('posts/view/'. $slug);
    }


}