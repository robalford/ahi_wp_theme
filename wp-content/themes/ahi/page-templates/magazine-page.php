<?php
/**
 * Template Name: Magazine Page
 */

get_header(); ?>

<?php

// Use WP_Query for custom database query that returns all Magazine Press Pages sorted by menu_order
// http://codex.wordpress.org/Class_Reference/WP_Query#Parameters

$press_pages = new WP_Query( 'post_type=page&meta_value=Magazine&order=DESC&orderby=menu_order' );

?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">

		<?php while ( $press_pages->have_posts() ) : $press_pages->the_post(); ?>
			<div class="single-post-thumbnail magazine-thumbnail">
				<a href="<?php echo esc_url( get_post_meta( get_the_ID(), 'Press URL', true ) ); ?>" target="_blank">
					<?php
						if (has_post_thumbnail()) {
							echo the_post_thumbnail('press-page');
						}
					?>
				</a>
			</div>

		<?php endwhile; // End of the loop. ?>

	</main><!-- #main -->

</div><!-- #primary -->

<?php get_footer(); ?>
