	<?php
		//print_r($berita);
		$template = array('table_open' => '<table>');
		$this->table->set_template($template);
		$this->table->set_heading('kode','judul','beritanya','gambarnya','aksi');
		
		foreach ($berita as $row)
		{
			$this->table->add_row($row->id,$row->title,$row->body,'','edit');
			
		}
		echo $this->table->generate();
	?>
    <p>isi berita</p>
</body>
</html>