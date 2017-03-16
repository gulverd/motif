<?php ob_start();?>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="user-scalable=0, initial-scale=1.0">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
	<title>MOTIF.GE - Admin</title>
	<link href="https://fonts.googleapis.com/css?family=Advent+Pro" rel="stylesheet">
</head>
<body>
	<?php 
		include 'db.php';
		include 'nav_in.php';
	?>
	<div class="col-md-12">
		<div class="container">
			<div class="col-md-12 dashboard_title_wrp">
				<h2>ვიდეოები</h2>
			</div>
			<div class="col-md-12 dashboard_buttons_main_wrp">
				<form action="" method="POST">
					<div class="form-group">
						<label id="label">Youtube ვიდეოს ლინკი</label>
						<input type="text" name="youtube_url" class="form-control" placeholder="მაგ : https://www.youtube.com/watch?v=ctzgBpynGQQ">
					</div>
					<div class="form-group">
						<input type="submit" name="submit" value="დამატება" class="btn btn-primary">
					</div>
				</form>
			</div>
			<div class="col-md-12 dashboard_buttons_main_wrp">
				<table class="table table-bordered">
					<tr>
						<td id="cent_td">ვიდეო</td>
						<td id="cent_td">წაშლა</td>
					</tr>
					<?php 
						$query = "SELECT * FROM videos ORDER BY id DESC";
						$run   = mysqli_query($conn,$query);

						while($row = mysqli_fetch_array($run)){
							$id 	    = $row['id'];
							$video_url  = $row['video_url'];
							$youtubeID = substr(ltrim($video_url),32); 

							echo '<tr>
								<td id="cent_td"><iframe width="100%" height="170" src="https://www.youtube.com/embed/'.$youtubeID.'" frameborder="0" allowfullscreen></iframe></td>
								<td id="cent_td"><a href="del_video.php?video_id='.$id.'"><i class="fa fa-trash-o" aria-hidden="true" id="del"></i></a></td>
							</tr>'; 
						}

					?>
				</table>
			</div>
		</div>
	</div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</html>

<?php 

	if(isset($_POST['submit'])){
		$video = $_POST['youtube_url'];

		$query2 = "INSERT INTO videos (video_url) VALUES ('$video')";
		$run2   = mysqli_query($conn,$query2);

		header( "refresh:0;" );
	}