<?php

	ob_start();
	
	include 'db.php';

	$cat_id = $_GET['cat_id'];

	$queryGetProductId = "SELECT id FROM inspirations WHERE inst_cat_id = '$cat_id'";
	$runGetPruductId   = mysqli_query($conn,$queryGetProductId);

	if(mysqli_num_rows($runGetPruductId)>=1){

		while($rowGetProductID = mysqli_fetch_array($runGetPruductId)){
			$product_id = $rowGetProductID['id'];
		
			$query   = "DELETE FROM insp_categories WHERE id = '$cat_id'";
			$run	 = mysqli_query($conn,$query);

			$query2   = "DELETE FROM inspirations WHERE inst_cat_id = '$cat_id'";
			$run2	 = mysqli_query($conn,$query2);

			header('location: inspiration.php');
		}
		
	}else{
		
		$query   = "DELETE FROM insp_categories WHERE id = '$cat_id'";
		$run	 = mysqli_query($conn,$query);
		
		header('location: inspiration.php');
	}

