<?php
/**
 * The template for displaying all single posts and attachments
 *
 *
 * @author Jonathan Soto
 * @package foundry
 */

get_header();
$author_id = get_post_field( 'post_author',  get_the_ID() );
$user_info = get_userdata($author_id );

?>

<?php
        if( $author_id == get_current_user_id() ){
            echo '<br><div class=" container">
                    <div class="row">
                        <div class="col"></div>
                        <div class="col-1"><a class="remove-btn" href="'.get_permalink(84).'?edit='.get_the_ID().'">Edit</a></div>
                        <div class="col-1"><a class="edit-btn" href="'.get_permalink(84).'?remove='.get_the_ID().'">Remove</a></div>
                    </div> 
                </div> ';
        }
    ?>

<main role="main" class="main content-information single-information">

    
    <div class="container">

        <center> <p class="pill"><?php $term =  get_field('categories'); echo $term->name; ?></p></center>
        <h1><?php the_title(); ?></h1>
        <p class="subtitle"><strong>Contribution by: </strong><a href="<?php echo get_author_posts_url( $author_id ); ?>" ><?php echo esc_html( $user_info->first_name ) . ' ' . esc_html( $user_info->last_name ); ?></a></p>
        
        <?php
        if( get_field('hero_image') ){
            echo '<img class="hero-img" src="'.get_field('hero_image').'" /><br>';
        }
        ?>
        <div class="row">
            <div class="col-9">
            </div>
            <div class="col-3 text-right">
                <p >Uploaded: <?php echo get_the_modified_time('jS, F, Y'); ?></p>
            </div>
        <div class="line"></div>
        
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
