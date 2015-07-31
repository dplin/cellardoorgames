<?php
	/*Template Name: Page-Contact*/
?>
<?php get_header(); ?>
<div class="row">
    <div class="large-8 columns">
        <div>
            <?php
                if ( have_posts() ) :
                    while ( have_posts() ) : the_post();
                        the_content();
                    endwhile;
                endif;
            ?>
        </div>
        <div>
            <?php
              $feature = get_field('feature');
              if ($feature){
            ?>
            <img src="<?php echo $feature; ?>" alt="">
            <?php } ?>
        </div>
    </div>
    <div class="large-4 columns">
        <?php
            $inquiries = get_field('inquiries');
        ?>
        <h5>Inquiries</h5>
        <p>
            <?=$inquiries; ?>
        </p>
        <?php
            $press_business_contact = get_field('press_business_contact');
        ?>
        <h5>Press / Business Contact</h5>
        <p>
            <?=$press_business_contact; ?>
        </p>
    </div>
</div>

<section>
  <div class="row">
    <div class="medium-12 large-12 columns">

    </div>
  </div>
</section>
<?php get_footer(); ?>

