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

  <body class="blog blog-2-columns">
    <div id="preloaderKDZ"></div>
    <div class="sn-site">
      <?php 
          include 'header_ge.php';
      ?>
      <div id="example-wrapper">
        <div class="col-md-12" id="blogs_home_title">
          <h2 id="funtika">ბლოგი</h2>
        </div>
       <section>
          <div class="container">
            <div class="row">
              <div class="col-md-9">
                <div class="blog-2-columns-content">
                <?php
                    $query1 = "SELECT * FROM blogs";
                    $run1   = mysqli_query($conn,$query1);

                    while($row1 = mysqli_fetch_array($run1)){
                        $id = $row1['id'];
                        $title_en = $row1['title_ge'];
                        $pic_url  = $row1['pic_url'];
                        $datee    = $row1['datee'];
                        $desc_en  = $row1['desc_ge'];


                        echo '
                              <div class="post-item blog-grid">
                              <div class="entry-wrap">
                                <div class="entry-thumbnail-wrap">
                                  <div class="entry-thumbnail"><a href="blog_in_ge.php?blog_id='.$id.'" class="entry-thumbnail_overlay"><img src="imgs/blog/'.$pic_url.'" alt="'.$title_en.'" width="400" height="267" class="img-responsive"/></a><a href="#" class="prettyPhoto"><i class="fa fa-arrows-alt"></i></a></div>
                                  <div class="date-overlay"><span class="day">04</span><span class="month">Apr</span></div>
                                </div>
                                <div class="entry-content-wrap">
                                  <div class="entry-detail">
                                    <h3 class="entry-title p-font"><a href="blog_in_ge.php?blog_id='.$id.'" id="funtika">'.$title_en.'</a></h3>
                                    <div class="entry-post-meta-wrap">
                                      <ul class="entry-meta">
                                        <li class="entry-meta-date"><i class="fa fa-clock-o p-color"></i><a href="blog_in_ge.php?blog_id='.$id.'" id="funtika"> '.$datee.'</a></li>
                                      </ul>
                                    </div>
                                    <a href="blog_in_ge.php?blog_id='.$id.'" class="btn-readmore"><span class="span-text" id="funtika">იხილეთ ვრცლად</span></a>
                                  </div>
                                </div>
                              </div>
                            </div>';
                    }

                ?>




                </div>
              </div>
              <div class="col-md-3">
                <div class="sidebar-blog">
                  <aside class="recent-post post-sidebar">
                    <h4 id="funtika">ბოლო პოსტები</h4>
                    <ul class="recent-posts">
                    <?php

                    $query1 = "SELECT * FROM blogs";
                    $run1   = mysqli_query($conn,$query1);

                    while($row1 = mysqli_fetch_array($run1)){
                        $id = $row1['id'];
                        $title_en = $row1['title_en'];
                        $pic_url  = $row1['pic_url'];
                        $datee    = $row1['datee'];
                        $desc_en  = $row1['desc_ge'];
                        echo '
                          <li><a href="blog_in_ge.php?blog_id='.$id.'"> <img src="imgs/blog/'.$pic_url.'" alt="sideber" width="70" height="70"/></a>
                          <div class="posts-thumbnail-content">
                            <h4><a href="blog_in_ge.php?blog_id='.$id.'" id="funtika">'.$title_en.'</a></h4>
                          </div>
                        </li>

                        ';
                    }
                    ?>


                    </ul>
                  </aside>
                </div>
              </div>
            </div>
          </div>
        </section>
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