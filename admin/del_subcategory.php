<?php
	ob_start();
	include 'db.php';

	$cat_id = $_GET['cat_id'];

	$queryGetProductId = "SELECT id FROM products WHERE sub_cat_id = '$cat_id'";
	$runGetPruductId   = mysqli_query($conn,$queryGetProductId);

	if(mysqli_num_rows($runGetPruductId)>=1){

		while($rowGetProductID = mysqli_fetch_array($runGetPruductId)){
			$product_id = $rowGetProductID['id'];

			$query2 = "DELETE FROM products WHERE sub_cat_id = '$cat_id'";
			$run2  	= mysqli_query($conn,$query2);

			$query3 = "DELETE FROM galery WHERE product_id = '$product_id'";
			$run3   = mysqli_query($conn,$query3);

			$query4 = "DELETE FROM subcategories WHERE id = '$cat_id'";
			$run4   = mysqli_query($conn,$query4);

			header('location:sub_categories.php');
		}
		
	}else{
	
		$query4 = "DELETE FROM subcategories WHERE id = '$cat_id'";
		$run4   = mysqli_query($conn,$query4);

		header('location:sub_categories.php');
	}

