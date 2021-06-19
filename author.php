<?php
/**
 * Template Name: Sidebar Page
 * The template for displaying sidebar pages
 *
 */
$dataactualuser = wp_get_current_user();
if (is_user_logged_in()) {
	$idactualuser = wp_get_current_user()->data->ID;
}
get_header();
acf_form_head();
global $wp;
global $wp_query;
$userauthor = $wp_query->get_queried_object(); 

$hero = '';
if( get_field('banner_img', 'user_'.$userauthor->ID ) ){
	$hero = 'background-image:url('. get_field('banner_img', 'user_'.$userauthor->ID ).')';
}

$post_insight = get_posts( array(
								    'orderby'    => 'date',
								    'sort_order' => 'asc',    
								    'post_type'  => 'insights',
								    'posts_per_page' => 50,
								    'author' => $userauthor->ID
								) );
$post_company = get_posts( array(
							    'orderby'    => 'date',
							    'sort_order' => 'asc',    
							    'post_type'  => 'company',
							    'posts_per_page' => 50,
							    'author' => $userauthor->ID
							) );
?>

 	<section id="hero-image" class="author-banner" style="<?php echo $hero; ?>">
 		<div class="hero-cell" >
 		</div>
 	</section>

 	
	<div id="primary" class="site-content  container">
		<div id="content" role="main">

			

			<div class="column c_23">
				 <?php echo do_shortcode('[sidebar_profile perfil="'.$userauthor->ID.'"]');  ?>
			</div>


			<div class="column c_5"><br></div>

			<div class="column c_72">
				<div class="column c_70">
					<h1><?php echo esc_html( $userauthor->first_name ) . ' ' . esc_html( $userauthor->last_name ); ?></h1>
	 				<h3 class="subtitle"><?php the_field('job_title_information', 'user_'.$userauthor->ID ); ?></h3>
	 			</div>
	 			<div class="column c_30 pos_right">
	 				<br>
	 				<?php if( get_current_user_id() == $userauthor->ID){ 
	 					echo '<a href="'.get_the_permalink(45).'/?edit=1" class="btn-style-blue">Edit</a>';
	 					echo '<a href="javascript:void(0)" class="btn-style-grey open-addon" id-attr="more-addons">...</a>
				 				<div id="more-addons" class="post-addons">
				 					<span class="btn-close open-addon" id-attr="more-addons">X</span>
				 					<a href="'.get_the_permalink( 84 ).'" class="btn-style-blue">Add Insights</a>
				 					<a href="'.get_the_permalink( 106 ).'" class="btn-style-blue">Add Company</a>
				 					<a href="'.get_author_posts_url(get_current_user_id()).'" class="btn-style-blue">View Profile</a>
				 				</div>';
	 				} ?>
	 				

	 			</div>
	 			<div class="clear"></div>
 				<div class="line"></div>
 					<div class="column c_50 btns-followings">
 						<div class="column c_33">
 							<h4>0</h4>
 							<p>Followers</p>
 						</div>
 						<div class="column c_33">
 							<?php if( get_current_user_id() == $userauthor->ID){ ?>
 								<a href="<?php echo get_home_url(); ?>/following/">
 									<?php
					 					$j = 1;
										if( have_rows('users_following','user_'.$idactualuser.'') ):
										    while( have_rows('users_following', 'user_'.$idactualuser.'') ) : the_row();
										      $j++;
										    endwhile;
										    $controws = $j - 1;
										// No value.
										else :
											$controws = 0;
										    // Do something...
										endif;
									?>
 									<h4><?php echo $controws; ?></h4>
 									<p>Following</p>
 								</a>
 							<?php }else{ ?>
 								<a href="<?php echo get_home_url(); ?>/following/?idpro=<?php echo $userauthor->ID; ?>">
 									<?php
					 					$j = 1;
										if( have_rows('users_following','user_'.$userauthor->ID.'') ):
										    while( have_rows('users_following', 'user_'.$userauthor->ID.'') ) : the_row();
										      $j++;
										    endwhile;
										    $controws = $j - 1;
										// No value.
										else :
											$controws = 0;
										    // Do something...
										endif;
									?>
 									<h4><?php echo $controws; ?></h4>
 									<p>Following</p>
 								</a>
 							<?php } ?>
 						</div>
 						<div class="column c_33">
 							<?php if( get_current_user_id() == $userauthor->ID){ ?>
 								<a href="<?php echo get_home_url(); ?>/following/?linkco=active">
 									<?php
					 					$m = 1;
										if( have_rows('companies','user_'.$idactualuser.'') ):
										    while( have_rows('companies', 'user_'.$idactualuser.'') ) : the_row();
										    	$m++;
										    endwhile;
										    $contcorows = $m - 1;
										// No value.
										else :
											$contcorows = 0;
										    // Do something...
										endif;
									?>
 									<h4><?php echo $contcorows; ?></h4>
 									<p>Connections</p>
 								</a>
 							<?php }else{ ?>
 								<a href="<?php echo get_home_url(); ?>/following/?idpro=<?php echo $userauthor->ID; ?>&linkco=active">
 									<?php
					 					$m = 1;
										if( have_rows('companies','user_'.$userauthor->ID.'') ):
										    while( have_rows('companies', 'user_'.$userauthor->ID.'') ) : the_row();
										    	$m++;
										    endwhile;
										    $contcorows = $m - 1;
										    
										// No value.
										else :
											$contcorows = 0;
										    // Do something...
										endif;
									?>
 									<h4><?php echo $contcorows; ?></h4>
 									<p>Connections</p>
 								</a>
 							<?php } ?>
 						</div>
 					</div>
 					<div class="column c_50 btns-msg pos_right">
 						<?php
 						//user is login
						if (is_user_logged_in()) {

							//Insert following user
							if (isset($_GET['id'])) {
		 						$row = array(
						    		'field_5f0c5ac87ed0c' => $_GET['id'],
								);
								add_row('field_5f0c5a777ed0b', $row , 'user_'.$idactualuser.'');
 							}
 							

 						$stack = array();
						// Check rows exists.
						if( have_rows('users_following','user_'.$idactualuser.'') ):

						    // Loop through rows.
						    while( have_rows('users_following', 'user_'.$idactualuser.'') ) : the_row();

						        // Load sub field value.
						       	$idusers = get_sub_field('user_following', 'user_'.$idactualuser.'');
						        array_push($stack, $idusers);

						    // End loop.
						    endwhile;

						// No value.
						else :
						    // Do something...
						endif;

				
						if (in_array($userauthor->ID , $stack)) { ?>

							<a href="" style="pointer-events: none;border: 1px solid #ccc;background-color: #ccc;" class="btn-style-blue"><svg class="connect-icon" xmlns="http://www.w3.org/2000/svg" width="10.688" height="10.703" viewBox="0 0 10.688 10.703">
						  <g id="Group_175" data-name="Group 175" transform="translate(-1203.343 -38.861)">
						    <path id="Path_1694" data-name="Path 1694" d="M1563.456,41.305c-.018.115-.031.23-.055.343a2.2,2.2,0,0,1-.3.745,2.073,2.073,0,0,1-.273.325q-1.117,1.139-2.239,2.273c-.239.241-.481.481-.732.71a2.108,2.108,0,0,1-1.362.571,2.293,2.293,0,0,1-1.617-.515,1.4,1.4,0,0,1-.187-.189.322.322,0,0,1,.011-.411.284.284,0,0,1,.383-.06,2.473,2.473,0,0,1,.276.195,1.551,1.551,0,0,0,1.242.307,1.619,1.619,0,0,0,.905-.474c.977-.951,1.945-1.911,2.887-2.9a1.417,1.417,0,0,0,.377-.9,1.512,1.512,0,0,0-.149-.874,1.625,1.625,0,0,0-1.133-.885,1.675,1.675,0,0,0-1.045.113,1.89,1.89,0,0,0-.483.36c-.271.256-.54.514-.81.77-.058.055-.119.107-.181.157a.29.29,0,0,1-.408-.043.341.341,0,0,1,.011-.439c.367-.365.728-.738,1.111-1.087a2.114,2.114,0,0,1,1.233-.526,2.338,2.338,0,0,1,2.41,1.548,2.147,2.147,0,0,1,.115.531.4.4,0,0,0,.01.048Z" transform="translate(-349.426)" fill="#fff"/>
						    <path id="Path_1695" data-name="Path 1695" d="M1205.64,347.234a2.364,2.364,0,0,1-2.259-1.875,2.389,2.389,0,0,1,.2-1.464,1.98,1.98,0,0,1,.405-.563q1.1-1.117,2.212-2.23c.254-.255.506-.513.777-.749a2.056,2.056,0,0,1,1.252-.527,2.512,2.512,0,0,1,.8.056,2.221,2.221,0,0,1,.989.54.445.445,0,0,1,.154.263.277.277,0,0,1-.118.286.307.307,0,0,1-.34.027,2.041,2.041,0,0,1-.27-.193,1.619,1.619,0,0,0-1.835-.1,1.941,1.941,0,0,0-.316.258q-1.473,1.419-2.889,2.895a1.385,1.385,0,0,0-.372.818,1.767,1.767,0,0,0,.059.765,1.69,1.69,0,0,0,.589.793,1.539,1.539,0,0,0,1.094.313,1.455,1.455,0,0,0,.952-.4c.255-.241.508-.484.763-.724.109-.1.228-.193.331-.3a.3.3,0,0,1,.473.165.335.335,0,0,1-.083.337c-.3.29-.6.582-.894.872-.061.059-.128.113-.189.173a2.019,2.019,0,0,1-1.033.505C1205.944,347.207,1205.791,347.215,1205.64,347.234Z" transform="translate(0 -297.67)" fill="#fff"/>
						  </g>
						</svg>
					Connect</a>
							
						<?php }else{ ?>
							
						

 						<a href="<?php echo get_home_url(); ?>/author/<?php echo $userauthor->first_name; ?>/?id=<?php echo $userauthor->ID; ?>" class="btn-style-blue"><svg class="connect-icon" xmlns="http://www.w3.org/2000/svg" width="10.688" height="10.703" viewBox="0 0 10.688 10.703">
						  <g id="Group_175" data-name="Group 175" transform="translate(-1203.343 -38.861)">
						    <path id="Path_1694" data-name="Path 1694" d="M1563.456,41.305c-.018.115-.031.23-.055.343a2.2,2.2,0,0,1-.3.745,2.073,2.073,0,0,1-.273.325q-1.117,1.139-2.239,2.273c-.239.241-.481.481-.732.71a2.108,2.108,0,0,1-1.362.571,2.293,2.293,0,0,1-1.617-.515,1.4,1.4,0,0,1-.187-.189.322.322,0,0,1,.011-.411.284.284,0,0,1,.383-.06,2.473,2.473,0,0,1,.276.195,1.551,1.551,0,0,0,1.242.307,1.619,1.619,0,0,0,.905-.474c.977-.951,1.945-1.911,2.887-2.9a1.417,1.417,0,0,0,.377-.9,1.512,1.512,0,0,0-.149-.874,1.625,1.625,0,0,0-1.133-.885,1.675,1.675,0,0,0-1.045.113,1.89,1.89,0,0,0-.483.36c-.271.256-.54.514-.81.77-.058.055-.119.107-.181.157a.29.29,0,0,1-.408-.043.341.341,0,0,1,.011-.439c.367-.365.728-.738,1.111-1.087a2.114,2.114,0,0,1,1.233-.526,2.338,2.338,0,0,1,2.41,1.548,2.147,2.147,0,0,1,.115.531.4.4,0,0,0,.01.048Z" transform="translate(-349.426)" fill="#fff"/>
						    <path id="Path_1695" data-name="Path 1695" d="M1205.64,347.234a2.364,2.364,0,0,1-2.259-1.875,2.389,2.389,0,0,1,.2-1.464,1.98,1.98,0,0,1,.405-.563q1.1-1.117,2.212-2.23c.254-.255.506-.513.777-.749a2.056,2.056,0,0,1,1.252-.527,2.512,2.512,0,0,1,.8.056,2.221,2.221,0,0,1,.989.54.445.445,0,0,1,.154.263.277.277,0,0,1-.118.286.307.307,0,0,1-.34.027,2.041,2.041,0,0,1-.27-.193,1.619,1.619,0,0,0-1.835-.1,1.941,1.941,0,0,0-.316.258q-1.473,1.419-2.889,2.895a1.385,1.385,0,0,0-.372.818,1.767,1.767,0,0,0,.059.765,1.69,1.69,0,0,0,.589.793,1.539,1.539,0,0,0,1.094.313,1.455,1.455,0,0,0,.952-.4c.255-.241.508-.484.763-.724.109-.1.228-.193.331-.3a.3.3,0,0,1,.473.165.335.335,0,0,1-.083.337c-.3.29-.6.582-.894.872-.061.059-.128.113-.189.173a2.019,2.019,0,0,1-1.033.505C1205.944,347.207,1205.791,347.215,1205.64,347.234Z" transform="translate(0 -297.67)" fill="#fff"/>
						  </g>
						</svg>
					Connect</a>

						<?php }
					?>


 						<a id="myBtn" href="javascript:void(0)" class="btn-whiteblue">Message</a>

 						<?php 
 						//end if user login 
 						}else{ ?>
 							<a href="<?php echo get_home_url(); ?>/create-an-account/" class="btn-style-blue"><svg class="connect-icon" xmlns="http://www.w3.org/2000/svg" width="10.688" height="10.703" viewBox="0 0 10.688 10.703">
						  <g id="Group_175" data-name="Group 175" transform="translate(-1203.343 -38.861)">
						    <path id="Path_1694" data-name="Path 1694" d="M1563.456,41.305c-.018.115-.031.23-.055.343a2.2,2.2,0,0,1-.3.745,2.073,2.073,0,0,1-.273.325q-1.117,1.139-2.239,2.273c-.239.241-.481.481-.732.71a2.108,2.108,0,0,1-1.362.571,2.293,2.293,0,0,1-1.617-.515,1.4,1.4,0,0,1-.187-.189.322.322,0,0,1,.011-.411.284.284,0,0,1,.383-.06,2.473,2.473,0,0,1,.276.195,1.551,1.551,0,0,0,1.242.307,1.619,1.619,0,0,0,.905-.474c.977-.951,1.945-1.911,2.887-2.9a1.417,1.417,0,0,0,.377-.9,1.512,1.512,0,0,0-.149-.874,1.625,1.625,0,0,0-1.133-.885,1.675,1.675,0,0,0-1.045.113,1.89,1.89,0,0,0-.483.36c-.271.256-.54.514-.81.77-.058.055-.119.107-.181.157a.29.29,0,0,1-.408-.043.341.341,0,0,1,.011-.439c.367-.365.728-.738,1.111-1.087a2.114,2.114,0,0,1,1.233-.526,2.338,2.338,0,0,1,2.41,1.548,2.147,2.147,0,0,1,.115.531.4.4,0,0,0,.01.048Z" transform="translate(-349.426)" fill="#fff"/>
						    <path id="Path_1695" data-name="Path 1695" d="M1205.64,347.234a2.364,2.364,0,0,1-2.259-1.875,2.389,2.389,0,0,1,.2-1.464,1.98,1.98,0,0,1,.405-.563q1.1-1.117,2.212-2.23c.254-.255.506-.513.777-.749a2.056,2.056,0,0,1,1.252-.527,2.512,2.512,0,0,1,.8.056,2.221,2.221,0,0,1,.989.54.445.445,0,0,1,.154.263.277.277,0,0,1-.118.286.307.307,0,0,1-.34.027,2.041,2.041,0,0,1-.27-.193,1.619,1.619,0,0,0-1.835-.1,1.941,1.941,0,0,0-.316.258q-1.473,1.419-2.889,2.895a1.385,1.385,0,0,0-.372.818,1.767,1.767,0,0,0,.059.765,1.69,1.69,0,0,0,.589.793,1.539,1.539,0,0,0,1.094.313,1.455,1.455,0,0,0,.952-.4c.255-.241.508-.484.763-.724.109-.1.228-.193.331-.3a.3.3,0,0,1,.473.165.335.335,0,0,1-.083.337c-.3.29-.6.582-.894.872-.061.059-.128.113-.189.173a2.019,2.019,0,0,1-1.033.505C1205.944,347.207,1205.791,347.215,1205.64,347.234Z" transform="translate(0 -297.67)" fill="#fff"/>
						  	</g>
							</svg>
							Connect</a>
 						<a href="<?php echo get_home_url(); ?>/create-an-account/" class="btn-whiteblue">Message</a>
 						<?php }
 						?>
 					</div>
 				<div class="clear"></div>
 				<div style="margin-top: 5px;" class="line"></div>

 				<!--empty information-->
 				
 						
 					

 				<ul class="nav-perfil">
 						<li id="about" attr-info="info-about" class="info-tab active" ><a  href="javascript:void(0)">About me</a></li>
 					<?php if (have_rows('education', 'user_'.$userauthor->ID)) { ?>
 						<li id="education" attr-info="info-education" class="info-tab"><a href="javascript:void(0)">Education</a></li>
 					<?php } ?>
 					<?php if (get_field('skills', 'user_'.$userauthor->ID) || have_rows('experience', 'user_'.$userauthor->ID)) { ?>
 					<li id="skill" attr-info="info-skill" class="info-tab"><a href="javascript:void(0)">Skills & Experience</a></li>
 					<?php } ?>
 						<li id="insights" attr-info="info-insights" class="info-tab"><a href="javascript:void(0)">Insights</a></li>
 						<li id="company" attr-info="info-company" class="info-tab"><a href="javascript:void(0)">Company</a></li>
 				</ul>
 				<div class="clear"></div>
 				<div class="line"></div>

 				
	 				<div id="info-about" class="information-container active">
	 					<?php the_field('about_me', 'user_'.$userauthor->ID); ?>
	 				</div>

	 			<?php if (have_rows('education', 'user_'.$userauthor->ID)) { ?>
	 				<div id="info-education" class="information-container">
	 					<?php

							if( have_rows('education', 'user_'.$userauthor->ID) ):
							    while ( have_rows('education', 'user_'.$userauthor->ID) ) : the_row();

							    	echo '<div class="column c_33"><p>Qualification</p><div class="line-title"></div><p>'.get_sub_field('qualification').'</p></div>';
							    	echo '<div class="column c_33"><p>Insitute</p><div class="line-title"></div><p>'.get_sub_field('insitute').'</p></div>';
							    	echo '<div class="column c_33"><p>Location</p><div class="line-title"></div><p>'.get_sub_field('location').'</p></div>';
							    	echo '<div class="clear"></div><br>';
							    	echo '<div class="column c_33"><p class="space-title">Start date</p><div class="line-title"></div><p>'.get_sub_field('start_date').'</p></div>';
							    	echo '<div class="column c_33"><p class="space-title">End date</p><div class="line-title"></div><p>'.get_sub_field('end_date').'</p></div>';
							    	echo '<div class="clear"></div>';
							    	echo '<div class="line"></div>';

							    endwhile;

							endif;
						?>

	 				</div>
 				<?php } ?>

 				<?php if (get_field('skills', 'user_'.$userauthor->ID) || have_rows('experience', 'user_'.$userauthor->ID)) { ?>
	 				<div id="info-skill" class="information-container">
	 					<h4>Skills</h4>
	 					<div style="margin: 0px 0 35px;" class="line"></div>
	 					<?php 
							$skill = get_field('skills', 'user_'.$userauthor->ID);
							if( $skill ): 
								foreach( $skill as $term ): 
									echo '<div class="btn-style-round">'.esc_html( $term->name ).'</div>'; 
								endforeach; 
							endif; 
						?>
						
						<br><br><br>
						<h4>Experience</h4>
	 					<div style="margin: 0px 0 35px;" class="line"></div>
	 					<?php

							if( have_rows('experience', 'user_'.$userauthor->ID) ):
							    while ( have_rows('experience', 'user_'.$userauthor->ID) ) : the_row();

							    	echo '<div class="column c_33"><p>Job Title</p><div class="line-title"></div><p>'.get_sub_field('job_title').'</p></div>';
							    	echo '<div class="column c_33"><p>Company</p><div class="line-title"></div><p>'.get_sub_field('company').'</p></div>';
							    	echo '<div class="column c_33"><p>Location</p><div class="line-title"></div><p>'.get_sub_field('location').'</p></div>';
							    	echo '<div class="clear"></div><br>';
							    	echo '<div class="column c_33"><p>Start date</p><div class="line-title"></div><p>'.get_sub_field('start_date').'</p></div>';
							    	echo '<div class="column c_33"><p>End date</p><div class="line-title"></div><p>'.get_sub_field('end_date').'</p></div>';
							    	echo '<div class="clear"></div>';
							    	echo '<div class="line"></div><br><br>';

							    endwhile;

							endif;
						?>
	 				</div>
 				<?php } ?>

 				<?php if (empty($post_insight) || !empty($post_insight) && get_current_user_id() == $userauthor->ID ) { ?>
	 				<div id="info-insights" class="information-container">
	 						<?php
	 							$post_list = get_posts( array(
								    'orderby'    => 'date',
								    'sort_order' => 'asc',    
								    'post_type'  => 'insights',
								    'posts_per_page' => 50,
								    'author' => $userauthor->ID
								) );
								 
								$posts = array();

								
								 
								foreach ( $post_list as $post ) {
									$termPost = get_field('categories', $post->ID );

									$btnEdit = '';
									if( get_current_user_id() == $userauthor->ID){ 
		 						   	
			 						   	$btnEdit = '<a href="'.get_the_permalink( 84 ).'/?post='.$post->ID.'" class="btn-style-white">Edit</a>
						 							<a href="'.get_the_permalink( 84 ) .'/?remove='.$post->ID.'" onclick="return confirm(\' '.get_system_message('sure delete insight').' \')" class="btn-style-white">Remove</a>
						 							<a href="'.get_the_permalink( $post->ID ) .'" class="btn-style-white">View</a>';

			 						}

								   echo '<div class="post-box">
								   			<a href="'.get_the_permalink($post->ID).'">
								   			<div class="post-box-img" style="background-image:url('.get_field('hero_image', $post->ID ).');">
								   				<div class="post-box-img-cell">'.$btnEdit.'</div>
								   			</div>
								   			</a>
								   			<div class="post-box-info">
								   				<div class="column c_50"><div class="btn-style-round">'.$termPost->name.'</div></div>
								   				<div class="column c_50 pos_right"><span class="date-info">'.get_the_date( 'jS F Y', $post->ID).'</span></div>
								   				<div class="clear"></div>
								   				<div class="line"></div>
								   				<h3>'.get_the_title($post->ID).'</h3>
								   				<div class="excert_box"><p>'.wp_trim_words(get_field('description', $post->ID ),25).'</p></div>
								   				<table class="table-terms">
								   					<tr>
								   						<td>Views</td>
								   						<td class="value">0</td>
								   					</tr>
								   					<tr>
								   						<td>Saved</td>
								   						<td  class="value">0</td>
								   					</tr>
								   				</table>
								   			</div>
								   </div>';
								}
	 						?>

	 						<a href="<?php echo get_the_permalink( 84 ); ?>"><div class="post-box">
	 							<div class="table-post-box">
	 								<div class="table-box-cell">Add another</div>
	 							</div>
	 						</div></a>
	 				</div>
 				<?php }elseif (!empty($post_insight) && get_current_user_id() != $userauthor->ID ) { ?>
 						<div id="info-insights" class="information-container">
	 						<?php
	 							$post_list = get_posts( array(
								    'orderby'    => 'date',
								    'sort_order' => 'asc',    
								    'post_type'  => 'insights',
								    'posts_per_page' => 50,
								    'author' => $userauthor->ID
								) );
								 
								$posts = array();

								
								 
								foreach ( $post_list as $post ) {
									$termPost = get_field('categories', $post->ID );

									$btnEdit = '';
									if( get_current_user_id() == $userauthor->ID){ 
		 						   	
			 						   	$btnEdit = '<a href="'.get_the_permalink( 84 ).'/?post='.$post->ID.'" class="btn-style-white">Edit</a>
						 							<a href="'.get_the_permalink( 84 ) .'/?remove='.$post->ID.'" onclick="return confirm(\' '.get_system_message('sure delete insight').' \')" class="btn-style-white">Remove</a>
						 							<a href="'.get_the_permalink( $post->ID ) .'" class="btn-style-white">View</a>';

			 						}

								   echo '<div class="post-box">
								   			<a href="'.get_the_permalink($post->ID).'">
								   			<div class="post-box-img" style="background-image:url('.get_field('hero_image', $post->ID ).');">
								   				<div class="post-box-img-cell">'.$btnEdit.'</div>
								   			</div>
								   			</a>
								   			<div class="post-box-info">
								   				<div class="column c_50"><div class="btn-style-round">'.$termPost->name.'</div></div>
								   				<div class="column c_50 pos_right"><span class="date-info">'.get_the_date( 'jS F Y', $post->ID).'</span></div>
								   				<div class="clear"></div>
								   				<div class="line"></div>
								   				<h3>'.get_the_title($post->ID).'</h3>
								   				<div class="excert_box"><p>'.wp_trim_words(get_field('description', $post->ID ),25).'</p></div>
								   				<table class="table-terms">
								   					<tr>
								   						<td>Views</td>
								   						<td class="value">0</td>
								   					</tr>
								   					<tr>
								   						<td>Saved</td>
								   						<td  class="value">0</td>
								   					</tr>
								   				</table>
								   			</div>
								   </div>';
								}
	 						?>
	 				</div>
 				<?php }elseif (!empty($post_insight) && get_current_user_id() != $userauthor->ID ) { } ?>

 				<?php if (empty($post_company) || !empty($post_company) && get_current_user_id() == $userauthor->ID ) { ?>
	 				<div id="info-company" class="information-container">
	 						<?php
	 							$post_list = get_posts( array(
								    'orderby'    => 'date',
								    'sort_order' => 'asc',    
								    'post_type'  => 'company',
								    'posts_per_page' => 50,
								    'author' => $userauthor->ID
								) );
								 
								foreach ( $post_list as $post ) {
	                                $post_author_id = get_post_field( 'post_author', $post->ID  );
	                                $country = get_field('location', $post->ID );
	                                $countryname = get_term($country); 
	                                $city = get_field('city', $post->ID );
	                                $terms = get_field('industries', $post->ID);
	                                $termsname='';
	                                if( $terms ): 
	                                    foreach( $terms as $term ):
	                                        $termsname .= '<div class="comma">,</div><a href="'.esc_url( get_term_link( $term ) ).'">'.esc_html( $term->name ).'</a>';
	                                    endforeach; 
	                                endif; 

	                                if( get_field('logo', $post->ID)){
	                                     $logo = 'background-image:url('. get_field('logo', $post->ID).');';
	                                }else{
	                                    $logo = "";
	                                }

	                                if(get_field('hero_image', $post->ID )){
	                                     $hero = 'background-image:url('. get_field('hero_image', $post->ID ).');';
	                                }else{
	                                    $hero = "";
	                                }

	                                $btnEdit = '';
									if( get_current_user_id() == $userauthor->ID){ 
		 						   	
			 						   	$btnEdit = '<a href="javascript:void(0)" class="btn-close open-addon" id-attr="post-addons-'. $post->ID.'">...</a>
						 				<div id="post-addons-'. $post->ID.'" class="post-addons">
						 					<a href="'.get_the_permalink( 106 ).'/?post='.$post->ID.'" class="btn-style-blue">Edit</a>
						 					<a href="'.get_the_permalink( 106 ) .'/?remove='.$post->ID.'" onclick="return confirm(\' '.get_system_message('sure delete company').' \')" class="btn-style-blue">Remove</a>
						 				</div>';

			 						}
	                                

	                               echo '<div class="post-box company_box">
	                                        <a href="'.get_the_permalink( $post->ID ).'"><div class="post-box-img" style="'.$hero.'"></div></a>
	                                        <div class="post-box-info">
	                                            <div class="clear"></div>
	                                            <div class="line"></div>
	                                            <div class="column c_30"> <a href="'.get_the_permalink( $post->ID ).'"><div class="circle-img" style="'.$logo.'"> </div></a></div>
	                                           <div class="column c_70"><a href="'.get_the_permalink( $post->ID ).'"><h3>'.get_the_title($post->ID).'</h3><p>'.wp_trim_words(get_field('description', $post->ID ), 25).'</p></a></div>
	                                           <div class="clear"></div>
	                                           <p><strong>Location: </strong>'.$city.', '. $countryname->name.'</p>
	                                           <p class="label-industries"><strong>Industries:&nbsp; </strong><div class="all-terms">'. $termsname.'</div></p>
	                                        </div>
	                               </div>';
	                            }
	 						?>

	 						<a href="<?php echo get_the_permalink( 106 ); ?>"><div class="post-box company_box">
	 							<div class="table-post-box">
	 								<div class="table-box-cell">Add another</div>
	 							</div>
	 						</div></a>
	 				</div>
 				<?php }elseif (!empty($post_company) && get_current_user_id() != $userauthor->ID) { ?>
 						<div id="info-company" class="information-container">
	 						<?php
	 							$post_list = get_posts( array(
								    'orderby'    => 'date',
								    'sort_order' => 'asc',    
								    'post_type'  => 'company',
								    'posts_per_page' => 50,
								    'author' => $userauthor->ID
								) );
								 
								foreach ( $post_list as $post ) {
	                                $post_author_id = get_post_field( 'post_author', $post->ID  );
	                                $terms = get_field('industries', $post->ID);
	                                $country = get_field('location', $post->ID );
	                                $countryname = get_term($country); 
	                                $city = get_field('city', $post->ID );
	                                $termsname='';
	                                if( $terms ): 
	                                    foreach( $terms as $term ):
	                                        $termsname .= '<a href="'.esc_url( get_term_link( $term ) ).'">'.esc_html( $term->name ).'</a>, ';
	                                    endforeach; 
	                                endif; 

	                                if( get_field('logo', $post->ID)){
	                                     $logo = 'background-image:url('. get_field('logo', $post->ID).');';
	                                }else{
	                                    $logo = "";
	                                }

	                                if(get_field('hero_image', $post->ID )){
	                                     $hero = 'background-image:url('. get_field('hero_image', $post->ID ).');';
	                                }else{
	                                    $hero = "";
	                                }

	                                $btnEdit = '';
									if( get_current_user_id() == $userauthor->ID){ 
		 						   	
			 						   	$btnEdit = '<a href="javascript:void(0)" class="btn-close open-addon" id-attr="post-addons-'. $post->ID.'">...</a>
						 				<div id="post-addons-'. $post->ID.'" class="post-addons">
						 					<a href="'.get_the_permalink( 106 ).'/?post='.$post->ID.'" class="btn-style-blue">Edit</a>
						 					<a href="'.get_the_permalink( 106 ) .'/?remove='.$post->ID.'" onclick="return confirm(\' '.get_system_message('sure delete company').' \')" class="btn-style-blue">Remove</a>
						 				</div>';

			 						}
	                                

	                               echo '<div class="post-box company_box">
	                                        <a href="'.get_the_permalink( $post->ID ).'"><div class="post-box-img" style="'.$hero.'"></div></a>
	                                        <div class="post-box-info">
	                                            <div class="clear"></div>
	                                            <div class="line"></div>
	                                            <div class="column c_30"> <a href="'.get_the_permalink( $post->ID ).'"><div class="circle-img" style="'.$logo.'"> </div></a></div>
	                                           <div class="column c_70"><a href="'.get_the_permalink( $post->ID ).'"><h3>'.get_the_title($post->ID).'</h3><p>'.wp_trim_words(get_field('description', $post->ID ), 25).'</p></a></div>
	                                           <div class="clear"></div>
	                                           <p><strong>Location: </strong>'.$city.', '. $countryname->name.'</p>
	                                           <p><strong>Industries: </strong>'. $termsname.'</p>
	                                        </div>
	                               </div>';
	                            }
	 						?>
	 				</div>
 				<?php } ?>

 				
			</div>


			<div class="clear"></div>


			


			<div id="myModal" class="modal">

  <!-- Modal message -->
  <div class="modal-content">
  	<div class="hd-chat">
  		<div class="column c_80">
  		<center><h3>Messages</h3></center>
	  	</div>
	  	<div class="column c_20 pos_right">
	  		<span class="close">&times;</span>
	  	</div>
	  	<div class="clear"></div>
  	</div>
    
    
    			<div id="message-list"></div>

			    		 <form name="update-messages" action="<?php echo home_url(); ?>/author/<?php echo esc_html( $userauthor->first_name ); ?>/" id="update-messages" method="post">
			    			<input type="text" id="text-message" name="text-message">
			    			<input type="hidden" name="id-source" value="<?php echo $idactualuser; ?>">
			        		<input type="hidden" name="id-destination" value="<?php echo $userauthor->ID; ?>">
			        		<input type="hidden" name="id-message" value="<?php echo $incremental; ?>">
			        		<input type="hidden" name="id-conversation" value="<?php echo $idcurrentconversation; ?>">
			        		<input type="hidden" name="profile-id" value="<?php echo $userauthor->ID; ?>">
			        		<input type="submit" name="Send" value="Send">
			        	</form>

