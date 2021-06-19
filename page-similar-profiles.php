<?php
/**
 * Template Name: Similar Profile page
 * The template for displaying sidebar pages
 *
 */
 get_header();
 $thumbnail = get_the_post_thumbnail_url();
$heroImg = '';
if ( $thumbnail ) {
	$heroImg = 'background-image:url('.$thumbnail .')';
} ?>

<section id="hero-image" style="<?php echo $heroImg; ?>">
 		<div class="hero-cell" >
 			<h1><?php the_title(); ?></h1>
 			<h2><?php the_field('subtitle'); ?></h2>
 		</div>
 	</section>

 <div class="container">
 	<div id="primary" class="site-content">
 	<?php 
	 	$comunvar = $_GET['ind']; 

	 	$args1 = array(
		 'role' => 'subscriber',
		 'orderby' => 'user_nicename',
		 'order' => 'ASC'
		);
		 $subscribers = get_users($args1);

		 foreach ($subscribers as $user){
		 	$idusers = $user->ID;
		 	$profile = '';
			$userindustries = get_field('industries', 'user_'.$idusers);
			if ($userindustries == $comunvar) {
		        if( get_field('profile_img', 'user_'.$idusers ) ){
		            $profile = 'background-image:url('. get_field('profile_img', 'user_'.$idusers ).')';
		        }else{
		            $profile = 'background-image:url(http://176.32.230.13/foundrydevelopment.com/pilot-spider/wp-content/uploads/2020/07/default-profile.png)';
		        }

		        $msg = '<a href="'. get_author_posts_url($user->ID).'" class="user_'.$user->ID.'">
	                    <div class="user-box">
	                        <div class="column c_35"> <div class="circle-img" style="'.$profile.'"> </div></div>
	                        <div class="column c_65">   
	                            <h2>' . esc_html( $user->first_name ) . ' ' . esc_html( $user->last_name ) . '</h2>
	                            <h3>'.get_field('job_title_information', 'user_'.$idusers).'</h3>
	                        </div>
	                        <div class="clear"></div>
	                        <div class="line"></div>
	                        <p><strong>Career Level:</strong> '.get_field('career_level', 'user_'.$idusers ).' &nbsp;&nbsp;<strong>Location:</strong> '.get_field('location', 'user_'.$idusers ).'</p>
	                        <p><strong>Industries:</strong> '.get_field('industries', 'user_'.$idusers ).'</p>
	                    </div>
	                </a>
	                ';
	            echo $msg;

			 }
			
		}
		 echo '<div class="clear"></div>';
 	?>
	</div>
 </div>


 <?php get_footer(); ?>