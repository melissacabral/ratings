<?php 
require('config.php');
require_once('functions.php');

//example - rate post #1
$post_id = 1;
$user_id = 1;
?>
<!DOCTYPE html>
<html>
<head>
	<title>Rate this post</title>
	<link rel="stylesheet" type="text/css" href="rating.css">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
</head>
<body>
<h1>Rate this post!</h1>

<form action="#" method="post">
	<span class="star-rating">
	<!-- 	data-id is the primary key for the post (post_id = 1)	 -->
	  <input type="radio" name="rating" value="1" data-id="<?php echo $post_id; ?>"><i></i>
	  <input type="radio" name="rating" value="2" data-id="<?php echo $post_id; ?>"><i></i>
	  <input type="radio" name="rating" value="3" data-id="<?php echo $post_id; ?>"><i></i>
	  <input type="radio" name="rating" value="4" data-id="<?php echo $post_id; ?>"><i></i>
	  <input type="radio" name="rating" value="5" data-id="<?php echo $post_id; ?>"><i></i>
	</span>

</form>
<div id="display-area">
    <?php rating_output( $post_id ); ?>
</div>

<script type="text/javascript">
        $(":radio").click(function() { 
            //get the value of the rating they clicked
            var rating = this.value;      
            var postId = $(this).data("id");  
            var userId = <?php echo $user_id; ?>      
            //create an ajax request to display.php
            $.ajax({   
                type: "GET",
                url: "ajax-handlers/rate-parse.php",  
                data: { 
                    'rating': rating, 
                    'postId': postId,
                    'userId': userId
                    },   
               
              success: function(response){
                $("#display-area").html(response);
                }
            });
        });
         //do stuff during and after ajax is loading (like visual feedback)
        $(document).on({
            ajaxStart: function() { $("#display-area").addClass("loading");    },
            ajaxStop: function() { $("#display-area").removeClass("loading"); } 
        });
    </script>
</body>
</html>
