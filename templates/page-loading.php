<?php
/**
 *  Template Name: Loading Page
 *
 * @author Jonathan Soto
 * @package foundry
 */

get_header();
global $post;
$idpage = $post->ID;
get_header(); 

 ?>
	 <?php  get_template_part( 'template-part/hero/content', 'page-hero' ); ?> 
 	


 		

	<div id="primary" class="site-content container">
		<div id="content" role="main">


		 		<?php
				 	if ($idpage == 10) { 
						get_template_part( 'template-part/filter/content', 'filter-people' ); 
	
						
					}else if ($idpage == 11) { 
						get_template_part( 'template-part/filter/content', 'filter-company' ); 

					}else if ($idpage == 711) { 
						get_template_part( 'template-part/filter/content', 'filter-groups' ); 

					}
				?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>