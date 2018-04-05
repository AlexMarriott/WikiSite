<?php

class Category_model extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }


    public function create_sub_category()
    {
        $data = array(
            'sub_category_name' => $this->input->post('name'),
            'category_id_FK' => $this->input->post('category')
        );

        return $this->db->insert('sub_categories', $data);
    }

    public function get_category($sub_category_name){
        $query = $this->db->get_where('sub_categories', array('sub_category_name' => $sub_category_name));

        return $query->row();
    }
}