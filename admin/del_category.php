<?php
	ob_start();
	include 'db.php';

	$cat_id = $_GET['cat_id'];

	$queryGetProductId = "SELECT id FROM products WHERE cat_id = '$cat_id'";
	$runGetPruductId   = mysqli_query($conn,$queryGetProductId);

	if(mysqli_num_rows($runGetPruductId)>=1){

		while($rowGetProductID = mysqli_fetch_array($runGetPruductId)){
			$product_id = $rowGetProductID['id'];
		
			$query  = "DELETE FROM categories WHERE id = '$cat_id'";
			$run    = mysqli_query($conn,$query);

			$query2 = "DELETE FROM products WHERE cat_id = '$cat_id'";
			$run2  	= mysqli_query($conn,$query2);

			$query3 = "DELETE FROM galery WHERE product_id = '$product_id'";
			$run3   = mysqli_query($conn,$query3);

			$query4 = "DELETE FROM subcategories WHERE parent_id = '$cat_id'";
			$run4   = mysqli_query($conn,$query4);

			header('location:categories.php');
		}
		
	}else{
		
		$query  = "DELETE FROM categories WHERE id = '$cat_id'";
		$run    = mysqli_query($conn,$query);
		
		$query4 = "DELETE FROM subcategories WHERE parent_id = '$cat_id'";
		$run4   = mysqli_query($conn,$query4);

		header('location:categories.php');
	}

