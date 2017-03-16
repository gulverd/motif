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
	<script src="//cdn.ckeditor.com/4.5.11/full/ckeditor.js"></script>
</head>
<body>
	<?php 
		$now = date("YmdHms");
		include 'db.php';
		include 'nav_in.php';
		$query2  = "SELECT * FROM about";
		$run2    = mysqli_query($conn,$query2);

		while($row2 = mysqli_fetch_array($run2)){
			$about_en = $row2['about_en'];
			$about_ge = $row2['about_ge'];
		}
	?>
	<div class="col-md-12">
		<div class="container">
			<div class="col-md-12 dashboard_title_wrp">
				<h2>კომპანიის შესახებ</h2>
			</div>
			<div class="col-md-12 dashboard_buttons_main_wrp">
				<form method="post" action="" enctype="multipart/form-data">
					<div class="form-group">
						<label>კომპანიის შესახებ (ENG)</label>
						<textarea name="desc_en"><?php echo $about_en;?></textarea>
						<script>
		           			CKEDITOR.replace('desc_en');
		       	 		</script>
					</div>
					<div class="form-group">
						<label>კომპანიის შესახებ (GEO)</label>
						<textarea name="desc_ge"><?php echo $about_ge;?></textarea>
						<script>
		           			CKEDITOR.replace('desc_ge');
		       	 		</script>
					</div>
					<div class="form-group">
						<input type="submit" name="submit" value="განახლება" class="btn btn-primary submit">
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</html>

<?php

	if(isset($_POST['submit'])){
		$desc_en 	 = $_POST['desc_en'];
		$desc_ge 	 = $_POST['desc_ge'];


		$query = "UPDATE about SET about_en = '$desc_en', about_ge = '$desc_ge'";
		$run   = mysqli_query($conn,$query);

		header('Location: about.php');
	}