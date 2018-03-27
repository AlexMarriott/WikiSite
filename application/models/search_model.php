<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 3/27/2018
 * Time: 11:49 AM
 */

class search_model
{
    function get_search(){
        $match = $this->input->post('search');
        $this->db->like('postname',$match);
        $this->db->or_like('')
    }
}