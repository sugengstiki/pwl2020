<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$title;?></title>
		<?php echo $library_src;?>
		<?php echo $script_head;?>
</head>
<body>
    <h1><?=$heading;?></h1>
		<div><?=$message;?></div>
		<?php
		
		foreach ($berita as $row)
		{
			echo $row->title;
			echo $row->name;
			echo $row->body;
		}
		?>
</body>
</html>