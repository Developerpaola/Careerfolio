<?php
/**
 * Template part for big center hero image
 * @author Jonathan Soto
 * @package foundry
 */
 ?>

<section id="hero-<?php the_ID(); ?>" class="hero simple-page post-hero" >
    <div class="row">
        <div class="col-7">
           
                <?php
                    if ( has_post_thumbnail( get_the_ID() ) ) {
                        echo get_the_post_thumbnail( get_the_ID() , 'full'  );
                    }
                ?>
               
        </div>
        <div class="col">
            <div class="content-section">        
                <h3><span class="badge bg-secondary">Recipe</span></h3>
                <h1><?php the_title(); ?></h1>
                <img src="<?php echo get_template_directory_uri(); ?>/dist/images/service/down-pink-box-arrow-bottl.svg" alt="<?php the_title(); ?>" />
            </div>
        </div>
    </div>
</section><!-- hero; ?> -->
