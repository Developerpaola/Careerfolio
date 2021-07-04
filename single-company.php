<?php
/**
 * The template for Company pages
 *
 */

$author_id = get_post_field( 'post_author',  get_the_ID() );
if(is_user_logged_in() and $author_id == get_current_user_id() ){
    acf_form_head();
}

get_header();


$hero = '';
if( get_field('hero_image' ) ){
	$hero = 'background-image:url('. get_field('hero_image' ).')';
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
				  <?php get_template_part("template-part/sidebar/content","company"); ?>
				</div>


				<div class="col">
					<?php get_template_part("template-part/company/content","company-pricipal"); ?>

					
					<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
						<li class="nav-item" role="presentation">
							<button class="nav-link active" id="pills-service-tab" data-bs-toggle="pill" data-bs-target="#pills-service" type="button" role="tab" aria-controls="pills-service" aria-selected="true">Service</button>
						</li>
						<li class="nav-item" role="presentation">
							<button class="nav-link" id="pills-studies-tab" data-bs-toggle="pill" data-bs-target="#pills-studies" type="button" role="tab" aria-controls="pills-studies" aria-selected="false">Case studies</button>
						</li>
						<li class="nav-item" role="presentation">
							<button class="nav-link" id="pills-resources-tab" data-bs-toggle="pill" data-bs-target="#pills-resources" type="button" role="tab" aria-controls="pills-resources" aria-selected="false">Resources</button>
						</li>
						<li class="nav-item" role="presentation">
							<button class="nav-link" id="pills-about-tab" data-bs-toggle="pill" data-bs-target="#pills-about" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">About</button>
						</li>
						
					</ul>

					<div class="tab-content" id="pills-tabContent">
						<div class="tab-pane fade show active" id="pills-service" role="tabpanel" aria-labelledby="pills-service-tab">
							<div class="single-information services-list">
								<div class="row">
									<?php
										if( have_rows('services') ):
											while( have_rows('services') ) : the_row();
												echo '<div class="col-6"><p class="pill">'.get_sub_field('service').'</p></div>';
											endwhile;
										else :
											echo '<p>No information yet</p>';
										endif;
									?>

									<?php 
										if( get_current_user_id() ==  $author_id ){
											echo '<a href="javascript:void(0);" class="edit-btn  openModal" modal="update-service">Edit</a>';
											echo '<div id="update-service" class="modal-box">
													<div class="container">
													<span id="close-login-modal" class="openModal" modal="update-service" >x</span>';
														acf_form(array(
															'post_id'		=> get_the_ID(),
															'post_title'	=> false,
															'post_content'	=> false,
															'fields' => array( 'field_60e1cce949e22' ),
															'submit_value' => 'Edit Services' 
														));
											echo '</div>
												</div>';
										}
									?>
									
								</div>
							</div>							
						</div>
						<div class="tab-pane fade" id="pills-studies" role="tabpanel" aria-labelledby="pills-studies-tab">
							
						</div>
						<div class="tab-pane fade" id="pills-resources" role="tabpanel" aria-labelledby="pills-resources-tab">...</div>
						<div class="tab-pane fade" id="pills-about" role="tabpanel" aria-labelledby="pills-profile-tab">
							<div class="single-information">
								<?php   
									if ( have_posts() ) : 
										while ( have_posts() ) : the_post();
											the_content();
										
										endwhile; 
									endif; 
								?>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>	

			
<?php get_footer(); ?>