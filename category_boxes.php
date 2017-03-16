        <section>
            <div class="container">
                  <div class="col-md-12" id="blogs_home_title">
                    <h2>Explore products by Categories</h2>
                    <h3>Categories</h3>
                  </div>
                  <div class="banner-home-2">
                    <div class="row">
                    <?php

                        include 'admin/db.php';

                        $query = "SELECT id, title_en, pic_url FROM categories ORDER BY rand() LIMIT 6";
                        $run   = mysqli_query($conn,$query);

                        while($row = mysqli_fetch_array($run)){
                          $id       = $row['id'];
                          $title_en = $row['title_en'];
                          $pic_url  = $row['pic_url'];
                          
                          echo '
                            <div class="col-md-4" id="boxas">
                              <div class="banner-shortcode-wrap style-1">
                                  <a href="category_in.php?cat_id='.$id.'">
                                  <div class="banner-content">
                                    <div class="banner-label-outer"></div><img src="imgs/categories/'.$pic_url.'" alt="'.$title_en.'" id="cata_img"/>
                                    <div class="banner-content-title">
                                      <h3 class="banner-title">'.$title_en.'</h3>
                                      <div class="overlay-bg bg-6fd9ec"></div>
                                    </div>
                                  </div>
                                  </a>
                              </div>
                            </div>
                          ';
                        }

                    ?>
                    </div>

                      <div class="col-md-12" id="buti_wrp">
                          <a href="all_categories.php" class="btn btn-default" id="buti">Explore More Categories</a>
                      </div>
                    </div>
                  </div>
            </div>
        </section>
