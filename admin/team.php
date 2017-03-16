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
	?>
	<div class="col-md-12">
		<div class="container">
			<div class="col-md-12 dashboard_title_wrp">
				<h2>მენეჯმენტი</h2>
			</div>
			<div class="col-md-12 buti_wrapper_partners">
				<a href="add_new_team.php" class="btn btn-default"><i class="fa fa-plus" aria-hidden="true"></i> თანამშრომლის დამატება</a>
			</div>
			<div class="col-md-12 dashboard_buttons_main_wrp">

					<?php 
						$query = "SELECT * FROM team ORDER BY id DESC";
						$run   = mysqli_query($conn,$query);

						if(mysqli_num_rows($run) >=1){
							echo 
							'<table class="table table-striped table-hover table-bordered">
								<tr class="table_header">
									<td id="cent_td">სახელი</td>
									<td id="cent_td">ENG</td>
									<td id="cent_td">პოზიცია</td>
									<td id="cent_td">ENG</td>
									<td id="cent_td">ბიო (GEO)</td>
									<td id="cent_td">ბიო (ENG)</td>
									<td id="cent_td">სურათი</td>
									<td id="cent_td">რედაქტირება</td>
									<td id="cent_td">წაშლა</td>
								</tr>';
							while($row = mysqli_fetch_array($run)){
								$id 		 	= $row['id'];
								$name_ge 	 	= $row['name_ge'];
								$position_ge  	= $row['position_ge'];
								$name_en 	 	= $row['name_en'];
								$position_en  	= $row['position_en'];
								$desc_ge		= $row['desc_ge'];
								$desc_en 		= $row['desc_en'];
								$pic_url		= $row['pic_url'];

								if($name_en == '' or is_null($name_en)){
									$name_en = '<span class="glyphicon glyphicon-remove" id="del"></span>';
								}else{
									$name_en = '<span class="glyphicon glyphicon-ok" id="ok"></span>';
								}

								if($position_en == '' or is_null($position_en)){
									$position_en = '<span class="glyphicon glyphicon-remove" id="del"></span>';
								}else{
									$position_en = '<span class="glyphicon glyphicon-ok" id="ok"></span>';
								}

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

								if($pic_url == '' or is_null($pic_url)){
									$pic_url = '<span class="glyphicon glyphicon-remove" id="del"></span>';
								}else{
									$pic_url = '<span class="glyphicon glyphicon-ok" id="ok"></span>';
								}
								echo
								'
									<tr>
										<td id="cent_td">'.$name_ge.'</td>
										<td id="cent_td">'.$name_en.'</td>
										<td id="cent_td">'.$position_ge.'</td>
										<td id="cent_td">'.$position_en.'</td>
										<td id="cent_td">'.$desc_ge.'</td>
										<td id="cent_td">'.$desc_en.'</td>
										<td id="cent_td">'.$pic_url.'</td>
										<td id="cent_td"><button class="btn btn-primary"><a href="edit_team.php?team_id='.$id.'"><span class="glyphicon glyphicon-edit"></span> რედაქტირება</button></a></td>
										<td id="cent_td"><button class="btn btn-danger"><a href="del_team.php?team_id='.$id.'"><span class="glyphicon glyphicon-remove"></span> წაშლა</button></a></td>
									</tr>
								';
							}
							echo '</table>';
						}else{
							echo '<div class="alert alert-danger" role="alert">არ არის ჩანაწერები!</div>';
						}

					?>
			</div>
		</div>
	</div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</html>