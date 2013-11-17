<html>
<link rel="stylesheet" type="text/css" href="video.css"/>
<script src="jquery-1.10.2.js"></script>
<script src="jQuery.tubeplayer.min.js"></script>
<script>
$(document).ready(function(){

	var timeChange = 0;
	var relX = -1;
	var relY = -1;
	var comment1 = ["Guest 1", "0.356", "385, -345", "I hate this video"];
	var comment2 = ["Guest 2", "5.34", "353, -335", "Me too"];
	var comment3 = ["Guest 3", "10.46", "24, -142", "We all hate this video"];
	var comment4 = ["Guest 4", "14.53", "152, -345", "Haters"];
	var comment5 = ["Guest 5", "23.356", "35, -245", "Booty Sweat"];
	var all_user_comments = [comment1,comment2,comment3,comment4,comment5];

	$("#mycheckbox").click(function(){
			if(this.checked)
			{
				$(".interactive_click").css('display', 'block');
			}
			else{
				$(".interactive_click").css('display', 'none');
			}
		});

	$("#player").tubeplayer({
			width: 900, // the width of the player
			height: 400, // the height of the player
			
			allowFullScreen: "true", // true by default, allow user to go full screen
			autoHide: false,
			iframe: false,
			initialVideo: "5qCYErpJTF8", // the video that is loaded into the player
			preferredQuality: "default",// preferred quality: default, small, medium, large, hd720
			onPlay: function(id){}, // after the play method is called	
			onPause: function(){}, // after the pause method is called
			onStop: function(){}, // after the player is stopped
			onSeek: function(time){}, // after the video has been seeked to a defined point
			onMute: function(){}, // after the player is muted
			onUnMute: function(){} // after the player is unmuted
		});

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
		/*$(".interactive_click").fadeOut();*/
		/*alert($("#mycheckbox").is(':checked'));*/
		if($("#mycheckbox").is(':checked')){
				$(".interactive_click").css('display', 'block');
			}
			else{
				$(".interactive_click").css('display', 'none');
			}
		

		var coordinates = "Coordinates:" + "("+relX+", "+ relY +")";
		var comment_user = "<div><div class=\"guestname\">Guest comment</div><div class=\"time_and_cord\">Time: "+ $("#player").tubeplayer("data").currentTime + " seconds" + "</div></div>";
		if(relX != -1){
			comment_user += coordinates;
		}
		var new_comment = "<div>"+ $("textarea").val() +"</div>";
		var whole_comment = "<div class=\"guestcomment\">" + comment_user + new_comment + "</div>";
		$("#all_comments").append(whole_comment);
		relX = -1;
		$("#player").tubeplayer("play");
	});

	var checkTime = setInterval(function(){
		$( ".a_single_comment" ).hover(
			function() {
				var counting = 1;
				var current_var = $(this).attr("value");
				$(".interactive_points").each(function(){
					if(counting == current_var){
						$(this).css('background-color', '#ee8a1d');
					}
					counting +=1;
				});
			//$("div.interactive_points").css('background-color', 'red');
		}, function() {
			$("div.interactive_points").css('background-color', 'white');
		}
		);
		var difference = $("#player").tubeplayer("data").currentTime - timeChange;
		if(difference > 5 || difference < -5){
			timeChange = $("#player").tubeplayer("data").currentTime - ($("#player").tubeplayer("data").currentTime % 5);
		}
		if($("#player").tubeplayer("data").currentTime >= timeChange){

			changeComments();
			changePoints();
			timeChange += 5;
		}
	}, 1000);

	function changeComments(){
		$("#all_comments").html("");
		var count = 1;
		$(all_user_comments).each(function(){
			if(this[1] > timeChange && this[1] < timeChange + 5){
				var user = "<div class=\"a_single_comment\"value=\""+count+ "\">" + "<div class=\"guestname\">" + this[0] + "</div><div class=\"time_and_cord\">" + " Time: " + this[1] + " seconds | Coordinates: (" + this[2] + ")</div>";

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

	changeComments();

});

</script>

<div class="whitebox"></div>
<div class="myheader">
	<div class="headerlogo"><img src="vinot.png" alt="Vinot" height="50" width="181"></div>
	<div class="navigation"><a href="XXXXXXXXX.html">Add Video</a></div>
	<div class="navigation"><a href="XXXXXXXXX.html">My Videos</a></div>
	<div class="navigation"><a href="XXXXXXXXX.html">Public Stream</a></div>
	<div class="navigationright"><a href="XXXXXXXXX.html">Log in</a></div>
</div>

<body>
	<div class="mycontent">
		<div class="main_content">
			<div id="player"></div>
			<div class="comment_section">
				<div class="comment_button">
					<button id="start_comment">Comment</button>
					<div class="annotation">Video annotations: </div><input id="mycheckbox" checked type="checkbox"/>
				</div>
				<div id="all_comments"></div>
			</div>
		</div>

		<div class="interactive_click"></div>
		<div class="interactive">
			<textarea></textarea>
			<button id="submit_comment">Submit Comment</button>
		</div>
	</div>
</body>
</html>