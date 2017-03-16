      <div class="section-no-margin">
          <footer class="footer footer-style-1" id="footer_wrp">
            <div class="footer-top">
              <div class="container"><a href="home.php" title="Motif.ge"><img src="images/logo/logo.png" alt="logo" class="logo-img"/></a>
                <ul class="social-footer">
                 <?php

                  $query5  = "SELECT phone1,email1,address_en,facebook, instagram, pinterest, youtube, linkedin FROM contact";
                  $run5    = mysqli_query($conn,$query5);

                  while($row5 = mysqli_fetch_array($run5)){
                    $facebook   = $row5['facebook'];
                    $instagram  = $row5['instagram'];
                    $pinterest  = $row5['pinterest'];
                    $youtube    = $row5['youtube'];
                    $linkedin   = $row5['linkedin'];
                    $phone1     = $row5['phone1'];
                    $email1     = $row5['email1'];
                    $address_en = $row5['address_en'];

                  }
                    echo '<li><a href="'.$facebook.'" target="_blank"><i class="fa fa-facebook"></i></a></li>';
                    echo '<li><a href="'.$instagram.'" target="_blank"><i class="fa fa-instagram"></i></a></li>';
                    echo '<li><a href="'.$pinterest.'" target="_blank"><i class="fa fa-pinterest"></i></a></li>';
                    echo '<li><a href="'.$youtube.'" target="_blank"><i class="fa fa-youtube"></i></a></li>';
                    echo '<li><a href="'.$linkedin.'" target="_blank"><i class="fa fa-linkedin"></i></a></li>';
                  ?>
                 
                </ul>
                <div class="div-icon-box">
                  <div class="row">
                    <div class="col-md-4">
                      <div class="icon-box icon-box-style2">
                        <div class="icon-box-left"><i class="fa fa-map-marker"></i></div>
                        <div class="icon-box-right"><span><?php echo $address_en;?></span></div>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="icon-box icon-box-style2">
                        <div class="icon-box-left"><i class="fa fa-phone"></i></div>
                        <div class="icon-box-right"><span>Phone : <?php echo $phone1;?></span></div>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="icon-box icon-box-style2">
                        <div class="icon-box-left"><i class="fa fa-envelope-o"></i></div>
                        <div class="icon-box-right"><span>Email : <?php echo $email1;?></span></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </footer>
          <!-- .footer-->
        </div>