<?php
class Post extends CI_Controller {

        public function __construct() {
                parent::__construct();
                $this->load->model('news_model');
                $this->load->helper('url_helper');
        }

	public function index() {
         $data['Post'] = $this->news_model->get_news();
         $data['title'] = 'Post archive';
 
         $this->load->view('templates/header', $data);
         $this->load->view('pages/home', $data);
         $this->load->view('templates/footer');
	}

	
	public function view($slug = NULL) {
        $data['news_item'] = $this->news_model->get_news($slug);

        if (empty($data['news_item'])) {
                show_404();
        }

        $data['title'] = $data['news_item']['title'];

        $this->load->view('templates/header', $data);
        $this->load->view('posts/view', $data);
        $this->load->view('templates/footer');

        }

  public function create() {
    $this->load->helper('form');
    $this->load->library('form_validation');

    $data['title'] = 'Create a posts item';

    $this->form_validation->set_rules('title', 'Title', 'required');
    $this->form_validation->set_rules('text', 'Text', 'required');

    if ($this->form_validation->run() === FALSE) {
        $this->load->view('templates/header', $data);
        $this->load->view('posts/create');
        $this->load->view('templates/footer');
    } else {
        $this->news_model->set_news();
        $this->load->view('posts/success');
    }
  }

}