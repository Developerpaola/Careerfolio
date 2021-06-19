
<?php
$userID = $user_ID ;

$author_obj = get_user_by('id', $userID);
$profile = '';
if( get_field('profile_img', 'user_'.$userID ) ){
    $profile = 'background-image:url('. get_field('profile_img', 'user_'.$userID ).')';
}else{
    $profile = 'background-image:url(http://foundry.pilotspider.com/wp-content/uploads/2020/07/default-profile.png)';
}
?>

<div class="col-4">
    <a href="<?php echo get_author_posts_url($userID ); ?>" class="user_<?php echo $userID ; ?>">
                    <div class="user-box">
                        <div class="column c_35"> <div class="circle-img" style="<?php echo $profile; ?>"> </div></div>
                        <div class="column c_65">   
                            <h2><?php echo esc_html( $author_obj->first_name ) . ' ' . esc_html( $author_obj->last_name ) ; ?></h2>
                            <h3><?php echo get_field('job_title_information', 'user_'.$userID); ?></h3>
                        </div>
                        <div class="clear"></div>
                        <div class="line"></div>
                        <p><strong>Career Level:</strong><?php echo get_field('career_level', 'user_'.$userID ).' &nbsp;&nbsp;<strong>Location:</strong> '.get_field('location', 'user_'.$userID ); ?></p>
                        <p><strong>Industries:</strong><?php echo get_field('industries', 'user_'.$userID ); ?></p>
                    </div>
    </a>
</div>