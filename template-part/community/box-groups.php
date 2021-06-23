<?php 

if(get_field('hero')){
    $hero = 'background-image:url('. get_field('hero' ).');';
}else{
   $hero = "";
}

$count = 0;
$locations = get_field('members');
if (is_array($locations)) {
  $count = count($locations);
}

?>
<div class="col-3">
        <div class="post-box find-group">
            <a href="<?php  echo get_the_permalink( ); ?>">
                <div class="table-box" style="<?php  echo $hero; ?>">
                    <div class="table-cell"></div>
                </div>
            </a>

            <div class="post-box-info">
                <div class="row gap-0 align-items-center">
                    <div class="col-9">
                        <p class="info"><?php echo get_field('information'); ?></p>
                    </div>
                    <div class="col-3 text-right">
                        <p ><?php echo get_field('status'); ?></p>
                    </div>
                </div>
                
                <div class="line"></div>
                <div class="clear"></div>
                <a href="<?php  echo get_the_permalink( ); ?>"><h3> <?php  the_title(); ?></h3></a>
                <div class="excert_box"><p><?php  echo wp_trim_words(get_the_excerpt(), 20); ?></p></div>

                <div class="line"></div>
                <div class="row gap-0 align-items-center">
                    <div class="col-6">
                        <p>< <?php  echo $count; ?> ></p>
                    </div>
                    <div class="col-6 text-right">
                        <a href="<?php  echo get_the_permalink(); ?>" class="read-more" >View</a>
                    </div>
                </div>
            </div>
        </div>
</div>