<?php require( dirname(__FILE__) . '/../../../../wp-load.php' ); ?>


    	<?php 

$date = date('Y-m-d H:i:s');
			
				
				$id_source = htmlentities($_POST['id_source'], ENT_QUOTES, "UTF-8");
				$id_destination = htmlentities($_POST['id_destination'], ENT_QUOTES, "UTF-8");
				$profileid = htmlentities($_POST['profile_id'], ENT_QUOTES, "UTF-8");
			




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
if($the_query->have_posts() ) : 
    while ( $the_query->have_posts() ) : 
       $the_query->the_post();
       

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



<?php endif;

?>
    	

