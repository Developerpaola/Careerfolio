<?php
/**
 * Template Name: Followers Page
 * The template for displaying sidebar pages
 *
 */
$dataactualuser = wp_get_current_user();
if (is_user_logged_in()) {
	$idactualuser = wp_get_current_user()->data->ID;
}
$tabactive = "active";
$linkco = "";
if (isset($_GET["linkco"])) {
	$linkco = "active";
	$tabactive = "";
}
 get_header();   ?>

 	<section id="hero-image" >
 		<div class="hero-cell" >
 		</div>
 	</section>

 <section id="following-page">	
	<div id="primary" class="site-content  container">
		<div id="content" role="main">

				<?php if (isset($_GET['idpro'])) { 

					$idpro = $_GET['idpro']; 
					$idprofile = get_user_by('id', $idpro);
					$jobactualuser = get_field('job_title_information', 'user_'.$idpro.'');
					?>
					<h1 class="name-user"><?php echo $idprofile->first_name; ?>&nbsp;<?php echo $idprofile->last_name; ?></h1>
					<h2 class="sub-title-job"><?php echo $jobactualuser; ?></h2>

					<a class="back-profile" href="<?php echo get_author_posts_url($idpro); ?>">Back to profile</a>
				<div class="hd-filter-foollowing">
					<div class="column c_80">
					<ul class="nav-perfil">
	 					<li id="following" attr-info="info-following" class="info-tab <?php echo $tabactive; ?>" ><a  href="javascript:void(0)">Following</a></li>
	 					<li id="compoanies" attr-info="info-companies" class="info-tab <?php echo $linkco; ?>"><a href="javascript:void(0)">Companies</a></li>
 					</ul>
				</div>
 				<div class="column c_20">
 					
 					<form action="<?php echo get_home_url(); ?>/following/?idpro=<?php echo $idpro ?>" id="searchpeoplebyname" method="post">
 						<input class="searchpeople" type="text" name="searchpeople" placeholder="Search">
 					</form>
 				</div>
 				<div class="clear"></div>
 				</div>

 				<!------Delete followings----------->
 			<?php 
 				if (isset($_GET['cont']) && isset($_GET['column'])) {
 					delete_row('field_5f0c5a777ed0b', $_GET['column'] , 'user_'.$idactualuser.'');
 				}
 				if (isset($_GET['contco']) && isset($_GET['columnco'])) {
 					delete_row('field_5f0c5afd7ed0d', $_GET['columnco'] , 'user_'.$idactualuser.'');
 				}
 			?>
 				<!-----Insert following user and companies----->
 				<?php 
 					if (isset($_GET['id'])) {
 					
 						$row = array(
				    		'field_5f0c5ac87ed0c' => $_GET['id'],
						);
						add_row('field_5f0c5a777ed0b', $row , 'user_'.$idpro.'');


 					} 
 					if (isset($_GET['idco'])) {
 					
 						$row = array(
				    		'field_5f0c5b127ed0e' => $_GET['idco'],
						);
						add_row('field_5f0c5afd7ed0d', $row , 'user_'.$idpro.'');


 					}


 					?>

 				<!--------------print all following users---------------->
 				<div id="info-following" class="information-container <?php echo $tabactive; ?>">
 					
 				<div class="following-boxes">
 					<?php 
 						if (isset($_POST['searchpeople'])) {
					 		$name = htmlentities($_POST['searchpeople'], ENT_QUOTES, "UTF-8");
					 	}else{
					 		$name = "";
					 	}
 					?>

 					<?php
 					$j = 1;
					if( have_rows('users_following','user_'.$idpro.'') ):
					    while( have_rows('users_following', 'user_'.$idpro.'') ){ the_row(); ?>
					    	<?php 
						        	$idusers = get_sub_field('user_following', 'user_'.$idpro.'');
						        	$user = get_user_by( 'id', $idusers );
						        	$nameuser = $user->first_name;
						        	$lastnameuser = $user->last_name;
						        	$iduser = $user->ID;
						        	$imgprof = get_field('profile_img', 'user_'.$user->ID.'');
						        	$jobtitle = get_field('job_title_information', 'user_'.$user->ID.'');
						    ?>
					      <?php if($name != '' && strpos($nameuser, $name)!== false) { ?>
						      <div class="column c_25">  
						        <div class="following-box">
						        	<div class="column c_25">
						        		<a href="<?php echo get_author_posts_url($iduser); ?>"><div class="circle-img" style="background-image: url('<?php echo $imgprof; ?>');"></div></a>
						        	</div>
				 					<div class="column c_5"><br></div>
				 					<div class="column c_70">
				 						<a href="<?php echo get_author_posts_url($iduser); ?>">
				 							<h2><?php echo $nameuser; ?> <?php echo $lastnameuser; ?></h2>
				 							<p><?php echo $jobtitle; ?></p>
				 						</a>
				 					</div>
				 					<div class="clear"></div>
				 					<?php $j++; ?>
						        </div>
						        </div>
					      <?php }elseif($name == ""){ ?> 
					      		<div class="column c_25">  
						        <div class="following-box">
						        	<div class="column c_25">
						        		<a href="<?php echo get_author_posts_url($iduser); ?>"><div class="circle-img" style="background-image: url('<?php echo $imgprof; ?>');"></div></a>
						        	</div>
				 					<div class="column c_5"><br></div>
				 					<div class="column c_70">
				 						<a href="<?php echo get_author_posts_url($iduser); ?>">
				 							<h2><?php echo $nameuser; ?> <?php echo $lastnameuser; ?></h2>
				 							<p><?php echo $jobtitle; ?></p>
				 						</a>
				 					</div>
				 					<div class="clear"></div>
				 					<?php $j++; ?>
						        </div>
						        </div>
					      <?php } ?>

					      

					    <?php }
					// No value.
					else :
					    // Do something...
					endif;
					?>
					<div class="clear"></div>
 				</div>

 				</div>
 				<!--------print all Following companies------------>
 				<div id="info-companies" class="information-container <?php echo $linkco; ?>">
 					
 				<div class="following-boxes">
 					<?php
 					$i = 1;
					if( have_rows('companies','user_'.$idpro.'') ):
					    while( have_rows('companies', 'user_'.$idpro.'') ) : the_row(); ?>
					       
					        <!--<div class="following-box">-->
					        	<?php 
					        	$idco = get_sub_field('companie', 'user_'.$idpro.'');
					        	$logoco = get_field('logo',$idco);
					        	$heroimg = get_field('hero_image', $idco );
					        	$location = get_field('location',$idco);
					        	$namelocation = get_term($location);
					        	$citylocation = ",".get_field('city', $idco)."";
					        	$terms = get_field('industries', $idco);
                                $termsname='';
                                if( $terms ): 
                                    foreach( $terms as $term ):
                                        $termsname = '<a href="'.esc_url( get_term_link( $term ) ).'">'.esc_html( $term->name ).'</a>, ';
                                    endforeach; 
                                endif; 
					        	?>
					        	
			 					<div class="post-box company_box">
                                        <a href=""><div class="post-box-img" style="background-image: url('<?php echo $heroimg; ?>');"></div></a>
                                        <div class="table-box" style="background-image: url('<?php echo $heroimg; ?>');">
                                            <div class="table-cell">
                                                <a class="black-btn" href="<?php echo get_the_permalink($idco); ?>">View company</a>
                                                <a class="white-btn" href="<?php echo get_the_permalink($idco); ?>?open=true">Connect</a>
                                            </div>
                                        </div>
                                        <div class="post-box-info">
                                            <div class="clear"></div>
                                            <div class="column c_30"> <a href=""><div class="circle-img" style="background-image: url('<?php echo $logoco; ?>');"> </div></a></div>
                                           <div class="column c_70"><a href=""><h3><?php echo get_the_title($idco); ?></h3><p><?php echo wp_trim_words(get_field('description',$idco), 10); ?></p></a></div>
                                           <div class="clear"></div>
                                           <div class="line"></div>
                                           <div class="info-co">
                                            <p><strong>Location: </strong> <?php echo $namelocation->name; ?><?php echo $citylocation; ?></p>
                                            <p><strong>Industries: </strong><?php echo $termsname; ?></p>
                                           </div>

                                           <span class="info-label">Case Studies: 54</span>
                                           <span class="info-label">Promotions: 5</span>
                                           <span class="info-label">Active Jobs: 4</span>
                                        </div>
                               </div>
			 					<?php $i++; ?>
					    <?php endwhile;
					// No value.
					else :
					    // Do something...
					endif;
					?>
					<div class="clear"></div>
 				</div>

 			</div>


				<?php }else{ ?>

				<h1 class="name-user"><?php echo esc_html( $dataactualuser->user_firstname); ?>&nbsp;<?php echo esc_html( $dataactualuser->user_lastname); ?></h1>
 				<h2 class="sub-title-job"><?php echo get_field('job_title_information', 'user_'.$idactualuser.''); ?></h2>
 				
 				<a class="back-profile" href="<?php echo get_author_posts_url($idactualuser); ?>">Back to profile</a>
				
				<div class="hd-filter-foollowing">
 				<div class="column c_80">
					<ul class="nav-perfil">
	 					<li id="following" attr-info="info-following" class="info-tab <?php echo $tabactive; ?>" ><a  href="javascript:void(0)">Following</a></li>
	 					<li id="compoanies" attr-info="info-companies" class="info-tab <?php echo $linkco; ?>"><a href="javascript:void(0)">Companies</a></li>
 					</ul>
				</div>
 				<div class="column c_20">
 					<form action="<?php echo get_home_url(); ?>/following/" id="searchpeoplebyname" method="post">
 						<input class="searchpeople" type="text" name="searchpeoples" placeholder="Search">
 					</form>
 				</div>
 				<div class="clear"></div>
 			</div>

 				<!------Delete followings----------->
 			<?php 
 				if (isset($_GET['cont']) && isset($_GET['column'])) {
 					delete_row('field_5f0c5a777ed0b', $_GET['column'] , 'user_'.$idactualuser.'');
 				}
 				if (isset($_GET['contco']) && isset($_GET['columnco'])) {
 					delete_row('field_5f0c5afd7ed0d', $_GET['columnco'] , 'user_'.$idactualuser.'');
 				}
 			?>
 				<!-----Insert following user and companies----->
 				<?php 
 					if (isset($_GET['id'])) {
 					
 						$row = array(
				    		'field_5f0c5ac87ed0c' => $_GET['id'],
						);
						add_row('field_5f0c5a777ed0b', $row , 'user_'.$idactualuser.'');


 					} 
 					if (isset($_GET['idco'])) {
 					
 						$row = array(
				    		'field_5f0c5b127ed0e' => $_GET['idco'],
						);
						add_row('field_5f0c5afd7ed0d', $row , 'user_'.$idactualuser.'');


 					}


 					?>
 				<!--------------print all following users---------------->
 				<div id="info-following" class="information-container <?php echo $tabactive; ?>">
 					
 				<div class="following-boxes">

 				<?php 
 						if (isset($_POST['searchpeoples'])) {
					 		$names = htmlentities($_POST['searchpeoples'], ENT_QUOTES, "UTF-8");
					 	}else{
					 		$names = "";
					 	}
 					?>

 					<?php
 					$j = 1;
					if( have_rows('users_following','user_'.$idactualuser.'') ):
					    while( have_rows('users_following', 'user_'.$idactualuser.'') ) : the_row(); ?>
					    	<?php 
					        	$idusers = get_sub_field('user_following', 'user_'.$idactualuser.'');
					        	$user = get_user_by( 'id', $idusers );
					        	$nameuser = $user->first_name;
					        	$lastnameuser = $user->last_name;
					        	$iduser = $user->ID;
					        	$imgprof = get_field('profile_img', 'user_'.$user->ID.'');
					        	$jobtitle = get_field('job_title_information', 'user_'.$user->ID.'');
					        ?>
					    	 <?php if($names != '' && strpos($nameuser, $names)!== false) { ?>
							      <div class="column c_25">  
							        <div class="following-box">
							        	
							        	<div class="column c_25">
							        		<a href="<?php echo get_author_posts_url($iduser); ?>"><div class="circle-img" style="background-image: url('<?php echo $imgprof; ?>');"></div></a>
							        	</div>
					 					<div class="column c_5"><br></div>
					 					<div class="column c_70">
					 						
					 						<a href="javascript:void(0)" class="btn-style-grey open-addon" id-attr="more-addons">...</a>
							 				<div id="more-addons" class="post-addons">
							 					<span class="btn-close open-addon" id-attr="more-addons">X</span>
							 					<a href="<?php echo get_home_url(); ?>/following/?cont=" class="btn-style-blue">Remove</a>
							 				</div>
							 				<a href="<?php echo get_author_posts_url($iduser); ?>">
					 							<h2><?php echo $nameuser; ?> <?php echo $lastnameuser; ?></h2>
					 							<p><?php echo $jobtitle; ?></p>
					 						</a>
					 					</div>
					 					<div class="clear"></div>
					 					<?php $j++; ?>
							        </div>
							        </div>
							 <?php }elseif($names == ""){ ?>
							 		<div class="column c_25">  
							        <div class="following-box <?php echo get_row_index(); ?>">
							        	<?php $numcolumn = get_row_index(); ?>
							        	<div class="column c_25">
							        		<a href="<?php echo get_author_posts_url($iduser); ?>"><div class="circle-img" style="background-image: url('<?php echo $imgprof; ?>');"></div></a>
							        	</div>
					 					<div class="column c_5"><br></div>
					 					<div class="column c_70">
					 						<a href="javascript:void(0)" class="btn-style-grey open-addon" id-attr="more-addons<?php echo $numcolumn; ?>">...</a>
							 				<div id="more-addons<?php echo $numcolumn; ?>" class="post-addons">
							 					<span class="btn-close open-addon" id-attr="more-addons">X</span>
							 					<a href="<?php echo get_home_url(); ?>/following/?cont=6&column=<?php echo $numcolumn; ?>" class="btn-style-blue">Remove</a>
							 				</div>
							 				<a href="<?php echo get_author_posts_url($iduser); ?>">
					 							<h2><?php echo $nameuser; ?> <?php echo $lastnameuser; ?></h2>
					 							<p><?php echo $jobtitle; ?></p>
					 						</a>
					 					</div>
					 					<div class="clear"></div>
					 					<?php $j++; ?>
							        </div>
							        </div>
							<?php } ?>


					    <?php endwhile;
					// No value.
					else :
					    // Do something...
					endif;
					?>
					<div class="clear"></div>
 				</div>

 				</div>
 				<!--------print all Following companies------------>
 				<div id="info-companies" class="information-container <?php echo $linkco; ?>">
 					
 				<div class="following-boxes">
 					<?php
 					$i = 1;
					if( have_rows('companies','user_'.$idactualuser.'') ):
					    while( have_rows('companies', 'user_'.$idactualuser.'') ) : the_row(); ?>
					    
					    	<?php 
					        	$idco = get_sub_field('companie', 'user_'.$idactualuser.'');
					        	$logoco = get_field('logo',$idco);
					        	$heroimg = get_field('hero_image', $idco );
					        	$location = get_field('location',$idco);
					        	$namelocation = get_term($location);
					        	$citylocation = ",".get_field('city', $idco)."";
					        	$terms = get_field('industries', $idco);
                                $termsname='';
                                if( $terms ): 
                                    foreach( $terms as $term ):
                                        $termsname = '<a href="'.esc_url( get_term_link( $term ) ).'">'.esc_html( $term->name ).'</a>, ';
                                    endforeach; 
                                endif; 
					        	?>
					        	
			 					<div class="post-box company_box">
			 						<?php $numcolumnco = get_row_index(); ?>
                                        <a href=""><div class="post-box-img" style="background-image: url('<?php echo $heroimg; ?>');"></div></a>
                                        <div class="table-box" style="background-image: url('<?php echo $heroimg; ?>');">
                                            <div class="table-cell">

                                            	<a href="javascript:void(0)" style="position: relative;top: -55px;border-radius: 50%;width: 20px;height: 20px;padding: 5px;" class="btn-style-grey open-addon" id-attr="more-addonsco<?php echo $numcolumnco; ?>">...</a>
							 				<div id="more-addonsco<?php echo $numcolumnco; ?>" class="post-addons">
							 					<span class="btn-close open-addon" id-attr="more-addons">X</span>
							 					<a href="<?php echo get_home_url(); ?>/following/?contco=6&columnco=<?php echo $numcolumnco; ?>" class="btn-style-blue">Remove</a>
							 				</div>

                                                <a class="black-btn" href="<?php echo get_the_permalink($idco); ?>">View company</a>
                                                <a class="white-btn" href="<?php echo get_the_permalink($idco); ?>?open=true">Connect</a>
                                            </div>
                                        </div>
                                        <div class="post-box-info">
                                            <div class="clear"></div>
                                            <div class="column c_30"> <a href=""><div class="circle-img" style="background-image: url('<?php echo $logoco; ?>');"> </div></a></div>
                                           <div class="column c_70"><a href=""><h3><?php echo get_the_title($idco); ?></h3><p><?php echo wp_trim_words(get_field('description',$idco), 10); ?></p></a></div>
                                           <div class="clear"></div>
                                           <div class="line"></div>
                                           <div class="info-co">
                                            <p><strong>Location: </strong> <?php echo $namelocation->name; ?><?php echo $citylocation; ?></p>
                                            <p><strong>Industries: </strong><?php echo $termsname; ?></p>
                                           </div>

                                           <span class="info-label">Case Studies: 54</span>
                                           <span class="info-label">Promotions: 5</span>
                                           <span class="info-label">Active Jobs: 4</span>
                                        </div>
                               </div>
			 					<?php $i++; ?>
					    <?php endwhile;
					// No value.
					else :
					    // Do something...
					endif;
					?>
					<div class="clear"></div>
 				</div>

 			</div>

 		<?php } ?>
			
		</div><!-- # end content -->
	</div><!-- #primary -->
</section>

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
		   if($(".post-addons").hasClass('active')){
		   		//$( "#"+idBox ).removeClass('active');
		   		$(".post-addons").removeClass('active');
		   }else{
		   		$( "#"+idBox ).addClass('active');
		   }
		});
	
</script>

<?php get_footer(); ?>