<?php
/*
 * /*@author Alex Marriott s4816928,
 * 10/4/2018.
 * filename: Categories_model.php
 * The Categories_model.php file is the model for the categories.
 * This model has two functions, the creation of the sub_categories and the retrieval of the subcategories.
 */
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

    public function get_sub_category($sub_category_name){
        $query = $this->db->get_where('sub_categories', array('sub_category_name' => $sub_category_name));

        return $query->row();
    }
}