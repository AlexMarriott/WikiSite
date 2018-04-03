<?php

class Comments extends CI_Controller {

    public function create($post_id){
        $this->load->helper('form');
        $this->load->library('form_validation');
        $slug = $this->input->post('slug');
        $data['post_item'] = $this->Post_model->get_post($slug);

        $this->form_validation->set_rules("comments",'Comments', 'required');

        if($this->form_validation->run() == false){
            $this->load->view('templates/header');
            $this->load->view('posts/view', $data);
            $this->load->view('templates/footer');
        }else{
            $this->Comment_model->create_comment($post_id);
            redirect('posts/view/'.$slug);
        }

    }
}

?>