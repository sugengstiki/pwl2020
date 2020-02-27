<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class berita extends CI_Controller {

	public function index()
	{
		$this->load->view('berita/view');
    }
    
    public function tambah()
	{
		$this->load->view('berita/tambah');
	}
}
