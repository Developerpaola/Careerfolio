<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<div id="content" class="site-content container" role="main">

			<center>
				<h1>Page not found</h1>

				<div class="img-404"><img src="<?php echo get_template_directory_uri(); ?>/images/img-404.png"></div>

				<a class="btn-style-blue" href="<?php echo get_home_url(); ?>/">Back</a>
			</center>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>