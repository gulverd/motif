    <?php
        
        include('admin/db.php');

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

  <body class="about-us">
    <div id="preloaderKDZ"></div>
    <div class="sn-site">
      <?php 
          include 'header.php';
      ?>
      <div id="example-wrapper"><section>
          <div class="container">
            <div class="row">
              <div class="col-md-1"></div>
              <div class="col-md-10">
                <div class="about-us-content">
                  <h2>About Motif</h2>
                  <div class="wpb_text_column wpb_content_element">
                    <div class="wpb_wrapper" id="tut">
                      <?php
                        $query1 = "SELECT * FROM about";
                        $run1   = mysqli_query($conn,$query1);

                        while($row1 = mysqli_fetch_array($run1)){
                          $about_en = $row1['about_en'];
                          echo $about_en;
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
                    </div>
                  </div>
                  <div class="about-bottom">
                    <h2>CONTACT US</h2>
                    <div class="row">
                    <div class="about-bottom-right col-md-6">
                     <div class="icon-box icon-box-style2">
                          <div class="icon-box-left"><i class="fa fa-map-marker"></i></div>
                          <div class="icon-box-right"><span><?php echo $address;?></span></div>
                        </div>
                        <div class="icon-box icon-box-style2">
                          <div class="icon-box-left"><i class="fa fa-phone"></i></div>
                          <div class="icon-box-right"><span>Phone : <?php echo $phone1;?></span></div>
                        </div>
                        <div class="icon-box icon-box-style2">
                          <div class="icon-box-left"><i class="fa fa-envelope-o"></i></div>
                          <div class="icon-box-right"><span>Email : <?php echo $email1;?></span></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>

        <?php

            include 'footer.php';
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