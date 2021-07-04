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
if( is_user_logged_in() and get_the_ID() == 809){
    acf_form_head();
}
get_header();
?>

<main role="main" class="main single-information <?php echo get_field('full_container'); ?>">
    <div class="container">
        <?php
            if( get_field('full_container') == 'full-content-information' ){
                echo '<a class="back-btn" href="javascript:history.go(-1)">Back</a>';
            }
        ?>
        <h1><?php the_title(); ?></h1>
        <?php
            if( get_field('full_container') == 'full-content-information' ){
                echo '<p class="subtitle">'.get_field('subtitle').'</p>';
            }else{
                echo '<p class="subtitle">Last modified '.get_the_modified_time('F jS, Y').'.</p>';
            }
       
            if ( have_posts() ) : 
                while ( have_posts() ) : the_post();
                    the_content();

                    if( is_user_logged_in() and get_the_ID() == 809){
                        acf_form(array(
                            'post_id'       => 'user_'.get_current_user_id(),
                            'field_groups' => array('group_5e98a6b630c66'),
                            'post_title'    => false,
                            'post_content'  => false,
                            'submit_value'  => __('Save')
                        ));
                    }

                endwhile; 
            endif; 
        ?>
    </div>
    
</main><!-- #main -->


<?php
get_footer();
