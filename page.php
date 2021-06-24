<?php
/**
 * The index file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @author Jonathan Soto
 *
 * @package foundry
 */

get_header();
?> 

<main role="main" class="main content-information">
    <div class="container">
       
        <h1><?php the_title(); ?></h1>
        <p class="subtitle">Last modified <?php echo  get_the_modified_time('F jS, Y'); ?>.</p>
        <?php 
                    if ( have_posts() ) : 
                        while ( have_posts() ) : the_post();
                            the_content();
                        endwhile; 
                    endif; 
        ?>
    </div>
    
</main><!-- #main -->


<?php
get_footer();
