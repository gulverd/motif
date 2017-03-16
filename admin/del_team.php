<?php ob_start();?>
<?php
		
		include 'db.php';
		$team_id = $_GET['team_id'];


	$query1 = "DELETE FROM team WHERE id = '$team_id'";
	$run1   = mysqli_query($conn,$query1);
	header('Location: team.php');

?>
