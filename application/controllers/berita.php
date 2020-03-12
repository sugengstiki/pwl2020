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
		$this->load->library('table');
		$data = array(
			 'title' => 'My Title',
			 'judul' => 'My Heading'
		);
		$data['message'] = 'My Message';

		$data['berita'] = $this->berita_model->get();

		$data['judul'] = 'Daftar Berita';
		$this->load->view('header',$data);
		$this->load->view('berita/view', $data);
  }
    
  public function tambah()
	{
		$data['judul'] = 'Tambah Berita';
		$this->load->view('header',$data);
		$this->load->view('berita/tambah');
	}
}
