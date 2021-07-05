<?php

$author_id = get_post_field( 'post_author',  get_the_ID() );

if (is_user_logged_in()) {

	
    $stack = array();
    $idactualuser = get_current_user_id();

	//Insert New User following user
	if (isset($_GET['id'])) {
		$row = array( 'field_5f0c5ac87ed0c' => $_GET['id']);
		add_row('field_5f0c5a777ed0b', $row , 'user_'.$idactualuser.'');
 	}

	if(get_current_user_id() ==  $author_id ){ ?>
		<div class="btns-users">
			<a href="<?php echo get_the_permalink(7) ; ?>" class="read-more">Messages</a>
			<a href="javascript:void(0)" class="btn-style-roundbox open-addon" id-attr="more-addons">+</a>
			<div id="more-addons" class="post-addons">
				<div class="addons-container">
					<div class="row">
						<div class="col">
							<h5>Create a:</h5>
						</div>
						<div class="col-1 text-right">
							<h5 class="open-addon" id-attr="more-addons">X</h5>
						</div>
					</div>
					
					<a href="<?php echo get_the_permalink( 882 )."/?information=".get_the_ID(); ?>">Add Case studies</a>
				</div>
			</div>
		</div>
   <?php }else{

	   // Check Users exists in my followin list.
		if( have_rows('users_following','user_'.$idactualuser.'') ):

			while( have_rows('users_following', 'user_'.$idactualuser.'') ) : the_row();

				$idusers = get_sub_field('user_following', 'user_'.$idactualuser.'');
				array_push($stack, $idusers);

			endwhile;
		endif;

		if (in_array($userauthor->ID , $stack)) { //Is user connected ?>

			<a href="javascript:void(0);"  class="read-more disable-btn">Connect</a>
								
		<?php }else{ ?>
								
			<a href="<?php echo get_author_posts_url($userauthor->ID)?>/?id=<?php echo $userauthor->ID; ?>" class="read-more">Connect</a>
	
		<?php } ?>
	
		<a id="myBtn" href="javascript:void(0)" class="btn-style-roundbox">Message</a>
<?php }
						
}else{ //The user is logout ?>
 	<a href="<?php echo get_the_permalink(7) ; ?>" class="read-more">Connect</a>
 	<a href="<?php echo get_the_permalink(7) ; ?>" class="btn-style-roundbox">Message</a>
<?php } ?>