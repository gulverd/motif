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
		include 'db.php';
		include 'nav_in.php';

		$product_id = $_GET['product_id'];
		$now = date("YmdHms");
		$querya = "SELECT * FROM products WHERE id = '$product_id' ORDER BY id DESC";
		$runa   = mysqli_query($conn,$querya);

		while ($rowa = mysqli_fetch_array($runa)) {
			$product_title = $rowa['title_ge'];
		}

	?>
	<div class="col-md-12">
		<div class="container">
			<div class="col-md-12 dashboard_title_wrp">
				<h2>გალერეა <span><?php echo $product_title;?></span> </h2>
			</div>
			<div class="col-md-12 buti_wrapper_partners">
				<a href="products.php" class="btn btn-default"><i class="fa fa-long-arrow-left" aria-hidden="true"></i> უკან დაბრუნება</a>
			</div>
			<div class="col-md-12 dashboard_buttons_main_wrp">
				<div class="col-md-6">
					<form method="post" action="" enctype="multipart/form-data">
						<div class="form-group">
							<label>გალერიის სურათი</label>
							<input type="file" class="form-control" id="exampleInputEmail1" name="image">
						</div>
						<div class="form-group">
							<input type="submit" name="submit" value="დამატება" class="btn btn-primary submit">
						</div>
					</form>
				</div>
				<div class="col-md-6">	
				<?php 

					$queryPictures = "SELECT * FROM galery WHERE product_id = '$product_id' ORDER BY id DESC";
					$runPictures   = mysqli_query($conn,$queryPictures);
					if(mysqli_num_rows($runPictures) >= 1){
						while($rowPictures = mysqli_fetch_array($runPictures)){
							$pic_id  = $rowPictures['id'];
							$pic_url = $rowPictures['pic_url'];

							echo '<table class="table table-bordered">';
								echo '<tr>';
									echo '<td id="cent_td"><img src="..//imgs/galery/'.$pic_url.'" id="partn_img"></td>';
									echo '<td id="cent_td"><a href="del_galery_photo.php?product_id='.$product_id.'&img_id='.$pic_id.'" id="del">წაშლა</a></td>';
								echo '<tr>';
							echo '</table>';
						}
					}else{
						echo '<div class="col-md-12"><div class="alert alert-danger" role="alert">არ არის სურათები!</div></div>';
					}

				?>
				</div>
			</div>
		</div>
	</div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</html>


<?php
	if(isset($_POST['submit'])){

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
			    move_uploaded_file($file_tmp,"..//imgs/galery/".$fl_name);

			    $query2 = "INSERT INTO galery (pic_url,product_id) VALUES ('$fl_name','$product_id')";
				$run2   = mysqli_query($conn,$query2);

			    header('Location: galery_product.php?product_id='.$product_id);

			}else{
			    print_r($errors);
			}
		}
	}