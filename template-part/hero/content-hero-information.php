<?php if( get_field('box_information') ){ ?>
    <section class="hero-information">
        <div class="row align-items-center">
            <div class="col-6">
                <div class="content-section">
                    <h2><?php echo get_field('box_information');  ?></h2>
                    <p><?php echo get_field('box_description');  ?></p>
                </div>
            </div>
            <div class="col-6">
                <img src="<?php echo get_field('box_image');  ?>" class="attachment-full size-full wp-post-image">        
            </div>
        </div>
    </section>
<?php } ?>
