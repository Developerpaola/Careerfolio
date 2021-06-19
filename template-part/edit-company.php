<?php
/**
 * Template Name: management company Page
 * The template for displaying sidebar pages
 *
 */
acf_form_head();
 get_header();   

$userauthor = wp_get_current_user();
$hero = '';
if( isset($_GET['edit']) ) { 
	if( get_field('hero_image', $_GET['edit'] ) ){
		$hero = 'background-image:url('. get_field('hero_image',  $_GET['edit'] ).')';
	}
}
 ?>

 	<section id="hero-image" style="<?php echo $hero; ?>" >
 		<div class="hero-cell" >
 		</div>
 	</section>

 	
	<div id="primary" class="site-content  container">
		<div id="content" role="main">

			

			<div class="column c_25">
				<?php 
					if( isset($_GET['edit']) ) {
						echo do_shortcode('[sidebar_company id="'.$_GET['edit'].'"]'); 
					}else{
						echo do_shortcode('[sidebar_profile perfil="'.get_current_user_id().'"]'); 
					} ?>
			</div>


			<div class="column c_5"><br></div>

			<div class="column c_70">
				<div class="column c_70">
					<h1>
						<?php 
						if( isset($_GET['edit']) ) {
							the_title();
						}else{
							echo 'New Company'; 
						} ?>
					</h1>
	 				<h3 class="subtitle"><?php the_field('description' ); ?></h3>
	 			</div>
	 			<div class="column c_30 pos_right">
	 				<br>

	 				<?php  if( isset($_GET['edit']) ) { ?>
		 				<a href="javascript:void(0)" class="btn-style-blue open-edit-modal">Edit</a>
		 				<a href="javascript:void(0)" class="btn-style-grey open-addon" id-attr="more-addons">...</a>
					 				<div id="more-addons" class="post-addons">
					 					<span class="btn-close open-addon" id-attr="more-addons">X</span>
					 					<a href="<?php echo get_the_permalink( 84 ); ?>" class="btn-style-blue">Add Case Studies</a>
					 					<a href="<?php echo get_home_url()?>/shop/" class="btn-style-blue">Add Jobs</a>
				 						<a href="<?php echo get_home_url()?>/shop/" class="btn-style-blue">Add Promotions</a>
					 					<a href="<?php echo get_the_permalink( $_GET['edit'] ); ?>" class="btn-style-blue">View Company</a> 
					 				</div>
					 <?php } ?>
	 			</div>
	 			<div class="clear"></div>
 				
 				<div class="line"></div>


 				<?php  if( isset($_GET['edit']) ) { ?>
 				<ul class="nav-perfil">
 					<li id="case" attr-info="info-case" class="info-tab" ><a  href="javascript:void(0)">Case Studies</a></li>
 					<li id="about" attr-info="info-about" class="info-tab  active" ><a  href="javascript:void(0)">About Us</a></li>
 					<li id="jobs" attr-info="info-jobs" class="info-tab"><a href="javascript:void(0)">Jobs</a></li>
 					<li id="promotions" attr-info="info-promotions" class="info-tab"><a href="javascript:void(0)">Promotions</a></li>
 				</ul>

 				<?php } ?>
 				<div class="clear"></div>
 				<div class="line"></div>

 				<div id="info-case" class="information-container">
 				</div>

 				<div id="info-about" class="information-container active">
 					<?php 
 						if(  isset($_GET['edit']) ){
 							$options = array(
							    'post_id' => $_GET['edit'] ,
		    					'field_groups' => array(21),
							    'return' => get_the_permalink( $_GET['edit'] ),
								'form' => true, 
						        'post_title'    => true,
						        'post_content'  => true,
							    'submit_value' => 'Update' 
							);

 						}else{
 							$options = array(
						        'post_id'       => 'new_post',
						        'field_groups' => array(119),
						        'post_title'    => true,
						        'post_content'  => true,
							    'return' => get_the_permalink( 11 ),
						        'new_post'      => array(
						            'post_type'     => 'company',
						            'post_status'   => 'publish',
						        ),
						        'submit_value'  => 'Create new Company'
						    );

 						}
	 					
						acf_form( $options );
					?>
 					
 				</div>

 				<div id="info-jobs" class="information-container ">
 				</div>

 				<div id="info-promotions" class="information-container ">
 				</div>

 				



			</div>


			<div class="clear"></div>
		</div><!-- #content -->
	</div><!-- #primary -->

	<div id="edit-modal" class="modal-box">
		<div class="container">
			<span id="close-login-modal" class="open-edit-modal">x</span>
			<h3>Update Profile Information</h3>
				<?php $options = array(
					    'post_id' => $_GET['edit'] ,
					    'field_groups' => array(119),
					    'form' => true, 
					    'return' => get_the_permalink( $_GET['edit'] ),
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