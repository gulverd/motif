  
      <section>
            <div class="container">
                  <div class="col-md-12" id="blogs_home_title">
                    <h2 id="funtika">ჩვენი ვიდეოები</h2>
                  </div>
                  <div class="banner-home-2">
                    <div class="row">
                      <?php
                        
                        include 'admin/db.php';

                        $query = "SELECT * FROM videos ORDER BY id DESC LIMIT 2";
                        $run   = mysqli_query($conn,$query);

                        while($row = mysqli_fetch_array($run)){
                          $video_url = $row['video_url'];
                          $youtubeID = substr(ltrim($video_url),32); 
                          echo '<div class="col-md-6" id="boxas">
                                  <div class="banner-shortcode-wrap style-1">
                                     <iframe width="100%" height="315" src="https://www.youtube.com/embed/'.$youtubeID.'" frameborder="0" allowfullscreen></iframe>
                                  </div>
                                </div>'; 
                        }
                      ?>

                      <div class="col-md-12" id="buti_wrp">
                          <a href="all_videos_ge.php" class="btn btn-default funtika" id="buti">იხილეთ ყველა ვიდეო</a>
                      </div>
                    </div>
                  </div>
            </div>
    </section>