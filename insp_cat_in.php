    <?php
        
        include('admin/db.php');
        $cat_id = $_GET['cat_id'];

        $query = "SELECT * FROM keywords";
        $run   = mysqli_query($conn,$query);
        
        while($row = mysqli_fetch_array($run)){
            $keywords = $row['words'];
        }   

        $querya = "SELECT  * FROM insp_categories WHERE id = '$cat_id'";
          $runa   = mysqli_query($conn,$querya);

          while ($rowa = mysqli_fetch_array($runa)) {
            $name = $rowa['title_en'];
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

<body class="home-5">
    <div id="preloaderKDZ"></div>
    <div class="sn-site">
      <?php 
          include 'header.php';
      ?>
      <div id="example-wrapper">
           <section>
              <div class="home-5-blog">
                  <div class="sperator text-center">
                    <p id="funtika"><?php echo $name;?></p>
                  <div class="sperator-bottom"><img src="images/demo/sperator2.png" alt="spertor"/></div>
                  <div data-number="3" data-margin="15" data-loop="yes" data-navcontrol="yes" class="sofani-owl-carousel">

                  <?php 
                    $query2 = "SELECT * FROM inspirations WHERE inst_cat_id = '$cat_id'";
                    $run2   = mysqli_query($conn,$query2);

                    while($row2 = mysqli_fetch_array($run2)){
                        $id        = $row2['id'];
                        $pic_url   = $row2['pic_url'];
                        $title_en  = $row2['title_en'];
                        $desc_en   = $row2['desc_en'];

                        echo '
                                  <div class="recent-news-container">
                                    <article class="recent_news_item">
                                      <div class="post-thumbnail">
                                        <div class="post-image"><img src="imgs/inspirations/'.$pic_url.'" alt="thumbnail-blog-3-column-2" width="300" height="200" class="attachment-medium size-medium wp-post-image"/></div>
                                        <div class="post-content">
                                          <div class="col-md-12" id="ziz">
                                          <h4 class="entry-title">
                                            <a href="inspiration_in.php?cat_id='.$cat_id.'&insp_id='.$id.'" id="funtika">'.$title_en.'</a>
                                          </h4>
                                          </div>
                                          <div class="col-md-12" id="ziz">
                                            <a href="inspiration_in.php?cat_id='.$cat_id.'&insp_id='.$id.'" id="funtika">'.$desc_en.'</a>
                                          </div>
                                        </div>
                                      </div>
                                    </article>
                                  </div>
            
                              ';
                    }

                  ?>             </div>
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