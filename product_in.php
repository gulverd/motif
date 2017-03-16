    <?php
        
        include('admin/db.php');

        $product_id = $_GET['product_id'];
        $cat_id     = $_GET['cat_id'];

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

  <body class="product-page single-product variable-product">
    <div id="preloaderKDZ"></div>
    <div class="sn-site">
      <?php 
          include 'header.php';
          $query2 = "SELECT a.id as id, a.title_en as title_en, a.desc_en as desc_en, a.pic_url as pic_url, b.title_en as designer, b.id as designer_id, c.title_en as category_name, c.id as category_id, d.id as brand_id , d.title_en as brand_name, e.id as sub_id , e.title_en as subtitle 
          FROM products a 
          JOIN designers b on a.designer_id = b.id 
          JOIN categories c on a.cat_id = c.id
          JOIN brands d on a.brand_id = d.id
          JOIN subcategories e on a.sub_cat_id = e.id
          WHERE a.id = '$product_id'";
          $run2   = mysqli_query($conn,$query2);

          while($row2 = mysqli_fetch_array($run2)){
            $title_en       = $row2['title_en'];
            $desc_en        = $row2['desc_en'];
            $pic_url        = $row2['pic_url'];
            $designer       = $row2['designer'];
            $category_name  = $row2['category_name'];
            $designer_id    = $row2['designer_id'];
            $category_id    = $row2['category_id'];
            $brand_id       = $row2['brand_id'];
            $brand_name     = $row2['brand_name'];
            $sub_id         = $row2['sub_id'];
            $subtitle       = $row2['subtitle'];
          }
      ?>

      <div id="example-wrapper">
          <section class="product-information">
            <div class="container">
              <div class="row">
                <div class="col-md-6">
                  
                  <div id="sync1" class="owl-carousel owl-template">
                  <?php
                    echo '<div class="item">
                            <figure><img src="imgs/products/'.$pic_url.'" alt="slide" width="540" height="700"/></figure>
                          </div>';
                    $query4 = "SELECT * FROM galery WHERE product_id = '$product_id'";
                    $run4   = mysqli_query($conn,$query4);

                    while($row4 = mysqli_fetch_array($run4)){
                      $pic_urla = $row4['pic_url'];
                      echo '<div class="item">
                            <figure><img src="imgs/galery/'.$pic_urla.'" alt="slide" width="540" height="700"/></figure>
                          </div>';
                    }

                  ?>
                  </div>

                  <div id="sync2" class="owl-carousel owl-template">
                  <?php
                       echo '<div class="item">
                            <figure><img src="imgs/products/'.$pic_url.'" alt="slide" width="180" height="220"/></figure>
                          </div>';
                    
                    $query5 = "SELECT * FROM galery WHERE product_id = '$product_id'";
                    $run5   = mysqli_query($conn,$query5);

                    while($row5 = mysqli_fetch_array($run5)){
                      $pic_urla = $row5['pic_url'];
                      echo '<div class="item">
                            <figure><img src="imgs/galery/'.$pic_urla.'" alt="slide" width="180" height="220"/></figure>
                          </div>';
                    }

                  ?>
                </div>
                </div>
                <div class="col-md-6">
                  <div class="summary-product entry-summary">
                    <h1 class="product_title"><?php echo $title_en;?></h1>
                    <div class="woocommerce-product-rating"></div>
                    <div class="product-single-short-description">
                      <?php echo $desc_en;?>
                    </div>
                    <div class="product_meta"><span class="sku_wrapper">
                        <label>Designer:</label><span class="product-stock-status in-stock"><a href="designer_in.php?designer_id=<?php echo $designer_id;?>"><?php echo $designer;?></a></span></span><span class="posted_in">
                        <label>Brand:</label><span class="sku"><a href="brand_in.php?brand_id=<?php echo $brand_id;?>"><?php echo $brand_name;?></a></span></span><span class="product-stock-status-wrapper">
                        <label>Category:</label><a href="category_in.php?cat_id=<?php echo $category_id;?>"><?php echo $category_name;?></a> --/-- <a href="sub_category_in.php?cat_id=<?php echo $category_id;?>&sub_id=<?php echo $sub_id;?>"><?php echo $subtitle;?></a></span>
                    </div>
                    <div class="social-share-wrap">
                      <label>Follow us:</label>
                      <ul class="social-share">
                        <?php
                          $query3 = "SELECT * FROM contact";
                          $run3   = mysqli_query($conn,$query3);
                          while($row3 = mysqli_fetch_array($run3)){
                            $facebook  = $row3['facebook'];
                            $instagram = $row3['instagram'];
                            $pinterest = $row3['pinterest'];
                            $youtube   = $row3['youtube'];
                            $linedin   = $row3['linkedin'];
                          }
                        ?>
                        <li><a href="<?php echo $facebook;?>" target="_blank"><i class="fa fa-facebook"></i>Facebook</a></li>
                        <li><a href="<?php echo $instagram;?>" target="_blank"><i class="fa fa-instagram"></i>Instagram</a></li>
                        <li><a href="<?php echo $pinterest;?>" target="_blank"><i class="fa fa-pinterest"></i>Pinterest</a></li>
                        <li><a href="<?php echo $linkedin;?>" target="_blank"><i class="fa fa-linkedin"></i>Linkedin</a></li>
                        <li><a href="<?php echo $youtube;?>" target="_blank"><i class="fa fa-youtube"></i>Youtube</a></li>
                      </ul>
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