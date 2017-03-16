        <section>
          <div class="recent-news-home_2">
            <div class="container">
              <div class="col-md-12" id="blogs_home_title">
                <h2>OVER 20 YEARS OF EXPERIENCE</h2>
                <h3>NEWS & TRENDS</h3>
              </div>
              <div class="recent-news-container">
                <div class="row">
                  
                  <?php
                    $query = "SELECT * FROM blogs ORDER BY id DESC";
                    $run   = mysqli_query($conn,$query);

                    while($row = mysqli_fetch_array($run)){
                        $title_en  = $row['title_en'];
                        $pic_url   = $row['pic_url'];
                        $id        = $row['id'];

                        echo '
                                          <div class="col-md-3">
                    <article>
                      <div class="post-thumbnail">
                        <div class="post-image"><img src="imgs/blog/'.$pic_url.'" alt="thumbnail-04" width="810" height="540" class="attachment-large size-large wp-post-image"/></div>
                        <div class="post-content">
                          <h4 class="entry-title"><a href="blog_in.php?blog_id='.$id.'">'.$title_en.'</a></h4>
                        </div>
                      </div>
                    </article>
                  </div>

                        ';
                    }
                  ?>

                  
                  <div class="col-md-12" id="buti_wrp">
                    <a href="blog.php" class="btn btn-default" id="buti">More News & Trends</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>