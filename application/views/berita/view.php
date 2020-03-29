	<?php
		//print_r($berita);
		$template = array('table_open' => '<table id="example">');
		$this->table->set_template($template);
		$this->table->set_heading('kode','judul','beritanya','gambarnya','aksi');
		
		foreach ($berita as $row)
		{
			$this->table->add_row(
				$row->id,
				$row->title,
				$row->body,
				$row->picture,
				anchor("berita/edit/$row->id",'Edit')
			);
			
		}
		echo $this->table->generate();
	?>
    <p>isi berita</p>
		<script>
		$(document).ready(function() {
				$('#example').DataTable();
		} );
		</script>
</body>
</html>