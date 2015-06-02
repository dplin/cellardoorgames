<?php
  // Get Slides
  $slides = get_field('slide', 'option');
  // Get Main Image
  $main_image = get_field('main_image', 'option');
?>
<section>
  <div class="row">
    <div class="medium-8 large-8 columns">
      <div class="flexslider">
        <ul class="slides">
          <?php foreach ($slides as $slide){ ?>
            <li>
              <?=$slide["text"] ?>
            </li>
          <?php } ?>
        </ul>
      </div>
    </div>
    <div class="hide-for-small-only medium-4 large-4 columns">
      <img src="<?=$main_image?>" alt="Doc Comp Onsite Computer Service" >
    </div>
  </div>
</section>
