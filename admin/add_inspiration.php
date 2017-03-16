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
		include 'nav_in.php';
		include 'db.php';
		$now = date("Y-m-d H:m");
	?>
	<div class="col-md-12">
		<div class="container">
			<div class="col-md-12 dashboard_title_wrp">
				<h2>Inspirations</h2>
			</div>
			<div class="col-md-12 dashboard_buttons_main_wrp">
				<form method="post" action="" enctype="multipart/form-data">
					<div class="form-group">
						<label>აირჩიეთ INSPIRATION კატეგორია</label>
						<select class="form-control" name="insp_cat_id">
							<?php
								$query2 = "SELECT * FROM insp_categories";
								$run2   = mysqli_query($conn,$query2);

								while($row2 = mysqli_fetch_array($run2)){
									$insp_cat_name = $row2['title_ge'];
									$insp_id 	   = $row2['id'];

									echo '<option value="'.$insp_id.'">'.$insp_cat_name.'</option>';
								}
							?>
						</select>
					</div>					
					<div class="form-group">
						<label>სათაური (ENG)</label>
						<input type="text" name="title_en" class="form-control" placeholder="ინგლისური სათაური">
					</div>
					<div class="form-group">
						<label>სათაური (GEO)</label>
						<input type="text" name="title_ge" class="form-control" placeholder="ქართული სათაური">
					</div>
					<div class="form-group">
						<label>სურათი</label>
						<input type="file" class="form-control" id="exampleInputEmail1" name="image">
					</div>	
					<div class="form-group">
						<label>შინაარსი (ENG)</label>
						<textarea name="desc_en"></textarea>
		        		<script>
		           			CKEDITOR.replace( 'desc_en' );
		       	 		</script>
					</div>
					<div class="form-group">
						<label>შინაარსი (GEO)</label>
						<textarea name="desc_ge"></textarea>
		        		<script>
		           			CKEDITOR.replace( 'desc_ge' );
		       	 		</script>
					</div>
					<div class="form-group">
						<input type="submit" name="submit" class="btn btn-primary" value="დამატება">
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
		$title_en  	 = $_POST['title_en'];
		$title_ge  	 = $_POST['title_ge'];
		$desc_en  	 = $_POST['desc_en'];
		$desc_ge  	 = $_POST['desc_ge'];
		$insp_cat_id = $_POST['insp_cat_id'];

		if(isset($_FILES['image'])){
			$errors= array();
			$file_name = $_FILES['image']['name'];
			$file_size = $_FILES['image']['size'];
			$file_tmp  = $_FILES['image']['tmp_name'];
			$file_type = $_FILES['image']['type'];   
			$file_ext  = strtolower(end(explode('.',$_FILES['image']['name'])));
			$extensions = array("jpeg","jpg","png"); 
			$fl_name   = $file_name;                
			if(empty($errors)==true){
			    move_uploaded_file($file_tmp,"..//imgs/inspirations/".$fl_name);          
			    $query = "INSERT INTO inspirations (title_en,title_ge,desc_en,desc_ge,pic_url,inst_cat_id) VALUES ('$title_en','$title_ge','$desc_en','$desc_ge','$fl_name','$insp_cat_id')";
				$run   = mysqli_query($conn,$query);
			    header('Location: inspiration.php');
			}else{
			    print_r($errors);
			}
		}

	}