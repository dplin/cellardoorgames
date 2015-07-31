<?php
  // Get Slides
  $slides = get_field('slider');

  if ($slides){
?>

<section>
  <div class="row">
    <div class="medium-12 large-12 columns">
      <div class="flexslider_slider">
        <ul class="slides">
          <?php foreach ( $slides as $slide ): ?>
            <li>
                <img src="<?php echo $slide['url']; ?>" alt="">
            </li>
          <?php endforeach; ?>
        </ul>
      </div>
    </div>
  </div>
</section>

<?php } ?>
