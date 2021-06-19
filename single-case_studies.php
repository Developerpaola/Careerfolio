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
			
			<?php
			while ( have_posts() ) :
				the_post();
				the_content();
				setCrunchifyPostViews(get_the_ID());
			endwhile; // End of the loop. ?>
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
			<a href="" class="btn-style-blue"><svg class="connect-icon" xmlns="http://www.w3.org/2000/svg" width="10.688" height="10.703" viewBox="0 0 10.688 10.703">
						  <g id="Group_175" data-name="Group 175" transform="translate(-1203.343 -38.861)">
						    <path id="Path_1694" data-name="Path 1694" d="M1563.456,41.305c-.018.115-.031.23-.055.343a2.2,2.2,0,0,1-.3.745,2.073,2.073,0,0,1-.273.325q-1.117,1.139-2.239,2.273c-.239.241-.481.481-.732.71a2.108,2.108,0,0,1-1.362.571,2.293,2.293,0,0,1-1.617-.515,1.4,1.4,0,0,1-.187-.189.322.322,0,0,1,.011-.411.284.284,0,0,1,.383-.06,2.473,2.473,0,0,1,.276.195,1.551,1.551,0,0,0,1.242.307,1.619,1.619,0,0,0,.905-.474c.977-.951,1.945-1.911,2.887-2.9a1.417,1.417,0,0,0,.377-.9,1.512,1.512,0,0,0-.149-.874,1.625,1.625,0,0,0-1.133-.885,1.675,1.675,0,0,0-1.045.113,1.89,1.89,0,0,0-.483.36c-.271.256-.54.514-.81.77-.058.055-.119.107-.181.157a.29.29,0,0,1-.408-.043.341.341,0,0,1,.011-.439c.367-.365.728-.738,1.111-1.087a2.114,2.114,0,0,1,1.233-.526,2.338,2.338,0,0,1,2.41,1.548,2.147,2.147,0,0,1,.115.531.4.4,0,0,0,.01.048Z" transform="translate(-349.426)" fill="#fff"/>
						    <path id="Path_1695" data-name="Path 1695" d="M1205.64,347.234a2.364,2.364,0,0,1-2.259-1.875,2.389,2.389,0,0,1,.2-1.464,1.98,1.98,0,0,1,.405-.563q1.1-1.117,2.212-2.23c.254-.255.506-.513.777-.749a2.056,2.056,0,0,1,1.252-.527,2.512,2.512,0,0,1,.8.056,2.221,2.221,0,0,1,.989.54.445.445,0,0,1,.154.263.277.277,0,0,1-.118.286.307.307,0,0,1-.34.027,2.041,2.041,0,0,1-.27-.193,1.619,1.619,0,0,0-1.835-.1,1.941,1.941,0,0,0-.316.258q-1.473,1.419-2.889,2.895a1.385,1.385,0,0,0-.372.818,1.767,1.767,0,0,0,.059.765,1.69,1.69,0,0,0,.589.793,1.539,1.539,0,0,0,1.094.313,1.455,1.455,0,0,0,.952-.4c.255-.241.508-.484.763-.724.109-.1.228-.193.331-.3a.3.3,0,0,1,.473.165.335.335,0,0,1-.083.337c-.3.29-.6.582-.894.872-.061.059-.128.113-.189.173a2.019,2.019,0,0,1-1.033.505C1205.944,347.207,1205.791,347.215,1205.64,347.234Z" transform="translate(0 -297.67)" fill="#fff"/>
						  </g>
						</svg>
					Connect</a>
			<a href="" class="btn-whiteblue">Message</a>
		</div><!-- #content -->
	</div><!-- #primary -->



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
							   			<div class="post-box-img" style="background-image:url('.get_field('hero_image', $post->ID ).');">
							   				<div class="post-box-img-cell">'.$btnEdit.'</div>
							   			</div>
							   			<div class="post-box-info">
							   				<div class="column c_50"><div class="btn-style-round">'.$termPost->name.'</div></div>
							   				<div class="column c_50 pos_right"><span class="date-info">'.get_the_date( 'jS F Y', $post->ID).'</span></div>
							   				<div class="clear"></div>
							   				<div class="line"></div>
							   				<h3>'.get_the_title($post->ID).'</h3>
							   				<div class="excert_box"><p>'.wp_trim_words(get_field('description', $post->ID ),25).'</p></div>
							   				<div clasS="line"></div>
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