<?php
/**
 * Template Name: Management Insight
 * The template for displaying sidebar pages
 *
 */



acf_form_head();
 get_header();   

$userauthor = wp_get_current_user(); 

if(isset($_GET['updated'])){
	echo '<script>window.location.replace("'.get_author_posts_url($userauthor->ID).'");</script>';
	die;
	
}

if ( is_user_logged_in() ) {
?>
	<style>
		#sidebar{margin-top:0px;}
	</style>

 
 
	<div id="primary" class="site-content  container">
		<div id="content" role="main">

			

			<div class="column c_25">
				<?php echo do_shortcode('[sidebar_profile perfil="'.get_current_user_id().'"]');  ?>
			</div>


			<div class="column c_5"><br></div>

			<div class="column c_70">
				

 				<?php 

 					if( isset( $_GET['post'] )){
 						$post_author_id = get_post_field( 'post_author', $_GET['post'] );

 						if( $post_author_id == $userauthor->ID){
	 						$options = array(
							    'post_id'		=> $_GET['post'],
						        'post_content'	=> true,
						        'post_title'    => true,
						        'field_groups' => array(86),
							    'return' => get_the_permalink( $_GET['post'] ),
						        'submit_value'  => __('Save Insight')
							);
							acf_form( $options );

 						}else{
 							echo get_system_message('no permission');
 						}

 					}else{

 						if( isset( $_GET['remove'] ) ){

 							$post_author_id = get_post_field( 'post_author', $_GET['remove'] );

	 						if( $post_author_id == $userauthor->ID){
		 						wp_delete_post( $_GET['remove'], true );
	 							echo get_system_message('delete insight');

	 						}else{
	 							echo get_system_message('no permission');
	 						}

 						}else{
	 						$options = array(
							    'post_id'		=> 'new_post',

						        'post_title'    => true,
						        'post_content'	=> true,
						        'field_groups' => array(86),
						        'submit_value'  => __('Add New Insight'),
						        'new_post'		=> array(
														'post_type'		=> 'insights',
														'post_status'	=> 'publish'
													)
							);
							acf_form( $options );

 						}

 					}
 					
				?>


			</div>


			<div class="clear"></div>
		</div><!-- #content -->
	</div><!-- #primary -->

	
	

<?php

}
 get_footer(); ?>