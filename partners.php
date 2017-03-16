        <div class="slide-logo">
          <div class="container">
            <div data-number="5" data-margin="10" data-loop="yes" data-navcontrol="yes" class="sofani-owl-carousel">
            <?php
              
              include 'admin/db.php';

              $query = "SELECT * FROM partners";
              $run   = mysqli_query($conn,$query);

              while($row = mysqli_fetch_array($run)){
                $pic      = $row['pic_url'];
                $title_en = $row['title_en'];
                $web      = $row['web'];

                echo '<div class="slide-logo-item"><a href="'.$web.'" target="_blank"><img src="imgs/partners/'.$pic.'" alt="'.$title_en.'" id="partner_main_img"/></a></div>';
              }

            ?>
            </div>
          </div>
        </div>