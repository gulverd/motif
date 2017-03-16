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
		
		$cat_id = $_GET['cat_id'];
		$now = date("YmdHms");
		include 'db.php';
		include 'nav_in.php';

		$query1 	= "SELECT * FROM insp_categories WHERE id  = '$cat_id'";
		$run1 		= mysqli_query($conn,$query1);

		while($row1 = mysqli_fetch_array($run1)){
			$title_en1      = $row1['title_en'];
			$title_ge1      = $row1['title_ge'];
		}
	?>
	<div class="col-md-12">
		<div class="container">
			<div class="col-md-12 dashboard_title_wrp">
				<h2>INSPIRATION კატეგორიები</h2>
			</div>
			<div class="col-md-12 buti_wrapper_partners">
				<a href="insp_categories.php" class="btn btn-default"><i class="fa fa-long-arrow-left" aria-hidden="true"></i> უკან დაბრუნება</a>
			</div>
			<div class="col-md-12 dashboard_buttons_main_wrp">
				<form method="post" action="" enctype="multipart/form-data">
					<div class="form-group">
						<label>კატეგორიის დასახელება (ENG)</label>
						<input type="text" name="name_en" class="form-control" placeholder="კატეგორიის ინგლისური დასახელება" value="<?php echo $title_en1;?>">
					</div>
					<div class="form-group">
						<label>კატეგორიის დასახელება (GEO)</label>
						<input type="text" name="name_ge" class="form-control" placeholder="კატეგორიის ქართული დასახელება" value="<?php echo $title_ge1;?>">
					</div>
					<div class="form-group">
						<input type="submit" name="submit" value="შეცვლა" class="btn btn-primary submit">
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
		$title_en  	 = $_POST['name_en'];
		$title_ge  	 = $_POST['name_ge'];

	
		$query = "UPDATE insp_categories SET title_en = '$title_en', title_ge = '$title_ge' WHERE id = '$cat_id'";
		$run   = mysqli_query($conn,$query);

		header('Location: insp_categories.php');
	

	}