<?php
/**
 * The template for displaying all case pages
 *
 */

 	get_header(); 
	$author_id = get_post_field ('post_author', get_the_ID() );
	$companyId = get_field('company');
	$display_name = get_the_author_meta( 'first_name' , $author_id ).' '. get_the_author_meta( 'last_name' , $author_id ); 
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
					<?php 
						$terms = get_field('industries' );
						foreach( $terms as $term ): 
				        	echo '<div class="btn-style-round">'. $term->name.'</div>';
				   		endforeach;
					?>


				  BY: <a href="<?php echo  get_the_permalink( $companyId ); ?>"><?php echo get_the_title($companyId); ?></a>
				</div>
				<div class="column c_50 pos_right">
					&nbsp;
				</div>
				<div class="clear"></div>
			</div>

			<div class="clear"></div>
			<div class="line"></div>

			<h1><?php the_title(); ?></h1>
			<p class="date-info"><?php echo get_the_date( 'jS F Y'); ?></p>
			
			<div class="content-info">
				<?php
				while ( have_posts() ) :
					the_post();
					the_content();
					setCrunchifyPostViews(get_the_ID());
				endwhile; // End of the loop. ?>
			</div>
			<br>
			<br>
			<h3>Tags & Industries</h3>
			<div class="line"></div>
			<p>Tags:
				<?php 
						$terms = get_field('tags' );
						foreach( $terms as $term ): 
				        	echo $term->name.' ';
				   		endforeach;
					?> 

			</p>
			<p>Industries:
				<?php 
						$terms = get_field('industries' );
						foreach( $terms as $term ): 
				        	echo $term->name.' ';
				   		endforeach;
					?> 
			</p>


			<h3>Credits</h3>
			<div class="line"></div>
			<p><?php echo get_the_author_meta('first_name', $author_id); ?>&nbsp;<?php echo get_the_author_meta('last_name', $author_id); ?></p>
			<div class="line"></div>
			
		</div><!-- #content -->
	</div><!-- #primary -->


	<center><div class="more-information responsive-btns">
	 	<button class="like__btn">
	 	<img src="<?php echo get_template_directory_uri(); ?>/images/like-big.svg">
	    <span class="like__number"><?php the_field('likes_number'); ?></span>
		</button>
 	<div class="views"><img src="<?php echo get_template_directory_uri(); ?>/images/view-big.svg">
 	<p><?php echo getCrunchifyPostViews(get_the_ID()); ?></p></div>
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
 </div></center>


	<section class="more-post">
		<div class="container">
			<h3>More <?php $post_type_obj = get_post_type_object( get_post_type() ); echo $post_type_obj->labels->singular_name;  ?></h3>
				<?php
 							$post_list = get_posts( array(
							    'orderby'    => 'date',
							    'sort_order' => 'asc',    
							    'post_type'  => get_post_type( ) ,
							    'posts_per_page' => 4
							) );
							 
							$posts = array();

							
							 
							foreach ( $post_list as $post ) {
								$post_author_id = get_post_field ('post_author', $post->ID  );

								$btnEdit = '<a href="'.get_the_permalink( $post->ID ) .'" class="btn-style-white">View</a>';


								$terms = get_field('industries', $post->ID  );
								foreach( $terms as $term ): 
						        	$termPost = $term;
						   		endforeach;
				
		 					

							   echo '<div class="post-box">
							   			<div class="post-box-img" style="background-image:url('.get_field('event_image', $post->ID ).');">
							   				<div class="post-box-img-cell">'.$btnEdit.'</div>
							   			</div>
							   			<div class="post-box-info">
							   				<div class="column c_50"><div class="btn-style-round">'.$termPost->name.'</div></div>
							   				<div class="column c_50 pos_right"><span class="date-info">'.get_the_date( 'jS F Y', $post->ID).'</span></div>
							   				<div class="clear"></div>
							   				<div class="line"></div>
							   				<h3>'.get_the_title($post->ID).'</h3>
							   				<div class="excert_box"><p>'.wp_trim_words(get_field('event_description', $post->ID ),16).'</p></div>
							   				<div class="line"></div>
							   				<p><img class="icon-view" src="'.get_template_directory_uri().'/images/views.svg">'.getCrunchifyPostViews(get_the_ID()).'<img class="icon-like" src="'.get_template_directory_uri().'/images/likes.svg">'.get_field('likes_number').'</p>
							   			</div>
							   </div>';
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