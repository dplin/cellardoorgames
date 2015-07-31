<?php
	/*Template Name: Page-Job-Description*/
?>
<?php get_header(); ?>
<div class="row">
    <div class="large-12 columns">
        <?php
            $page = get_page_by_title( 'Careers' );
        ?>
        <a href="<?=get_permalink ( $page->ID ) ?>">Back to careers</a>
    </div>
</div>
<div class="row">
    <div class="large-12 columns">
        <?php
            if ( have_posts() ) :
                while ( have_posts() ) : the_post();
                    the_content();
                endwhile;
            endif;
        ?>
    </div>
</div>
<div class="row">
    <div class="large-12 columns">
        <button>Apply Now</button>
    </div>
</div>
<div class="row">
    <div class="large-12 columns">
        <p>
            Don't forget to include your resume.
        </p>
    </div>
</div>
<div class="row">
    <div class="large-6 columns">
        <?php
            $you_are = get_field('you_are');
        ?>
        <h2>You are...</h2>
        <?=$you_are; ?>
    </div>
    <div class="large-6 columns">
        <?php
            $you_will = get_field('you_will');
        ?>
        <h2>You will...</h2>
        <?=$you_will; ?>
    </div>
</div>
<?php get_footer(); ?>
