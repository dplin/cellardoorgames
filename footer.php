        </main>
        <?php
            // Get footer content
            $content = get_field('footer_content', 'option');
        ?>
        <section class="bar">
            <div class="row">
                <div class="small-12 medium-4 large-4 columns">
                    <?=$content[0]['box_left']?>
                </div>
                <div class="small-12 medium-4 large-4 columns">
                    <?=$content[0]['box_middle']?>
                </div>
                <div class="small-12 medium-4 large-4 columns">
                    <?=$content[0]['box_right']?>
                </div>
            </div>
        </section>

        <div class="row hide-for-small-only" id="reg_text">
            <div class="small-12 columns text-center">
                <p>Copyright &reg; <?=date("Y")?> Doc Comp Onsite Computer Services</p>
            </div>
        </div>
    <?php wp_footer(); ?>
    <script>

    </script>
        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='https://www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X','auto');ga('send','pageview');
        </script>
    </body>
</html>
