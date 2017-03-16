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
				<h2>ბრენდები</h2>
			</div>
			<div class="col-md-12 dashboard_buttons_main_wrp">
				<form method="post" action="" enctype="multipart/form-data">
					<div class="form-group">
						<label>ბრენდის დასახელება (ENG)</label>
						<input type="text" name="name_en" class="form-control" placeholder="ბრენდის ინგლისური დასახელება">
					</div>
					<div class="form-group">
						<label>ბრენდის დასახელება (GEO)</label>
						<input type="text" name="name_ge" class="form-control" placeholder="ბრენდის ქართული დასახელება">
					</div>
					<div class="form-group">
						<label>ბრენდის აღწერა (ENG)</label>
						<textarea name="desc_en"></textarea>
		        		<script>
		           			CKEDITOR.replace('desc_en');
		       	 		</script>
					</div>
					<div class="form-group">
						<label>ბრენდის აღწერა (GEO)</label>
						<textarea name="desc_ge"></textarea>
		        		<script>
		           			CKEDITOR.replace('desc_ge');
		       	 		</script>
					</div>
					<div class="form-group">
						<label for="exampleInputFile">ბრენდის სურათი</label>
						<input type="file" class="form-control" id="exampleInputEmail1" name="image">
					</div>
					<div class="form-group">
						<input type="submit" name="submit" value="დამატება" class="btn btn-primary submit">
					</div>
				</form>
			</div>
			<div class="col-md-12 dashboard_buttons_main_wrp">
				<table class="table table-bordered">
					<tr class="table_header">
						<td id="cent_td">ბრენდის სურათი</td>
						<td id="cent_td">ბრენდის დასახელება (GEO)</td>
						<td id="cent_td">ბრენდის დასახელება (ENG)</td>
						<td id="cent_td">ბრენდის აღწერა (GEO)</td>
						<td id="cent_td">ბრენდის აღწერა (ENG)</td>
						<td id="cent_td">რედაქტირება</td>
						<td id="cent_td">წაშლა</td>
					</tr>
					<?php 
						$query = "SELECT * FROM brands ORDER BY id DESC";
						$run   = mysqli_query($conn,$query);

						while($row = mysqli_fetch_array($run)){
							$id 	    = $row['id'];
							$title_ge   = $row['title_ge'];
							$title_en   = $row['title_en'];
							$desc_en    = $row['desc_en'];
							$desc_ge    = $row['desc_ge'];
							$pic_url    = $row['pic_url'];

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
								<td id="cent_td"><img src="..//imgs/brands/'.$pic_url.'" id="partn_img"></td>
								<td id="cent_td">'.$title_ge.'</td>
								<td id="cent_td">'.$title_en.'</td>
								<td id="cent_td">'.$desc_ge.'</td>
								<td id="cent_td">'.$desc_en.'</td>
								<td id="cent_td"><button class="btn btn-primary"><a href="edit_brand.php?brand_id='.$id.'"><span class="glyphicon glyphicon-edit"></span> რედაქტირება</a></button></td>
								<td id="cent_td">
									<button class="btn btn-danger"><a href="del_brand.php?brand_id='.$id.'"><span class="glyphicon glyphicon-remove"></span> წაშლა</a></button></td>
							</tr>'; 
						}

					?>
				</table>
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
		$desci_en	 = $_POST['desc_en'];
		$desci_ge	 = $_POST['desc_ge'];

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
			    move_uploaded_file($file_tmp,"..//imgs/brands/".$fl_name);

			    $query2 = "INSERT INTO brands (title_en, title_ge,desc_en,desc_ge,pic_url) VALUES ('$name_en','$name_ge','$desci_en','$desci_ge','$fl_name')";
				$run2   = mysqli_query($conn,$query2);

			    header('Location: brands.php');

			}else{
			    print_r($errors);
			}
		}

	}
?>