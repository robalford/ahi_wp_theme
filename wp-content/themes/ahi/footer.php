<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package AHI
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
			<!-- commented out underscores footer text. and replaced with custom text.
			<a href="<?php //echo esc_url( __( 'https://wordpress.org/', 'ahi' ) ); ?>"><?php //printf( esc_html__( 'Proudly powered by %s', 'ahi' ), 'WordPress' ); ?></a>
			<span class="sep"> | </span>-->
			<p><?php printf( esc_html__( 'contact@alfordhomesinc.com | 360.779.7268 | &copy; 2014 Alford Homes Inc. All rights reserved.' ) ); ?></p>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
