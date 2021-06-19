<?php
/**
 * Template Name: Edit profile Page
 * The template for displaying sidebar pages
 *
 */
acf_form_head();
 get_header();   

$userauthor = wp_get_current_user();
$hero = '';
if( get_field('banner_img', 'user_'.get_current_user_id() ) ){
	$hero = 'background-image:url('. get_field('banner_img', 'user_'.get_current_user_id() ).')';
}
 ?>

 	<section id="hero-image" class="author-banner" style="<?php echo $hero; ?>" >
 		<div class="hero-cell" >
 		</div>
 	</section>

 	<div id="editmyprofile">
	<div id="primary" class="site-content  container">
		<div id="content" role="main">

			

			<div class="column c_25">
				<?php echo do_shortcode('[sidebar_profile perfil="'.get_current_user_id().'"]');  ?>
			</div>


			<div class="column c_5"><br></div>

			<div class="column c_70">
				<div class="column c_70">
					<h1><?php echo esc_html( $userauthor->first_name ) . ' ' . esc_html( $userauthor->last_name ); ?></h1>
	 				<h3 class="subtitle"><?php the_field('job_title_information', 'user_'.$userauthor->ID ); ?></h3>
	 			</div>
	 			<div class="column c_30 pos_right">
	 				<br>
	 				<a href="javascript:void(0)" class="btn-style-blue open-edit-modal">Edit<svg class="edit-icon" xmlns="http://www.w3.org/2000/svg" width="14.347" height="14.352" viewBox="0 0 14.347 14.352">
						  <path id="Path_1702" data-name="Path 1702" d="M1002.961,717.023a1.19,1.19,0,0,1-.376.871q-2.7,2.7-5.4,5.4-1.929,1.928-3.861,3.853a.939.939,0,0,1-.442.243c-1.232.255-2.467.5-3.7.736a.436.436,0,0,1-.554-.549q.368-1.888.75-3.773a.677.677,0,0,1,.175-.322q4.666-4.677,9.341-9.346a1.109,1.109,0,0,1,1.611,0c.712.705,1.418,1.416,2.127,2.125A1.083,1.083,0,0,1,1002.961,717.023Zm-4.729-.983-7.771,7.77.9.895,7.767-7.767Zm-5.316,10.252,7.779-7.782-.892-.9-7.784,7.784Zm8.449-8.394c.218-.221.435-.436.646-.657a.25.25,0,0,0,0-.383c-.073-.08-.152-.153-.229-.229q-.923-.923-1.845-1.846c-.152-.151-.281-.176-.408-.056-.229.218-.447.447-.663.665ZM992,726.686l-1.93-1.936-.474,2.41Z" transform="translate(-988.614 -713.784)" fill="#fff"/>
						</svg>
					</a>
	 				<a href="javascript:void(0)" class="btn-style-grey open-addon" id-attr="more-addons">...</a>
				 				<div id="more-addons" class="post-addons">
				 					<span class="btn-close open-addon" id-attr="more-addons">X</span>
				 					<a href="<?php echo get_the_permalink( 84 ); ?>" class="btn-style-blue">Add Insights</a>
				 					<a href="<?php echo get_the_permalink( 106 ); ?>" class="btn-style-blue">Add Company</a>
				 					<a href="<?php echo  get_author_posts_url(get_current_user_id()); ?>" class="btn-style-blue">View Profile</a>
				 				</div>
	 			</div>
	 			<div class="clear"></div>
 				<div class="line"></div>
 					<div class="column c_50 btns-followings">
 						<div class="column c_33">
 							<h4>0</h4>
 							<p>Followers</p>
 						</div>
 						<div class="column c_33">
 								<a href="<?php echo get_home_url(); ?>/following/">
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
 						</div>
 						<div class="column c_33">
 								<a href="<?php echo get_home_url(); ?>/following/?linkco=active">
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
 						</div>
 					</div>
 					<div class="column c_50 pos_right">
 					&nbsp;	
 					</div>
 				<div class="clear"></div>
 				<div class="line"></div>


 				<?php $options = array(
					    'post_id' => 'user_'.get_current_user_id() ,
					    'field_groups' => array(56),
					    'form' => true, 
					    'return' => add_query_arg( 'updated', 'true', get_permalink() ), 
					    'html_before_fields' => '',
					    'html_after_fields' => '',
					    'submit_value' => 'Update' 
					);
					acf_form( $options );
				?>

				<!----------News personal tabs-------------->
				<ul class="nav-perfil header-functions">
						<li id="case-studies" attr-info="info-case-studies" class="info-tab active" ><a  href="javascript:void(0)">Case Studies</a></li>
 						<li id="jobs" attr-info="info-jobs" class="info-tab" ><a  href="javascript:void(0)">Jobs</a></li>
 						<li id="promotions" attr-info="info-promotions" class="info-tab"><a href="javascript:void(0)">Promotions</a></li>
 						<li id="events" attr-info="info-events" class="info-tab"><a href="javascript:void(0)">Events</a></li>
 						<li id="insights" attr-info="info-insights" class="info-tab"><a href="javascript:void(0)">Insights</a></li>
 						<li id="company" attr-info="info-company" class="info-tab"><a href="javascript:void(0)">Companies</a></li>

 				</ul>
 				<div class="clear"></div>

 				<div id="info-case-studies" class="information-container active function-information">
 					<?php
 							$post_list = get_posts( array(
							    'orderby'    => 'date',
							    'sort_order' => 'asc',    
							    'post_type'  => 'case_studies' ,
							    'posts_per_page' => 50,
							    'author' => $userauthor->ID,
							    'post_status' => 'any',

							) );
							
							 if($post_list){
								foreach ( $post_list as $post ) {
									$post_author_id = get_post_field ('post_author', $post->ID  );

									$btnEdit = '<a href="'.get_the_permalink( $post->ID ) .'" class="btn-style-white">View</a>';
									$companyPostId = get_field('company', $post->ID );
									if ($companyPostId == "") { ?>
										<img class="flagimg" src="<?php echo get_template_directory_uri(); ?>/images/flag.svg">  	
									<?php }

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
								   				<p class="labelnameco">'.get_the_title(get_field('company', $post->ID)).'</p>
								   				<div clasS="line"></div>
								   				<p><img class="icon-view" src="'.get_template_directory_uri().'/images/views.svg">'.getCrunchifyPostViews(get_the_ID()).'<img class="icon-like" src="'.get_template_directory_uri().'/images/likes.svg">'.get_field('likes_number', $post->ID).'</p>
								   			</div>
								   </div>';
								}
							}else{
								echo "<p>Sorry you do not have case studies</p>";
							}
					?>
 				</div>

 				<div id="info-jobs" class="information-container function-information">
 					<?php
 								$post_list = get_posts( array(
							    'orderby'    => 'date',
							    'sort_order' => 'asc',    
							    'post_type'  => 'jobs' ,
							    'posts_per_page' => 50,
							    'author' => $userauthor->ID,
							    'post_status' => 'any',
							) );
							
						if($post_list){	 
							foreach ( $post_list as $post ) {
								$post_author_id = get_post_field ('post_author', $post->ID  );

								$companyPostId = get_field('company', $post->ID );
								if ($companyPostId == "") { ?>
									<img class="flagimg" src="<?php echo get_template_directory_uri(); ?>/images/flag.svg">  	
								<?php }


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
										   				<p class="labelnameco">'.get_the_title(get_field('company', $post->ID)).'</p>
										   				<div clasS="line"></div>
										   				<p><img class="icon-view" src="'.get_template_directory_uri().'/images/views.svg">'.getCrunchifyPostViews(get_the_ID()).'<img class="icon-like" src="'.get_template_directory_uri().'/images/likes.svg">'.get_field('likes_number',$post->ID).'</p>
										   			</div>
										   </div>
									';
							}
						}else{
								echo "<p>Sorry you do not have Jobs</p>";
						}
					?>
 				</div>

 				<div id="info-promotions" class="information-container  function-information">
 					<?php
 								$post_list = get_posts( array(
							    'orderby'    => 'date',
							    'sort_order' => 'asc',    
							    'post_type'  => 'promotions' ,
							    'posts_per_page' => 50,
							    'author' => $userauthor->ID,
							    'post_status' => 'any',
								

							) );
							
						if($post_list){	 
							foreach ( $post_list as $post ) {

								$post_author_id = get_post_field ('post_author', $post->ID  );

								$companyPostId = get_field('company', $post->ID );
								if ($companyPostId == "") { ?>
									<img class="flagimg" src="<?php echo get_template_directory_uri(); ?>/images/flag.svg">  	
								<?php }

				 				get_template_part("template-part/content","promotions");
							   
							}

						}else{
								echo "<p>Sorry you do not have Promotions</p>";
						}
					?>
 				</div>

 				<div id="info-events" class="information-container  function-information">
 					<?php
 								$post_list = get_posts( array(
							    'orderby'    => 'date',
							    'sort_order' => 'asc',    
							    'post_type'  => 'events' ,
							    'posts_per_page' => 50,
							    'author' => $userauthor->ID,
							) );
							
						if($post_list){	 
							foreach ( $post_list as $post ) {
								$post_author_id = get_post_field ('post_author', $post->ID  );
								$companyPostId = get_field('company', $post->ID );
								if ($companyPostId == "") { ?>
									<img class="flagimg" src="<?php echo get_template_directory_uri(); ?>/images/flag.svg">  	
								<?php }

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
							   			<div class="post-box-img" style="background-image:url('.get_field('event_image', $post->ID).');">
							   				<div class="post-box-img-cell">'.$btnEdit.'</div>
							   			</div>
							   			<div class="post-box-info">
							   				<div class="column c_50"><p class="label-event">Event date:</p></div>
							   				<div class="column c_50 pos_right"><span class="date-info">'.get_field('event_start_date', $post->ID).'</span></div>
							   				<div class="clear"></div>
							   				<div class="line"></div>
							   				<h3>'.get_the_title($post->ID).'</h3>
							   				<div class="excert_box"><p>'.wp_trim_words(get_field('event_description', $post->ID ),16).'</p></div>
							   				<p class="labelnameco">'.get_the_title(get_field('company', $post->ID)).'</p>
							   				<div clasS="line"></div>
							   				<p><img class="icon-view" src="'.get_template_directory_uri().'/images/views.svg">'.getCrunchifyPostViews(get_the_ID()).'<img class="icon-like" src="'.get_template_directory_uri().'/images/likes.svg">'.get_field('likes_number',$post->ID).'</p>
							   			</div>
							   </div>';
							}


						}else{
								echo "<p>Sorry you do not have Events</p>";
						}
					?>
 				</div>

 				<div id="info-insights" class="information-container function-information">
 					<?php
	 							$post_list = get_posts( array(
								    'orderby'    => 'date',
								    'sort_order' => 'asc',    
								    'post_type'  => 'insights',
								    'posts_per_page' => 50,
								    'author' => $userauthor->ID
								) );
								 
								$posts = array();

								
							if($post_list){	 
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
								   				<p class="labelnameco">'.get_the_title(get_field('company', $post->ID)).'</p>
								   				<table class="table-terms">
								   					<tr>
								   						<td>Views</td>
								   						<td class="value">'.getCrunchifyPostViews(get_the_ID()).'</td>
								   					</tr>
								   					<tr>
								   						<td>Saved</td>
								   						<td  class="value">0</td>
								   					</tr>
								   				</table>
								   			</div>
								   </div>';
								}


							}else{
									echo "<p>Sorry you do not have Events</p>";
							}
	 					?>
 				</div>

 				<div id="info-company" class="information-container function-information">
 					<?php
	 							$post_list = get_posts( array(
								    'orderby'    => 'date',
								    'sort_order' => 'asc',    
								    'post_type'  => 'company',
								    'posts_per_page' => 50,
								    'author' => $userauthor->ID
								) );
							
							if($post_list){	 
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
									 
		 						   	
			 						   	$btnEdit = '<a href="javascript:void(0)" class="btn-close open-addon" id-attr="post-addons-'. $post->ID.'">...</a>
						 				<div id="post-addons-'. $post->ID.'" class="post-addons">
						 					<a href="'.get_the_permalink( 106 ).'?post='.$post->ID.'" class="btn-style-blue">Edit</a>
						 					<a href="'.get_the_permalink( 106 ) .'?remove='.$post->ID.'" onclick="return confirm(\' '.get_system_message('sure delete company').' \')" class="btn-style-blue">Remove</a>
						 				</div>';

			 						
	                                

	                               echo '<div class="post-box company_box">
	                                        <a href="'.get_the_permalink( $post->ID ).'"><div class="post-box-img" style="'.$hero.'"></div></a>
	                                        <div class="table-box" style="'.$hero.'">
                                            <div class="table-cell">
                                                <a class="black-btn" href="'.get_permalink( ).'">View company</a>
                                                <a class="white-btn" href="'.get_permalink( ).'/?open=true">Connect</a>
                                            </div>
                                        </div>
	                                        <div class="post-box-info">
	                                            <div class="clear"></div>
	                                            <div class="line"></div>
	                                            <div class="column c_30"> <a href="'.get_the_permalink( $post->ID ).'"><div class="circle-img" style="'.$logo.'"> </div></a></div>
	                                           <div class="column c_70"><a href="'.get_the_permalink( $post->ID ).'"><h3>'.get_the_title($post->ID).'</h3><p>'.wp_trim_words(get_post_field('post_content', $post->ID ), 10).'</p></a></div>
	                                           <div class="clear"></div>
	                                           <div style="margin-bottom: 20px;" class="line"></div>
	                                           <p><strong>Location: </strong>'.$city.', '. $countryname->name.'</p>
	                                           <p class="label-industries"><strong>Industries:&nbsp; </strong><div class="all-terms">'. $termsname.'</div></p>
	                                        </div>
	                               </div>';
	                            }

							}else{
									echo "<p>Sorry you do not have Company</p>";
							}
	 						?>
 				</div>
				<!--End new persoanl tabs-------------------->

			</div>


			<div class="clear"></div>
		</div><!-- #content -->
	</div><!-- #primary -->
</div>
	<div id="edit-modal" class="modal-box">
		<div class="container">
			<span id="close-login-modal" class="open-edit-modal">x</span>
			<h3>Update Profile Information</h3>
				<?php $options = array(
					    'post_id' => 'user_'.get_current_user_id() ,
					    'field_groups' => array(49),
					    'form' => true, 
					    'return' => add_query_arg( 'updated', 'true', get_permalink() ), 
					    'html_before_fields' => '',
					    'html_after_fields' => '',
					    'submit_value' => 'Update' 
					);
					acf_form( $options );
				?>
		</div>
	</div>


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
		$( ".open-edit-modal" ).click(function() {
		   if($( "#edit-modal" ).hasClass('active')){
		   		$( "#edit-modal" ).removeClass('active')
		   }else{
		   		$( "#edit-modal" ).addClass('active')
		   }
		});

		<?php if(isset($_GET['edit'] )){ ?> $( "#edit-modal" ).addClass('active'); <?php } ?>

	</script>


<?php get_footer(); ?>