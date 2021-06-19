<?php
/**
 * Template Name: Management Events
 * The template for displaying sidebar pages
 *
 */



acf_form_head();
 get_header();   

$userauthor = wp_get_current_user(); 

if ($_GET['remove']) { ?>
	<script>window.location.replace("http://foundry.pilotspider.com/my-perfil/");</script>
<?php }



if ( is_user_logged_in() ) {
?>
	<style>
		#sidebar{margin-top:0px;}
	</style>

 	
	<div id="primary" class="site-content  container">
		<div id="content" role="main">

			

			<div class="column c_25">
				 <?php if( isset( $_GET['c'] ) ){
				 	echo do_shortcode('[sidebar_company id="'.$_GET['c'].'"]');
				 }else{
				 	echo do_shortcode('[sidebar_company id="'.get_field('company',  $_GET['post']).'"]'); 

				 }  ?>

				 <div class="select-box-company">
				 	<?php get_field('company', $_GET['post']); ?> 

				 	<?php $actualcoedit =  $_GET['post']; ?>
				 	<?php 
				 	$idcom =  htmlentities($_POST['companies'], ENT_QUOTES, "UTF-8");
				 	if ($idcom != "") {
				 		update_field('company', $idcom , $actualcoedit);
				 	}
				 	 


				 	?>
				 	<form action="<?php echo get_home_url(); ?>/management-events/?post=<?php echo $_GET['post']; ?>" method="post">
				 		<select name="companies" id="companies">
				 			<option value="">Select Companie</option>
				 			<?php 
				 				if ($_GET['post'] != '') { 
				 					$selectedco = get_field('company', $_GET['post']); 
				 					$nameselectedco = get_the_title($selectedco);
				 					?>
				 					<option value="<?php echo $selectedco; ?>" selected><?php echo $nameselectedco; ?></option>
				 				<?php }
				 			?>
  							<?php
	 							$post_list = get_posts( array(
								    'orderby'    => 'date',
								    'sort_order' => 'asc',    
								    'post_type'  => 'company',
								    'posts_per_page' => 50,
								    'author' => $userauthor->ID
								) );
								foreach ( $post_list as $post ) {
	                                echo '<option value="'.$post->ID.'">'.get_the_title($post->ID).'</h3>';
	                            }
	 						?>
				 		</select>
				 		<input type="submit" name="" value="Update Company">
				 	</form>
				 
	 			</div>
			</div>


			<div class="column c_5"><br></div>

			<div class="column c_70">
				

 				<?php 
 					//echo $neweventcoid = $_GET['c'];
 					if( isset( $_GET['post'] )){
 						$post_author_id = get_post_field( 'post_author', $_GET['post'] );

 						if( $post_author_id == $userauthor->ID){
	 						$options = array(
							    'post_id'		=> $_GET['post'],
							    'field_groups' => array(417),
						        'post_title'    => true,
						        'post_content'  => true,
							    'return' => get_the_permalink( $_GET['post'] ),
						        'submit_value'  => __('Save Event')
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
	 							echo get_system_message('delete event');

	 						}else{
	 							echo get_system_message('no permission');
	 						}

 						}else{
	 						$options = array(
							    'post_id'		=> 'new_post',
							    'field_groups' => array(417), 
						        'post_title'    => true,
						        'post_content'  => true,
						        'submit_value'  => __('Add New Event'),
						        'new_post'		=> array(
														'post_type'		=> 'events',
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