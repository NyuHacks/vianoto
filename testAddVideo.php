
<link rel="stylesheet" type="text/css" href="index.css"/>

<script src="jquery-1.10.2.js"></script>
<script>
	$(document).ready(function(){
		
		//alert(embedLink);
		
		$("#submitlink").click(function(){
			var userlink = $("#link").val();
			var video = userlink.split('=');
			var embedLink = "http://www.youtube.com/embed/" + video[1];
			$("iframe").attr("src", embedLink);
		});
	});
	
</script>

<html>
<div class="main_content">

	<div>Video Link:</div>
	<div><input id="title" type="text"/></div>
	<div><input id="link" type="text"/></div>
	<div><input id="submitlink" type="submit"/></div>
	
</div>
<div class="main_content">
	<iframe title="YouTube video player" width="560" height="315" src="" frameborder="0" allowfullscreen></iframe>
	
</div>

<?php
$sql = mysql_query('SELECT * video WHERE user_id ='.$userid)or die('MySQL is being nasty');
while($video = mysql_fetch_assoc($sql)) {
	?>
	<h1><?php echo $video['title']; ?></h1>
	<p><?php echo $video['description']; ?></p>
	
	
	<?php
		$pieces = explode("/", $video['url']);
		$imagesrcstr = "http://img.youtube.com/vi/".pieces[4]."/mqdefault.jpg";
		
		echo '<img src=?><?php echo $imagesrcstr ?></>';
	?>
	
	<?php
}
?>

</html>


