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
global $post;
$post_slug = $post->post_name;
$actualpostid = $post->ID;
global $wp_query;
$userauthor = get_post_field( 'post_author', get_the_ID() );
$companyID = get_the_ID();
$hero = '';
if( get_field('hero_image' ) ){
	$hero = 'background-image:url('. get_field('hero_image' ).')';
}
$open = $_GET['open'];
?>

 	<section id="hero-image" class="author-banner" style="<?php echo $hero; ?>">
 		<div class="hero-cell" >
 		</div>
 	</section>

 	
	<div id="primary" class="site-content  container">
		<div id="content" role="main">

			

			<div class="column c_25">
				 <?php echo do_shortcode('[sidebar_company id="'.get_the_ID().'"]');  ?>
			</div>


			<div class="column c_5"><br></div>

			<div class="column c_70">
				<div class="column c_70">
					<h1><?php the_title(); ?></h1>
	 				<h3 class="subtitle"><?php the_field('description' ); ?></h3>
	 			</div>
	 			<div class="column c_30 pos_right">
	 				<br>

	 				<?php if( get_current_user_id() == $userauthor){ 
	 					echo '<a href="'.get_the_permalink(106).'/?edit='.get_the_ID().'" class="btn-style-blue">Edit</a>';
	 					echo '<a href="javascript:void(0)" class="btn-style-grey open-addon" id-attr="more-addons">...</a>
				 				<div id="more-addons" class="post-addons">
				 					<span class="btn-close open-addon" id-attr="more-addons">X</span>
				 					<a href="'.get_the_permalink( 174 ).'/?c='.get_the_ID().'" class="btn-style-blue">Add Case Studies</a>';

				 		//<a href="'.get_the_permalink( 218 ).'/?c='.get_the_ID().'" class="btn-style-blue">Add Jobs</a>
				 		//<a href="'.get_the_permalink( 250 ).'/?c='.get_the_ID().'" class="btn-style-blue">Add Promotions</a>
				 		echo '	
				 					<a href="'.get_home_url().'/shop/" class="btn-style-blue">Add Jobs</a>
				 					<a href="'.get_home_url().'/shop/" class="btn-style-blue">Add Promotions</a>
				 					<a href="'.get_the_permalink( 514 ).'/?c='.get_the_ID().'" class="btn-style-blue">Add Events</a>
				 				</div>';
	 				} ?>

	 				<script>
	 					
							//( "job-btn" ).data(<?php //echo $companyID ?>);
							alert(( "job-btn" ).data(<?php echo $companyID; ?>));
					
	 				</script>
	 				

	 			</div>
	 			<div class="clear"></div>
 				<div class="line"></div>
 					<div class="column c_50 btns-followings">
 						<div class="column c_33">
 							<h4>0</h4>
 							<p>Followers</p>
 						</div>
 						<div class="column c_33">
 							<?php
 								$p = 0;
								if( have_rows('users_following', $companyID) ):	
								    while( have_rows('users_following', $companyID) ) : the_row();
								    $p++;
								    endwhile;

								// No value.
								else :
								    // Do something...
								endif;
								$contfollowing = $p;
 							?>
 							<h4><?php echo $contfollowing; ?></h4>
 							<p>Following</p>
 						</div>
 						<div class="column c_33">
 							<?php
 								$q = 0;
								if( have_rows('companies', $companyID) ):	
								    while( have_rows('companies', $companyID) ) : the_row();
								    $q++;
								    endwhile;

								// No value.
								else :
								    // Do something...
								endif;
								$contfollowingco = $q;
 							?>
 							<h4><?php echo $contfollowingco; ?></h4>
 							<p>Connections</p>
 						</div>
 					</div>
 					<div class="column c_50 btns-msg pos_right">

 						<?php
 						//user is login
						if (is_user_logged_in()) {

							//Insert Companies
							if (isset($_GET['idco'])) {
		 						$row = array(
						    		'field_5f0c5b127ed0e' => $_GET['idco'],
								);
								add_row('field_5f0c5afd7ed0d', $row , 'user_'.$idactualuser.'');
							}
 						$stackco = array();
						// Check rows exists.
						if( have_rows('companies','user_'.$idactualuser.'') ):

						    // Loop through rows.
						    while( have_rows('companies', 'user_'.$idactualuser.'') ) : the_row();

						        // Load sub field value.
						       	$idusers = get_sub_field('companie', 'user_'.$idactualuser.'');
						        array_push($stackco, $idusers);

						    // End loop.
						    endwhile;

						// No value.
						else :
						    // Do something...
						endif;

							if (in_array($actualpostid, $stackco)) { ?>
								
								<a href="" style="pointer-events: none;border: 1px solid #ccc;background-color: #ccc;" class="btn-style-blue"><svg class="connect-icon" xmlns="http://www.w3.org/2000/svg" width="10.688" height="10.703" viewBox="0 0 10.688 10.703">
								  <g id="Group_175" data-name="Group 175" transform="translate(-1203.343 -38.861)">
								    <path id="Path_1694" data-name="Path 1694" d="M1563.456,41.305c-.018.115-.031.23-.055.343a2.2,2.2,0,0,1-.3.745,2.073,2.073,0,0,1-.273.325q-1.117,1.139-2.239,2.273c-.239.241-.481.481-.732.71a2.108,2.108,0,0,1-1.362.571,2.293,2.293,0,0,1-1.617-.515,1.4,1.4,0,0,1-.187-.189.322.322,0,0,1,.011-.411.284.284,0,0,1,.383-.06,2.473,2.473,0,0,1,.276.195,1.551,1.551,0,0,0,1.242.307,1.619,1.619,0,0,0,.905-.474c.977-.951,1.945-1.911,2.887-2.9a1.417,1.417,0,0,0,.377-.9,1.512,1.512,0,0,0-.149-.874,1.625,1.625,0,0,0-1.133-.885,1.675,1.675,0,0,0-1.045.113,1.89,1.89,0,0,0-.483.36c-.271.256-.54.514-.81.77-.058.055-.119.107-.181.157a.29.29,0,0,1-.408-.043.341.341,0,0,1,.011-.439c.367-.365.728-.738,1.111-1.087a2.114,2.114,0,0,1,1.233-.526,2.338,2.338,0,0,1,2.41,1.548,2.147,2.147,0,0,1,.115.531.4.4,0,0,0,.01.048Z" transform="translate(-349.426)" fill="#fff"/>
								    <path id="Path_1695" data-name="Path 1695" d="M1205.64,347.234a2.364,2.364,0,0,1-2.259-1.875,2.389,2.389,0,0,1,.2-1.464,1.98,1.98,0,0,1,.405-.563q1.1-1.117,2.212-2.23c.254-.255.506-.513.777-.749a2.056,2.056,0,0,1,1.252-.527,2.512,2.512,0,0,1,.8.056,2.221,2.221,0,0,1,.989.54.445.445,0,0,1,.154.263.277.277,0,0,1-.118.286.307.307,0,0,1-.34.027,2.041,2.041,0,0,1-.27-.193,1.619,1.619,0,0,0-1.835-.1,1.941,1.941,0,0,0-.316.258q-1.473,1.419-2.889,2.895a1.385,1.385,0,0,0-.372.818,1.767,1.767,0,0,0,.059.765,1.69,1.69,0,0,0,.589.793,1.539,1.539,0,0,0,1.094.313,1.455,1.455,0,0,0,.952-.4c.255-.241.508-.484.763-.724.109-.1.228-.193.331-.3a.3.3,0,0,1,.473.165.335.335,0,0,1-.083.337c-.3.29-.6.582-.894.872-.061.059-.128.113-.189.173a2.019,2.019,0,0,1-1.033.505C1205.944,347.207,1205.791,347.215,1205.64,347.234Z" transform="translate(0 -297.67)" fill="#fff"/>
								  </g>
								</svg>
							Connect</a>

							<?php }else{?> 
								
 						<a href="<?php echo get_home_url(); ?>/company/<?php echo $post_slug; ?>/?idco=<?php echo $actualpostid; ?>" class="btn-style-blue"><svg class="connect-icon" xmlns="http://www.w3.org/2000/svg" width="10.688" height="10.703" viewBox="0 0 10.688 10.703">
						  <g id="Group_175" data-name="Group 175" transform="translate(-1203.343 -38.861)">
						    <path id="Path_1694" data-name="Path 1694" d="M1563.456,41.305c-.018.115-.031.23-.055.343a2.2,2.2,0,0,1-.3.745,2.073,2.073,0,0,1-.273.325q-1.117,1.139-2.239,2.273c-.239.241-.481.481-.732.71a2.108,2.108,0,0,1-1.362.571,2.293,2.293,0,0,1-1.617-.515,1.4,1.4,0,0,1-.187-.189.322.322,0,0,1,.011-.411.284.284,0,0,1,.383-.06,2.473,2.473,0,0,1,.276.195,1.551,1.551,0,0,0,1.242.307,1.619,1.619,0,0,0,.905-.474c.977-.951,1.945-1.911,2.887-2.9a1.417,1.417,0,0,0,.377-.9,1.512,1.512,0,0,0-.149-.874,1.625,1.625,0,0,0-1.133-.885,1.675,1.675,0,0,0-1.045.113,1.89,1.89,0,0,0-.483.36c-.271.256-.54.514-.81.77-.058.055-.119.107-.181.157a.29.29,0,0,1-.408-.043.341.341,0,0,1,.011-.439c.367-.365.728-.738,1.111-1.087a2.114,2.114,0,0,1,1.233-.526,2.338,2.338,0,0,1,2.41,1.548,2.147,2.147,0,0,1,.115.531.4.4,0,0,0,.01.048Z" transform="translate(-349.426)" fill="#fff"/>
						    <path id="Path_1695" data-name="Path 1695" d="M1205.64,347.234a2.364,2.364,0,0,1-2.259-1.875,2.389,2.389,0,0,1,.2-1.464,1.98,1.98,0,0,1,.405-.563q1.1-1.117,2.212-2.23c.254-.255.506-.513.777-.749a2.056,2.056,0,0,1,1.252-.527,2.512,2.512,0,0,1,.8.056,2.221,2.221,0,0,1,.989.54.445.445,0,0,1,.154.263.277.277,0,0,1-.118.286.307.307,0,0,1-.34.027,2.041,2.041,0,0,1-.27-.193,1.619,1.619,0,0,0-1.835-.1,1.941,1.941,0,0,0-.316.258q-1.473,1.419-2.889,2.895a1.385,1.385,0,0,0-.372.818,1.767,1.767,0,0,0,.059.765,1.69,1.69,0,0,0,.589.793,1.539,1.539,0,0,0,1.094.313,1.455,1.455,0,0,0,.952-.4c.255-.241.508-.484.763-.724.109-.1.228-.193.331-.3a.3.3,0,0,1,.473.165.335.335,0,0,1-.083.337c-.3.29-.6.582-.894.872-.061.059-.128.113-.189.173a2.019,2.019,0,0,1-1.033.505C1205.944,347.207,1205.791,347.215,1205.64,347.234Z" transform="translate(0 -297.67)" fill="#fff"/>
						  </g>
						</svg>
					Connect</a>

					<?php } ?>

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
 						<a id="" href="<?php echo get_home_url(); ?>/create-an-account/" class="btn-whiteblue">Message</a>
 						<?php }
 						?>
 					</div>
 				<div class="clear"></div>
 				<div class="line"></div>


 				<ul class="nav-perfil">
 					<li id="case" attr-info="info-case" class="info-tab active" ><a  href="javascript:void(0)">Case Studies</a></li>
 					<li id="about" attr-info="info-about" class="info-tab " ><a  href="javascript:void(0)">About Us</a></li>
 					<li id="jobs" attr-info="info-jobs" class="info-tab"><a href="javascript:void(0)">Jobs</a></li>
 					<li id="promotions" attr-info="info-promotions" class="info-tab"><a href="javascript:void(0)">Promotions</a></li>
 					<li id="events" attr-info="info-events" class="info-tab"><a href="javascript:void(0)">Events</a></li>
 				</ul>
 				<div class="clear"></div>
 				<div class="line"></div>

 				<div id="info-case" class="information-container active">

 					<?php
 								$post_list = get_posts( array(
							    'orderby'    => 'date',
							    'sort_order' => 'asc',    
							    'post_type'  => 'case_studies' ,
							    'posts_per_page' => 50,
								'meta_query'	=> array(
									'relation'		=> 'AND',
									array(
										'key'		=> 'company',
										'value'		=> get_the_ID(),
										'compare'	=> 'IN'
									)
									
								)

							) );
							
							 
							foreach ( $post_list as $post ) {
								$post_author_id = get_post_field ('post_author', $post->ID  );

								$btnEdit = '<a href="'.get_the_permalink( $post->ID ) .'" class="btn-style-white">View</a>';

								if( get_current_user_id() == $post_author_id){ 
	 						   	
		 						   	$btnEdit = '<a href="'.get_the_permalink( 174 ).'/?post='.$post->ID.'" class="btn-style-white">Edit</a>
					 							<a href="'.get_the_permalink( 174 ) .'/?remove='.$post->ID.'&c='.$companyID.'" onclick="return confirm(\' '.get_system_message('sure delete case').' \')" class="btn-style-white">Remove</a>
					 							<a href="'.get_the_permalink( $post->ID ) .'" class="btn-style-white">View</a>';

		 						}


								$terms = get_field('industries', $post->ID  );
								foreach( $terms as $term ): 
						        	$termPost = $term;
						   		endforeach;
				
		 					

							   echo '<div class="post-box">
							   			<div class="post-box-img" style="background-image:url('.get_field('hero_image', $post->ID ).');">
							   				<div class="post-box-img-cell">'.$btnEdit.'</div>
							   			</div>
							   			<div class="post-box-info">
							   				<div class="column c_50"><div class="btn-style-round">'.$termPost->name.'</div></div>
							   				<div class="column c_50 pos_right"><span class="date-info">'.get_the_date( 'jS F Y', $post->ID).'</span></div>
							   				<div class="clear"></div>
							   				<div class="line"></div>
							   				<h3>'.get_the_title($post->ID).'</h3>
							   				<div class="excert_box"><p>'.wp_trim_words(get_field('description', $post->ID ),16).'</p></div>
							   				<div clasS="line"></div>
							   				<p><img class="icon-view" src="'.get_template_directory_uri().'/images/views.svg">'.getCrunchifyPostViews(get_the_ID()).'<img class="icon-like" src="'.get_template_directory_uri().'/images/likes.svg">'.get_field('likes_number', $post->ID).'</p>
							   			</div>
							   </div>';
							}
					?>
 				</div>

 				<div id="info-about" class="information-container">
 					<?php if ( have_posts() ) : 
 						while ( have_posts() ) : the_post(); 
 							the_content(); 
 						endwhile; 
 					endif; ?>
 					
 				</div>

 				<div id="info-jobs" class="information-container ">
 					<?php
 								$post_list = get_posts( array(
							    'orderby'    => 'date',
							    'sort_order' => 'asc',    
							    'post_type'  => 'jobs' ,
							    'posts_per_page' => 50,
							    'author' => $userauthor,
							    'post_status' => 'any',
								'meta_query'	=> array(
									'relation'		=> 'AND',
									array(
										'key'		=> 'company',
										'value'		=> get_the_ID(),
										'compare'	=> 'IN'
									)
									
								)

							) );
							
							 
							foreach ( $post_list as $post ) {
								$post_author_id = get_post_field ('post_author', $post->ID  );

								$companyPostId = get_field('company', $post->ID );


	 							if( get_current_user_id() == $post_author_id	){
				 					$btnFloatco =  '<div class="float-btn"><a href="javascript:void(0)" class="btn-style-grey open-addon" id-attr="more-addons-'.$post->ID.'">...</a>
							 				<div id="more-addons-'.$post->ID.'" class="post-addons">
							 					<span class="btn-close open-addon" id-attr="more-addons-'.$post->ID.'">X</span>
							 					<a href="'.get_the_permalink( 218 ).'/?post='.$post->ID.'" class="btn-style-blue">Edit</a>
							 					<a href="'.get_the_permalink( 218 ).'/?remove='.$post->ID.'&c='.$companyID.'"  onclick="return confirm(\' '.get_system_message('sure delete job').' \')"  class="btn-style-blue">Remove</a>
							 					<a href="'.get_the_permalink( $post->ID ).'" class="btn-style-blue">View Job</a>
							 				</div></div>';
				 				} else {
				 					$btnFloat =  '<div class="float-btn"><a href="'.get_the_permalink( $post->ID ).'" class="btn-style-grey open-addon" id-attr="more-addons-'.$post->ID.'">View</a></div>';
				 				}

				 				$city = get_field('city',$companyPostId);
				 				$location = get_field('location',$companyPostId);
				 				$locationname = get_term($location);
							   echo '<div class="post-box">
							   						'.$btnFloatco.'
										   			<div class="circle-img" style="background-image:url('.get_field('logo', $companyPostId ).' )"> </div>
										   			<div class="post-box-info">
										   				<div class="clear"></div>
										   				<h3>'.get_the_title($post->ID).'</h3>
														<p>'.$city.', '. $locationname->name.'</p>
										   				<div class="excert_box"><p>'.wp_trim_words(get_field('description', $post->ID ), 18).'</p></div>
										   				<div clasS="line"></div>
										   				<p><img class="icon-view" src="'.get_template_directory_uri().'/images/views.svg">'.getCrunchifyPostViews(get_the_ID()).'<img class="icon-like" src="'.get_template_directory_uri().'/images/likes.svg">'.get_field('likes_number', $post->ID).'</p>
							   				<a href="'.get_the_permalink( $post->ID ).'" class="btn-style-round getpromo">Read More</a>
										   			</div>
										   </div>
									';
							}
					?>
 				</div>

 				<div id="info-promotions" class="information-container ">
 					 					<?php
 								$post_list = get_posts( array(
							    'orderby'    => 'date',
							    'sort_order' => 'asc',    
							    'post_type'  => 'promotions' ,
							    'posts_per_page' => 50,
							    'author' => $userauthor,
							    'post_status' => 'any',
								'meta_query'	=> array(
									'relation'		=> 'AND',
									array(
										'key'		=> 'company',
										'value'		=> $companyID,
										'compare'	=> 'IN'
									)
									
								)

							) );
							
							 
							foreach ( $post_list as $post ) {

								$post_author_id = get_post_field ('post_author', $post->ID  );

								$companyPostId = get_field('company', $post->ID );

				 				get_template_part("template-part/content","promotions");
							   
							}
					?>

 				</div>

 				<div id="info-events" class="information-container ">
 					<?php
 								$post_list = get_posts( array(
							    'orderby'    => 'date',
							    'sort_order' => 'asc',    
							    'post_type'  => 'events' ,
							    'posts_per_page' => 50,
							    'author' => $userauthor,
								/*'meta_query'	=> array(
									'relation'		=> 'AND',
									array(
										'key'		=> 'company',
										'value'		=> get_the_ID(),
										'compare'	=> 'IN'
									)
									
								)*/

							) );
							
							 
							foreach ( $post_list as $post ) {
								$post_author_id = get_post_field ('post_author', $post->ID  );

								$btnEdit = '<a href="'.get_the_permalink( $post->ID ) .'" class="btn-style-white">View</a>';

								if( get_current_user_id() == $post_author_id){ 
	 						   	
		 						   	$btnEdit = '<a href="'.get_the_permalink( 514 ).'/?post='.$post->ID.'" class="btn-style-white">Edit</a>
					 							<a href="'.get_the_permalink( 514 ) .'/?remove='.$post->ID.'&c='.$companyID.'" onclick="return confirm(\' '.get_system_message('sure delete event').' \')" class="btn-style-white">Remove</a>
					 							<a href="'.get_the_permalink( $post->ID ) .'" class="btn-style-white">View</a>';

		 						}


								$terms = get_field('industries', $post->ID  );
								foreach( $terms as $term ): 
						        	$termPost = $term;
						   		endforeach;
				
		 					

							   echo '<div class="post-box">
							   			<div class="post-box-img" style="background-image:url('.get_field('event_image', $post->ID ).');">
							   				<div class="post-box-img-cell">'.$btnEdit.'</div>
							   			</div>
							   			<div class="post-box-info">
							   				<div class="column c_50"><p class="label-event">Event date:</p></div>
							   				<div class="column c_50 pos_right"><span class="date-info">'.get_field('event_start_date', $post->ID).'</span></div>
							   				<div class="clear"></div>
							   				<div class="line"></div>
							   				<h3>'.get_the_title($post->ID).'</h3>
							   				<div class="excert_box"><p>'.wp_trim_words(get_field('event_description', $post->ID ),16).'</p></div>
							   				<div clasS="line"></div>
							   				<p><img class="icon-view" src="'.get_template_directory_uri().'/images/views.svg">'.getCrunchifyPostViews(get_the_ID()).'<img class="icon-like" src="'.get_template_directory_uri().'/images/likes.svg">'.get_field('likes_number',$post->ID).'</p>
							   				<a href="'.get_the_permalink( $post->ID ).'" class="btn-style-round getpromo">Read More</a>
							   			</div>
							   </div>';
							}
					?>
 				</div>


 			

 				
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

			    		 <form name="update-messages" action="<?php echo home_url(); ?>/company/<?php echo $post_slug; ?>/" id="update-messages" method="post">
			    			<input type="text" id="text-message" name="text-message">
			    			<input type="hidden" name="id-source" value="<?php echo $idactualuser; ?>">
			        		<input type="hidden" name="id-destination" value="<?php echo $userauthor; ?>">
			        		<input type="hidden" name="id-message" value="<?php echo $incremental; ?>">
			        		<input type="hidden" name="id-conversation" value="<?php echo $idcurrentconversation; ?>">
			        		<input type="hidden" name="profile-id" value="<?php echo $userauthor; ?>">
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
<?php if ($open == "true") { ?>
	modal.style.display = "block";
<?php } ?>

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