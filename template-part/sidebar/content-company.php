<?php 
$location = get_field('location', get_the_ID());
$author_id = get_post_field( 'post_author',  get_the_ID() );
$user_info = get_userdata($author_id );
$locationname = get_term($location);
$city = get_field('city', get_the_ID());
if( get_field('logo', get_the_ID() ) ){
    $profile = 'background-image:url('. get_field('logo', get_the_ID()).')';
}

$terms = get_field('industries', get_the_ID());
$termsname='';
if( $terms ): 
    foreach( $terms as $term ):
        $termsname .= '<a href="'.esc_url( get_term_link( $term ) ).'">'.esc_html( $term->name ).'</a> ';
    endforeach; 
endif; 
?>

<div id="sidebar" class="company com-<?php echo get_the_ID(); ?>">
    <div class="circle-img" style="<?php echo $profile; ?>"> </div>
    <p>Location: <br><strong><?php echo $city.', '.$locationname->name; ?></strong></p>
    <?php if(get_field('website', get_the_ID() )){ ?>
        <p>Website: <br><strong><a target="_blank" href="<?php echo get_field('website', get_the_ID() ); ?>"><?php echo get_field('website', get_the_ID() ); ?></a></strong></p>
    <?php } ?>
    <?php if(get_field('telephone', get_the_ID() )){ ?>
        <p>Telephone: <br><strong><a target="_blank" href="tel:<?php echo get_field('telephone', get_the_ID() ); ?>"><?php echo get_field('telephone', get_the_ID() ); ?></a></strong></p>
    <?php } ?>
    <p>Sector: <br><strong> <?php echo $termsname; ?></strong></p>

    <h3>Owner</h3>
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
    
    <h3>Employees</h3>
</div>