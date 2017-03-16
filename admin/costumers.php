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
				<h2>მომხმარებლის აზრი (Reviews)</h2>
			</div>
			<div class="col-md-12 dashboard_buttons_main_wrp">
				<form method="post" action="" enctype="multipart/form-data">
					<div class="form-group">
						<label>მომხმარებლის აზრი (ENG)</label>
						<textarea name="desc_en"></textarea>
						<script>
		           			CKEDITOR.replace('desc_en');
		       	 		</script>
					</div>
					<div class="form-group">
						<label>მომხმარებლის აზრი (GEO)</label>
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
			<div class="col-md-12 dashboard_buttons_main_wrp">
				<table class="table table-bordered">
					<tr class="table_header">
						<td id="cent_td">მომხმარებლის აზრი (GEO)</td>
						<td id="cent_td">მომხმარებლის აზრი (ENG)</td>
						<td id="cent_td">წაშლა</td>
					</tr>
					<?php 
						$query = "SELECT * FROM costumers_say ORDER BY id DESC";
						$run   = mysqli_query($conn,$query);

						while($row = mysqli_fetch_array($run)){
							$id 	    = $row['id'];
							$title_ge   = $row['desc_ge'];
							$title_en   = $row['desc_en'];

							echo '<tr>
								<td id="cent_td">'.$title_ge.'</td>
								<td id="cent_td">'.$title_en.'</td>
								<td id="cent_td"><a href="del_costumer.php?costumer_id='.$id.'"><i class="fa fa-trash-o" aria-hidden="true" id="del"></i></a></td>
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
		
		$desc_en  	 = $_POST['desc_en'];
		$desc_ge  	 = $_POST['desc_ge'];	


		$query2 = "INSERT INTO costumers_say (desc_en,desc_ge) VALUES ('$desc_en','$desc_ge')";
		$run2   = mysqli_query($conn,$query2);

		header('Location: costumers.php');


	}