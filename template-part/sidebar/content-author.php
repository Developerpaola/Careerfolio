<?php 
global $wp_query;
$userauthor = $wp_query->get_queried_object(); 
$userID = $userauthor->ID;

$profile = '';
$message = '';
$country = get_field('country', 'user_'.$userID);
$locationtext = ",".get_field('location', 'user_'.$userID)."";

if( get_field('profile_img', 'user_'.$userID ) ){
    $profile = 'background-image:url('. get_field('profile_img', 'user_'.$userID ).')';
}
?>

<div id="sidebar">
  <div class="circle-img" style="<?php echo $profile; ?>"> </div>
         
    <p>Location: <br><strong><?php echo esc_html( $country->name ).' '.$locationtext; ?></strong></p>
    <p><strong>Sector:</strong><br><?php echo get_field('industries', 'user_'.$userID ); ?></p>
    <p><strong>Career Level:</strong><br><?php  echo get_field('career_level', 'user_'.$userID ); ?></p>

 
    <!-- My Companies---->  
    
    
        <?php 
            $args =  array( 
                'orderby' => 'title',
                'post_type'  => 'company',
                'posts_per_page' => 5,
                'author__in' => $userID
                
            ) ;

            $postslist = new WP_Query( $args );
            if ( $postslist->have_posts() ){ ?>
                <p><strong>Companies:</strong><br>
                    <?php while ( $postslist->have_posts() ) : $postslist->the_post();  ?>
                         <a  href="<?php echo get_the_permalink($contentco); ?>"><?php echo get_the_title($contentco); ?></a><br>
                    
                    <?php   endwhile;?>
                </p>
            <?php } ?>
        
    

    <!-- My Groups----> 
    <h3>My Groups</h3> 
    <p><a href="">My Groups</a></p>    

    
    <h3>Similar Profiles</h3>  
        
    <?php
        $authorindustries = get_field('industries', 'user_'.$userID );
        $args1 = array(
            'role' => 'subscriber',
            'orderby' => 'user_nicename',
            'order' => 'ASC'
        );

        $subscribers = get_users($args1);
        $cont = 0;

        foreach ($subscribers as $user) {
            
            $idsimilarprofiles = $user->ID;
            $similarprofiles = get_field('industries', 'user_'.$idsimilarprofiles);
            $similarprofileimg = get_field('profile_img', 'user_'.$idsimilarprofiles);

            if ($similarprofiles == $authorindustries && $idsimilarprofiles != $userID) { ?>
                    
                <div class="row similar-profiles">
                    <div class="col-3">
                        <a href="<?php echo get_author_posts_url($idsimilarprofiles)?>">
                            <div class="circle-img" style="background-image:url(<?php echo $similarprofileimg; ?>);"></div>
                        </a>            
                    </div>
                    
                    <div class="col">
                        <p>
                            <a href="<?php echo get_author_posts_url($idsimilarprofiles); ?>"><?php echo $user->first_name; ?>&nbsp;<?php echo $user->last_name; ?></a><br>
                            <?php echo get_field('job_title_information', 'user_'.$idsimilarprofiles); ?>
                        </p>
                        
                    </div>
                </div>
            <?php
            }
            if(  $cont == 5){
              break;  
            }
            $cont++;
        }
        
        echo $message;
    ?>
</div>
