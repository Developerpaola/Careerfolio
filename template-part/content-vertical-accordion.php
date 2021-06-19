<?php if( have_rows('accordion') ): ?>

    <section class="section big-padding vertical-accordion">
        <div class="container">
            
            <h2><?php the_field('accordion-title');?></h2>
            <div class="line"></div>

            <?php while( have_rows('accordion') ) : the_row();
                
                echo '<div class="accordion-section">';
                if( get_sub_field('svg') ){
                    the_sub_field('svg');
                }
                echo '<h3>'.get_sub_field('title').'</h3>';
                echo '<div class="information">'.get_sub_field('description').'
                        <a class="down-btn" href="javascript:void(0);">Read more</a>
                        </div>';
                echo '</div>';

            // End loop.
            endwhile; ?>

        </div>
</section>



<?php endif; ?>
