<?php
/**
 * The template for displaying all promotions
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
			<div class="top-information"><div class="btn-style-round">Jobs</div> BY: <a href="<?php echo  get_the_permalink( $companyId ); ?>"><?php echo get_the_title($companyId); ?></a>
				
			</div>

			<div class="clear"></div>
			<div class="line"></div>

			<div class="column c_15">
				<div class="circle-img" style="background-image:url(<?php echo get_field('logo', $companyId);?> )"> </div>
			</div>
			<div class="column c_5"><br></div>
			<div class="column c_80">
					<h1><?php the_title(); ?></h1>
					<p><?php echo $city; ?>, <?php echo $countryname->name; ?></p>
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
				<p><strong>Deadline:</strong> <?php the_field('Deadline'); ?></p>
				<p><strong>Posted:</strong> <?php echo get_the_date( 'jS F Y'); ?></p>
			</div>
			<div class="column c_33 pos_right">
				&nbsp;
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


		</div><!-- #content -->
	</div><!-- #primary -->
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