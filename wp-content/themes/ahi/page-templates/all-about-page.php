<?php
/**
 * Template Name: All About Page
 */

get_header(); ?>

<?php

// Use WP_Query for custom database query that returns all Press Pages sorted by Display Order
// http://codex.wordpress.org/Class_Reference/WP_Query#Parameters

// change the other custom queries to use menu_order instead of custom field for ordering
$portfolio_pages = new WP_Query( 'post_type=page&meta_value=About&order=ASC&orderby=menu_order' );

?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">

		<?php while ( $portfolio_pages->have_posts() ) : $portfolio_pages->the_post(); ?>

	
			<?php
				if (has_post_thumbnail()) {
					echo '<div class="single-post-thumbnail">';
					echo '<a href=';
					echo the_permalink();
					echo '>';
					echo the_post_thumbnail('about-page');
					echo '</a>';
					echo '</div>';
				}
			?>
			
			<?php get_template_part( 'template-parts/content', 'page' ); ?>
			
			<?php
				// Add gallery shortcode as custom field via the Page admin section
				// retrieve shortcode as page metadata and store in $gallery variable
				$gallery = get_post_meta( get_the_ID(), 'Gallery Shortcode', true );
				echo do_shortcode($gallery);
			?>
			
		<?php endwhile; // End of the loop. ?>	
	</main><!-- #main -->
	
</div><!-- #primary -->

<?php get_footer(); ?>
