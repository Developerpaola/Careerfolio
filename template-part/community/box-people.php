
<?php
$userID = $user_ID ;

$author_obj = get_user_by('id', $userID);
$profile = '';
$banner = '';

if( get_field('profile_img', 'user_'.$userID ) ){
    $profile = 'background-image:url('. get_field('profile_img', 'user_'.$userID ).')';
}else{
    $profile = 'background-image:url('.get_site_url().'/wp-content/uploads/2020/07/default-profile.png)';
}
if( get_field('banner_img', 'user_'.$userID ) ){
    $banner = 'background-image:url('. get_field('banner_img', 'user_'.$userID ).')';
}else{
    $banner = 'background-image:url('.get_site_url().'/wp-content/uploads/2020/04/Evac-complete-cleantech-solution-building.jpg)';
}
?>

<div class="col-4">
            <div class="post-box company_box user-box">
                                        <a href="<?php echo get_author_posts_url($userID ); ?>"><div class="post-box-img" ></div></a>
                                        <div class="table-box" style="<?php echo $banner; ?>">
                                            <div class="table-cell">
                                            </div>
                                        </div>
                                        <div class="post-box-info">
                                            <div class="row">
                                                <div class="col-5"> <a href="<?php echo get_author_posts_url($userID ); ?>"><div class="circle-img" style="<?php echo $profile; ?>"> </div></a></div>
                                                <div class="col-7 text-right"> <a class="btn-style-roundbox" style="margin:10px 0;" href="<?php echo get_author_posts_url($userID ); ?>">Connect +</a></div>
                                           </div>
                                           <h3><?php echo esc_html( $author_obj->first_name ) . ' ' . esc_html( $author_obj->last_name ) ; ?></h3>
                                           <p><?php echo get_field('job_title_information', 'user_'.$userID); ?></p>
                                        </div>
            </div>
</div>


