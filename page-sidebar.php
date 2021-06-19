<?php
/**
 * Template Name: Sidebar Page
 * The template for displaying sidebar pages
 *
 */

 get_header();   ?>

 	<section id="hero-image" >
 		<div class="hero-cell" >
 		</div>
 	</section>

 	
	<div id="primary" class="site-content  container">
		<div id="content" role="main">

			

			<div class="column c_25">
				<?php get_sidebar(); ?>
			</div>


			<div class="column c_5"><br></div>

			<div class="column c_70">
				<h1><?php the_title(); ?></h1>
 				<p><?php the_field('subtitle'); ?><p>
 				<br><br>
				<?php
				while ( have_posts() ) :
					the_post();
					the_content();
				endwhile; // End of the loop. ?>
			</div>


			<div class="clear"></div>
		</div><!-- #content -->
	</div><!-- #primary -->


<?php get_footer(); ?>