<?php
/**
 * The template for displaying the front page of the site.
 * Custom built for AHI theme.
 *
 * @package AHI
 */

get_header(); ?>

<div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">

            <?php echo the_post_thumbnail('front-page'); ?>

        </main><!-- #main -->
    </div><!-- #primary -->

<?php get_footer(); ?>