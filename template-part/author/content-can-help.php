<?php
    global $wp_query;
    $userauthor = $wp_query->get_queried_object(); 
?>           
        
    <div class="flag-box">
		<div class="row">
			<div class="col-8">
				<h5>I can help you with:</h5>
			</div>
			<div  class="col  text-right" >
				<?php if( get_current_user_id() == $userauthor->ID){ 
					echo '<a class="edit-btn openModal" modal="update-can-help" href="javascript: void(0);">Edit</a>';
				} ?>
			</div>
		</div>
								
		<p class="pill">Creative art, craft and design</p>
		<p class="pill">Mystery shopping</p>
		<p class="pill">Writing and rewriting</p>
    </div>

    <div id="update-can-help" class="modal-box">
        <div class="container">
            <span id="close-login-modal" class="openModal" modal="update-can-help" >x</span>
            <?php $options = array(
                    'post_id' => 'user_'.get_current_user_id() ,
                    'field_groups' => array(49),
                    'fields' => array('field_60dc9b746d0c1',),
                    'submit_value' => 'Save changes' 
                );
                acf_form( $options );
            ?>
        </div>
    </div>