<?php

	ob_start();
	
	include 'db.php';

	$insp_id = $_GET['insp_id'];

	$query   = "DELETE FROM inspirations WHERE id = '$insp_id'";
	$run	 = mysqli_query($conn,$query);

	header('location: inspiration.php');

?>