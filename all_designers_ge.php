    <?php
        
        include('admin/db.php');
        $symbol = $_GET['symbol'];

        $query = "SELECT * FROM keywords";
        $run   = mysqli_query($conn,$query);
        
        while($row = mysqli_fetch_array($run)){
            $keywords = $row['words'];
        }   
    ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Motif.ge</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Motif.ge">
    <meta name="author" content="Motif.ge">
    <meta name="keywords" content="<?php echo $keywords;?>">
    <link rel="shortcut icon" href="images/icon/favicon.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i|Montserrat:400,700|Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Ubuntu:300,300i,400,400i,500,500i,700,700i&amp;amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="libs/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="libs/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="libs/animate/animated.css">
    <link rel="stylesheet" type="text/css" href="libs/owl.carousel.min/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="libs/jquery.mmenu.all/jquery.mmenu.all.css">
    <link rel="stylesheet" type="text/css" href="libs/pe-icon-7-stroke/css/pe-icon-7-stroke.css">
    <link rel="stylesheet" type="text/css" href="libs/direction/css/noJS.css">
    <link rel="stylesheet" type="text/css" href="libs/prettyphoto-master/css/prettyPhoto.css">
    <link rel="stylesheet" type="text/css" href="libs/slick-sider/slick.min.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/home.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="style.css">
  </head>

  <body class="home-2">
    <div id="preloaderKDZ"></div>
    <div class="sn-site">
      <?php 
          include 'header_ge.php';
      ?>
      <div id="example-wrapper">

        <section>
            <div class="container">
                  <div class="col-md-12" id="blogs_home_title">
                    <h2 id="funtika">იხილეთ პროდუქცია დიზაინერების მიხედვით</h2>
                    <h3 id="funtika">დიზაინერები</h3>
                  </div>
                  <div class="banner-home-2">
                    <div class="row">
                      <div class="col-md-12" id="designers_wrapper">
                        <table class="table table-bordered">
                          <tr>
                          <?php
                          
                            $array  = array("A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z");
                            
                            foreach ($array as $value) {
                              echo '<td id="cent_td"> <a href="all_designers_ge.php?symbol='.$value.'" id="desing_a">'.$value.'</a></td>';
                            }

                          ?>
                          </tr>
                        </table>
                      </div>
                      <div class="col-md-12" id="designers_wrapper">
                      <?php


                          if($symbol == ''){

                            $query2 = "SELECT id, title_en FROM designers";
                            $run2   = mysqli_query($conn,$query2);

                            while($row2 = mysqli_fetch_array($run2)){
                              $id       = $row2['id'];
                              $title_en = $row2['title_en'];
                              
                              echo '<div class="col-md-2"><a href="designer_in_ge.php?designer_id='.$id.'" id="desing_a" id="funtika">'.$title_en.'</a></div>';
                            }

                          }else{

                            $likeVar = $symbol. "%"; 
                            $query2 = "SELECT id, title_en FROM designers WHERE title_en like '$likeVar'";
                            $run2   = mysqli_query($conn,$query2);

                            while($row2 = mysqli_fetch_array($run2)){

                              $id       = $row2['id'];
                              $title_en = $row2['title_en'];
                              
                              echo '<div class="col-md-2"><a href="designer_in_ge.php?designer_id='.$id.'" id="desing_a">'.$title_en.'</a></div>';

                            }

                          }

                          
                      ?>
                      </div>
                    </div>
                    </div>
                  </div>
            </div>
        </section>

        <?php

            include 'footer_ge.php';
        ?>

      </div>
    </div>
    
    <div class="click-back-top-body">
      <button type="button" class="sn-btn sn-btn-style-17 sn-back-to-top fixed-right-bottom"><i class="btn-icon fa fa-angle-up"></i></button>
    </div>

    <!-- Vendor jQuery-->
    <script type="text/javascript" src="libs/jquery/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="libs/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="libs/animate/wow.min.js"></script>
    <script type="text/javascript" src="libs/owl.carousel.min/owl.carousel.min.js"></script>
    <script type="text/javascript" src="libs/jquery.mmenu.all/jquery.mmenu.all.min.js"></script>
    <script type="text/javascript" src="libs/countdown/jquery.countdown.min.js"></script>
    <script type="text/javascript" src="libs/jquery-appear/jquery.appear.min.js"></script>
    <script type="text/javascript" src="libs/jquery-countto/jquery.countTo.min.js"></script>
    <script type="text/javascript" src="libs/direction/js/jquery.hoverdir.js"></script>
    <script type="text/javascript" src="libs/direction/js/modernizr.custom.97074.js"></script>
    <script type="text/javascript" src="libs/isotope/isotope.pkgd.min.js"></script>
    <script type="text/javascript" src="libs/isotope/fit-columns.js"></script>
    <script type="text/javascript" src="libs/isotope/isotope-docs.min.js"></script>
    <script type="text/javascript" src="libs/mansory/mansory.js"></script>
    <script type="text/javascript" src="libs/prettyphoto-master/js/jquery.prettyPhoto.js"></script>
    <script type="text/javascript" src="libs/slick-sider/slick.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
  </body>
</html>