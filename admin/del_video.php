<?php
	ob_start();
	include 'db.php';

	$video_id	= $_GET['video_id'];

	$query = "DELETE FROM videos WHERE id = '$video_id'";
	$run   = mysqli_query($conn,$query);

	header('location:videos.php' );