<?php

class Category_model extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }


    public function create_category()
    {
        $data = array(
            'category_name' => $this->input->post('name')
        );

        return $this->db->insert('categories', $data);
    }

    public function get_category($sub_category_id){
        $query = $this->db->get_where('sub_categories', array('sub_category_id' => $sub_category_id));

        return $query->row();
    }
}