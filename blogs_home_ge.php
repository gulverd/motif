        <section>
          <div class="recent-news-home_2">
            <div class="container">
              <div class="col-md-12" id="blogs_home_title">
                <h2 id="funtika">20 წლიანი სამუშაო გამოცდილება</h2>
                <h3 id="funtika">ბლოგი</h3>
              </div>
              <div class="recent-news-container">
                <div class="row">
                  
                  <?php
                    $query = "SELECT * FROM blogs ORDER BY id DESC";
                    $run   = mysqli_query($conn,$query);

                    while($row = mysqli_fetch_array($run)){
                        $title_en  = $row['title_ge'];
                        $pic_url   = $row['pic_url'];
                        $id        = $row['id'];

                        echo '
                  <div class="col-md-3">
                    <article>
                      <div class="post-thumbnail">
                        <div class="post-image"><img src="imgs/blog/'.$pic_url.'" alt="thumbnail-04" width="810" height="540" class="attachment-large size-large wp-post-image"/></div>
                        <div class="post-content">
                          <h4 class="entry-title"><a href="blog_in_ge.php?blog_id='.$id.'" id="funtika">'.$title_en.'</a></h4>
                        </div>
                      </div>
                    </article>
                  </div>

                        ';
                    }
                  ?>

                  
                  <div class="col-md-12" id="buti_wrp">
                    <a href="blog_ge.php" class="btn btn-default funtika" id="buti">იხილეთ ყველა სტატია</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>