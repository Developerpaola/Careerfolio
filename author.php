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
			<div class="row gap-5 author-box">
				<div class="col-3">
				  <?php get_template_part("template-part/sidebar/content","author"); ?>
				</div>


				<div class="col">
					<div class="flag-box">

					<?php if( get_current_user_id() == $userauthor->ID){ 
						echo '<div class="flag-edit">';
	 					echo '<a href="'.get_the_permalink(45).'/?edit=1" class="btn-style-blue">Edit</a>';
	 					echo '<a href="javascript:void(0)" class="btn-style-grey open-addon" id-attr="more-addons">...</a>
				 				<div id="more-addons" class="post-addons">
				 					<span class="btn-close open-addon" id-attr="more-addons">X</span>
				 					<a href="'.get_the_permalink( 84 ).'" class="btn-style-blue">Add Insights</a>
				 					<a href="'.get_the_permalink( 106 ).'" class="btn-style-blue">Add Company</a>
				 					<a href="'.get_author_posts_url(get_current_user_id()).'" class="btn-style-blue">View Profile</a>
				 				</div>';
						echo '</div>';
	 				} ?>
						<h1><?php echo esc_html( $userauthor->first_name ) . ' ' . esc_html( $userauthor->last_name ); ?></h1>
						<h3 class="subtitle"><?php the_field('job_title_information', 'user_'.$userauthor->ID ); ?></h3>
						<div class="row count-info align-items-center">
							<div class="col-2">
								<h4>0</h4>
								<p>Contributions</p>
							</div>
							<div class="col-2">
								<h4>0</h4>
								<p>Resources</p>
							</div>
							<div class="col-2">
								<h4>0</h4>
								<p>Connections</p>
							</div>
							<div class="col">
							</div>
							<div class="col-3 text-right">
								<!-- Estar Btn--->
								<?php get_template_part("template-part/community/box","connect-message-btns"); ?>
								<!-- End BTN--->
							</div>
						</div>
					</div>

					<div class="row gap-0">
						<div class="col">
							<div class="flag-box">
								<h5>I can help you with:</h5>
								<p class="pill">Creative art, craft and design</p>
								<p class="pill">Mystery shopping</p>
								<p class="pill">Writing and rewriting</p>
								
							</div>
						</div>
						<div class="col">
							<div class="flag-box">
								<h5>I want to grow in:</h5>
								<p  class="pill">Search engine marketing</p>
							</div>
						</div>
					</div>


 				<!--empty information-->
 				
 						
 					
				<div class="information-page">
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

					<div id="info-aspirations" class="information-container">
						<h3>Aspirations</h3>
					</div>

					
					<div id="info-company" class="information-container">
						<?php echo do_shortcode('[list_companies author="'.$userauthor->ID.'" ]'); ?>
					</div>
				</div>
			</div>
			

		</div>	


			


			


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