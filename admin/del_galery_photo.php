<?php
	ob_start();
	include 'db.php';
	$product_id = $_GET['product_id'];
	$img_id	 	= $_GET['img_id'];

	$query = "DELETE FROM galery WHERE id = '$img_id'";
	$run   = mysqli_query($conn,$query);

	header('location: galery_product.php?product_id='.$product_id);