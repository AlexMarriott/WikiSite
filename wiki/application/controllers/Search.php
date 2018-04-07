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

        $this->load->model('Search_model');
    }


    public function index(){
        //https://stackoverflow.com/questions/14374188/search-data-in-codeigniter
        $keyword = $this->input->post(strip_tags(ltrim(rtrim('keyword'))));
        $data['title'] = 'results for: ' . "$keyword";
        $data['posts'] = $this->Search_model->search($keyword);

        $this->load->view('templates/header');
        $this->load->view('posts/index',$data);
        $this->load->view('templates/footer');
    }



}