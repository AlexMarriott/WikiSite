<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 3/27/2018
 * Time: 11:49 AM
 */

class Search_model extends CI_Model
{

    function getPost($search){
        $this->db->select("post_title");
        $whereCondition= array("post_title" =>$search);
        $this->db->where($whereCondition);
        $this->db->from('posts');
        $query = $this->db->get();
        return $query->result();
    }


    public function SearchAutoComplete(){
        $current_date = date('Y-m-d h:i:s');
        $this->db->select('post_id,post_title');
        $this->db->from('posts');
        $this->db->like('post_title', trim($this->input->post('string')), 'both');
        $this->db->limit(10);
        $query = $this->db->get();
        $results = $query->result_array();
        return $results;
    }
}