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
	<?php include 'nav_in.php';
		  include 'db.php';
	?>
	<div class="col-md-12">
		<div class="container">
			<div class="col-md-12 dashboard_title_wrp">
				<h2>სლაიდერი <a href="create_slide.php">სლაიდის დამატება</a></h2>
			</div>
			<div class="col-md-12 dashboard_buttons_main_wrp">
				<?php

					$query  = "SELECT * FROM slider";
					$run    = mysqli_query($conn,$query);

					if(mysqli_num_rows($run) >= 1){
						echo '<table class="table table-striped table-hover table-bordered">
								<tr class="table_header">
									<td id="cent_td">დასახელება (ENG)</td>
									<td id="cent_td">დასახელება (GEO)</td>
									<td id="cent_td">აღწერა (ENG)</td>
									<td id="cent_td">აღწერა (GEO)</td>
									<td id="cent_td">სურათი</td>
									<td id="cent_td">რედაქტირება</td>
									<td id="cent_td">წაშლა</td>
								</tr>';
						while($row = mysqli_fetch_array($run)){
							$id    	  = $row['id'];
							$title_en = $row['title_en'];
							$title_ge = $row['title_ge'];
							$desc_en  = $row['desc_en'];
							$desc_ge  = $row['desc_ge'];
							$pic_url  = $row['pic_url'];

							if($desc_en == '' or is_null($desc_en)){
								$desc_en = '<span class="glyphicon glyphicon-remove" id="del"></span>';
							}else{
								$desc_en = '<span class="glyphicon glyphicon-ok" id="ok"></span>';
							}

							if($desc_ge == '' or is_null($desc_ge)){
								$desc_ge = '<span class="glyphicon glyphicon-remove" id="del"></span>';
							}else{
								$desc_ge = '<span class="glyphicon glyphicon-ok" id="ok"></span>';
							}

							if($pic_url == '' or is_null($pic_url)){
								$pic_url = '<span class="glyphicon glyphicon-remove" id="del"></span>';
							}else{
								$pic_url = '<span class="glyphicon glyphicon-ok" id="ok"></span>';
							}

							echo '<tr>
								<td id="cent_td">'.$title_en.'</td>
								<td id="cent_td">'.$title_ge.'</td>
								<td id="cent_td">'.$desc_en.'</td>
								<td id="cent_td">'.$desc_ge.'</td>
								<td id="cent_td">'.$pic_url.'</td>
								<td id="cent_td"><a href="edit_slide.php?slide_id='.$id.'" class="btn btn-primary">რედაქტირება</a></td>
								<td id="cent_td"><a href="del_slide.php?slide_id='.$id.'" class="btn btn-danger">წაშლა</a></td>
							</tr>';
						}
						echo '</table>';
					}else{
						echo '<div class="alert alert-danger" role="alert">ამ დროისათვის არ არის ჩანაწერები!</div>';
					}

				?>
			</div>
		</div>
	</div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</html>