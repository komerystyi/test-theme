<?php
/**
 * Created by PhpStorm.
 * User: Glum
 * Date: 15.12.2018
 * Time: 14:16
 */
get_header(); ?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
            <div class="home-product">
                <?php echo do_shortcode('[products columns="4" on_sale="true"]'); ?>
            </div>
        </main><!-- #main -->
    </div><!-- #primary -->

<?php get_footer();