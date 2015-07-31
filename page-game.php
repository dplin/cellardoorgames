<?php
	/*Template Name: Page-Game*/
?>
<?php get_header(); ?>
<div class="row">
    <div class="large-12 columns">
        <h2><?php echo get_the_title(); ?></h2>
    </div>
</div>
<div class="row">
    <div class="large-6 columns">
        <?php
            $platform = get_field('platform');
        ?>
        <h5>Platform</h5>
        <?=$platform; ?>
    </div>
    <div class="large-6 columns">
        <?php
            $price = get_field('price');
        ?>
        <h5>Price</h5>
        <?=$price; ?>
    </div>
</div>
<?php get_footer(); ?>
