<?php 

if(get_field('hero_image')){
    $hero = 'background-image:url('. get_field('hero_image' ).');';
}else{
   $hero = "";
}


$col = "3";
if  (is_author() or is_single() ){
  $col = "4";

}

?>
<div class="col-<?php echo $col; ?>">
        <div class="post-box find-group contributions">
            <a href="<?php  echo get_the_permalink( ); ?>">
                <div class="table-box" style="<?php  echo $hero; ?>">
                    <div class="table-cell"></div>
                </div>
            </a>

            <div class="post-box-info">
                <div class="row gap-0 align-items-center">
                    <div class="col-9">
                        <p class="info"><?php $term =  get_field('categories'); echo $term->name; ?></p>
                    </div>
                    <div class="col-3 text-right">
                        <p ></p>
                    </div>
                </div>
                
                <div class="line"></div>
                <div class="clear"></div>
                <a href="<?php  echo get_the_permalink( ); ?>"><h3> <?php  the_title(); ?></h3></a>
                <div class="excert_box"><p><?php  echo wp_trim_words(get_field('description'), 20); ?></p></div>

                <div class="line"></div>
                <div class="row gap-0 align-items-center">
                    <div class="col-6">
                        <p>< saves ></p>
                    </div>
                    <div class="col-6 text-right">
                        <a href="<?php  echo get_the_permalink(); ?>" class="read-more" >View</a>
                    </div>
                </div>
            </div>
        </div>
</div>