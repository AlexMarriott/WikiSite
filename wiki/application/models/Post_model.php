<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
class Post_model extends CI_Model {
//TODO unlike to use this class, will get rid of
   public function __construct() {
	$this->load->database();
   }


   public function get_all_posts() {
       $query = $this->db->get('posts');
       return $query->result_array();
   }

   public function get_post($slug){
       if ($slug === FALSE){
           return null;
       }

       $this->db->select('*');
       $this->db->from('posts');
       $this->db->join('users', 'users.user_id = posts.user_id_FK');
       $this->db->join('comments','comments.post_id_FK = posts.post_id');
       $this->db->join('ratings','ratings.rating_id = posts.rating_id_FK');
       $this->db->where('post_id', $slug);

       $query = $this->db->get();
       return $query->row_array();
   }

    public function comment_count() {
        return $this->db->count_all("comments");
    }

 public function create_post() {
    $this->load->helper('url');
    $slug = url_title($this->input->post('title'));

    $data = array(
        'post_title' => $this->input->post('title'),
        'slug' => $slug,
        'post_body' => $this->input->post('body'),
        'post_date' => date('y-m-d'),
        //'sub_categories_FK' => $this->input->post('subcategory'),
        //Default variables done for testing purposes
        //TODO configure this to allow for the real values to be pulled from sessions etc
        'user_id_FK' => 1,
        'rating_id_FK' => 1,
        'sub_categories_FK' => 1
    );
    var_dump($data);

    return $this->db->insert('posts', $data);
 }

 // Pagination_Section TODO edit.
    public function record_count() {
        return $this->db->count_all("posts");
    }

// Fetch data according to per_page limit.
////https://www.sitepoint.com/pagination-with-codeigniter/
    public function fetch_data($limit, $start) {
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