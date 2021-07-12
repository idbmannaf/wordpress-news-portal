    <?php 
$options = get_option( 'scl_simple_options' );
if(isset($options['slider_all_pages']) && $options['slider_all_pages']=="on"){
?>
       <div class="row ">
        <div class="col-12">
              <!--carousel -->
               <div id="carouselExampleWithControlsAndIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <?php $slider = get_posts(array('post_type' => 'slider', 'posts_per_page' => 5)); 
      $count = 0; 
      foreach($slider as $slide): ?>
      <div class="carousel-item <?php echo ($count == 0) ? 'active' : ''; ?>">
        <img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id($slide->ID)) ?>" class="d-block w-100 img-fluid" style="height: 70vh;"/>
              <div class="carousel-caption">
    <h5><?php 
    $content_post = get_post($slide->ID);
    echo $content_post->post_title; ?></h5>
    <p><?php        
        //var_dump($content_post);
echo $content_post->post_content; ?></p>
  </div>
      </div>
      <?php $count++; ?>
    <?php endforeach; ?>
  </div>

  <!-- Controls -->
  <a class="carousel-control-prev" href="#carouselExampleWithControlsAndIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleWithControlsAndIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
    <!--carousel --> 
        </div>
    </div>
    <?php } ?>