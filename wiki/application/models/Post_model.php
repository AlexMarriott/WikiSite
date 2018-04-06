<?php

class Post_model extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }

    public function get_posts($slug = FALSE, $limit = FALSE, $offset = FALSE, $check_post = false)
    {
        if($limit){
            $this->db->limit($limit, $offset);
        }
        if ($slug === FALSE) {
            $this->db->order_by('rating','DESC');
            $this->db->join('sub_categories', 'sub_categories.sub_category_id = posts.sub_categories_FK');
            $this->db->join('users', 'users.user_id = posts.user_id_FK');
            $this->db->join('post_ratings', 'post_ratings.post_id = posts.post_id');
            $query = $this->db->get('posts');
            return $query->result_array();
        }

        $this->db->select('*');
        $this->db->from('posts');
        $this->db->join('users', 'users.user_id = posts.user_id_FK');
        $this->db->join('post_ratings', 'post_ratings.post_id = posts.post_id');
        $this->db->where('slug', $slug);

        $query = $this->db->get();
        return $query->row_array();
    }

    public function check_post_exists($slug){
            $this->db->select('*');
            $this->db->from('posts');
            $this->db->where('slug', $slug);
            $this->db->where('user_id_FK', $this->session->userdata('user_id'));
            $query = $this->db->get();
            return $query->row_array();
    }

    public function get_posts_by_sub_category($sub_category_id){
        $this->db->order_by('post_id', 'DESC');
        $this->db->join('sub_categories', 'sub_categories.sub_category_id = posts.sub_categories_FK');
        $query = $this->db->get_where('posts', array('sub_category_id' => $sub_category_id));
        return $query->result_array();

    }

    public function get_sub_categories($slug = null){
        if ($slug === null){
            $this->db->order_by('sub_category_name');
            $query = $this->db->get('sub_categories');
            return $query->result_array();
        }

        $this->db->join('sub_categories', 'sub_categories.category_id_FK = categories.category_id');
        $query = $this->db->get_where('categories',array('category_name' => $slug));
        return $query->result_array();
    }

    public function get_categories(){
        $this->db->order_by('category_name');
        $query = $this->db->get('categories');
        return $query->result_array();
    }

    public function create_post($post_image)
    {
        $this->load->helper('url');
        $slug = url_title($this->input->post('title'), 'dash', true);

        if ($this->get_posts($slug)){
            return FALSE;
        }

        $data = array(
            'post_title' => $this->input->post('title'),
            'slug' =>$slug,
            'post_body' => $this->input->post('body'),
            'post_image' => $post_image,
            'sub_categories_FK' => $this->input->post('subcategory'),
            //Default variables done for testing purposes
            'user_id_FK' => $this->session->userdata('user_id'),
        );


        return $this->db->insert('posts', $data);
    }
    public function create_rating()
    {
        $this->load->helper('url');
        $slug = url_title($this->input->post('title'), 'dash', true);

        $post_info = $this->check_post_exists($slug);
        var_dump($post_info);
        $data = array(
            'user_id' => $this->session->userdata('user_id'),
            'post_id' =>$post_info['post_id'],
            'rating' => 1
        );
        return $this->db->insert('post_ratings', $data);
    }

    public function delete_post($post_id){
        $this->db->where('post_id', $post_id);
        $this->db->delete('posts');
        return true;
    }
    public function update_post(){
        $slug = url_title($this->input->post('title'), 'dash', true);

        $data = array(
            'post_title' => $this->input->post('title'),
            'slug' => $slug,
            'post_body' => $this->input->post('body'),
            'sub_categories_FK' => $this->input->post('subcategory')
        );
        $this->db->where('post_id', $this->input->post('id'));
        return $this->db->update('posts', $data);

    }

    public function comment_count()
    {
        return $this->db->count_all("comments");
    }


    // Pagination_Section TODO edit.
    public function record_count()
    {
        return $this->db->count_all("posts");
    }

    //Fetch data according to per_page limit.
    //https://www.sitepoint.com/pagination-with-codeigniter/
    public function fetch_data($limit, $start)
    {
        $this->db->limit($limit, $start);
        $query = $this->db->get("posts");

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }




}