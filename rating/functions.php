<?php  
function rating_output( $post_id ){
	global $DB;
	//calculate the average rating
	$result= $DB->prepare("SELECT AVG(rating) AS average FROM ratings WHERE post_id = ?");
	$result->execute(array($post_id));
	$row = $result->fetch();
	echo '<br>The rounded average rating is '. round($row['average']);
	echo '<br>The true average rating is ' . $row['average'];
}