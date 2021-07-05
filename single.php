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



<main role="main" class="main content-information single-information">

    
    <div class="container">

        <center> <p class="pill"><?php $term =  get_field('categories'); echo $term->name; ?></p></center>
        <h1><?php the_title(); ?></h1>
        <p class="subtitle"><strong>Contribution by: </strong><a href="<?php echo get_author_posts_url( $author_id ); ?>" ><?php echo esc_html( $user_info->first_name ) . ' ' . esc_html( $user_info->last_name ); ?></a></p>
        
        <?php if( get_current_user_id() ==  $author_id ){ 
										echo '<center><div class="dot-btn">
                                                <div class="dots">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="34" height="34" viewBox="0 0 34 34">
                                                        <g id="Group_262" data-name="Group 262" transform="translate(-843 -77)">
                                                            <g id="Rectangle_390" data-name="Rectangle 390" transform="translate(843 77)" fill="#f0f1f7" stroke="#ededed" stroke-width="1">
                                                            <rect width="34" height="34" rx="5" stroke="none"/>
                                                            <rect x="0.5" y="0.5" width="33" height="33" rx="4.5" fill="none"/>
                                                            </g>
                                                            <g id="Group_89" data-name="Group 89" transform="translate(-330 -272)">
                                                            <circle id="Ellipse_15" data-name="Ellipse 15" cx="1.5" cy="1.5" r="1.5" transform="translate(1183 365)" fill="#ff3f7d"/>
                                                            <circle id="Ellipse_16" data-name="Ellipse 16" cx="1.5" cy="1.5" r="1.5" transform="translate(1189 365)" fill="#ff3f7d"/>
                                                            <circle id="Ellipse_17" data-name="Ellipse 17" cx="1.5" cy="1.5" r="1.5" transform="translate(1195 365)" fill="#ff3f7d"/>
                                                            </g>
                                                        </g>
                                                    </svg>
                                                </div>
                                                <div class="links-addons">
                                                    <a class="" href="'.get_the_permalink(84).'/?edit='.get_the_ID().'">Edit</a>
                                                    <a class="remove-btn"  href="'.get_the_permalink(84).'/?remove='.get_the_ID().'">Remove</a>
                                                </div>
                                            </div></center><br><br>';
									
									} ?>



        <?php
        if( get_field('hero_image') ){
            echo '<img class="hero-img" src="'.get_field('hero_image').'" /><br>';
        }
        ?>
        <div class="row">
            <div class="col-6">
            </div>
            <div class="col-6 text-right">
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
