<?php
/**
 * The template for displaying all case pages
 *
 */

 	get_header(); 
	$author_id = get_post_field ('post_author', get_the_ID() );
	$companyId = get_field('company');
	$display_name = get_the_author_meta( 'first_name' , $author_id ).' '. get_the_author_meta( 'last_name' , $author_id ); 

	$city = get_field('city', $companyId);
	$city = ucfirst($city);
	$country = get_field('location', $companyId);
	$countryname = get_term($country);
	$postid = get_the_ID();
 ?>
 
 <div class="more-information">
	 	<button class="like__btn">
	 	<img src="<?php echo get_template_directory_uri(); ?>/images/like-big.svg">
	    <span class="like__number"><?php the_field('likes_number'); ?></span>
		</button>
 	<div class="views"><img src="<?php echo get_template_directory_uri(); ?>/images/view-big.svg">
 	<p><?php echo getCrunchifyPostViews(get_the_ID()); ?></p></div>
 	<div class="line"></div>
 	<p>Share</p>
 	<img class="accordion" src="<?php echo get_template_directory_uri(); ?>/images/share-big.svg">
 	
 	<div class="panel">
	 	<div data-network="twitter" class="st-custom-button">
	 		<img class="sharetwitter" src="<?php echo get_template_directory_uri(); ?>/images/twitter-icon.svg">  
	 	</div>
	 	<div data-network="facebook" class="st-custom-button">
	 		<img class="sharetwitter" src="<?php echo get_template_directory_uri(); ?>/images/facebook-icon.svg">
	 	</div>
	 	<div data-network="gmail" class="st-custom-button">
	 		<img class="sharetwitter" src="<?php echo get_template_directory_uri(); ?>/images/gmail-icon.svg">
	 	</div>
 	</div>
 </div>
	<div id="primary" class="site-content  container single-container">
		<div id="content" role="main">
			<div class="top-information">
				<div class="column c_50">
					<div class="btn-style-round">Jobs</div> BY: <a href="<?php echo  get_the_permalink( $companyId ); ?>"><?php echo get_the_title($companyId); ?></a>
				</div>
				<div class="column c_50 pos_right">
					&nbsp;
				</div>
				<div class="clear"></div>

				
				
			</div>

			<div class="clear"></div>
			<div class="line"></div>

			<div class="column c_15">
				<div class="circle-img" style="background-image:url(<?php echo get_field('logo', $companyId);?> )"> </div>
			</div>
			<div class="column c_5"><br></div>
			<div class="column c_80">
					<h1><?php the_title(); ?></h1>
					<img class="location-icon" src="<?php echo get_template_directory_uri(); ?>/images/location.svg"><p class="location"><?php echo $city; ?>, <?php echo $countryname->name; ?></p>
			</div>
			<div class="clear"></div>
			<div class="line"></div>

			<div class="column c_33">
				<p><strong>Position:</strong> <?php the_field('position_type'); ?></p>
				<p><strong>Salary:</strong> <?php the_field('salary'); ?></p>
				<p><strong>Company:</strong> <a href="<?php echo  get_the_permalink( $companyId ); ?>"><?php echo get_the_title($companyId); ?></a></p>
			</div>
			<div class="column c_33">
				<p><strong>Start Time:</strong> <?php the_field('start_time'); ?></p>
				<p><strong>Deadline:</strong> <?php the_field('deadline'); ?></p>
				<p><strong>Posted:</strong> <?php echo get_the_date( 'jS F Y'); ?></p>
			</div>
			<div class="column c_33 pos_right">
				<a href="<?php echo get_home_url(); ?>/apply-job/?coid=<?php echo $companyId; ?>&jobid=<?php echo $postid; ?>" class="btn-style-blue">Apply for job</a>
			</div>
			<div class="clear"></div>
			<div class="line"></div>
			
			
			<?php
			while ( have_posts() ) :
				the_post();
				the_content();
				setCrunchifyPostViews(get_the_ID());
			endwhile; // End of the loop. ?>
			<br>
			<br>
			<h3>Skills</h3>
			<div class="line"></div>
			<p><?php 
						$terms = get_field('skills_required' );
						foreach( $terms as $term ): 
				        	echo '<div class="btn-style-round">'.$term->name.'</div>';
				   		endforeach;
					?> 

			</p>


			<a href="<?php echo get_home_url(); ?>/apply-job/?coid=<?php echo $companyId; ?>&jobid=<?php echo $postid; ?>" class="btn-style-blue">Apply for job</a>

		</div><!-- #content -->
	</div><!-- #primary -->



	<section class="more-post">
		<div class="container">
			<h3>Related Jobs</h3>
				<?php
 							$post_list = get_posts( array(
							    'orderby'    => 'date',
							    'sort_order' => 'asc',    
							    'post_type'  => 'jobs' ,
							    'posts_per_page' => 4
							) );
							 
							
							 
							foreach ( $post_list as $post ) {
								$post_author_id = get_post_field ('post_author', $post->ID  );

								$companyPostId = get_field('company', $post->ID );

								$citypost = get_field('city',  $companyPostId );
								$citypost = ucfirst($citypost);
								$countrypsot = get_field('location',  $companyPostId );
								$countrynamepost = get_term($countrypost);

							   echo '<a href="'.get_the_permalink( $post->ID ) .'">
										   <div class="post-box">
										   			<div class="circle-img" style="background-image:url('.get_field('logo', $companyPostId ).' )"> </div>
										   			<div class="post-box-info">
										   				<div class="clear"></div>
										   				<h3>'.get_the_title($post->ID).'</h3>
										   				<img class="location-icon sm" src="'.get_template_directory_uri().'/images/location.svg">
														<p class="location">'.$citypost.'</p>
										   				<div class="excert_box"><p>'.wp_trim_words(get_field('description', $post->ID ),25).'</p></div>
										   				<div clasS="line"></div>
										   				<p><img class="icon-view" src="'.get_template_directory_uri().'/images/views.svg">'.getCrunchifyPostViews(get_the_ID()).'<img class="icon-like" src="'.get_template_directory_uri().'/images/likes.svg">'.get_field('likes_number').'</p>
										   			</div>
										   </div>
									</a>';
							}
				?>
		</div>
	</section>
	<script>
		var acc = document.getElementsByClassName("accordion");
		var i;

		for (i = 0; i < acc.length; i++) {
		  acc[i].addEventListener("click", function() {
		    this.classList.toggle("active");
		    var panel = this.nextElementSibling;
		    if (panel.style.display === "block") {
		      panel.style.display = "none";
		    } else {
		      panel.style.display = "block";
		    }
		  });
		}
	</script>

	<script type="text/javascript">
		

		$( ".open-addon" ).click(function() {
		   var idBox = $( this ).attr( "id-attr" );
		   if($( "#"+idBox ).hasClass('active')){
		   		$( "#"+idBox ).removeClass('active');
		   }else{
		   		$( "#"+idBox ).addClass('active');
		   }
		});

		// When a user clicks the like button
$('.like__btn').on('click', function(){
        // AJAX call goes to our endpoint url
        $.ajax({
            url: '<?php echo get_home_url(); ?>/wp-json/example/v2/likes/<?php echo $postid; ?>',
            type: 'post',
            success: function() {
                console.log('works!');
             },
             error: function() {
                console.log('failed!');
              }
          });
        
        // Change the like number in the HTML to add 1
        var updated_likes = parseInt($('.like__number').html()) + 1;

        $('.like__number').html(updated_likes);
        // Make the button disabled
        $(this).attr('disabled', true);
    });




$('.like__btn').on('click', function(){
  // Check if it's already been clicked
  if (!$(this).hasClass('like__btn--disabled')) {
    // Update the number
    updated_likes = parseInt($('.like__btn span').html());
    $('.like__btn span').html(updated_likes);
   }
  // Make btn disabled
  $(this).attr('disabled', true).addClass('tada');
});

	
</script>

<?php get_footer(); ?>