    <?php
        
        include('admin/db.php');
        $team_id = $_GET['team_id'];

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
          include 'header.php';
      ?>
      <div id="example-wrapper">
        <div class="col-md-12" id="blogs_home_title">
          <h2>OUR TEAM MEMBER</h2>
        </div>
      <section> 
        <div class="products-in-category-tabs-wrapper container">
          <div class="products-content product-tab">
            <div class="woocommerce product-listing columns-4 clearfix">
              <div class="desc-review-content tab-content clearfix">
                <div id="1a" class="tab-pane active">
                  <?php 
                    $query2 = "SELECT * FROM team WHERE id= '$team_id'";
                    $run2   = mysqli_query($conn,$query2);

                    while($row2 = mysqli_fetch_array($run2)){
                        $id           = $row2['id'];
                        $pic_url      = $row2['pic_url'];
                        $title_en     = $row2['name_en'];
                        $position_en  = $row2['position_en'];
                        $desc_en      = $row2['desc_en'];

                        echo '
                      <div class="col-md-6" id="team_pic_wrp">
                        <div class="product-thumb-primary">
                          <img width="100%" height="700" src="imgs/employees/'.$pic_url.'" title="'.$title_en.'" class="attachment-shop_catalog size-shop_catalog wp-post-image"/>
                        </div>
                      </div>
                      <div class="col-md-6" id="tut">
                        <div clas="col-md-12">
                          <h3>'.$title_en.'</h3>
                        </div>
                        <div clas="col-md-12">
                         <h4>'.$position_en.'</h4>
                        </div>
                          '.$desc_en.'
                      </div>
                  ';
                    }

                  ?>

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