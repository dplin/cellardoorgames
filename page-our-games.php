<?php
	/*Template Name: Page-Our-Games*/
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

<section>
    <div class="row">
        <div class="large-12 columns">
        <?php
            $args = array(
                'post_type' => 'page',
                'fields' => 'ids',
                'nopaging' => true,
                'meta_key' => '_wp_page_template',
                'meta_value' => 'page-game.php'
            );
            $pages = get_posts( $args );
            foreach ( $pages as $page_id ):
        ?>
                <div class="game_container" style="float:left;width:33%;">
                    <a href="<?=get_permalink ( $page_id ) ?>"><img src="http://www.surabayagame88.com/wp-content/uploads/2013/07/game-over.jpg" alt=""></a>
                    <?=get_the_title( $page_id );?>
                    <?=get_field('platform', $page_id);?>
                </div>
        <?php
            endforeach;
        ?>
        </div>
    </div>
</section>
<?php get_footer(); ?>
