
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
            <div class="post-box company_box user-box">
                                        <a href="<?php echo get_author_posts_url($userID ); ?>"><div class="post-box-img" ></div></a>
                                        <div class="table-box" style="background-image:url(http://www.careerfolio.co.uk/wp-content/uploads/2020/04/Evac-complete-cleantech-solution-building.jpg);">
                                            <div class="table-cell">
                                            </div>
                                        </div>
                                        <div class="post-box-info">
                                            <div class="row">
                                                <div class="col-5"> <a href="<?php echo get_author_posts_url($userID ); ?>"><div class="circle-img" style="<?php echo $profile; ?>"> </div></a></div>
                                                <div class="col-7"> <a class="btn-style-roundbox" href="<?php echo get_author_posts_url($userID ); ?>">Connect +</a></div>
                                           </div>
                                           <h3><?php echo esc_html( $author_obj->first_name ) . ' ' . esc_html( $author_obj->last_name ) ; ?></h3>
                                           <p><?php echo get_field('job_title_information', 'user_'.$userID); ?></p>
                                        </div>
            </div>
</div>


