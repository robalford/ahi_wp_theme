<?php
/**
 * Template Name: Portfolio Page
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<div class="single-post-thumbnail">
				<?php
					if (has_post_thumbnail()) {
						echo the_post_thumbnail('about-page');
					}
				?>
			</div>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'template-parts/content', 'page' ); ?>

			<?php endwhile; // End of the loop. ?>

			<?php
				// Include custom shortcode for Photo Gallery Plugin.
				// Create galleries and generate shortcode via Photo Gallery Plugin admin.
				// Add gallery shortcode as custom field via the Page admin section
				// retrieve shortcode as page metadata and store in $gallery variable
				$gallery = get_post_meta( get_the_ID(), 'Gallery Shortcode', true );
				echo do_shortcode($gallery);
			?>

		</main><!-- #main -->

	</div><!-- #primary -->

<?php get_footer(); ?>
