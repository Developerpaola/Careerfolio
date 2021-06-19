<?php 
$post_author_id = get_post_field ('post_author', $post->ID  );
$companyPostId = get_field('company', $post->ID );
$termindustries = get_field('industries', $post->ID);
foreach( $termindustries as $term ): 
	$termindustriesname = $term;
endforeach;

if( get_current_user_id() == $post_author_id	){ 
				 					$btnFloat =  '<div class="float-btn"><a href="javascript:void(0)" class="btn-style-grey open-addon" id-attr="more-addons-'.$post->ID.'">...</a>
							 				<div id="more-addons-'.$post->ID.'" class="post-addons">
							 					<span class="btn-close open-addon" id-attr="more-addons-'.$post->ID.'">X</span>
							 					<a href="'.get_the_permalink( 250 ).'/?post='.$post->ID.'" class="btn-style-blue">Edit</a>
							 					<a href="'.get_the_permalink( 250).'/?remove='.$post->ID.'&c='.$companyID.'"  onclick="return confirm(\' '.get_system_message('sure delete job').' \')"  class="btn-style-blue">Remove</a>
							 					<a href="'.get_the_permalink( $post->ID ).'" class="btn-style-blue">Get now Promotion</a>
							 				</div></div>';
} else {
	//$btnFloat =  '<div class="float-btn"><a href="'.get_the_permalink( $post->ID ).'" class="white-btns open-addon" id-attr="more-addons-'.$post->ID.'">Get now</a></div>';
}

$group = get_field('discount_code', $post->ID);
$datestart = $group['start'];
$dateexpirate = $group['finish'];
$countdown = $dateexpirate - $datestart;

$orgDate = $group['finish'];
$newDate = date("j, F", strtotime($orgDate));  
$images = get_field('image_upload', $post->ID );
foreach ($images as $image) {
	$backimage = $image['sizes']['large'];
}
 


echo '<div class="post-box promotion-box">
							   				<div class="exp"><p>Exp '.$orgDate.'</p></div> <div class="exp-days"><p>'.$countdown.' days !</p></div>
										   			<div class="post-box-img" style="background-image:url('.$backimage.');">
							   							<div class="post-box-img-cell">'.$btnFloat.'</div>
							   						</div>

										   			<div class="post-box-info">
										   			<div class="column c_50"><div class="btn-style-round">'.$termindustriesname->name.'</div></div>
									   				<div class="column c_50 pos_right"><span class="date-info">'.get_the_date( 'jS F Y', $post->ID).'</span></div>
									   				<div class="clear"></div>
									   				<div class="line"></div>
										   				<div class="clear"></div>
										   				<h3>'.get_the_title($post->ID).'</h3>
										   				<div class="excert_box"><p>'.wp_trim_words(get_field('description', $post->ID ),17).'</p></div>
										   				<p class="labelnameco">'.get_the_title(get_field('company', $post->ID)).'</p>
										   				<div clasS="line"></div>
										   				<p class="info-view"><img class="icon-view" src="'.get_template_directory_uri().'/images/views.svg">'.getCrunchifyPostViews(get_the_ID()).'<img class="icon-like" src="'.get_template_directory_uri().'/images/likes.svg">'.get_field('likes_number',$post->ID).'</p>
										   				<a href="'.get_the_permalink($post->ID).'" class="btn-style-round getpromo relativebtn">Get now</a>
										   			</div>
										   </div>
									';

 ?>
