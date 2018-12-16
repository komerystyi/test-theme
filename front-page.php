<?php
/**
 * Created by PhpStorm.
 * User: Glum
 * Date: 15.12.2018
 * Time: 11:22
 */
get_header(); ?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
            <?php echo do_shortcode('[metaslider id="5"]'); ?>
            <div class="home-product">
                <?php echo do_shortcode('[products limit="4" columns="4" orderby="price" order="ASC"]'); ?>
            </div>
        </main><!-- #main -->
    </div><!-- #primary -->

<?php get_footer();
