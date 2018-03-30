<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 3/25/2018
 * Time: 10:19 PM
 */

class Search extends CI_Controller{
//http://www.technicalkeeda.com/codeigniter-tutorials/live-search-using-jquery-ajax-php-codeigniter-and-mysql based on this.
    public function __construct(){
        parent::__construct();

        $this->load->helper('form');
        $this->load->model('search_model');
    }

    /*public function index(){
        $search=  $this->input->post('search');

        //$something = isset($_POST['something']) ? $_POST['something'] : NULL;
        $query = $this->search_model->getPost($search);
        echo json_encode ($query);

        $this->load->view('templates/header');
        $this->load->view('search/index.php');
        $this->load->view('templates/footer');
    }*/

    //this is an auto suggets for searching the search, usages ajax
    public function SearchAutoComplete(){

        $results = $this->seach_model->SearchAutoComplete();
        $html = "";
        $i =0;
        if(count($results)>0)
        {
            foreach ($results as $value) {
                $html[] = "<li ><a href='javascript:void(0)' onclick = 'pick()'>".$value['listing_title']."</a></li>";
            }
            echo implode(" ",$html);
        }
    }



}