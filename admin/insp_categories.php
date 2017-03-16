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
		$now = date("YmdHms");
		include 'db.php';
		include 'nav_in.php';
	?>
	<div class="col-md-12">
		<div class="container">
			<div class="col-md-12 dashboard_title_wrp">
				<h2>Inspiration კატეგორიები</h2>
			</div>
			<div class="col-md-12 buti_wrapper_partners">
				<a href="inspiration.php" class="btn btn-default"><i class="fa fa-long-arrow-left" aria-hidden="true"></i> უკან დაბრუნება</a>
			</div>
			<div class="col-md-12 dashboard_buttons_main_wrp">
				<form method="post" action="" enctype="multipart/form-data">
					<div class="form-group">
						<label>კატეგორიის დასახელება (ENG)</label>
						<input type="text" name="name_en" class="form-control" placeholder="კატეგორიის ინგლისური დასახელება">
					</div>
					<div class="form-group">
						<label>კატეგორიის დასახელება (GEO)</label>
						<input type="text" name="name_ge" class="form-control" placeholder="კატეგორიის ქართული დასახელება">
					</div>
					<div class="form-group">
						<input type="submit" name="submit" value="დამატება" class="btn btn-primary submit">
					</div>
				</form>
			</div>
			<div class="col-md-12 dashboard_buttons_main_wrp">
				<table class="table table-bordered">
					<tr class="table_header">
						<td id="cent_td">კატეგორიის დასახელება (GEO)</td>
						<td id="cent_td">კატეგორიის დასახელება (ENG)</td>
						<td id="cent_td">რედაქტირება</td>
						<td id="cent_td">წაშლა</td>
					</tr>
					<?php 
						$query = "SELECT * FROM insp_categories ORDER BY id DESC";
						$run   = mysqli_query($conn,$query);

						while($row = mysqli_fetch_array($run)){
							$id 	    = $row['id'];
							$title_ge   = $row['title_ge'];
							$title_en   = $row['title_en'];

							echo '<tr>
								<td id="cent_td">'.$title_ge.'</td>
								<td id="cent_td">'.$title_en.'</td>
								<td id="cent_td"><button class="btn btn-primary"><a href="edit_insp_category.php?cat_id='.$id.'"><span class="glyphicon glyphicon-edit"></span> რედაქტირება</a></button></td>
								<td id="cent_td">
									<button class="btn btn-danger">
										<a href="del_insp_category.php?cat_id='.$id.'"><span class="glyphicon glyphicon-remove"></span> წაშლა</a>
									</button>
								</td>
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
		
		$name_en  	 = $_POST['name_en'];
		$name_ge  	 = $_POST['name_ge'];


		$query2 = "INSERT INTO insp_categories (title_en, title_ge) VALUES ('$name_en','$name_ge')";
		$run2   = mysqli_query($conn,$query2);

		header('Location: insp_categories.php');

	}