<!------------------------------------------------------------------------------------------------>

 <script type="text/javascript">
$(document).ready(function() {
    $('#update-messages').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: '<?php echo get_template_directory_uri(); ?>/controller/form.php',
            data: $(this).serialize(),
            success: function(response)
            {
                $('#message-list').html(response);
           }
       });
     });
    charge_message();
});

function charge_message(){
	$.ajax({
            type: "POST",
            url: '<?php echo get_template_directory_uri(); ?>/controller/first-charge-form.php',
            data: {'id_source' : '<?php echo $idactualuser; ?>','id_destination' : '<?php echo $userauthor->ID; ?>', 'profile_id' : '<?php echo $userauthor->ID; ?>'},
            success: function(response)
            {
                $('#message-list').html(response);
           }
       });
}

</script>
<!-------------------------------------------------------------------------------------------------->			        		

			        	

			 
    	
  </div>
</div><!--end modal-->
		</div><!-- #content -->
	</div><!-- #primary -->

<script type="text/javascript">
		$( ".info-tab" ).click(function() {
			$( ".info-tab").removeClass('active');
			$( ".information-container").removeClass('active');

			var containfo = $( this ).attr( "attr-info" );
		   	$( this ).addClass('active');
		   	$( "#"+containfo ).addClass('active');

		});

		$( ".open-addon" ).click(function() {
		   var idBox = $( this ).attr( "id-attr" );
		   if($( "#"+idBox ).hasClass('active')){
		   		$( "#"+idBox ).removeClass('active');
		   }else{
		   		$( "#"+idBox ).addClass('active');
		   }
		});
	
</script>
<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>

<?php get_footer(); ?>