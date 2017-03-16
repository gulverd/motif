<?php
	ob_start();
	include 'db.php';

	$brand_id = $_GET['brand_id'];

	$queryGetProductId = "SELECT id FROM products WHERE brand_id = '$brand_id'";
	$runGetPruductId   = mysqli_query($conn,$queryGetProductId);

	if(mysqli_num_rows($runGetPruductId)>=1){

		while($rowGetProductID = mysqli_fetch_array($runGetPruductId)){
			$product_id = $rowGetProductID['id'];
			echo $product_id;
		

			$query  = "DELETE FROM brands WHERE id = '$brand_id'";
			$run    = mysqli_query($conn,$query);

			$query2 = "DELETE FROM products WHERE brand_id = '$brand_id'";
			$run2  	= mysqli_query($conn,$query2);

			$query3 = "DELETE FROM galery WHERE product_id = '$product_id'";
			$run3   = mysqli_query($conn,$query3);

			header('location:brands.php');
		}
		
	}else{
		
		$query  = "DELETE FROM brands WHERE id = '$brand_id'";
		$run    = mysqli_query($conn,$query);

		header('location:brands.php');
	}

