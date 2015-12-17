<?php
/**
 * Template Name: Press Page
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<?php
				if (has_post_thumbnail()) {
					echo '<div class="single-post-thumbnail">';
					echo '<a href=';
					echo get_post_meta( get_the_ID(), 'Press URL', true );
					echo ' target="_blank">';
					echo the_post_thumbnail('press-page');
					echo '</a>';
					echo '</div>';
				}
			?>
			
			<?php while ( have_posts() ) : the_post(); ?>
				
				<?php get_template_part( 'template-parts/content', 'page' ); ?>
				
			<?php endwhile; // End of the loop. ?>			
			
			
		</main><!-- #main -->
		
	</div><!-- #primary -->

<?php get_footer(); ?>
