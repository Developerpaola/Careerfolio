<?php if( have_rows('tabs') ){ ?>
<section class="section light big-padding internal-tabs">
        <div class="container">
            <h2><?php echo  get_field('tab_information'); ?></h2>
            <div class="line"></div>
            <ul class="nav nav-pills mb-4 justify-content-center" id="pills-tab" role="tablist">


                <?php $cont = 0; while( have_rows('tabs') ) : the_row();

                    $new_point = sanitize_title( get_sub_field('title') );
                    if($cont == 0){
                        $active= 'active';
                    }else{
                        $active= '';
                    }
                    $cont ++;
                    
                    echo ' <li class="nav-item" role="presentation">
                                <button class="nav-link '. $active.'" id="pills-'.$new_point.'" data-bs-toggle="pill" data-bs-target="#'.$new_point.'" type="button" role="tab" aria-controls="'.$new_point.'" aria-selected="true">
                                    '.get_sub_field('svg').'
                                    '.get_sub_field('title').'
                                </button>
                            </li>';

                // End loop.
                endwhile; ?>

               
            </ul>
            <div class="tab-content" id="pills-tabContent">

                <?php $cont = 0; while( have_rows('tabs') ) : the_row();

                    $new_point = sanitize_title( get_sub_field('title') );
                    if($cont == 0){
                        $active= 'active';
                    }else{
                        $active= '';
                    }
                    $cont ++;
                    
                    echo ' <div class="tab-pane fade show '.$active.'" id="'.$new_point.'" role="tabpanel" aria-labelledby="pills-'.$new_point.'">
                                '.get_sub_field('description').'
                            </div>';

                // End loop.
                endwhile; ?>
            </div>
        </div>
</section>
<?php } ?>