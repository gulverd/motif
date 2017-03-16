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
				<h2>პროდუქცია</h2>
			</div>
			<div class="col-md-12 buti_wrapper_partners">
				<a href="add_new_product.php" class="btn btn-default"><i class="fa fa-plus" aria-hidden="true"></i> პროდუქტის დამატება</a>
			</div>
		</div>
					<div class="col-md-12 dashboard_buttons_main_wrp">

					<?php 
						$query = "SELECT * FROM products ORDER BY id DESC";
						$run   = mysqli_query($conn,$query);

						if(mysqli_num_rows($run) >=1){
							echo 
							'<table class="table table-striped table-hover table-bordered">
								<tr class="table_header">
									<td id="cent_td">მთავარი სურათი</td>
									<td id="cent_td">დასახელება (ENG)</td>
									<td id="cent_td">დასახელება (GEO)</td>
									<td id="cent_td">აღწერა (ENG)</td>
									<td id="cent_td">აღწერა (GEO)</td>
									<td id="cent_td">კატეგორია</td>
									<td id="cent_td">ქვეკატეგორია</td>
									<td id="cent_td">ბრენდი</td>
									<td id="cent_td">დიზაინერი</td>
									<td id="cent_td">გალერეა</td>
									<td id="cent_td">რედაქტირება</td>
									<td id="cent_td">წაშლა</td>
								</tr>';
							while($row = mysqli_fetch_array($run)){
								$id 		 	= $row['id'];
								$title_ge 	 	= $row['title_ge'];
								$title_en	 	= $row['title_en'];;
								$desc_ge		= $row['desc_ge'];
								$desc_en 		= $row['desc_en'];
								$pic_url		= $row['pic_url'];
								$cat_id 		= $row['cat_id'];
								$brand_id 		= $row['brand_id'];
								$sub_cat_id     = $row['sub_cat_id'];
								$designer_id    = $row['designer_id'];

								$queryCat = "SELECT * FROM categories WHERE id = '$cat_id'";
								$runCat   = mysqli_query($conn,$queryCat);

								while($rowCat = mysqli_fetch_array($runCat)){
									$category_name = $rowCat['title_ge'];
								}

								$querySubCat = "SELECT * FROM subcategories WHERE id = '$sub_cat_id'";
								$runSubCat   = mysqli_query($conn,$querySubCat);

								while($rowSubCat = mysqli_fetch_array($runSubCat)){
									$subcategory_name = $rowSubCat['title_ge'];
								}

								$queryBrand = "SELECT * FROM brands WHERE id = '$brand_id'";
								$runBrand   = mysqli_query($conn,$queryBrand);

								while($rowBrand = mysqli_fetch_array($runBrand)){
									$brand_name = $rowBrand['title_ge'];
								}

								$queryDesigner = "SELECT * FROM designers WHERE id = '$designer_id'";
								$runDesigner   = mysqli_query($conn,$queryDesigner);

								while($rowDesigner = mysqli_fetch_array($runDesigner)){
									$designer_name = $rowDesigner['title_en'];
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

								echo
								'
									<tr>
										<td id="cent_td"><img src="..//imgs/products/'.$pic_url.'" id="partn_img"></td>
										<td id="cent_td">'.$title_en.'</td>
										<td id="cent_td">'.$title_ge.'</td>
										<td id="cent_td">'.$desc_en.'</td>
										<td id="cent_td">'.$desc_ge.'</td>
										<td id="cent_td">'.$category_name.'</td>
										<td id="cent_td">'.$subcategory_name.'</td> 
										<td id="cent_td">'.$brand_name.'</td>
										<td id="cent_td">'.$designer_name.'</td>
										<td id="cent_td"><button class="btn btn-success"><a href="galery_product.php?product_id='.$id.'"><i class="fa fa-camera" aria-hidden="true"></i> გალერეა</button></a></td>
										<td id="cent_td"><button class="btn btn-primary"><a href="edit_product.php?product_id='.$id.'"><span class="glyphicon glyphicon-edit"></span> რედაქტირება</button></a></td>
										<td id="cent_td"><button class="btn btn-danger"><a href="del_product.php?product_id='.$id.'"><span class="glyphicon glyphicon-remove"></span> წაშლა</button></a></td>
									</tr>
								';
							}
							echo '</table>';
						}else{
							echo '<div class="alert alert-danger" role="alert">არ არის ჩანაწერები!</div>';
						}

					?>
			</div>
	</div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</html>