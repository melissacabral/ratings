<?php
/**
 * DISPLAY OUTPUT
 * This file gets loaded by the ajax request
 * It is identical whether using jquery or pure ajax
 * note that it has no doctype and is not intended as a standalone file. 
 */
require('../config.php');
require_once('../functions.php');

//data coming from jquery .ajax() call
$post_id 	= filter_var($_REQUEST['postId'], FILTER_SANITIZE_NUMBER_INT);
$user_id 	= filter_var($_REQUEST['userId'], FILTER_SANITIZE_NUMBER_INT);
$rating 	= filter_var($_REQUEST['rating'],  FILTER_SANITIZE_NUMBER_INT);

//add the rating to the db

$result = $DB->prepare("INSERT INTO ratings 
					(post_id, user_id, rating)
					VALUES 
					(?, ?, ?)");
$result->execute(array($post_id, $user_id, $rating));
//check
if($result->rowCount() >= 1){
	echo '<b>Thanks for rating '. $rating .' stars</b>';
	
	rating_output($post_id);
	
}else{
	echo 'Sorry, the rating did not work';
}