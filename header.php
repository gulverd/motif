      <header class="header sn-header-style-2">
        <div class="header-bottom">

          <div class="main-nav-wrapper header-left">
            <div class="header-logo pull-left"><a href="home.php" title="MOTIF.GE"><img src="images/logo/logo.png" alt="logo" class="logo-img"/></a></div>
            <!-- .header-logo-->

            <nav id="primary-menu" class="main-nav">
              <ul class="nav">
                <li class="menu-item menu-blog"><a href="home.php">Inspiration</a>
                  <ul class="sub-menu">
                    <?php
                      include 'admin/db.php';
                      $query  = "SELECT id, title_en FROM insp_categories";
                      $run    = mysqli_query($conn,$query);

                      while($row = mysqli_fetch_array($run)){
                        $id       = $row['id'];
                        $title_en = $row['title_en'];
                        echo '<li><a href="insp_cat_in.php?cat_id='.$id.'">'.$title_en.'</a></li>';
                      }
                      
                    ?>
                  </ul>
                </li>
                <li class="menu-item menu-shop"><a href="home.php">Full Catalogue</a>
                  <ul class="sub-menu">
                    <li class="menu_style_dropdown menu-item" id="browse"><a href="#">Browse By</a>
                      <ul class="sub-menu">   
                        <li class="menu-item menu-item-object-page"><a href="all_brands.php">Manufacturer</a></li>
                        <li class="menu-item menu-item-object-page"><a href="all_designers.php?symbol=">Designer</a></li>
                        <li class="menu-item menu-item-object-page"><a href="all_categories.php">Product Group</a></li>
                      </ul>
                    </li>
                    <li class="menu_style_dropdown menu-item" id="furniture"><a href="#">Furniture</a>
                      <ul class="sub-menu">
                        <?php

                          $query1  = "SELECT id, title_en FROM categories WHERE category_variety = 1";
                          $run1    = mysqli_query($conn,$query1);

                          while($row1 = mysqli_fetch_array($run1)){
                            $id       = $row1['id'];
                            $title_en = $row1['title_en'];

                            echo '<div class="col-md-6"><li><a href="category_in.php?cat_id='.$id.'">'.$title_en.'</a></li></div>';
                          }
                          
                        ?>
                      </ul>
                    </li>
                    <li class="menu_style_dropdown menu-item"><a href="home.php">Lighting</a>
                      <ul class="sub-menu">
                        <?php

                          $query2  = "SELECT id, title_en FROM categories WHERE category_variety = 2";
                          $run2    = mysqli_query($conn,$query2);

                          while($row2 = mysqli_fetch_array($run2)){
                            $id       = $row2['id'];
                            $title_en = $row2['title_en'];
                            echo '<li><a href="category_in.php?cat_id='.$id.'">'.$title_en.'</a></li>';
                          }
                          
                        ?>
                      </ul>
                    </li>
                    <li class="menu_style_dropdown menu-item"><a href="home.php">Accessories and Decorations</a>
                      <ul class="sub-menu">
                        <?php

                          $query3  = "SELECT id, title_en FROM categories WHERE category_variety = 3";
                          $run3    = mysqli_query($conn,$query3);

                          while($row3 = mysqli_fetch_array($run3)){
                            $id       = $row3['id'];
                            $title_en = $row3['title_en'];
                            echo '<li><a href="category_in.php?cat_id='.$id.'">'.$title_en.'</a></li>';
                          }
                          
                        ?>
                      </ul>
                    </li>
                  </ul>
                </li>
                <li class="menu-item menu-blog"><a href="home.php">Services</a>
                  <ul class="sub-menu">
                     <?php

                        $query4  = "SELECT id, title_en FROM services";
                        $run4    = mysqli_query($conn,$query4);

                        while($row4 = mysqli_fetch_array($run4)){
                          $id       = $row4['id'];
                          $title_en = $row4['title_en'];
                          echo '<li><a href="service_in.php?service_id='.$id.'">'.$title_en.'</a></li>';
                        }
                        
                      ?>
                  </ul>
                </li>
                <li class="menu-item menu-blog"><a href="home.php">About Us</a>
                  <ul class="sub-menu">
                    <li><a href="about.php">Company</a></li>
                    <li><a href="team.php">Team</a></li>
                    <li><a href="contact.php">Contact</a></li>
                  </ul>
                </li>
                <li><a href="blog.php">News and Trends</a></li>
              </ul>
            </nav>
            <!-- .header-main-nav-->
          </div>
          <?php $search_ico = '<i class="fa fa-search"></i>';?>
          <div class="main-nav-wrapper header-right">
            <div class="header-right-box">
              <div class="header-customize header-customize-right">
                <div class="search-button-wrapper header-customize-item style-default">
                  <div class="icon-search-menu"><i class="wicon fa fa-search"></i></div>
                  <div class="yolo-search-wrapper">
                    <form action="search.php" method="GET">
                    <input id="search-ajax" placeholder="Enter keyword to search" type="search" name="search"/>
                    <input type="submit" class="search" value="Search">
                    <button class="close"><i class="pe-7s-close"></i></button>
                    </form>
                    <?php
                      if(isset($_GET['submit'])){
                        $search = $_GET['search'];
                      }
                    ?>
                  </div>
                </div>
                 <?php

                  $query5  = "SELECT facebook, instagram, pinterest, youtube, linkedin FROM contact";
                  $run5    = mysqli_query($conn,$query5);

                  while($row5 = mysqli_fetch_array($run5)){
                    $facebook  = $row5['facebook'];
                    $instagram = $row5['instagram'];
                    $pinterest = $row5['pinterest'];
                    $youtube   = $row5['youtube'];
                    $linkedin  = $row5['linkedin'];

                    if($facebook != '' or is_null($facebook) === true){
                      $ficon = 
                        '
                          <div class="search-button-wrapper header-customize-item style-default" id="header_btn_wrps">
                            <a title="Facebook" href="'.$facebook.'" target="_blank"><i class="fa fa-facebook"></i></a>
                          </div>                        
                        ';
                        echo $ficon;
                    }
                    if($instagram != '' or is_null($instagram) === true){
                      $iicon = 
                        '
                          <div class="search-button-wrapper header-customize-item style-default" id="header_btn_wrps">
                            <a title="Insagram" href="'.$instagram.'" target="_blank"><i class="fa fa-instagram"></i></a>
                          </div>                        
                        ';
                        echo $iicon;
                    }

                    if($pinterest != '' or is_null($pinterest) === true){
                      $picon = 
                        '
                          <div class="search-button-wrapper header-customize-item style-default" id="header_btn_wrps">
                            <a title="pinterest" href="'.$pinterest.'" target="_blank"><i class="fa fa-pinterest"></i></a>
                          </div>                        
                        ';
                        echo $picon;
                    }
                    if($youtube != '' or is_null($youtube) === true){
                      $yicon = 
                        '
                          <div class="search-button-wrapper header-customize-item style-default" id="header_btn_wrps">
                            <a title="youtube" href="'.$youtube.'" target="_blank"><i class="fa fa-youtube"></i></a>
                          </div>                        
                        ';
                        echo $yicon;
                    }
                    if($linkedin != '' or is_null($linkedin) === true){
                      $licon = 
                        '
                          <div class="search-button-wrapper header-customize-item style-default" id="header_btn_wrps">
                            <a title="linkedin" href="'.$linkedin.'" target="_blank"><i class="fa fa-linkedin"></i></a>
                          </div>                        
                        ';
                        echo $licon;
                    }                   
                  }
                        
                ?>


              </div>
            </div>
          </div>

        </div>
      </header>