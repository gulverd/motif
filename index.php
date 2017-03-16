<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="images/icon/favicon.png" type="image/x-icon">
    <meta name="description" content="Motif.Ge">
    <meta name="author" content="Gulverd Pataraia">
    <?php 
        include 'admin/db.php';
        $query = "SELECT * FROM keywords";
        $run   = mysqli_query($conn,$query);
        
        while($row = mysqli_fetch_array($run)){
            $keywords = $row['words'];
        }  
        $query2 = "SELECT * FROM contact";
        $run2   = mysqli_query($conn,$query2);

        while($row2 = mysqli_fetch_array($run2)){
          $phone1     = $row2['phone1'];
          $phone2     = $row2['phone2'];
          $email1     = $row2['email1'];
          $email2     = $row2['email2'];
          $address    = $row2['address_en'];
          $facebook   = $row2['facebook'];
          $instagram  = $row2['instagram'];
          $pinterest  = $row2['pinterest'];
          $youtube    = $row2['youtube'];
          $linkedin   = $row2['linkedin'];
          $map_url    = $row2['map_url'];
          $address_en = $row2['address_en'];

        }

    ?>

    <title>Motif.GE</title>

    <!-- Bootstrap core CSS -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">

    <!-- Custom styles for this template -->
    <link href="stylea.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900' rel='stylesheet' type='text/css'>
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

<div class="site-wrapper video-background">
    <!--
    Video from YouTube
    Have Questions? How To:
    https://github.com/pupunzi/jquery.mb.YTPlayer/wiki
    -->
    <a id="bgndVideo" class="player" data-property="{videoURL:'https://www.youtube.com/watch?v=k_okcNVZqqI', containment:'body', autoPlay:true, mute:true, startAt:5, stopAt: 120, quality:'small', opacity:1, }"></a>

    <div class="overlay"></div>

    <div class="site-wrapper-inner">

            <div class="masthead clearfix">
                <div class="inner">
                    <h3 class="masthead-brand"><i class="fa fa-phone fa-fw"><a href="tel:<?php echo $phone1;?>"></i><?php echo $phone1;?><br><small>click to call <i class="fa fa-level-up"></i></small></a></h3>
                    <nav>
                        <ul class="nav masthead-nav">
                            <li><a href="<?php echo $facebook;?>" target="_blank"><i class="fa fa-facebook fa-fw"></i></a></li>
                            <li><a href="<?php echo $instagram;?>" target="_blank"><i class="fa fa-instagram fa-fw"></i></a></li>
                            <li><a href="<?php echo $pinterest;?>" target="_blank"><i class="fa fa-pinterest fa-fw"></i></a></li>
                            <li><a href="<?php echo $linkedin;?>" target="_blank"><i class="fa fa-linkedin fa-fw"></i></a></li>
                            <li><a href="<?php echo $youtube;?>" target="_blank"><i class="fa fa-youtube fa-fw"></i></a></li>
                            <li><a href="mailto:<?php echo $email1;?>" target="_blank"><i class="fa fa-envelope fa-fw"></i></a></li>
                        </ul>
                    </nav>
                </div>
            </div>

            <div class="cover-container">
            <div class="inner cover">
                <img src="images/logo/motifa.png" alt="logo" id="logo_index"/></a>
                <p class="lead">
                    <a href="home.php" class="btn btn-lg btn-default butka">English</a>
                    <a href="home_ge.php" class="btn btn-lg btn-default butka" id="funtika">ქართული</a>
                </p>
            </div>

            <div class="mastfoot">
                <div class="inner">
                    <p>Copyright &copy; <a href="index.php">Motif.GE</a></p>
                </div>
            </div>

        </div>

    </div>
</div>

<!-- jQuery -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<!-- Bootstrap core JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>

<!-- Plugins and Custom JavaScript -->
<script src="jsa/device.min.js"></script>
<script src="jsa/jquery.mb.YTPlayer.js"></script>
<script src="jsa/jquery.countdown.min.js"></script>
<script src="jsa/custom.js"></script>

<!--
Google Analitics
Demo Purpose Only
Change UA-XXXXXXX-X to be your site's ID
 -->
<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-1057679-2', 'auto');
    ga('send', 'pageview');
</script>

</body>
</html>