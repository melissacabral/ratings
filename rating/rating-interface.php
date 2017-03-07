<?php require('../config.php');?>
<!DOCTYPE html>
<html>
<head>
	<title>Rate this thing</title>
	<link rel="stylesheet" type="text/css" href="rating.css">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
</head>
<body>
<h1>Rate this thing!</h1>

<form action="#" method="post">
	<span class="star-rating">
	<!-- 	data-id is the primary key for the thing (thing_id = 1)	 -->
	  <input type="radio" name="rating" value="1" data-id="1"><i></i>
	  <input type="radio" name="rating" value="2" data-id="1"><i></i>
	  <input type="radio" name="rating" value="3" data-id="1"><i></i>
	  <input type="radio" name="rating" value="4" data-id="1"><i></i>
	  <input type="radio" name="rating" value="5" data-id="1"><i></i>
	</span>


</form>
<div id="display-area"></div>

<script type="text/javascript">
        $(":radio").click(function() { 
            //get the value of the category they clicked
            var rating = this.value;      
            var thing_id = $(this).data("id");        
            //create an ajax request to display.php
            $.ajax({   
                type: "GET",
                url: "rate-parse.php",  
                data: { 'rating': rating, 'thing_id' : thing_id },   
                dataType: "html",   //expect html to be returned
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
