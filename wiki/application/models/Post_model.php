<?php

class Post_model extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }


    /*  This is the main get post function which brings back all the post
        details to the main index.php/view.php of the post controller */
    public function get_posts($slug = FALSE, $limit = FALSE, $offset = FALSE, $user_id = FALSE)
    {
        if($limit){
            $this->db->limit($limit, $offset);
        }
        //If a post has been selected, a url 'slug' will be passed to the function to search for the specific post.
        if ($slug === FALSE) {
            $this->db->order_by('post_date','DESC');
            $this->db->join('sub_categories', 'sub_categories.sub_category_id = posts.sub_categories_FK');
            $this->db->join('users', 'users.user_id = posts.user_id_FK');
            $query = $this->db->get('posts');
            return $query->result_array();
        }

        //If the user_id has been put through, then we are searching for all posts by that said user.
        if ($user_id != FALSE){
            $this->db->join('post_ratings', 'post_ratings.post_id = posts.post_id');
            $this->db->join('users', 'users.user_id = posts.user_id_FK');
            $this->db->join('sub_categories', 'sub_categories.sub_category_id = posts.sub_categories_FK');
            $this->db->where('user_id_FK', $user_id);
            $query = $this->db->get('posts');
            return $query->result_array();
        }

        //if $slug and $user_id are null, all posts from the post table will be displayed.
        $this->db->select('*');
        $this->db->from('posts');
        $this->db->join('users', 'users.user_id = posts.user_id_FK');
        $this->db->join('post_ratings', 'post_ratings.post_id = posts.post_id');
        $this->db->where('slug', $slug);

        $query = $this->db->get();
        return $query->row_array();
    }



    //Check to see if the post exists to allow the create rating to handle the event if no post exists.
    public function check_post_exists($slug){
            $this->db->select('*');
            $this->db->from('posts');
            $this->db->where('slug', $slug);
            $this->db->where('user_id_FK', $this->session->userdata('user_id'));
            $query = $this->db->get();
            return $query->row_array();
    }


    //Gets all the posts via the sub-category the users has filtered it down by.
    public function get_posts_by_sub_category($sub_category_id){
        $this->db->join('sub_categories', 'sub_categories.sub_category_id = posts.sub_categories_FK');
        $this->db->join('users', 'users.user_id = posts.user_id_FK');
        $this->db->join('post_ratings', 'post_ratings.post_id = posts.post_id');
        $query = $this->db->get_where('posts', array('sub_category_id' => $sub_category_id));
        return $query->result_array();

    }

    //Gets and returns a specific sub_category if the $slug s not null, otherwise it will return all the sub-categories.
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

    //Gets and returns all categories on the website.
    public function get_categories(){
        $this->db->order_by('category_name');
        $query = $this->db->get('categories');
        return $query->result_array();
    }


    public function create_post($post_image)
    {
        $this->load->helper('url');
        $slug = url_title($this->input->post(strip_tags(ltrim(rtrim('title')))), 'dash', true);

        if ($this->get_posts($slug)){
            return FALSE;
        }
        if ($post_image == null){
            $post_image = 'default_image.jpg';
        }

        $data = array(
            'post_title' => $this->input->post(strip_tags(ltrim(rtrim('title')))),
            'slug' =>$slug,
            'post_body' => $this->input->post('body'),
            'post_image' => $post_image,
            'sub_categories_FK' => $this->input->post('subcategory'),
            'user_id_FK' => $this->session->userdata('user_id'),
        );


        return $this->db->insert('posts', $data);
    }
    public function create_rating()
    {
        $this->load->helper('url');
        $slug = url_title($this->input->post(strip_tags(ltrim(rtrim('title')))), 'dash', true);

        $post_info = $this->check_post_exists($slug);
        $data = array(
            'post_id' =>$post_info['post_id'],
            'rating' => 1
        );
        return $this->db->insert('post_ratings', $data);
    }

    public function rate_post($post_id, $rating){

        $query = array(
            'post_id' => $post_id,
            'rating' => $rating
        );

        return $this->db->insert('post_ratings', $query);
    }

    public function get_avg_rating_of_post($post_id = null){

        $this->db->select_avg('rating');
        $this->db->from('post_ratings');
        $this->db->where('post_id', $post_id);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function get_avg_rating($user_id){
        $this->db->select_avg('rating');
        $this->db->from('post_ratings');
        $this->db->join('posts', 'posts.post_id = post_ratings.post_id');
        $this->db->join('users', 'users.user_id = posts.user_id_FK');
        $this->db->where('user_id', $user_id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function delete_post($post_id){
        $this->db->where('post_id', $post_id);
        $this->db->delete('posts');
        return true;
    }
    public function update_post($post_image ){
        $slug = url_title($this->input->post('title'), 'dash', true);


        $data = array(
            'post_title' => $this->input->post('title'),
            'slug' => $slug,
            'post_image' => $post_image,
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


    public function count_all_users_posts($user_id)
    {
        if ($user_id === null){
            return false;
        }
        $this->db->select('post_id');
        $this->db->from('posts');
        $this->db->join('users', 'users.user_id = posts.user_id_FK');
        $this->db->where('user_id_FK', $user_id);
        return $this->db->count_all_results();
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




    /*public function get_users_posts($user_id){
        $this->db->select('*');
        $this->db->from('posts');
        $this->db->join('sub_categories', 'sub_categories.sub_category_id = posts.sub_categories_FK');
        $this->db->join('users', 'users.user_id = posts.user_id_FK');
        $this->db->join('post_ratings', 'post_ratings.post_id = posts.post_id');
        $this->db->where('user_id', $user_id);
        $query = $this->db->get('posts');
        return $query->result_array();
    }*/
}