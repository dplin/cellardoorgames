<?php
	/*Template Name: Page-News*/
?>
<?php get_header(); ?>
<div class="row">
    <div class="large-8 columns">
        <h2>News</h2>
        <ul>
        <?php
            $args = array( 'numberposts'  => 10);
            $recent_posts = wp_get_recent_posts( $args );
            foreach( $recent_posts as $recent ):
                var_dump($recent);
                echo '<li><a href="' . get_permalink($recent["ID"]) . '">' .   $recent["post_title"].'</a> </li> ';
            endforeach;
        ?>
        </ul>
    </div>
    <div class="large-4 columns">
        <h2>Archive</h2>
        <?php wp_get_archives( array( 'type' => 'daily', 'limit' => 16) ); ?>
    </div>
</div>
<?php get_footer(); ?>
