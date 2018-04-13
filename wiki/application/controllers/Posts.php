<?php
/*
 * /*@author Alex Marriott s4816928,
 * 10/4/2018.
 * filename: Posts.php
 * The Posts.php file is the posts controller which serves the main index.php page of the website along with dealing with everything related to the posts.
 * This controller uses the post_model as the model to deal with the database connections and functions.
 */
class Posts extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    //This is the main page of the website which takes in a offset variable which filters the amount of posts on each page.
    public function index($offset = 0)
    {
        //configuring the pagination links below each page.
        $config['base_url'] = base_url() . 'posts/index/';
        $config['total_rows'] = $this->db->count_all('posts');
        $config['per_page'] = 5;
        $config['url_segment'] = 3;
        $config['full_tag_open'] = '<div class="pagination justify-content-center mb-4">';
        $config['full_tag_close'] = '</div>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';

        $user_id = $this->input->post('user_id');

        $this->pagination->initialize($config);

        $config['full_tag_open'] = '<div class="pagination">';

            $data['title'] = 'Recent Posts';
            $data['posts'] = $this->post_model->get_posts(false, $config['per_page'], $offset);


        //This array gets the average rating of each users and the amount of posts they have submitted.
        $user_stats = array(
            'rating' => $this->post_model->get_avg_rating($this->session->userdata('user_id')),
            'post_count' => $this->post_model->count_all_users_posts($this->session->userdata('user_id')));

        $this->session->set_userdata($user_stats);

        $this->load->view('templates/header');
        $this->load->view('posts/index', $data);
        $this->load->view('templates/footer');
    }

    //This is the users view of there posts which takes in a offset variable which filters the amount of posts on each page.
    public function user_posts($user_id = 0, $offset = 0)
    {
        //configuring the pagination links below each page.
        $config['base_url'] = base_url() . 'posts/user_posts/' . $user_id. '/';
        $config['total_rows'] = $this->post_model->count_all_users_posts($user_id);
        $config['per_page'] = 5;
        $config['url_segment'] = 3;
        $config['full_tag_open'] = '<div class="pagination justify-content-center mb-4">';
        $config['full_tag_close'] = '</div>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';

        $this->pagination->initialize($config);

        $config['full_tag_open'] = '<div class="pagination">';

        //If the user_id is null, the normal index page will be loaded with recent posts.
        if ($user_id != 0){
            //allows the user to view all there posts on one page.
            $data['posts'] = $this->post_model->get_posts(true, $config['per_page'], $offset, $user_id);
            $data['title'] = 'Users posts';
        } else{
            $data['title'] = 'Recent Posts';
            $data['posts'] = $this->post_model->get_posts(false, $config['per_page'], $offset);
        }


        //This array gets the average rating of each users and the amount of posts they have submitted.
        $user_stats = array(
            'rating' => $this->post_model->get_avg_rating($this->session->userdata('user_id')),
            'post_count' => $this->post_model->count_all_users_posts($this->session->userdata('user_id')));

        $this->session->set_userdata($user_stats);

        $this->load->view('templates/header');
        $this->load->view('posts/index', $data);
        $this->load->view('templates/footer');
    }

    //This page takes in the $slug which is the post title and displays it in another view
    public function view($slug)
    {
        //Getting information about the posts the user intends to view.
        $data['post_item'] = $this->post_model->get_posts($slug);
        $data['comments'] = $this->comment_model->get_comments($data['post_item']['post_id']);
        $data['title'] = $data['post_item']['post_title'];
        $data['post_rating'] = $this->post_model->get_avg_rating_of_post($data['post_item']['post_id']);


        if (empty($data['post_item']) || $data['post_item'] == null) {
            show_404();
        }
        $this->load->view('templates/header', $data);
        $this->load->view('posts/view', $data);
        $this->load->view('templates/footer');
    }

    //This function takes the user to the post create page, and allows them to create new posts so long as they are logged in.
    public function create()
    {
        //If the user is not logged in, takes them the login page.
        if (!$this->session->userdata('logged_in')) {
            redirect('users/login');
        }
        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['title'] = 'Create a posts item';
        $data['sub_categories'] = $this->post_model->get_sub_categories();
        $data['categories'] = $this->post_model->get_categories();

        //Set rules to prevent empty posts being made.
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

            if (!$this->upload->do_upload()) {
                //https://fthmb.tqn.com/U-x-js7YTZbjIpXk7jDQL8nUrj8=/3865x2576/filters:fill(auto,1)/illuminated-server-room-panel-660495303-5a24933d4e46ba001a771cd1.jpg <-- image used for  default
                $post_image = 'default_image.jpg';
                $image_error = $this->upload->display_errors();
            } else {
                $image_success = $this->upload->data();
                $post_image = $_FILES['userfile']['name'];
            }

            if ($this->post_model->create_post($post_image) === false) {
                $data['error'] = "This post title has already been used, please give the post a different name.";
                $this->load->view('templates/header', $data);
                $this->load->view('posts/create', $data);
                $this->load->view('templates/footer');
            } else {
                $this->post_model->create_rating();
                $this->session->set_flashdata('post_created', 'The Post was create successfully!');
                if (empty($image_error)){
                    $this->session->set_flashdata('image_upload_successful', strip_tags($image_success));
                } else{
                    $this->session->set_flashdata('image_upload_failed', strip_tags($image_error));
                }
                redirect('posts');
            }
        }
    }

    public function delete($post_id)
    {
        if (!$this->session->userdata('logged_in')) {
            redirect('users/login');
        }
        $this->post_model->delete_post($post_id);
        redirect('posts');

    }

    public function edit($slug)
    {
        if (!$this->session->userdata('logged_in')) {
            $this->session->set_flashdata('login_to_edit', 'Please login to edit the post.');
            redirect('users/login');
        }
        $data['post_item'] = $this->post_model->get_posts($slug);

        // Check user
        if ($this->session->userdata('user_id') != $data['post_item']['user_id']) {
            redirect('posts');

        }
        $data['sub_categories'] = $this->post_model->get_sub_categories();
        $data['categories'] = $this->post_model->get_categories();

        if (empty($data['post_item']) || $data['post_item'] == null) {
            show_404();
        }

        $data['post_title'] = 'Edit Post';
        $this->load->view('templates/header', $data);
        $this->load->view('posts/edit', $data);
        $this->load->view('templates/footer');
    }

    public function update()
    {

        if (!$this->session->userdata('logged_in')) {
            $this->session->set_flashdata('login_to_edit', 'Please login to edit the post.');
            redirect('users/login');
        }
        //Image upload, specifying the configuration for the uploaded file.  .
        $config['upload_path'] = './assets/images/posts';
        $config['allowed_types'] = 'png|jpg';
        $config['max_size'] = '2048';
        $config['max_width'] = '1024';
        $config['max_height'] = '768';


        $this->upload->initialize($config);


        if (!$this->upload->do_upload()) {
            $post_image = 'default_image.jpg';
            $image_error = $this->upload->display_errors();
        } else {
            $image_success = $this->upload->data();
            $post_image = $_FILES['userfile']['name'];
        }

        $slug = url_title($this->input->post('title'), 'dash', true);
        $this->post_model->update_post($post_image);
        $this->session->set_flashdata('post_update', 'The Post was updated!');
        if (empty($image_error)){
            $this->session->set_flashdata('image_upload_successful', strip_tags($image_success));
        } else{
            $this->session->set_flashdata('image_upload_failed', strip_tags($image_error));
        }
        redirect('posts/view/' . $slug);
    }

    public function rate()
    {
        //grabs the psot_id, rating and slug from the different sections of the url
        $post_id = $this->uri->segment(3);
        $rating = $this->uri->segment(4);
        $slug = $this->uri->segment(5);

        if (!$this->session->userdata('logged_in')) {
            $this->session->set_flashdata('login_to_rate', 'Please login to rate this post.');
            redirect('users/login');
        }
        $this->post_model->rate_post($post_id, $rating);


        $this->session->set_flashdata('complete_rating', 'Thank you for rating the post :)');
        redirect('posts/view/' . $slug);
    }


}