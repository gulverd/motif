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
				<h2>სერვისები</h2>
			</div>
			<div class="col-md-12 dashboard_buttons_main_wrp">
				<form action="" method="post" enctype="multipart/form-data">
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
		$img  		 = $_FILES['image'];
		$title_en  	 = $_POST['title_en'];
		$title_ge  	 = $_POST['title_ge'];
		$desc_en  	 = $_POST['desc_en'];
		$desc_ge  	 = $_POST['desc_ge'];

		if(isset($_FILES['image'])){
			$errors     = array();
			$file_name  = $_FILES['image']['name'];
			$file_size  = $_FILES['image']['size'];
			$file_tmp   = $_FILES['image']['tmp_name'];
			$file_type  = $_FILES['image']['type'];   
			$file_ext   = strtolower(end(explode('.',$_FILES['image']['name'])));
			$extensions = array("jpeg","jpg","png"); 
			$fl_name    = $file_name;                
			if(empty($errors)==true){
			    move_uploaded_file($file_tmp,"..//imgs/services/".$fl_name);
			    $query = "INSERT INTO services (title_en,title_ge,desc_en,desc_ge,pic_url) VALUES ('$title_en','$title_ge','$desc_en','$desc_ge','$fl_name')";
				$run   = mysqli_query($conn,$query);
			    header('Location: services.php');
			}else{
			    print_r($errors);
			}
		}

	}