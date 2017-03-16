        <section>
            <div class="container">
                  <div class="col-md-12" id="blogs_home_title">
                    <h2 id="funtika">იხილეთ პროდუქცია მწარმოებლის მიხედვით</h2>
                    <h3 id="funtika">მწარმოებლები</h3>
                  </div>
                  <div class="banner-home-2">
                    <div class="row">

                    <?php

                        include 'admin/db.php';

                        $query = "SELECT id, title_ge, pic_url FROM brands ORDER BY rand() LIMIT 6";
                        $run   = mysqli_query($conn,$query);

                        while($row = mysqli_fetch_array($run)){
                          $id = $row['id'];
                          $title_en = $row['title_ge'];
                          $pic_url  = $row['pic_url'];
                          
                          echo '
                            <div class="col-md-4" id="boxas">
                              <div class="banner-shortcode-wrap style-1">
                                  <a href="brand_in_ge.php?brand_id='.$id.'" id="funtika">
                                  <div class="banner-content">
                                    <div class="banner-label-outer"></div><img src="imgs/brands/'.$pic_url.'" alt="'.$title_en.'" id="cata_img"/>
                                    <div class="banner-content-title">
                                      <h3 class="banner-title" id="funtika">'.$title_en.'</h3>
                                      <div class="overlay-bg bg-6fd9ec"></div>
                                    </div>
                                  </div>
                                  </a>
                              </div>
                            </div>
                          ';
                        }

                    ?>
                      <div class="col-md-12" id="buti_wrp">
                        <a href="all_brands_ge.php" class="btn btn-default funtika" id="buti">იხილეთ ყველა მწარმოებელი</a>
                      </div>
                    </div>
                  </div>
            </div>
        </section>