<?php

class Posts extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('posts_model');
        $this->load->helper('url_helper');
    }


    public function view($slug = NULL)
    {
        $data['post_item'] = $this->posts_model->get_post($slug);
        $data['count'] = $this->posts_model->comment_count();

        if (empty($data['post_item']) || $data['post_item'] == null) {
            show_404();
        }
        $this->load->view('templates/header', $data);
        $this->load->view('posts/view', $data);
        $this->load->view('templates/comments', $data);
        $this->load->view('templates/footer');
    }

    public function create()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['title'] = 'Create a posts item';

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('body', 'Body', 'required');

        var_dump($this->form_validation->has_rule('title', 'Title', 'required'));
        var_dump($this->form_validation->has_rule('body', 'Body', 'required'));
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('posts/create',$data);
            $this->load->view('templates/footer');
        } else
            if ($this->posts_model->create_post()) {
                redirect(base_url());
            }else{
                $this->load->view('templates/header', $data);
                $this->load->view('posts/create',$data);
                $this->load->view('templates/footer');
            }
    }

    public function delete($post_id){
        $this->posts_model->delete_post($post_id);
        redirect('posts');

    }

    public function edit($slug){
        $data['post_item'] = $this->posts_model->get_post($slug);

        if (empty($data['post_item']) || $data['post_item'] == null) {
            show_404();
        }

        $data['post_title'] = 'Edit Post';
        $this->load->view('templates/header', $data);
        $this->load->view('posts/edit', $data);
        $this->load->view('templates/footer');

    }

    public function update(){
        $this->posts_model->update_post();
        redirect('posts');

    }


}