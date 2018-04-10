<?php
/*
 * /*@author Alex Marriott s4816928,
 * 10/4/2018.
 * filename: search.php
 * The search.php file is the Controller for anything search related on the site.
 * It handles the user input and interacts with the search model which deals with the database interaction.
 */

class Search extends CI_Controller{
    public function __construct(){
        parent::__construct();

    }


    public function index(){
        //https://stackoverflow.com/questions/14374188/search-data-in-codeigniter
        // above is the link I used for retrieving the inputs from the page.
        $keyword = $this->input->post(strip_tags(ltrim(rtrim('keyword'))));
        $data['title'] = 'results for: ' . "$keyword";
        $data['posts'] = $this->search_model->search($keyword);

        $this->load->view('templates/header');
        $this->load->view('posts/index',$data);
        $this->load->view('templates/footer');
    }



}