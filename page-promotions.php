<?php
/**
 * Template Name: Promotions Page
 * 
 *
 */

 get_header();
 $thumbnail = get_the_post_thumbnail_url();
$heroImg = '';
if ( $thumbnail ) {
	$heroImg = 'background-image:url('.$thumbnail .')';
} ?>
<section id="hero-image" style="<?php echo $heroImg; ?>">
 		<div class="hero-cell" >
 			<h1><?php the_title(); ?></h1>
 			<h2><?php the_field('subtitle'); ?></h2>
 		</div>
 	</section>

<div class="container">
	<div id="primary" class="site-content">
		<?php echo do_shortcode('[list_promotions]'); ?>
	</div>
</div>


 <?php get_footer(); ?>