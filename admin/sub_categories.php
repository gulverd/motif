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
				<h2>ქვეკატეგორიები</h2>
			</div>
			<div class="col-md-12 dashboard_buttons_main_wrp">
				<form method="post" action="" enctype="multipart/form-data">
					<div class="form-group">
						<label>ქვეკატეგორიის დასახელება (ENG)</label>
						<input type="text" name="name_en" class="form-control" placeholder="ქვეკკატეგორიის ინგლისური დასახელება">
					</div>
					<div class="form-group">
						<label>ქვეკატეგორიის დასახელება (GEO)</label>
						<input type="text" name="name_ge" class="form-control" placeholder="ქვეკკატეგორიის ქართული დასახელება">
					</div>
					<div class="form-group">
						<label for="exampleInputFile">ქვეკატეგორიის სურათი</label>
						<input type="file" class="form-control" id="exampleInputEmail1" name="image">
					</div>
					<div class="form-group">
						<label>აირჩიეთ მშობელი კატეგორია</label>
						<select class="form-control" name="parent_id">
							<?php
								$query3 = "SELECT * FROM categories";
								$run3   = mysqli_query($conn,$query3);

								while($row3 = mysqli_fetch_array($run3)){
									$parent_id   = $row3['id'];
									$parent_name = $row3['title_ge'];

									echo '<option value="'.$parent_id.'">'.$parent_name.'</option>'; 
								}
							?>
						</select>
					</div>
					<div class="form-group">
						<input type="submit" name="submit" value="დამატება" class="btn btn-primary submit">
					</div>
				</form>
			</div>
		</div>
	</div>
				<div class="col-md-12 dashboard_buttons_main_wrp">
				<table class="table table-bordered">
					<tr class="table_header">
						<td id="cent_td">ქვეკატეგორიის სურათი</td>
						<td id="cent_td">ქვეკატეგორიის დასახელება (GEO)</td>
						<td id="cent_td">ქვეკატეგორიის დასახელება (ENG)</td>
						<td id="cent_td">კატეგორიის სახეობა</td>
						<td id="cent_td">მშობელი კატეგორია</td>
						<td id="cent_td">რედაქტირება</td>
						<td id="cent_td">წაშლა</td>
					</tr>

					<?php 

						$query = "SELECT a.id as id, a.title_en as title_en , a.title_ge as title_ge , a.pic_url as pic_url ,b.title_ge as parent_title_ge, b.category_variety as variety 
								FROM subcategories a JOIN categories b on a.parent_id = b.id ORDER BY a.id DESC";
						$run   = mysqli_query($conn,$query);

						while($row = mysqli_fetch_array($run)){
							$id 	     	 = $row['id'];
							$title_ge   	 = $row['title_ge'];
							$title_en   	 = $row['title_en'];
							$pic_url    	 = $row['pic_url'];
							$parent_title_ge = $row['parent_title_ge'];
							$variety         = $row['variety'];

							if($variety == '1'){
								$variety = 'FURNITURE';
							}elseif($variety == '2'){
								$variety = 'LIGHTING';
							}elseif($variety == '3'){
								$variety = 'ACCESSORIES';
							}

							echo '<tr>
								<td id="cent_td"><img src="..//imgs/categories/'.$pic_url.'" id="partn_img"></td>
								<td id="cent_td">'.$title_ge.'</td>
								<td id="cent_td">'.$title_en.'</td>
								<td id="cent_td">'.$variety.'</td>
								<td id="cent_td">'.$parent_title_ge.'</td>
								<td id="cent_td"><button class="btn btn-primary"><a href="edit_subcategory.php?cat_id='.$id.'"><span class="glyphicon glyphicon-edit"></span> რედაქტირება</a></button></td>
								<td id="cent_td">
									<button class="btn btn-danger">
										<a href="del_subcategory.php?cat_id='.$id.'"><span class="glyphicon glyphicon-remove"></span> წაშლა</a>
									</button>
								</td>
							</tr>'; 
						}

					?>
				</table>
			</div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</html>

<?php 

	if(isset($_POST['submit'])){
		
		$name_en  	 = $_POST['name_en'];
		$name_ge  	 = $_POST['name_ge'];
		$parent_id   = $_POST['parent_id'];

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
			    move_uploaded_file($file_tmp,"..//imgs/categories/".$fl_name);

			    $query2 = "INSERT INTO subcategories (title_en, title_ge, pic_url,parent_id) VALUES ('$name_en','$name_ge','$fl_name','$parent_id')";
				$run2   = mysqli_query($conn,$query2);

			    header('Location: sub_categories.php');

			}else{
			    print_r($errors);
			}
		}

	}