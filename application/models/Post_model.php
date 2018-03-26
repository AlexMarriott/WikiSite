<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
class Post_model extends CI_Model {
//TODO unlike to use this class, will get rid of
   public function __construct() {
	$this->load->database();
   }


   public function get_news($slug = FALSE) {
        if ($slug === FALSE) {
                $query = $this->db->get('post');
                return $query->result_array();
        }
        $query = $this->db->get_where('post', array('post_title' => $slug));


        return $query->row_array();
   }

 public function set_news() {
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
        return $this->db->count_all("post");
    }

// Fetch data according to per_page limit.
////https://www.sitepoint.com/pagination-with-codeigniter/
    public function fetch_data($limit, $start) {
        $this->db->limit($limit, $start);
        $query = $this->db->get("post");

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }



}