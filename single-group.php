<?php
/**
 * The template for Groups pages
 *
 */


get_header();

$hero = '';
if( get_field('hero' ) ){
	$hero = 'background-image:url('. get_field('hero' ).')';
	
}

$author_id = get_post_field( 'post_author',  get_the_ID() );
?>

 	<section id="hero-image" class="author-banner" style="<?php echo $hero; ?>">
 		<div class="hero-cell" >
 		</div>
 	</section>

 	
	<div id="primary" class="site-content  container">
		<div id="content" role="main">
			<div class="row gap-5 author-box">
				<div class="col-3">
				  <?php get_template_part("template-part/sidebar/content","group"); ?>
				</div>


				<div class="col">
					<?php get_template_part("template-part/post/content","principal-group"); ?>



					<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
						<li class="nav-item" role="presentation">
							<button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-conversations" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Conversations</button>
						</li>
						<li class="nav-item" role="presentation">
							<button class="nav-link" id="pills-member-tab" data-bs-toggle="pill" data-bs-target="#pills-member" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Members</button>
						</li>
						<li class="nav-item" role="presentation">
							<button class="nav-link" id="pills-mentions-tab" data-bs-toggle="pill" data-bs-target="#pills-mentions" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Mentions</button>
						</li>
						<li class="nav-item" role="presentation">
							<button class="nav-link" id="pills-about-tab" data-bs-toggle="pill" data-bs-target="#pills-about" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">About</button>
						</li>
						
					</ul>

					<div class="tab-content" id="pills-tabContent">
						<div class="tab-pane fade show active" id="pills-conversations" role="tabpanel" aria-labelledby="pills-home-tab">
							<div style="text-align: right;">
								<?php if( $author_id == get_current_user_id() ){ ?>
									<a href="<?php echo get_the_permalink(862).'?information='.get_the_ID(); ?>"  class="read-more">Start new conversation +</a>
								
								<?php } ?>
							</div>
							<br>
							<div class="single-information">
								<?php echo do_shortcode('[list_conversations group="'.get_the_ID().'" ]'); ?>
							</div>
						</div>
						<div class="tab-pane fade" id="pills-member" role="tabpanel" aria-labelledby="pills-profile-tab">
							<div class="row">
								<?php

									if( have_rows('members') ):
										while( have_rows('members') ) : the_row();
											setup_userdata( get_sub_field('user') );
											get_template_part( 'template-part/community/box', 'people' ); 
										endwhile;
									endif;
								?>
							</div>
						</div>
						<div class="tab-pane fade" id="pills-mentions" role="tabpanel" aria-labelledby="pills-profile-tab">...</div>
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