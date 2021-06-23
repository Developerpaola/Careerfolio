<?php
/**
 * The index group
 */

get_header();
?>

<main role="main" class="main index-main content-block separate-content single">
    <div class="container">
        <div class="single-information">
            <div class="row">
                <div class="col">
                    <div class="row">
                        <div class="col-2">
                            <?php 
                                $author_id = get_post_field( 'post_author', $post_id );
                                if( get_field('profile_img', 'user_'.$author_id  ) ){
                                    $profile = 'background-image:url('. get_field('profile_img', 'user_'.$author_id  ).')';
                                    echo '<a href="'.get_the_permalink(45).'" class="circle-img" style="'.$profile.'"> </a>';
                                }
                            ?>
                        </div>
                        <div class="col">
                            <h1><?php the_title(); ?></h1>
                            <p class="subtitle"> 
                                Uploaded: <?php echo get_the_modified_time('F jS, Y');?> 
                                by  <a href="<?php echo get_author_posts_url($userID ); ?>"><?php echo get_the_author_meta( 'first_name', $author_id ).' '.get_the_author_meta( 'last_name', $author_id );?></a>
                            </p>
                        </div>
                     </div>
                        

                    <?php 
                        if ( have_posts() ) : 
                            while ( have_posts() ) : the_post();
                                the_content();

                            endwhile; 
                        endif; 
                    ?>
                    <div class="comments-box">
                        <?php
                            if ( comments_open() || get_comments_number() ) :
                                comments_template();
                            endif;
                        ?>
                    </div>
                </div>
                <div class="col-1"></div>
                <div class="col-3">

                </div>
            </div>
        </div>
    </div>
    
</main><!-- #main -->

<?php
get_footer();
