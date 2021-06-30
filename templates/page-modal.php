<?php
/**
 *  Template Name: Modal Style Page
 *
 * @author Jonathan Soto
 * @package foundry
 */

get_header("modal"); ?>
		

	<div id="primary" class="page-modal-style container">
		<div id="content" role="main">
            <h1 id="title"><?php the_title(); ?></h1>
            <h3 class="subtitle"><?php echo get_field('subtitle') ?></h3>
            <?php 
                    if ( have_posts() ) : 
                        while ( have_posts() ) : the_post();
                            the_content();
                        endwhile; 
                    endif; 
             ?>


		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>