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
		
		$insp_id = $_GET['insp_id'];
		$now     = date("YmdHms");
		include 'db.php';
		include 'nav_in.php';

		$query1 	= "SELECT * FROM inspirations WHERE id  = '$insp_id'";
		$run1 		= mysqli_query($conn,$query1);

		while($row1 = mysqli_fetch_array($run1)){
			$title_en1 	 	= $row1['title_en'];
			$title_ge1  	= $row1['title_ge'];
			$desc_ge1		= $row1['desc_ge'];
			$desc_en1 		= $row1['desc_en'];
			$pic_url1 		= $row1['pic_url'];
			$insp_cat_id    = $row1['inst_cat_id'];
		}
	?>
	<div class="col-md-12">
		<div class="container">
			<div class="col-md-12 dashboard_title_wrp">
				<h2>პროდუქცია</h2>
			</div>
			<div class="col-md-12 buti_wrapper_partners">
				<a href="inspiration.php" class="btn btn-default"><i class="fa fa-long-arrow-left" aria-hidden="true"></i> უკან დაბრუნება</a>
			</div>
			<div class="col-md-12 dashboard_buttons_main_wrp">
				<form method="post" action="" enctype="multipart/form-data">
					<div class="form-group">
						<label>აირჩიეთ კატეგორია</label>
						<select class="form-control" name="cat_id">
							<?php
								$querCat1 = "SELECT * FROM insp_categories WHERE id ='$insp_cat_id'";
								$runCat1  = mysqli_query($conn,$querCat1);

								while($rowCat1 = mysqli_fetch_array($runCat1)){
									$category_id1   = $rowCat1['id'];
									$category_name1 = $rowCat1['title_ge'];
									echo '<option value="'.$category_id1.'">'.$category_name1.'</option>'; 
								}

								$queryCat = "SELECT * FROM insp_categories where id != '$insp_cat_id'";
								$runCat   = mysqli_query($conn,$queryCat);

								while($rowCat = mysqli_fetch_array($runCat)){
									$category_id   = $rowCat['id'];
									$category_name = $rowCat['title_ge'];
									echo '<option value="'.$category_id.'">'.$category_name.'</option>'; 
								}
							?>
						</select>
					</div>
					<div class="form-group">
						<label>დასახელება (ENG)</label>
						<input type="text" name="name_en" class="form-control" placeholder="პროდუქტის ინგლისური დასახელება" value="<?php echo $title_en1;?>">
					</div>
					<div class="form-group">
						<label>დასახელება (GEO)</label>
						<input type="text" name="name_ge" class="form-control" placeholder="პროდუქტის ქართული დასახელება" value="<?php echo $title_ge1;?>">
					</div>
					<div class="form-group">
						<label>არსებული მთავარი სურათი</label></br>
						<img src="..//imgs/inspirations/<?php echo $pic_url1;?>" id="ex_logo">
					</div>
					<div class="form-group">
						<label for="exampleInputFile">პროდუქტის მთავარი სურათი</label>
						<input type="file" class="form-control" id="exampleInputEmail1" name="image">
					</div>
					<div class="form-group">
						<label>პროდუქტის აღწერა (ENG)</label>
						<textarea name="desc_en"><?php echo $desc_en1;?></textarea>
		        		<script>
		           			CKEDITOR.replace('desc_en');
		       	 		</script>
					</div>
					<div class="form-group">
						<label>პროდუქტის აღწერა (GEO)</label>
						<textarea name="desc_ge"><?php echo $desc_ge1;?></textarea>
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
		$name_en  	 = $_POST['name_en'];
		$name_ge  	 = $_POST['name_ge'];
		$desc_ge 	 = $_POST['desc_ge'];
		$desc_en 	 = $_POST['desc_en'];
		$cata_id 	 = $_POST['cat_id'];


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
			    move_uploaded_file($file_tmp,"..//imgs/inspirations/".$fl_name);
			    if($file_name != ''){
			    	$query = "UPDATE inspirations SET title_en = '$name_en', title_ge = '$name_ge', desc_ge = '$desc_ge', desc_en = '$desc_en', pic_url = '$fl_name' , inst_cat_id = '$cata_id' WHERE id = '$insp_id'";
					$run   = mysqli_query($conn,$query);
			    }else{
			    	$query = "UPDATE inspirations SET title_en = '$name_en', title_ge = '$name_ge', desc_ge = '$desc_ge', desc_en = '$desc_en', inst_cat_id = '$cata_id' WHERE id = '$insp_id'";
					$run   = mysqli_query($conn,$query);
			    }
			    

			    header('Location: inspiration.php');
			}else{
			    print_r($errors);
			}
		}

	}