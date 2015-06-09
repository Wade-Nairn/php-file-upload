<?php

# libraries

require_once 'form.lib.php';
require_once 'upload.lib.php';
require_once 'url.lib.php';

# logic

// echo '<pre>';
// print_r($_FILES);
// echo '</pre>';

# if any files were uploaded....
if($_FILES){
	#move the files into the uploads folder
	$tmp = $_FILES['file']['tmp_name'][0];
	$filename = $_FILES['file']['name'][0];
	move_uploaded_file($tmp, 'uploads/'.$filename);

	# redirect to the new file
	URL::redirect('uploads/'.$filename);
}

# views (after tag)

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>PHP file uploads</title>
</head>
<body>
	
	<h1>File uploads with PHP</h1>

	<?= Form::open_upload() ?>
		
		<div class="form-group">
			
			<?= Form::label('file', 'File:') ?>
			<?= Form::file() ?>

		</div>

		<?= Form::submit() ?>

	<?= Form::close() ?>



</body>
</html>