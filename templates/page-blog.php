<?php
/**
 * Template Name: Blog Page
 * The template for displaying a list posts 
 *
 * @author Jonathan Soto
 * @package foundry
 */

get_header();
?>

<?php  get_template_part( 'template-parts/hero/content', 'page-hero' ); ?>

<main role="main" class="main index-main content-block separate-content">
    <div class="container">
        
                <div class="content-information">
                    <?php 
                        if ( have_posts() ) : 
                            while ( have_posts() ) : the_post();
                                the_content();
                            endwhile; 
                        endif; 
                    ?>
                </div>
    </div>
    
</main><!-- #main -->


<?php
get_footer();
