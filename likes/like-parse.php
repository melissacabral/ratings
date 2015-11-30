<?php
/**
 * DISPLAY OUTPUT
 * This file gets loaded by the ajax request
 * It is identical whether using jquery or pure ajax
 * note that it has no doctype and is not intended as a standalone file.
 * This file never leaves the server. its output is passed through the ajax call 
 */
require('../config.php');

//data coming from jquery .ajax() call
$thing_id = $_REQUEST['thing_id'];
$is_like = $_REQUEST['is_like'];

//add the rating to the db
$query = "INSERT INTO likes_dislikes 
		(thing_id, is_like)
		VALUES 
		($thing_id, $is_like)";
//run it
$result = $db->query($query);

//check
if($db->affected_rows == 1){
	//calculate the new average  number of likes
	$query = "SELECT 
				SUM(IF(is_like = 1, 1, 0) ) AS likes,
				SUM(IF(is_like = 0, 1, 0)) AS dislikes

			FROM likes_dislikes
			WHERE thing_id = $thing_id";
	$result = $db->query($query);
	$row = $result->fetch_assoc();
	echo $row['likes'] . ' Like this <br>';
	echo $row['dislikes'] . ' dislike this';
	
}else{
	echo 'Sorry, the rating did not work';
}