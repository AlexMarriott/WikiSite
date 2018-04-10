<?php
/*
 * /*@author Alex Marriott s4816928,
 * 10/4/2018.
 * filename: Search_model.php
 * The search_mode.php file is the model for the Search controller.
 * This file deals with all the databse interactions and searches the databse from the search controller.
 */


class Search_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    function search($keyword)
    {
        //This search checks all the searchable items on the site.
        $this->db->like('post_title',$keyword);
        $this->db->or_like('user_name',$keyword);
        $this->db->or_like('sub_category_name',$keyword);
        $this->db->or_like('category_name',$keyword);

        $this->db->join('sub_categories', 'sub_categories.sub_category_id = posts.sub_categories_FK');
        $this->db->join('categories', 'categories.category_id = sub_categories.category_id_FK');
        $this->db->join('users', 'users.user_id = posts.user_id_FK');
        $this->db->join('post_ratings', 'post_ratings.post_id = posts.post_id');
        $query = $this->db->get('posts');
        return $query->result_array();
    }

}