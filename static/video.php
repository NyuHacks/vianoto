<link rel="stylesheet" type="text/css" href="video.css"/>
<script src="jquery-1.10.2.js"></script>
<script src="jQuery.tubeplayer.min.js"></script>
<script>
	$(document).ready(function(){
		
		var timeChange = 0;
		var relX = -1;
		var relY = -1;id
		<?php
		require '../config.pgp';
		$req = mysql_query('SELECT * FROM comment WHERE id ='. intval($_GET['id']))or die();
		$i = 0;
		while($e = mysql_fetch_assoc(($req))) {
		$i++
		?>
		var comment<?=$i?> = ["<?=$e['author']?>","<?=$e['time']?>","<?=$e['x']?>, <?=$e['y']?>","<?=$e['content']?>"];
		<?php
		}
		?>

		/*
		var comment1 = ["Guest 1", "0.356", "385, -345", "I hate this video"];
		var comment2 = ["Guest 2", "5.34", "353, -335", "Me too"];
		var comment3 = ["Guest 3", "10.46", "24, -142", "We all hate this video"];
		var comment4 = ["Guest 4", "14.53", "152, -345", "Haters"];
		var comment5 = ["Guest 5", "23.356", "35, -245", "Booty Sweat"];
		*/
		var all_user_comments = [<?php
		for($j=1; $j < $i-1; $j++) echo 'comment' . $j . ', ';
		echo 'comment' . $i;
		?>];
		changeComments();
		
		$("div.single_comment").hover(function(){
			alert("enter");
		},function(){
			alert("leave");
		});
		
		var checkTime = setInterval(function(){
			var difference = $("#player").tubeplayer("data").currentTime - timeChange;
			if(difference > 5 || difference < -5){
				timeChange = $("#player").tubeplayer("data").currentTime - ($("#player").tubeplayer("data").currentTime % 5);
			}
			if($("#player").tubeplayer("data").currentTime >= timeChange){

				changeComments();
				changePoints();
				timeChange += 5;
			}
		}, 100);
		
		function changeComments(){
			$("#all_comments").html("");
			var count = 1;
			$(all_user_comments).each(function(){
				if(this[1] > timeChange && this[1] < timeChange + 5){
					var user = "<div class=\"single_comment\"value=\""+count+ "\"><div >" + this[0] + " Time: " + this[1] + " Coordinates: " + this[2] + "</div>";
					
					$("#all_comments").append(user+"<div>"+this[3]+"</div></div>");				
					count += 1;
				}
			
			});
			
		}
		function changePoints(){
			$(".interactive_click").html("");
			$(all_user_comments).each(function(){
				if(this[1] > timeChange && this[1] < timeChange + 5){
					
					
					var checkExist = this[2].split(",");
					if(checkExist[0] != -1){	
						checkExist[1] *= -1;					
						var x_coord = checkExist[0] + "px";
						var y_coord = checkExist[1] + "px";
						var newDiv = "<div class=\"interactive_points\">" + "</div>";
						$(".interactive_click").append(newDiv);							
						$(".interactive_click div:last-child").css({top: y_coord, left: x_coord});
										
					}			
				}
			
			});
			
		}
	
		
		$("#player").tubeplayer({
			width: 900, // the width of the player
			height: 400, // the height of the player
			autoHide: false,
			allowFullScreen: "true", // true by default, allow user to go full screen
			initialVideo: "EYEHUOpwNvE", // the video that is loaded into the player
			preferredQuality: "default",// preferred quality: default, small, medium, large, hd720
			onPlay: function(id){}, // after the play method is called	
			onPause: function(){}, // after the pause method is called
			onStop: function(){}, // after the player is stopped
			onSeek: function(time){}, // after the video has been seeked to a defined point
			onMute: function(){}, // after the player is muted
			onUnMute: function(){} // after the player is unmuted
		});
		//$.get("")
		$("#start_comment").click(function(){
			$(".interactive_click").fadeIn();
				$(".interactive").fadeIn()		
			$("#player").tubeplayer("pause");
		});
		$(".interactive_click").click(function(e){
			var parentOffset = $(this).parent().offset(); 
		   //or $(this).offset(); if you really just want the current element's offset
		   relX = e.pageX - parentOffset.left;
		   relY = e.pageY - parentOffset.top;
		   alert("("+relX+", "+ relY +")");
		   ;
		});
		$("#submit_comment").click(function(){
			$(".interactive").fadeOut();
			$(".interactive_click").fadeOut();
			var coordinates = "Coordinates:" + "("+relX+", "+ relY +")";
			var comment_user = "<div>Guest Time:"+ $("#player").tubeplayer("data").currentTime + " Sec" + "</div>";
			if(relX != -1){
				comment_user += coordinates;
			}
			var new_comment = "<div>"+ $("textarea").val() +"</div>";
			var whole_comment = comment_user + new_comment;
			$("#all_comments").append(whole_comment);
			relX = -1;
			$("#player").tubeplayer("play");
		});
		
	});
	
</script>
<html>
<body>
<div class="main_content">
<div id="player"></div>
	<div class="comment_section">
		<div class="comment_button"><button id="start_comment">Comment</button></div>
			<div id="all_comments"></div>
	</div>
	<div class="interactive_click">
	</div>
	<div class="interactive">
		<textarea></textarea>
		<button id="submit_comment">Submit Comment</button>
	</div>
</div>

</body>
</html>