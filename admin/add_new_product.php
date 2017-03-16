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
	?>
	<div class="col-md-12">
		<div class="container">
			<div class="col-md-12 dashboard_title_wrp">
				<h2>პროდუქციის დამატება</h2>
			</div>
			<div class="col-md-12 buti_wrapper_partners">
				<a href="products.php" class="btn btn-default"><i class="fa fa-long-arrow-left" aria-hidden="true"></i> უკან დაბრუნება</a>
			</div>
			<div class="col-md-12 dashboard_buttons_main_wrp">
				<form method="post" action="" enctype="multipart/form-data">
					<div class="form-group">
						<label>პროდუქტის დასახელება (ENG)</label>
						<input type="text" name="name_en" class="form-control" placeholder="პროდუქტის ინგლისური დასახელება">
					</div>
					<div class="form-group">
						<label>პროდუქტის დასახელება (GEO)</label>
						<input type="text" name="name_ge" class="form-control" placeholder="პროდუქტის ქართული დასახელებაი">
					</div>
					<div class="form-group">
						<label>აირჩიეთ კატეგორია</label>
						<select class="form-control" name="sub_cat_id">
							<?php
								$queryCat = "SELECT * FROM subcategories";
								$runCat   = mysqli_query($conn,$queryCat);

								while($rowCat = mysqli_fetch_array($runCat)){
									$subcategory_id   = $rowCat['id'];
									$subcategory_name = $rowCat['title_ge'];
									echo '<option value="'.$subcategory_id.'">'.$subcategory_name.'</option>'; 
								}
							?>
						</select>
					</div>
					<div class="form-group">
						<label>აირჩიეთ ბრენდი</label>
						<select class="form-control" name="brand_id">
							<?php
								$queryBrand = "SELECT * FROM brands";
								$runBrand   = mysqli_query($conn,$queryBrand);

								while($rowBrand = mysqli_fetch_array($runBrand)){
									$brand_id   = $rowBrand['id'];
									$brand_name = $rowBrand['title_ge'];
									echo '<option value="'.$brand_id.'">'.$brand_name.'</option>'; 
								}
							?>
						</select>
					</div>
					<div class="form-group">
						<label>აირჩიეთ დიზაინერი</label>
						<select class="form-control" name="designer_id">
							<?php
								$queryDesigner = "SELECT * FROM designers";
								$runDesigner   = mysqli_query($conn,$queryDesigner);

								while($rowDesigner = mysqli_fetch_array($runDesigner)){
									$designer_id   = $rowDesigner['id'];
									$designer_name = $rowDesigner['title_en'];
									echo '<option value="'.$designer_id.'">'.$designer_name.'</option>'; 
								}
							?>
						</select>
					</div>
					<div class="form-group">
						<label for="exampleInputFile">პროდუქტის მთავარი სურათი</label>
						<input type="file" class="form-control" id="exampleInputEmail1" name="image">
					</div>
					<div class="form-group">
						<label>პროდუქტის აღწერა (ENG)</label>
						<textarea name="desc_en"></textarea>
		        		<script>
		           			CKEDITOR.replace('desc_en');
		       	 		</script>
					</div>
					<div class="form-group">
						<label>პროდუქტის აღწერა (GEO)</label>
						<textarea name="desc_ge"></textarea>
		        		<script>
		           			CKEDITOR.replace('desc_ge');
		       	 		</script>
					</div>
					<div class="form-group">
						<input type="submit" name="submit" value="დამატება" class="btn btn-primary submit">
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
		$name_en  	 	= $_POST['name_en'];
		$name_ge  	 	= $_POST['name_ge'];
		$sub_cat_id  	= $_POST['sub_cat_id'];
		$brand_id	 	= $_POST['brand_id'];
		$desc_ge 	 	= $_POST['desc_ge'];
		$desc_en 	 	= $_POST['desc_en'];
		$desinger_ida 	= $_POST['designer_id'];
		
		$querya = "SELECT a.parent_id ,b.title_ge as title_ge FROM subcategories a JOIN categories b ON a.parent_id = b.id WHERE a.id = '$sub_cat_id'";
		$runa   = mysqli_query($conn,$querya);

		while($rowa = mysqli_fetch_array($runa)){
			$cat_id 	= $rowa['parent_id'];
				if(isset($_FILES['image'])){
					$errors= array();
					$file_name = $_FILES['image']['name'];
					$file_size = $_FILES['image']['size'];
					$file_tmp  = $_FILES['image']['tmp_name'];
					$file_type = $_FILES['image']['type'];   
					$file_ext  = strtolower(end(explode('.',$_FILES['image']['name'])));
					$extensions = array("jpeg","jpg","png"); 
					$fl_name   = $now.'-'.$file_name;                
					if(empty($errors)==true){
					    move_uploaded_file($file_tmp,"..//imgs/products/".$fl_name);

					    $query = "INSERT INTO products (title_en,title_ge,desc_en,desc_ge,cat_id,brand_id,pic_url,sub_cat_id,designer_id) VALUES ('$name_en','$name_ge','$desc_en','$desc_ge','$cat_id','$brand_id','$fl_name','$sub_cat_id','$desinger_ida')";
						$run   = mysqli_query($conn,$query);

					    header('Location: products.php');
					}else{
					    print_r($errors);
					}
				}
		}


	}