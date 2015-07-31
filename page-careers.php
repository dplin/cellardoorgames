<?php
	/*Template Name: Page-Careers*/
?>
<?php get_header(); ?>
<section>
  <div class="row">
    <div class="medium-12 large-12 columns">
        <?php
          $feature = get_field('feature');
          if ($feature){
        ?>
        <img src="<?php echo $feature; ?>" alt="">
        <?php } ?>
    </div>
  </div>
</section>

<div class="row">
    <div class="large-8 columns">
        <?php
            if ( have_posts() ) :
                while ( have_posts() ) : the_post();
                    the_content();
                endwhile;
            endif;
        ?>
    </div>
    <div class="large-4 columns">
        <?php
            $inquiries = get_field('inquiries');
        ?>
        <span>Inquiries</span>
        <p>
            <?=$inquiries; ?>
        </p>
    </div>
</div>

<div class="row">
    <div class="large-12 columns">
        <hr>
    </div>
</div>

<section>
    <div class="row">
        <div class="large-12 columns">
            <h2>Current Openings</h2>
        </div>
    </div>

    <div class="row">
        <div class="large-12 columns">
        <?php
            $args = array(
                'post_type' => 'page',
                'fields' => 'ids',
                'nopaging' => true,
                'meta_key' => '_wp_page_template',
                'meta_value' => 'page-job-description.php'
            );
            $openings = get_posts( $args );
        ?>
            <table>
                <thead>
                    <tr>
                        <th>Date Posted</th>
                        <th>Roles</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach ( $openings as $opening ):
                    ?>
                    <tr>
                        <td><?php echo get_the_date( 'l, F j, Y', $opening ); ?></td>
                        <td><a href="<?=get_permalink ( $opening ) ?>"><?=get_the_title( $opening );?></a></td>
                    </tr>
                    <?php
                        endforeach;
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</section>


<?php get_footer(); ?>
