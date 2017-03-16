<?php
	ob_start();
	include 'db.php';
	$costumer_id = $_GET['costumer_id'];

	$query = "DELETE FROM costumers_say WHERE id = '$costumer_id'";
	$run   = mysqli_query($conn,$query);

	header('location: costumers.php');