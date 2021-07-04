<?php
/**
 * This is for conversation page
 *
 *
 * @author Jonathan Soto
 *
 * @package foundry
 */

get_header();
$author_id = get_post_field( 'post_author',  get_the_ID() );
?>

<main role="main" class="main single-information full-content-information">
    <div class="container">
        <a class="back-btn" href="<?php echo get_the_permalink( get_field('group') ); ?>">Back</a>
        <div class="row">
            
            <div class="col-7">
                <div class="row">
                    <div class="col-2">
                        <?php if( get_field('profile_img', 'user_'.$author_id  ) ){ 
                                $profile = 'background-image:url('. get_field('profile_img', 'user_'.$author_id ).')';
                                echo '<div class="circle-img" style="'. $profile.'"> </div>';
                        } ?>
                    </div>
                    <div class="col-10">
                        <h1><?php the_title(); ?></h1>
                         <p class="subtitle"><?php echo get_field('subtitle'); ?></p>
                    </div>

                </div>
               
                <?php 
                    if ( have_posts() ) : 
                        while ( have_posts() ) : the_post();
                            the_content();
                        endwhile; 
                    endif; 
                ?>

                <div class="comments">
                    <?php if ( comments_open() || get_comments_number() ) :
                                comments_template( );
                            endif; 
                    ?> 
                </div>
            </div>

            <div class="col-1">
                <?php
                    if( $author_id == get_current_user_id() ){

                        echo '<div class="dot-btn">
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
                                                    <a   href="'.get_the_permalink(862).'/?edit='.get_the_ID().'">Edit</a>
                                                    <a class="remove-btn"  href="'.get_the_permalink(862).'/?remove='.get_the_ID().'">Remove</a>
                                                </div>
                                            </div>';

                    }
                ?>

            </div>

            <div class="col-4">
                <div class="sidebar-information">
                    <h3>More Q&A from this group</h3>
                    <?php echo do_shortcode('[list_conversations group="'.get_field('group').'" ]'); ?>
                </div>
            </div>
    </div>
    
</main><!-- #main -->

<?php if( get_field('profile_img', 'user_'.$author_id  ) ){ ?>
    <script>
    $('label[for="comment"]').css('background-image','url(<?php echo get_field('profile_img', 'user_'.$author_id  ) ?>)');
    </script>
<?php } ?>




<?php
get_footer();
