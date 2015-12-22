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

			<?php get_template_part( 'template-parts/content', 'page' ); ?>

			<?php
				if (has_post_thumbnail()) {
					echo '<div class="single-post-thumbnail magazine-thumbnail">'; // added class for custom styling in recognition.css
					echo '<a href=';
					echo get_post_meta( get_the_ID(), 'Press URL', true );
					echo ' target="_blank">';
					echo the_post_thumbnail('press-page');
					echo '</a>';
					echo '</div>';
				}
			?>

		<?php endwhile; // End of the loop. ?>

	</main><!-- #main -->

</div><!-- #primary -->

<?php get_footer(); ?>
