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
       $this->db->where('post_title', $slug);

       $query = $this->db->get();

       // WHERE name = 'Joe'
       // $this->db->where('name', $name);

       // SELECT * FROM blogs JOIN comments ON comments.id = blogs.id
       // $this->db->join('comments', 'comments.id = blogs.id');

       //select * from blah
       //$sql = $this->db->get_compiled_select('mytable');


       /*
        * SELECT * from posts
        JOIN users ON users.user_id = posts.user_id_FK
        JOIN comments ON comments.post_id_FK = posts.post_id
        WHERE post_title = 'how-to-fix';
        */

      // $query = $this->db->get_where('posts',array('post_title'=> $slug));
       return $query->row_array();
   }

    public function comment_count() {
        return $this->db->count_all("comments");
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