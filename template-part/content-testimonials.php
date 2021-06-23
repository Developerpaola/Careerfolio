<section class="section ">
        <div class="container">
            <div class="testimonial-slider">

                <?php
                    if( have_rows('testimonials') ):
                        while( have_rows('testimonials') ) : the_row(); 
                    ?>
                        <div>
                            <div class="row align-items-center">
                                <div class="col-1"></div>
                                <div class="col-3"> 
                                    <img src="<?php echo get_sub_field( 'image' ); ?>" alt="testimonial" />
                                   
                                </div>
                                <div class="col-1"></div>
                                <div class="col">
                                    <h2><?php the_sub_field( 'testimonial' ); ?></h2>
                                    <h3><?php the_sub_field( 'author' ); ?></h3>
                                    <p class="more-info"><?php the_sub_field( 'more_info' ); ?></p>
                                </div>
                                <div class="col-1"></div>
                            </div>
                        </div>

                    <?php
                        endwhile;
                    endif;
                ?>

                
            </div>
        </div>
    </section>