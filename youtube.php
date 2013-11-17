<?php
require ('config.php');

if (isset($_POST['submitted'])) {
	$data = array();

	foreach($_POST as $k => $e) {
		$data[$k] = mysql_real_escape_string($e);
		if(empty($data[$k])) {
			$err[] = 'Please complete the form before submiting';
			break;
		}
	}

	if(empty($err)) {
		if (preg_match("/((http\:\/\/){0,}(www\.){0,}(youtube\.com){1} || (youtu\.be){1}(\/watch\?v\=[^\s]){1})/", $data) == 1)
		   $url = mysqli_real_escape_string($dbc, $_POST['url']);
		else $err[]= 'This is not a Youtube url';
	}
}

head('Upload Video', '<link rel="stylesheet" type="text/css" href="static/login.css" />');
?>

  <div class="upload_video">
    <h1>Upload Video</h1>
    <form method="post" action="">
      <p><input type="text" name="url" value="" placeholder="URL"></p>
      <p class="submit"><input type="submit" name="commit" value="Upload Video"></p>
    </form>
  </div>


}
?>