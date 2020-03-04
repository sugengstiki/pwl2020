<?php
class Berita_model extends CI_Model {
	public function __construct()
	{
		$this->load->database();
	}
	
  public function get_last_ten_entries()
  {
    $query = $this->db->get('berita', 10);
    return $query->result();
  }
}