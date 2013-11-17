<?php

function head($title='', $additional='', $header = 1) {
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
	<?php if(!$header) { ?>
	<div class="whitebox"></div>
	<div class="myheader">
	<div class="headerlogo"><a href="/"><img src="static/vinot.png" alt="Vinot" height="50" width="181"></a></div>
		<div class="navigation"><a href="video-add.html">Add Video</a></div>
		<div class="navigation"><a href="videos.html">Videos</a></div>
		<div class="navigation"><a href="videos.html">Public Stream</a></div>
		<div class="navigationright">
			<?php if(empty($U)) { ?><a href="login.html">Log in</a></div><div class="navigationright">
			<a href="register.html">Register</a></div><?php } 
			 else { ?><a href="logout.html">Log out</a><?php } ?>
		</div>
	</div>
	<?php
	}
}

function foot(){
	?>
	</body>
	<?php
}

function redirect($page, $message) {
	?>

	<div style="padding:10px;font-size:11px;">
	    <a href="<?php echo $page; ?>"><?php echo $message; ?></a>
	</div>

	<script type="text/javascript">
	function countdown(num){
	    document.getElementById("countdown").innerHTML = num;
	    if (num > 0) {
	        setTimeout("countdown("+(num-1)+")",1000);
	    } else{
	        window.location.href="<?php echo $page; ?>";
	    }
	}

	countdown(2); // Set seconds to redirection
	</script>

	<?php
}
?>