<?php 
session_start();
$link = mysqli_connect('localhost','root','','poliklinik');
function data($query){
	global $link;
	$result = mysqli_query($link,$query);
	return $result;
}

?>