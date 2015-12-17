<?php
/**
 * Template Name: Full Portfolio Page
 */

get_header(); ?>

<?php

// Use WP_Query for custom database query that returns all Press Pages sorted by Display Order
// http://codex.wordpress.org/Class_Reference/WP_Query#Parameters

//change this to use menu_order instead of Display Order
$portfolio_pages = new WP_Query( 'post_type=page&meta_value=Portfolio&order=DESC&orderby=Display Order' );

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
			
		<?php endwhile; // End of the loop. ?>	
	</main><!-- #main -->
	
</div><!-- #primary -->

<?php get_footer(); ?>
