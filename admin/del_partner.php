<?php
	ob_start();
	include 'db.php';

	$partner_id = $_GET['partner_id'];

	$query  = "DELETE FROM partners WHERE id = '$partner_id'";
	$run    = mysqli_query($conn,$query);

	header('location:partners.php');

