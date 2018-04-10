<?php

/*
 * /*@author Alex Marriott s4816928,
 * 10/4/2018.
 * filename: Pages.php
 * The Pages.php file is the controller for the static pages of the website, which currently is just the about page, but this could be used for emails,contact pages etc.
 */
class Pages extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function view($web_page = 'home') {
        if ( ! file_exists(APPPATH.'views/pages/'.$web_page.'.php')) {
            //If page doesn't exist
            show_404();
        }
        $this->load->view('templates/header');
        $this->load->view('pages/'.$web_page);
        $this->load->view('templates/footer');
    }
}
?>