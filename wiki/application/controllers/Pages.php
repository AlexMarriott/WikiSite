<?php
class Pages extends CI_Controller {
//https://www.sitepoint.com/pagination-with-codeigniter/
    public function __construct() {
        parent::__construct();
        $this->load->model('Post_model');
        $this->load->helper('url_helper');
        $this->load->library('pagination','session');
    }

    public function view($web_page = 'home') {
        if ( ! file_exists(APPPATH.'views/pages/'.$web_page.'.php')) {
            // Whoops, we don't have a page for that!
            show_404();
        }
        $this->load->view('templates/header');
        $this->load->view('pages/'.$web_page);
        $this->load->view('templates/footer');
    }
}
?>