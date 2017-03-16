<?php
	$conn = mysqli_connect('localhost','root','','motif');

	if($conn == TRUE){
		//echo 'Connected';
	}else{
		echo 'Not Connected!';
	}