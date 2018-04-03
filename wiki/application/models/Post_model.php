<?php

class Post_model extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }

    public function get_post($slug = FALSE)
    {
        if ($slug === FALSE) {
            $this->db->order_by('post_id','DESC');
            $this->db->join('sub_categories', 'sub_categories.sub_category_id = posts.sub_categories_FK');
            $query = $this->db->get('posts');
            //var_dump($query);
            return $query->result_array();
        }
        $this->db->select('*');
        $this->db->from('posts');
        $this->db->join('users', 'users.user_id = posts.user_id_FK');
        $this->db->join('ratings', 'ratings.rating_id = posts.rating_id_FK');
        $this->db->where('slug', $slug);

        $query = $this->db->get();
        return $query->row_array();
    }

    public function get_posts_by_sub_category($sub_category_id){
        $this->db->order_by('post_id', 'DESC');
        $this->db->join('sub_categories', 'sub_categories.sub_category_id = posts.sub_categories_FK');
        $this->db->join('categories', 'categories.category_id = sub_categories.category_id_FK');
        $query = $this->db->get_where('posts', array('sub_category_id' => $sub_category_id));
        return $query->result_array();

    }

    public function get_sub_categories(){
        $this->db->order_by('sub_category_name');
        $uqery = $this->db->get('sub_categories');
        return $uqery->result_array();
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

        if ($this->get_post($slug)){
            return FALSE;
        }

        $data = array(
            'post_title' => $this->input->post('title'),
            'slug' =>$slug,
            'post_body' => $this->input->post('body'),
            'post_image' => $post_image,
            //'post_date' => date('20y-m-d'),
            'sub_categories_FK' => $this->input->post('subcategory'),
            //Default variables done for testing purposes
            //TODO configure this to allow for the real values to be pulled from sessions etc
            'user_id_FK' => 1,
            'rating_id_FK' => 1,
            //'sub_categories_FK' => 1
        );

        return $this->db->insert('posts', $data);
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