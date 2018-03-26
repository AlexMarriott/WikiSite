<?php
class Pages extends CI_Controller {
//https://www.sitepoint.com/pagination-with-codeigniter/
    public function __construct() {
        parent::__construct();
        $this->load->model('Post_model');
        $this->load->helper('url_helper');
        $this->load->library("pagination");
    }

   public function view($web_page = 'home') {
        if ( ! file_exists(APPPATH.'views/pages/'.$web_page.'.php')) {
                // Whoops, we don't have a page for that!
                show_404();
        }

       $config = array();
       $config["base_url"] = base_url() . "/index";
       $config["total_rows"] = $this->Post_model->record_count();
       $config["per_page"] = 5;
       $config["uri_segment"] = 3;

       $this->pagination->initialize($config);

       $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

       $data["results"] = $this->Post_model->fetch_data($config["per_page"], $page);

       $data["links"] = $this->pagination->create_links();

        //$data['title'] = ucfirst($page); // Capitalize the first letter
        $data['posts'] = $this->Post_model->get_news();

        $this->load->view('templates/header', $data);
        $this->load->view('pages/'.$web_page, $data);
        $this->load->view('templates/footer', $data);
   }

    public function index() {
        $data['post'] = $this->Post_model->get_news();
        $data['title'] = 'Post archive';

        $this->load->view('templates/header', $data);
        $this->load->view('pages/index', $data);
        $this->load->view('templates/footer');
    }
}
?>