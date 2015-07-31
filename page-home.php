<?php
	/*Template Name: Page-Home*/
?>
<?php get_header(); ?>
<?php get_template_part( 'parts/feature' ); ?>
<?php get_template_part( 'parts/feature_games' ); ?>

<div class="row">
    <div class="large-8 columns">
        <h2>Recent Posts</h2>
        <ul>
        <?php
            $args = array( 'numberposts'  => 2);
            $recent_posts = wp_get_recent_posts( $args );
            foreach( $recent_posts as $recent ):
                var_dump($recent);
                echo '<li><a href="' . get_permalink($recent["ID"]) . '">' .   $recent["post_title"].'</a> </li> ';
            endforeach;
        ?>
        </ul>
    </div>
    <div class="large-4 columns">
        <div id="twitter_box" style="height:800px;overflow:scroll;">

        </div>
    </div>
</div>
<style type="text/css">
    a{
        text-decoration: none;
    }
    ul{
        padding:0;
    }
    ul li{
        margin:0;
        border:0;
        border-bottom:1px solid #DFDFDF;
    }
    .ex > div{
        width:400px;
    }
    .user{
        width:100%;
    }
    .user span{
        margin-top:10px;
    }
    .user span span{
        margin-top:0;
        width: auto;
    }
    .user a > span:last-child{
        margin-left:0;
    }
    .tweet{
        width:100%;
    }
    .timePosted{
        float:left;
        margin:0;
        width:50%;
    }
    .interact{
        float:right;
        width: 30%;
    }
    .interact a{
        margin: 0;
    }


.twitter_reply_icon, .twitter_fav_icon, .twitter_retweet_icon{
    text-align: center;
    font-size: 0px;
    width: calc(100% / 3);
    display: inline-block;
}
.interact .twitter_reply_icon:before, .interact .twitter_fav_icon:before, .interact .twitter_retweet_icon:before {
  font-size: 15px;
  font-family: "Fontawesome";
  -webkit-font-smoothing: antialiased;
  padding-right: 4px;
}
.interact .twitter_reply_icon:before {
  content: "\f112";
}
.interact .twitter_retweet_icon:before {
  content: "\f079";
}
.interact .twitter_fav_icon:before {
  content: "\f005";
}

</style>
<?php get_footer(); ?>
