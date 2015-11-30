<?php
/**
 * DISPLAY OUTPUT
 * This file gets loaded by the ajax request
 * It is identical whether using jquery or pure ajax
 * note that it has no doctype and is not intended as a standalone file. 
 */
require('../config.php');

//data coming from jquery .ajax() call
$id = $_REQUEST['thing_id'];
$rating = $_REQUEST['rating'];

//add the rating to the db
$query = "INSERT INTO ratings 
		(thing_id, rating)
		VALUES 
		($id, $rating)";
//run it
$result = $db->query($query);

//check
if($db->affected_rows == 1){
	echo '<b>Thanks for rating '. $rating .' stars</b>';
	
	//calculate the new average rating
	$query = "SELECT AVG(rating) AS average FROM ratings WHERE thing_id = $id";
	$result = $db->query($query);
	$row = $result->fetch_assoc();
	echo '<br>The rounded average rating is '. round($row['average']);
	echo '<br>The true average rating is ' . $row['average'];
	
}else{
	echo 'Sorry, the rating did not work';
}