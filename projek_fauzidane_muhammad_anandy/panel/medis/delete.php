<?php 
require_once '../../Control.php';

$id = $_GET['id'];
$query = "DELETE FROM medis WHERE id_med=$id ";
$delete = data($query);
	if($delete){
		header('Location:index.php');
	}


 ?>