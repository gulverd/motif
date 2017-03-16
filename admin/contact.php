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
		$query2  = "SELECT * FROM contact";
		$run2    = mysqli_query($conn,$query2);

		while($row2 = mysqli_fetch_array($run2)){
			$c_phone1     = $row2['phone1'];
			$c_phone2     = $row2['phone2'];
			$c_email1     = $row2['email1'];
			$c_email2     = $row2['email2'];
			$c_address_en = $row2['address_en'];
			$c_address_ge = $row2['address_ge'];
			$c_facebook   = $row2['facebook'];
			$c_instagram  = $row2['instagram'];
			$c_youtube    = $row2['youtube'];
			$c_pinterest  = $row2['pinterest'];
			$c_linkedin   = $row2['linkedin'];
			$c_map_url 	  = $row2['map_url'];
		}
	?>
	<div class="col-md-12">
		<div class="container">
			<div class="col-md-12 dashboard_title_wrp">
				<h2>საკონტაქტო ინფორმაცია</h2>
			</div>
			<div class="col-md-12 dashboard_buttons_main_wrp">
				<form method="post">
					<div class="form-group">
						<label>კომპანიის ტელეფონი 1</label>
						<input type="text" name="phone1" class="form-control" placeholder="მაგ: 599999999" value="<?php echo $c_phone1;?>">
					</div>
					<div class="form-group">
						<label>კომპანიის ტელეფონი 2</label>
						<input type="text" name="phone2" class="form-control" placeholder="მაგ: 555555555" value="<?php echo $c_phone2;?>">
					</div>
					<div class="form-group">
						<label>კომპანიის ელ-ფოსტა 1</label>
						<input type="text" name="email1" class="form-control" placeholder="მაგ: info@motif.ge" value="<?php echo $c_email1;?>">
					</div>
					<div class="form-group">
						<label>კომპანიის ელ-ფოსტა 2</label>
						<input type="text" name="email2" class="form-control" placeholder="მაგ: contact@motif.ge" value="<?php echo $c_email2;?>">
					</div>
					<div class="form-group">
						<label>კომპანიის მისამართი (ENG)</label>
						<input type="text" name="address_en" value="<?php echo $c_address_en;?>" class="form-control">
					</div>
					<div class="form-group">
						<label>კომპანიის მისამართი (GEO)</label>
						<input type="text" name="address_ge" value="<?php echo $c_address_ge;?>" class="form-control">
					</div>
					<div class="form-group">
						<label>Facebook url</label>
						<input type="text" name="facebook" class="form-control" placeholder="მაგ: https://facebook.com/motif" value="<?php echo $c_facebook;?>">
					</div>
					<div class="form-group">
						<label>Instagram url</label>
						<input type="text" name="instagram" class="form-control" placeholder="მაგ: https://instagram.com/motif" value="<?php echo $c_instagram;?>">
					</div>
					<div class="form-group">
						<label>Youtube url</label>
						<input type="text" name="youtube" class="form-control" placeholder="მაგ: https://youtube.com/motif" value="<?php echo $c_youtube;?>">
					</div>
					<div class="form-group">
						<label>Pinterest url</label>
						<input type="text" name="pinterest" class="form-control" placeholder="მაგ: https://pinterest.com/motif" value="<?php echo $c_pinterest;?>">
					</div>
					<div class="form-group">
						<label>Linkedin url</label>
						<input type="text" name="linkedin" class="form-control" placeholder="მაგ: https://linkedin.com/motif" value="<?php echo $c_linkedin;?>">
					</div>
					<div class="form-group">
						<textarea class="form-control" rows="4" name="map_url"><?php echo $c_map_url;?></textarea>
					</div>
					<div class="form-group">
						<input type="submit" name="submit" value="განახლება" class="btn btn-primary submit">
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
			$phone1     = $_POST['phone1'];
			$phone2     = $_POST['phone2'];
			$email1     = $_POST['email1'];
			$email2     = $_POST['email2'];
			$address_en = $_POST['address_en'];
			$address_ge = $_POST['address_ge'];
			$facebook   = $_POST['facebook'];
			$instagram  = $_POST['instagram'];
			$youtube    = $_POST['youtube'];
			$pinterest  = $_POST['pinterest'];
			$linkedin   = $_POST['linkedin'];
			$map_url 	= $_POST['map_url'];


		$query = "UPDATE contact SET phone1 = '$phone1', phone2 = '$phone2', email1 = '$email1', email2 = '$email2', address_en = '$address_en', address_ge ='$address_ge', facebook = '$facebook', instagram = '$instagram', youtube = '$youtube', pinterest = '$pinterest', linkedin = '$linkedin', map_url = '$map_url'";
		$run   = mysqli_query($conn,$query);

		header('Location: contact.php');
	}