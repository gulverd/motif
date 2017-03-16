  
        <div class="slideshow_wrp">
          <div class="slide-home slide-home-2">
            <div data-number="1" data-margin="100" data-loop="yes" data-navcontrol="yes" class="sofani-owl-carousel">

             <?php

                include 'admin/db.php';

                $querys = "SELECT title_en, desc_en, pic_url FROM slider";
                $runs   = mysqli_query($conn,$querys);

                while($rows = mysqli_fetch_array($runs)){
                    $titles = $rows['title_en'];
                    $descs  = $rows['desc_en'];
                    $pics   = $rows['pic_url'];

                    echo '
                      <div class="slide1">
                        <figure><img src="imgs/slider/'.$pics.'" alt="banner-1-home-2" id="slider_pic"/></figure>
                        <div class="slide1-content slide-content">
                          <h2>'.$titles.'</h2>
                          <p>'.$descs.'</p>
                        </div>
                      </div>';
                }

              ?> 

            </div>
          </div>
        </div>