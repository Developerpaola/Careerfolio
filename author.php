<?php
/**
 * The template for displaying authors pages
 *
 */
$dataactualuser = wp_get_current_user();
if (is_user_logged_in()) {
	$idactualuser = wp_get_current_user()->data->ID;
}
get_header();
acf_form_head();
global $wp_query;
$userauthor = $wp_query->get_queried_object(); 

$hero = '';
if( get_field('banner_img', 'user_'.$userauthor->ID ) ){
	$hero = 'background-image:url('. get_field('banner_img', 'user_'.$userauthor->ID ).')';
}


?>

 	<section id="hero-image" class="author-banner" style="<?php echo $hero; ?>">
 		<div class="hero-cell" >
 		</div>
 	</section>

 	
	<div id="primary" class="site-content  container">
		<div id="content" role="main">
			<div class="row gap-5 author-box">
				<div class="col-3">
				  <?php get_template_part("template-part/sidebar/content","author"); ?>
				</div>


				<div class="col">
					
					<?php get_template_part("template-part/author/content","author-principal"); ?>

					<div class="row gap-0">
						<div class="col">
							<?php get_template_part("template-part/author/content","can-help"); ?>
						</div>
						<div class="col">
							<?php get_template_part("template-part/author/content","grow-in"); ?>
						</div>
					</div>


 				<!--empty information-->
 				
 						
 					
				<div class="information-page">
					<div class="row align-items-end">
						<div class="col">
							<ul class="nav-perfil">
									<li id="about" attr-info="info-about" class="info-tab active" ><a  href="javascript:void(0)">About me</a></li>
								<?php if (have_rows('education', 'user_'.$userauthor->ID)) { ?>
									<li id="education" attr-info="info-education" class="info-tab"><a href="javascript:void(0)">Qualifications & Certifications</a></li>
								<?php } ?>
								<?php if (get_field('skills', 'user_'.$userauthor->ID) || have_rows('experience', 'user_'.$userauthor->ID)) { ?>
								<li id="skill" attr-info="info-skill" class="info-tab"><a href="javascript:void(0)">Skills & Experience</a></li>
								<?php } ?>
									<li id="insights" attr-info="info-aspirations" class="info-tab"><a href="javascript:void(0)">Aspirations</a></li>
									<li id="company" attr-info="info-company" class="info-tab"><a href="javascript:void(0)">Company</a></li>
									<li id="contributions" attr-info="info-contributions" class="info-tab"><a href="javascript:void(0)">Contributions</a></li>
							</ul>
						</div>
						<div class="col-1 text-right">
							<a class="edit-btn"  href="<?php echo get_the_permalink(809); ?>">Edit</a>
						</div>
					</div>
 				<div class="clear"></div>
 				<div class="line"></div>

 				
	 				<div id="info-about" class="information-container active">
					 	<div class="single-information">
	 						<?php the_field('about_me', 'user_'.$userauthor->ID); ?>
						</div>
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

					<div id="info-aspirations" class="information-container">
						<h3>Aspirations</h3>
					</div>

					
					<div id="info-company" class="information-container">
						<?php echo do_shortcode('[list_companies author="'.$userauthor->ID.'" ]'); ?>
					</div>
					<div id="info-contributions" class="information-container">
						<?php echo do_shortcode('[list_post author="'.$userauthor->ID.'" ]'); ?>
					</div>
				</div>
			</div>
			

		</div>	

  
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


<?php get_footer(); ?>