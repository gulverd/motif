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
				<h2>მენეჯმენტი</h2>
			</div>
			<div class="col-md-12 buti_wrapper_partners">
				<a href="team.php" class="btn btn-default"><i class="fa fa-long-arrow-left" aria-hidden="true"></i> უკან დაბრუნება</a>
			</div>
			<div class="col-md-12 dashboard_buttons_main_wrp">
				<form method="post" action="" enctype="multipart/form-data">
					<div class="form-group">
						<label>სახელი (ENG)</label>
						<input type="text" name="name_en" class="form-control" placeholder="თანამშრომლის სახელი და გვარი">
					</div>
					<div class="form-group">
						<label>სახელი (GEO)</label>
						<input type="text" name="name_ge" class="form-control" placeholder="თანამშრომლის სახელი და გვარი">
					</div>
					<div class="form-group">
						<label>პოზიცია (ENG)</label>
						<input type="text" name="position_en" class="form-control" placeholder="თანამშრომლის პოზიცია">
					</div>
					<div class="form-group">
						<label>პოზიცია (GEO)</label>
						<input type="text" name="position_ge" class="form-control" placeholder="თანამშრომლის პოზიცია">
					</div>
					<div class="form-group">
						<label for="exampleInputFile">თანამრომლის სურათი</label>
						<input type="file" class="form-control" id="exampleInputEmail1" name="image">
					</div>
					<div class="form-group">
						<label>ბიოგრაფია (ENG)</label>
						<textarea name="desc_en"></textarea>
		        		<script>
		           			CKEDITOR.replace('desc_en');
		       	 		</script>
					</div>
					<div class="form-group">
						<label>ბიოგრაფია (GEO)</label>
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
		$name_en  	 = $_POST['name_en'];
		$name_ge  	 = $_POST['name_ge'];
		$position_en = $_POST['position_en'];
		$position_ge = $_POST['position_ge'];
		$desc_ge 	 = $_POST['desc_ge'];
		$desc_en 	 = $_POST['desc_en'];


		if(isset($_FILES['image'])){
			$errors= array();
			$file_name = $_FILES['image']['name'];
			$file_size = $_FILES['image']['size'];
			$file_tmp  = $_FILES['image']['tmp_name'];
			$file_type = $_FILES['image']['type'];   
			$file_ext  = strtolower(end(explode('.',$_FILES['image']['name'])));
			$extensions = array("jpeg","jpg","png"); 
			$fl_name   = $now.'-'.substr($file_name, -7);                
			if(empty($errors)==true){
			    move_uploaded_file($file_tmp,"..//imgs/employees/".$fl_name);

			    $query = "INSERT INTO team (name_en,name_ge,position_en,position_ge,desc_en,desc_ge,pic_url) VALUES ('$name_en','$name_ge','$position_en','$position_ge','$desc_en','$desc_ge','$fl_name')";
				$run   = mysqli_query($conn,$query);

			    header('Location: team.php');
			}else{
			    print_r($errors);
			}
		}

	}