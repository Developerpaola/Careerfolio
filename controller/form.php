<?php require( dirname(__FILE__) . '/../../../../wp-load.php' ); ?>



    	<?php 

$date = date('Y-m-d H:i:s');
			if (isset($_POST['text-message'])) {
				$text_message = htmlentities($_POST['text-message'], ENT_QUOTES, "UTF-8");
				$id_source = htmlentities($_POST['id-source'], ENT_QUOTES, "UTF-8");
				$id_destination = htmlentities($_POST['id-destination'], ENT_QUOTES, "UTF-8");
				$incremental = htmlentities($_POST['id-message'], ENT_QUOTES, "UTF-8");
				$profileid = htmlentities($_POST['profile-id'], ENT_QUOTES, "UTF-8");
			}




$args = array(
    'post_type'=> 'messages',
   'meta_query'  => array(
    'relation' => 'OR',
    array(
        'relation' => 'AND',
        array(
            'key'       => 'messages_%_id_source',
            'value'     => $id_source,
            'compare'   => '=',
        ),
        array(
           'key'        => 'messages_%_id_destination',
            'value'     => $profileid,
            'compare'   => '=',
        ),
    ),
    array(
        'relation' => 'AND',
        array(
            'key'       => 'messages_%_id_source',
            'value'     => $profileid,
            'compare'   => '=',
        ),
        array(
            'key'        => 'messages_%_id_destination',
            'value'     => $id_source,
            'compare'   => '=',
        ),
    )
),
);              

$the_query = new WP_Query( $args );
$userdata = get_user_by( 'id', $profileid );
$useremail = $userdata->user_email;

if($the_query->have_posts() ) : 
    while ( $the_query->have_posts() ) : 
       $the_query->the_post();
       
			if (!empty($text_message)) {
						//Add text to conversation

 						$row = array(
				    		'field_5f0ceb43e410e' => $text_message,
				    		'field_5f0ceb11e410d' => $incremental,
				    		'field_5f0ceb4ce410f' => $date,
				    		'field_5f0daeba8ab62' => $id_source,
				    		'field_5f0daeca8ab63' => $id_destination,
						);
						add_row('field_5f0cd771ac401', $row );

						ini_set( 'display_errors', 1 );
					    error_reporting( E_ALL );
					    $from = "jonathan@foundrydigital.co.uk";
					    $to = $useremail;
					    $subject = "Checking your messages";
					    $message = "You have new messages.";
					    $headers = "From:" . $from;
					    mail($to,$subject,$message, $headers);
					    
 			} 

			// Check rows exists.
			if( have_rows('messages') ):

			    // Loop through rows.
			    while( have_rows('messages') ) : the_row(); 

			    		$incremental = get_sub_field('id');
			    		$idmsg ="";
			    		$source = get_sub_field('id_source');
			    		if ($source == $profileid) {
			    			$idmsg = "msg-right";
			    		}else{
			    			$idmsg = "msg-left";
			    		}
			    	?>
			        <div class="unique-box <?php echo $idmsg; ?>">
			        	<div class="column c_30">&nbsp;</div>
			        	<div class="column c_70 pos_right"><?php echo get_sub_field('date'); ?></div>
			        	<div class="clear"></div>

			        	<p><?php echo get_sub_field('message'); ?></p>


			        </div>
			        
			     <?php 
			    // End loop.
			    endwhile; 
			    	$incremental++;
			 
			endif;
	?>





    <?endwhile; 
    wp_reset_postdata(); 
else: ?>
	


			  <?php 

			  $date = date('Y-m-d H:i:s');
			  $text_message = htmlentities($_POST['text-message'], ENT_QUOTES, "UTF-8");
			  $id_source = htmlentities($_POST['id-source'], ENT_QUOTES, "UTF-8");
			  $id_destination = htmlentities($_POST['id-destination'], ENT_QUOTES, "UTF-8");
		      $incremental = htmlentities($_POST['id-message'], ENT_QUOTES, "UTF-8");


			  	//create new conversation
						$post = array(
							'post_title' => 'Title of new post',
							'post_content' => '',
							'post_status' => 'publish',
							'post_type' => 'messages'
						);
						$post_ID = wp_insert_post($post);

						$row = array(
							'field_5f0ceb43e410e' => $text_message,
										    		'field_5f0ceb11e410d' => $incremental,
										    		'field_5f0ceb4ce410f' => $date,
										    		'field_5f0daeba8ab62' => $id_source,
										    		'field_5f0daeca8ab63' => $id_destination,
						);
						$row_id = add_row('field_5f0cd771ac401', $row, $post_ID);
						$newconversationid = $post_ID;
			  ?>


<?php endif;

?>
    	

