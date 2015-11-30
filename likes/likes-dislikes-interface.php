<?php require('../config.php');?>
<!DOCTYPE html>
<html>
<head>
	<title>Like/Dislike buttons + ajax + mysql</title>
	<link rel="stylesheet" type="text/css" href="like.css">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
</head>
<body>
	<h1>Like/Dislike things</h1>
	<?php 
	//get all the things, plus count up their likes and dislikes
	$query = "SELECT things.*, 
			       SUM(CASE WHEN is_like = 1 THEN 1 ELSE 0 END) AS likes, 
			       SUM(CASE WHEN is_like = 0 THEN 1 ELSE 0 END) AS dislikes
			FROM likes_dislikes, things
			WHERE things.thing_id = likes_dislikes.thing_id
			GROUP BY thing_id";
	$result = $db->query($query);
	if ($result->num_rows >= 1) {
		while ($row = $result->fetch_assoc()) { ?>
		<section>
			<h2><?php echo $row['name'] ?></h2>			
			<a class="likebutton like"  
				data-thingid="<?php echo $row['thing_id'] ?>" 
				data-islike="1">
				Like</a>
			<a class="likebutton dislike"  
				data-thingid="<?php echo $row['thing_id'] ?>" 
				data-islike="0">
				Dislike</a>
			<div class="display-area">
				<?php echo $row['likes'] ?> Like this <br>
				<?php echo $row['dislikes'] ?> Dislike this <br>
			</div>
		</section>

		<?php }
	} ?>

	


	<script type="text/javascript">
		$(".likebutton").click(function() {
            //did the user click like or dislike? 
            var is_like = $(this).data("islike");     
            //what thing did they like or dislike?
            var thing_id = $(this).data("thingid"); 
            //get the parent container so we can update the count in the display 
            var parent =  $(this).closest("section");     
            //create an ajax request to display.php
            $.ajax({   
            	type: "GET",
            	url: "like-parse.php",  
            	data: { 'is_like': is_like, 'thing_id' : thing_id },   
                dataType: "html",   //expect html to be returned
                success: function(response){
                	$(".display-area", parent).html(response);
                }
            });
        });
         //do stuff during and after ajax is loading (like visual feedback)
         $(document).on({
         	ajaxStart: function() { $("body").addClass("loading");    },
         	ajaxStop: function() { $("body").removeClass("loading"); } 
         });
     </script>
 </body>
 </html>