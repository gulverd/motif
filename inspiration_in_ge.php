    <?php
        
        include('admin/db.php');
        $cat_id = $_GET['cat_id'];
        $insp_id = $_GET['insp_id'];

        $query = "SELECT * FROM keywords";
        $run   = mysqli_query($conn,$query);
        
        while($row = mysqli_fetch_array($run)){
            $keywords = $row['words'];
        }   

        $querya = "SELECT  * FROM insp_categories WHERE id = '$cat_id'";
          $runa   = mysqli_query($conn,$querya);

          while ($rowa = mysqli_fetch_array($runa)) {
            $name = $rowa['title_ge'];
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

<body class="blog blog-detail">
    <div id="preloaderKDZ"></div>
    <div class="sn-site">
      <?php 
          include 'header_ge.php';
      ?>
      <div id="example-wrapper">


                  <?php 
                    $query2 = "SELECT * FROM inspirations WHERE id = '$insp_id'";
                    $run2   = mysqli_query($conn,$query2);

                    while($row2 = mysqli_fetch_array($run2)){
                        $id        = $row2['id'];
                        $pic_url   = $row2['pic_url'];
                        $title_en  = $row2['title_ge'];
                        $desc_en   = $row2['desc_ge'];
                       
                    }

                  ?>             
      <section>
          <div class="container">
            <article>
              <div class="entry-post-meta-wrap">
                <div class="single-post-entry-meta">
                  <div class="entry-meta-info">
                    <h2 class="entry-title" id="funtika"><?php echo $title_en;?></h2>
                  <div class="entry-content clearfix">
                  <p id="funtika"><?php echo $desc_en;?></p>
                </div>
                  </div>
                </div>
              </div>
              <div class="entry-thumbnail-wrap">
                <div class="entry-thumbnail"><a class="entry-thumbnail_overlay"><img src="imgs/inspirations/<?php echo $pic_url;?>" alt="Voluptates repudiandae sint et molestiae" width="1170" height="780" class="img-responsive"/></a></div>
              </div>
            </article>
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