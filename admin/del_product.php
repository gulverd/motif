<?php
	ob_start();
	include 'db.php';

	$product_id = $_GET['product_id'];

	$query  = "DELETE FROM products WHERE id = '$product_id'";


	$query2 = "DELETE FROM galery WHERE product_id = '$product_id'";
	$run    = mysqli_query($conn,$query);
	$run2   = mysqli_query($conn,$query2);

	header('location:products.php');

