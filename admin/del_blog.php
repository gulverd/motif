<?php
	ob_start();
	include 'db.php';
	$blog_id = $_GET['blog_id'];

	$query   = "DELETE FROM blogs WHERE id = '$blog_id'";
	$run     = mysqli_query($conn,$query);

	header('location: blog.php');
?>