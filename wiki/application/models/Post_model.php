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
       $query = $this->db->get_where('posts',array('post_title'=> $slug));
       return $query->row_array();
   }

    //TODO might be able to better optermise this block of code.
    public function get_post_user($slug){
       if ($slug === FALSE){
           return null;
       }
       $query = $this->db->get_where('posts',array('post_title'=> $slug));
       $query2 = $query -> row_array();
       $query3 = $this->db->get_where('users',array('user_id'=> $query2['user_id_FK']));

       return $query3 -> row_array();
   }

    //TODO might be able to better optimise this block of code.
    public function get_post_rating($slug){
        if ($slug === FALSE){
            return null;
        }
        $query = $this->db->get_where('posts',array('post_title'=> $slug));
        $query2 = $query -> row_array();
        $query3 = $this->db->get_where('ratings',array('ratings_id'=> $query2['rating_id_FK']));

        return $query3 -> row_array();
    }

    public function get_post_comments($slug){
        if ($slug === FALSE){
            return null;
        }

        $query = $this->db->sele//$this->db->get_where('comments',array('post_title'=> $slug));
        return $query->row_array();
    }

 public function set_posts() {
    $this->load->helper('url');
    $slug = url_title($this->input->post('post_title'), 'dash', TRUE);

    $data = array(
        'post_title' => $this->input->post('post_title'),
        'slug' => $slug,
        'text' => $this->input->post('post_body')
    );



    return $this->db->insert('post_id', $data);
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