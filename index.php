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
	
	$files = Upload::to_folder('uploads/');

	if($files[0]['error message'] == false){
		URL::redirect($files[0]['filepath']);
	}else{
		echo $files[0]['error message'];
	}
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