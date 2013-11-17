<?php

function head($title='', $additional='') {
	global $U;
	?>

	<html>
	<head>
	<link rel="stylesheet" type="text/css" href="static/index.css"/>

	<script src="static/jquery-1.10.2.js"></script>
	<script src="static/jquery.validate.js"></script>
	<script src="static/additional-methods.js"></script>

	<?php echo $additional; ?>

	<title><?php if(!empty($title)) echo $title . ' - '; ?>Vianoto</title>
	</head>

	<body>
	<div class="whitebox"></div>
	<div class="myheader">
	<div class="headerlogo"><img src="static/vinot.png" alt="Vinot" height="50" width="181"></div>
		<div class="navigation"><a href="XXXXXXXXX.html">Add Video</a></div>
		<div class="navigation"><a href="XXXXXXXXX.html">My Videos</a></div>
		<div class="navigation"><a href="XXXXXXXXX.html">Public Stream</a></div>
		<div class="navigationright">
			<?php if(empty($U)) { ?><a href="XXXXXXXXX.html">Log in</a><?php } 
			 else { ?><a href="XXXXXXXXX.html">Log out</a><?php } ?>
		</div>
	</div>


	<?php
}

function foot(){
	?>
	</body>
	<?php
}
?>