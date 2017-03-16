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
		
		$partner_id = $_GET['partner_id'];

		$now = date("YmdHms");
		include 'db.php';
		include 'nav_in.php';

		$query1 	= "SELECT * FROM partners WHERE id  = '$partner_id'";
		$run1 		= mysqli_query($conn,$query1);

		while($row1 = mysqli_fetch_array($run1)){
			$name_ge1 	 	= $row1['title_ge'];
			$name_en1 	 	= $row1['title_en'];
			$pic_url1 		= $row1['pic_url'];
		}
	?>
	<div class="col-md-12">
		<div class="container">
			<div class="col-md-12 dashboard_title_wrp">
				<h2>პარტნიორები</h2>
			</div>
			<div class="col-md-12 buti_wrapper_partners">
				<a href="partners.php" class="btn btn-default"><i class="fa fa-long-arrow-left" aria-hidden="true"></i> უკან დაბრუნება</a>
			</div>
			<div class="col-md-12 dashboard_buttons_main_wrp">
				<form method="post" action="" enctype="multipart/form-data">
					<div class="form-group">
						<label>სახელი (ENG)</label>
						<input type="text" name="name_en" class="form-control" placeholder="ინგლისური დასახელება" value="<?php echo $name_en1;?>">
					</div>
					<div class="form-group">
						<label>სახელი (GEO)</label>
						<input type="text" name="name_ge" class="form-control" placeholder="ქართული დასახელება" value="<?php echo $name_ge1;?>">
					</div>
					<div class="form-group">
						<label>არსებული სურათი</label></br>
						<img src="..//imgs/partners/<?php echo $pic_url1;?>" id="ex_logo">
					</div>
					<div class="form-group">
						<label for="exampleInputFile">პარტნიორის სურათი</label>
						<input type="file" class="form-control" id="exampleInputEmail1" name="image">
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

		if(isset($_FILES['image'])){
			$errors= array();
			$file_name = $_FILES['image']['name'];
			$file_size = $_FILES['image']['size'];
			$file_tmp  = $_FILES['image']['tmp_name'];
			$file_type = $_FILES['image']['type'];   
			$file_ext  = strtolower(end(explode('.',$_FILES['image']['name'])));
			$extensions = array("jpeg","jpg","png"); 
			$fl_name   = $now.'-'.substr($file_name);                
			if(empty($errors)==true){
			    move_uploaded_file($file_tmp,"..//imgs/partners/".$fl_name);
			    if($file_name != ''){
			    	$query = "UPDATE partners SET title_en = '$name_en', title_ge = '$name_ge', pic_url = '$fl_name' WHERE id = '$partner_id'";
					$run   = mysqli_query($conn,$query);
			    }else{
			    	$query = "UPDATE partners SET title_en = '$name_en', title_ge = '$name_ge', WHERE id = '$partner_id'";
					$run   = mysqli_query($conn,$query);
			    }
			    

			    header('Location: partners.php');
			}else{
			    print_r($errors);
			}
		}

	}