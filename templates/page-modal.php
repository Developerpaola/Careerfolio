<?php
/**
 *  Template Name: Modal Style Page
 *
 * @author Jonathan Soto
 * @package foundry
 */

 if(is_user_logged_in() ){
    acf_form_head();
 }

get_header("modal"); ?>
		

	<div id="primary-<?php echo get_the_ID(); ?>" class="page-modal-style container">
		<div id="content" role="main">

            <?php
                if(is_user_logged_in() and get_the_ID() == 796){
                     get_template_part("template-part/author/content","welcome-author"); 
                }else if(is_user_logged_in() and get_the_ID() == 106){
                    get_template_part("template-part/company/content","create-company"); 
                }else if(is_user_logged_in() and get_the_ID() == 84){
                    get_template_part("template-part/post/content","edit-post"); 
                }else if(is_user_logged_in() and get_the_ID() == 835){
                    get_template_part("template-part/post/content","edit-group"); 
                }else if(is_user_logged_in() and get_the_ID() == 843){
                    get_template_part("template-part/post/content","members-group"); 
                }else if(is_user_logged_in() and get_the_ID() == 862){
                    get_template_part("template-part/post/content","edit-conversation"); 
                }else if(is_user_logged_in() and get_the_ID() == 874){
                    get_template_part("template-part/company/content","edit-company"); 
                }else{
                    
            ?>
                <h1><?php the_title(); ?></h1>
                <h3 class="subtitle"><?php echo get_field('subtitle') ?></h3>
                <?php 
                        if ( have_posts() ) : 
                            while ( have_posts() ) : the_post();
                                the_content();

                            endwhile; 
                        endif; 
                ?>
             <?php } ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>