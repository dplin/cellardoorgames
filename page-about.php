<?php
	/*Template Name: Page-About*/
?>
<?php get_header(); ?>
<div class="row">
    <div class="large-8 columns">
        <p>
        <?php
            if ( have_posts() ) :
                while ( have_posts() ) : the_post();
                    the_content();
                endwhile;
            endif;
        ?>
        </p>
    </div>
    <div class="large-4 columns">
        <?php
            $image = get_field('feature');
        ?>
        <img src="<?=$image;?>" alt="">
    </div>
</div>

<div class="row">
    <div class="large-12 columns">
        <span>Team and Repeating Collaborators</span>
    </div>
</div>
<div class="row">
    <div class="large-12 columns">
        <?php
            $team = get_field('team');

            if ($team){
                foreach ( $team as $member ):
        ?>
            <div style="float:left;width:50%;">
                <div>
                    <img src="<?=$member['photo']['url'] ?>" alt="" style="width:120px;">
                </div>
            </div>
        <?php
                endforeach;
            }
        ?>
    </div>
</div>

<div class="row">
    <div class="large-12 columns">
        <span>Other Associates</span>
    </div>
</div>
<div class="row">
    <div class="large-12 columns">
        <?php
            $associates = get_field('associates');

            if ($associates){
                foreach ( $associates as $associate ):
        ?>
            <div style="float:left;width:33%;">
                <div>
                    <span><?=$associate['title']; ?></span><br>
                    <span><?=$associate['url']; ?></span>
                </div>
            </div>
        <?php
                endforeach;
            }
        ?>
    </div>
</div>
<?php get_footer(); ?>
