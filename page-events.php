<?php
/**
 * Template Name: Events Page
 * The template for displaying sidebar pages
 *
 */
 get_header(); 
 $thumbnail = get_the_post_thumbnail_url();
$heroImg = '';
if ( $thumbnail ) {
	$heroImg = 'background-image:url('.$thumbnail .')';
}  ?>
<section id="hero-image" style="<?php echo $heroImg; ?>">
 		<div class="hero-cell" >
 			<h1><?php the_title(); ?></h1>
 			<h2><?php the_field('subtitle'); ?></h2>
 		</div>
 	</section>

<div class="container">
	<div id="primary" class="site-content">
		<?php 
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$posts = get_posts(array(
	'posts_per_page'	=> 6,
	'post_type'			=> 'events',
	'paged' => $paged,
	'orderby' => 'date',  
));

if( $posts ): ?>
	
	<?php foreach( $posts as $post ): 
		setup_postdata( $post );
		?>

								<?php if(get_field('event_image')){
                                     $hero = 'background-image:url('. get_field('event_image' ).');';
                                }else{
                                    $hero = "";
                                }
                                $startevent = get_field('event_start_date');
                                $expevent = get_field('event_end_date');
                                $currentdate = date("d/m/Y");
                                $countdownevent = $expevent - $currentdate;
                                $expi = $expevent;


                               $msg = '<div class="post-box all-promotions">
                                        <a href="'.get_permalink( ).'">
                                        <div class="exp"><p>Exp '. $expi.'</p></div> <div class="exp-days"><p>'.$countdownevent .' days !</p></div>
                                        <div class="post-box-img" style="'.$hero.'">
                                            <div class="post-box-img-cell"></div>
                                        </div>

                                       
                                        <div class="post-box-info">
                                            <div class="column c_50">&nbsp;</div>
                                                    <div class="column c_50 pos_right"><span class="date-info">'.$startevent.'</span></div>
                                            <div class="clear"></div>
                                            <div class="line"></div>
                                            <div class="clear"></div>
                                            <h3>'.get_the_title().'</h3>
                                            <div class="excert_box"><p>'.wp_trim_words(get_field('event_description'),17).'</p></div>
                                            <div class="line"></div>
                                            <p class="info-view"><img class="icon-view" src="'.get_template_directory_uri().'/images/views.svg">'.getCrunchifyPostViews(get_the_ID()).'<img class="icon-like" src="'.get_template_directory_uri().'/images/likes.svg">'.get_field('likes_number').'</p>
                                                        <a href="'.get_the_permalink().'" class="btn-style-round getpromo getevent">View</a>
                                        </div>
                               </div>'; 
                               echo $msg;
                               ?>












	
	<?php endforeach; 
		$big = 999999999;
     echo '<nav class="pagination">'.paginate_links( array(
          'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
          'format' => '?paged=%#%',
          'current' => max( 1, get_query_var('paged') ),
          'total' => $posts->max_num_pages,
          'prev_text' => '&laquo;',
          'next_text' => '&raquo;'
     ) ).'</nav>';

	?>	
	<?php wp_reset_postdata(); ?>

<?php endif; ?>
	</div>
</div>

 <?php get_footer(); ?>