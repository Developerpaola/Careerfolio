<?php 

$author_id = get_post_field( 'post_author',  get_the_ID() );
$user_info = get_userdata($author_id );
if( get_field('featured_image', get_the_ID() ) ){
    $profile = 'background-image:url('. get_field('featured_image', get_the_ID()).')';
}
$terms = get_field('sector', get_the_ID());
$termsname='';
if( $terms ): 
    foreach( $terms as $term ):
        $termsname .= esc_html( $term->name ).' ';
    endforeach; 
endif; 



?>
<div id="sidebar" class="company group-<?php echo get_the_ID(); ?>">
    <div class="circle-img" style="<?php echo $profile; ?>"> </div>
    <p>Privacy: <br><strong><?php echo get_field('status',  get_the_ID()); ?></strong></p>
    <p>Sector: <br><strong> <?php echo $termsname; ?></strong></p>

    <h3>Admin</h3>
    <div class="row">
        <div class="col-3">
            <?php if( get_field('profile_img', 'user_'.$author_id  ) ){
								$profile = 'background-image:url('. get_field('profile_img', 'user_'.$author_id  ).')';
								echo '<a href="'. get_author_posts_url( $author_id ).'" class="circle-img author" style="'.$profile.'"> </a>';
			} ?>
        </div>
        <div class="col">
            <p><a href="<?php echo get_author_posts_url( $author_id ); ?>" ><?php echo esc_html( $user_info->first_name ) . ' ' . esc_html( $user_info->last_name ); ?></a><br>
            <?php the_field('job_title_information', 'user_'.$author_id ); ?>
            <p>
        </div>
    </div>
    
    <h3>Members</h3>

    <div class="row">
		<?php
            $cont = 0;
			if( have_rows('members') ):
				while( have_rows('members') ) : the_row();
                    $user_repe = get_userdata( get_sub_field('user') );
                    $cont ++;
        ?>

                    <div class="col-3">
                            <?php if( get_field('profile_img', 'user_'.get_sub_field('user')  ) ){
                                                $profile = 'background-image:url('. get_field('profile_img', 'user_'.get_sub_field('user')  ).')';
                                                echo '<a href="'. get_author_posts_url( get_sub_field('user')).'" class="circle-img author" style="'.$profile.'"> </a>';
                            }else{
                                echo '<a href="'. get_author_posts_url( get_sub_field('user')).'" class="circle-img author" > </a>';
                            } ?>
                        </div>
                        <div class="col-9">
                            <p><a href="<?php echo get_author_posts_url( get_sub_field('user') ); ?>" ><?php echo esc_html( $user_repe->first_name ) . ' ' . esc_html( $user_repe->last_name ); ?></a><br>
                            <?php the_field('job_title_information', 'user_'.get_sub_field('user') ); ?>
                            <p>
                    </div>
        <?php
                    if($cont >= 4){
                        break;
                    }
				endwhile;
			endif;
		?>
        <a href="javascript: void(0);" class="open-tab" tab="pills-member-tab">View all</a>
	</div>
</div>