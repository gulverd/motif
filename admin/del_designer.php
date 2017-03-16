<?php
	ob_start();
	include 'db.php';

	$designer_id = $_GET['designer_id'];

	$queryGetProductId = "SELECT id FROM products WHERE designer_id = '$designer_id'";
	$runGetPruductId   = mysqli_query($conn,$queryGetProductId);

	if(mysqli_num_rows($runGetPruductId)>=1){

		while($rowGetProductID = mysqli_fetch_array($runGetPruductId)){
			$product_id = $rowGetProductID['id'];

			$query2 = "DELETE FROM products WHERE designer_id = '$designer_id'";
			$run2  	= mysqli_query($conn,$query2);

			$query3 = "DELETE FROM galery WHERE product_id = '$product_id'";
			$run3   = mysqli_query($conn,$query3);

			$query4 = "DELETE FROM designers WHERE id = '$designer_id'";
			$run4   = mysqli_query($conn,$query4);

			header('location:designers.php');
		}
		
	}else{
	
		$query4 = "DELETE FROM designers WHERE id = '$designer_id'";
		$run4   = mysqli_query($conn,$query4);

		header('location:designers.php');
	}

