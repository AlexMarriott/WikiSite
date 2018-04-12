<?php
/*
 * /*@author Alex Marriott s4816928,
 * 10/4/2018.
 * filename: Comment_model.php
 * The comment_model.php is the comment model which handles the database connections and functions of the comment controller.
 * It functions to retrieve and create the comments.
 */

    class Comment_model extends CI_Model{

        public function __construct()
        {
            $this->load->database();
        }

        //Is the actual database function for inserting into the database.
        public function create_comment($post_id){
            $data = array(
                'comment' => $this->input->post('comment'),
                'user_id_FK' => $this->session->userdata('user_id'),
                'post_id_FK' => $post_id
            );
            return $this->db->insert('comments',$data);
        }

        //Gets all the comments for a post where the post_id passed through is the same as the FK in the comments table.
        public function get_comments($post_id){
            $this->db->select('*');
            $this->db->join('posts', 'posts.post_id = comments.post_id_FK');
            $this->db->join('users', 'users.user_id = comments.user_id_FK');
            $this->db->where('post_id', $post_id);
            $query = $this->db->get('comments');

            return $query->result_array();
        }

    }