<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class berita extends CI_Controller {
	public function __construct()
  {
    parent::__construct();
    $this->load->model('berita_model');
  }
	
	public function index()
	{			
		$this->load->library('javascript/jquery');
		
		$data = array(
			 'title' => 'My Title',
			 'heading' => 'My Heading'
		);
		$data['message'] = 'My Message';

		$data['berita'] = $this->berita_model->get();

		$this->load->view('berita/view', $data);
  }
    
  public function tambah()
	{
		$this->load->view('berita/tambah');
	}
}
