<?php
/*
 * /*@author Alex Marriott s4816928,
 * 10/4/2018.
 * filename: Comments.php
 * The comment.php is the comment controller which handles the creation of the comments.
 */

class Comments extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    //Creates a comment on the post view page. Firsts checks to see if the user is logged in before creating a comment.
    public function create($post_id){
        $this->load->library('form_validation');

        //Redirects the user to the login page if they are not logged in.
        if (!$this->session->userdata('logged_in')) {
            $this->session->set_flashdata('login_to_comment', 'Please login to comment on this post.');
            redirect('users/login');
        }
        $slug = $this->input->post('slug');
        $data['post_item'] = $this->post_model->get_posts($slug);

        $this->form_validation->set_rules("comment",'Comments', 'required');

        if($this->form_validation->run() === false){

            //Reusing code from view to get information on the post in the event they didn't submit a comment.
            $data['post_item'] = $this->post_model->get_posts($slug);
            $data['comments'] = $this->comment_model->get_comments($data['post_item']['post_id']);
            $data['title'] = $data['post_item']['post_title'];
            $data['post_rating'] = $this->post_model->get_avg_rating_of_post($data['post_item']['post_id']);


            $this->load->view('templates/header');
            $this->load->view('posts/view', $data);
            $this->load->view('templates/footer');
        }else{
            $this->comment_model->create_comment($post_id);
            redirect('posts/view/'.$slug);
        }

    }
}

?>