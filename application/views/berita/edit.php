<?php
	echo validation_errors(); 

	echo form_open_multipart("berita/edit/$berita->id");
	echo form_input('judulnya',set_value('judulnya',$berita->title));
	echo form_input('beritanya',set_value('beritanya',$berita->body));
	echo form_input('penulisnya',set_value('penulisnya',$berita->name));
	echo form_upload('gambarnya');
	echo form_submit('','Simpan');
	echo form_close();
?>

</body>
</html>