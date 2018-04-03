<?php

    class Comment_model extends CI_Model{

        public function __construct()
        {
            $this->load->database();
        }

        public function create_comment($post_id){
            $data = array(
                'comment' => $this->input->post('comments'),
                //default values for the time being during testing.
                //TODO set up the correct values of the user_id.
                'user_id_FK' => 1,
                'post_id_FK' => $post_id
            );
            return $this->db->insert('comments',$data);
        }

        public function get_comments($post_id){
            $query = $this->db->get_where('comments', array('post_id_FK' =>$post_id));
            return $query->result_array();
        }

    }