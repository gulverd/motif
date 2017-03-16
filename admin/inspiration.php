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
	<?php include 'nav_in.php';
		  include 'db.php';
	?>
	<div class="col-md-12">
		<div class="container">
			<div class="col-md-12 dashboard_title_wrp">
				<h2>Inspiration</h2>
			</div>
			<div class="col-md-12 dashboard_buttons_main_wrp">
				<div class="col-md-6 dashboard_buttonsi">
					<a href="insp_categories.php">
					<div class="col-md-12 dashboard_buttons_wrp">
						<h2><i class="fa fa-list" aria-hidden="true"></i> Inspiration კატეგორიები</h2>
					</div>
					</a>
				</div>
				<div class="col-md-6 dashboard_buttonsi">
					<a href="add_inspiration.php">
					<div class="col-md-12 dashboard_buttons_wrp">
						<h2><i class="fa fa-plus" aria-hidden="true"></i> სიახლის დამატება</h2>
					</div>
					</a>
				</div>
			</div>
		</div>
	</div>
			<div class="col-md-12 dashboard_buttons_main_wrp">
				<table class="table table-bordered">
					<tr class="table_header">
						<td id="cent_td">სურათი</td>
						<td id="cent_td">დასახელება (GEO)</td>
						<td id="cent_td">დასახელება (ENG)</td>
						<td id="cent_td">აღწერა (ENG)</td>
						<td id="cent_td">აღწერა (GEO)</td>
						<td id="cent_td">INSPIRATION კატეგორია</td>
						<td id="cent_td">რედაქტირება</td>
						<td id="cent_td">წაშლა</td>
					</tr>
					<?php 
						$query = "SELECT * FROM inspirations ORDER BY id DESC";
						$run   = mysqli_query($conn,$query);

						while($row = mysqli_fetch_array($run)){
							$id 	     = $row['id'];
							$title_ge    = $row['title_ge'];
							$title_en    = $row['title_en'];
							$desc_en 	 = $row['desc_en'];
							$desc_ge 	 = $row['desc_ge'];
							$pic_url     = $row['pic_url'];
							$insp_cat_id = $row['inst_cat_id'];

							$querya      = "SELECT * FROM insp_categories WHERE id = '$insp_cat_id'";
							$runa 	     = mysqli_query($conn,$querya);

							while($rowa = mysqli_fetch_array($runa)){
								$insp_category = $rowa['title_ge'];
							}
								
							if($desc_ge == '' or is_null($desc_ge)){
								$desc_ge = '<span class="glyphicon glyphicon-remove" id="del"></span>';
							}else{
								$desc_ge = '<span class="glyphicon glyphicon-ok" id="ok"></span>';
							}

							if($desc_en == '' or is_null($desc_en)){
								$desc_en = '<span class="glyphicon glyphicon-remove" id="del"></span>';
							}else{
								$desc_en = '<span class="glyphicon glyphicon-ok" id="ok"></span>';
							}

							echo '<tr>
								<td id="cent_td"><img src="..//imgs/inspirations/'.$pic_url.'" id="partn_img"></td>
								<td id="cent_td">'.$title_ge.'</td>
								<td id="cent_td">'.$title_en.'</td>
								<td id="cent_td">'.$desc_en.'</td>
								<td id="cent_td">'.$desc_ge.'</td>
								<td id="cent_td">'.$insp_category.'</td>
								<td id="cent_td"><button class="btn btn-primary"><a href="edit_inspiration.php?insp_id='.$id.'"><span class="glyphicon glyphicon-edit"></span> რედაქტირება</a></button></td>
								<td id="cent_td">
									<button class="btn btn-danger">
										<a href="del_inspiration.php?insp_id='.$id.'"><span class="glyphicon glyphicon-remove"></span> წაშლა</a>
									</button>
								</td>
							</tr>'; 
						}

					?>
				</table>
			</div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</html>