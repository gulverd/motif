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
	?>
	<div class="col-md-12">
		<div class="container">
			<div class="col-md-12 dashboard_title_wrp">
				<h2>პარტნიორები</h2>
			</div>
			<div class="col-md-12 dashboard_buttons_main_wrp">
				<form method="post" action="" enctype="multipart/form-data">
					<div class="form-group">
						<label>პარტნიორის სახელი (ENG)</label>
						<input type="text" name="name_en" class="form-control" placeholder="პარტნიორის ინგლისური დასახელება">
					</div>
					<div class="form-group">
						<label>პატრნიორის სახელი (GEO)</label>
						<input type="text" name="name_ge" class="form-control" placeholder="პარტნიორის ქართული დასახელება">
					</div>
					<div class="form-group">
						<label>ვებ საიტი</label>
						<input type="text" name="web" class="form-control" placeholder="პარტნიორის საიტის მისამართი">
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
			<div class="col-md-12 dashboard_buttons_main_wrp">
				<table class="table table-bordered">
					<tr class="table_header">
						<td id="cent_td">პარტნიორის სურათი</td>
						<td id="cent_td">პარტნიორის დასახელება (GEO)</td>
						<td id="cent_td">პარტნიორის დასახელება (ENG)</td>
						<td id="cent_td">ვებ საიტი</td>
						<td id="cent_td">რედაქტირება</td>
						<td id="cent_td">წაშლა</td>
					</tr>
					<?php 
						$query = "SELECT * FROM partners ORDER BY id DESC";
						$run   = mysqli_query($conn,$query);

						while($row = mysqli_fetch_array($run)){
							$id 	    = $row['id'];
							$title_ge   = $row['title_ge'];
							$title_en   = $row['title_en'];
							$website    = $row['web'];
							$pic_url    = $row['pic_url'];

							echo '<tr>
								<td id="cent_td"><img src="..//imgs/partners/'.$pic_url.'" id="partn_img"></td>
								<td id="cent_td">'.$title_ge.'</td>
								<td id="cent_td">'.$title_en.'</td>
								<td id="cent_td">'.$website.'</td>
								<td id="cent_td">
									<button class="btn btn-primary"><a href="edit_parnters.php?partner_id='.$id.'"><span class="glyphicon glyphicon-edit"></span> რედაქტირება</button></a>
								</td>
								<td id="cent_td">
									<button class="btn btn-danger">
									<a href="del_partner.php?partner_id='.$id.'"><i class="fa fa-trash-o" aria-hidden="true"></i> წაშლა</a>
									</button>
								</td>
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
		$web 	     = $_POST['web'];

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
			    move_uploaded_file($file_tmp,"..//imgs/partners/".$fl_name);

			    $query2 = "INSERT INTO partners (title_en, title_ge, web, pic_url) VALUES ('$name_en','$name_ge','$web','$fl_name')";
				$run2   = mysqli_query($conn,$query2);

			    header('Location: partners.php');

			}else{
			    print_r($errors);
			}
		}

	}