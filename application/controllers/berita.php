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
		$this->load->helper('url');
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
	
	public function edit($id = ''){
		$this->load->helper(['form','url']);
		
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('judulnya', 'Judul', 'required');
    $this->form_validation->set_rules('beritanya', 'Berita', 'required',
            array('required' => '%s harus diisi.'));
    $this->form_validation->set_rules('penulisnya', 'Nama Penulis', 
                                      'required');
		$this->form_validation->set_rules('gambarnya', 'Gambar','callback_cek_upload');
		if ($this->form_validation->run() == FALSE)
    {

			$data = array(
				 'title' => 'My Title',
				 'judul' => 'My Heading'
			);
			$data['message'] = 'My Message';

			$data['berita'] = $this->berita_model->get($id);

			$data['judul'] = 'Edit Berita';
			$this->load->view('header',$data);
			$this->load->view('berita/edit', $data);
		} else {
			$data['title'] = $this->input->post('judulnya');
			$data['body'] =  $this->input->post('beritanya');
			$data['name'] = $this->input->post('penulisnya');
			$data['picture'] = $this->upload->data('file_name');
			$this->berita_model->simpan($data,$id);

			redirect('berita');
		}
	}
	
	public function cek_upload()
	{
		$config['upload_path']          = './uploads/';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['max_size']             = 100;
		$config['max_width']            = 1024;
		$config['max_height']           = 768;

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('gambarnya'))
		{
			$this->form_validation->set_message('cek_upload', $this->upload->display_errors());
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}
}
