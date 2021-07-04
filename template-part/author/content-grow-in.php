
<?php
    global $wp_query;
    $userauthor = $wp_query->get_queried_object(); 
?>           
       
    <div class="flag-box">
								
		<div class="row">
			<div class="col-8">
				<h5>I want to grow in:</h5>
			</div>
			<div  class="col text-right" >
					<?php if( get_current_user_id() == $userauthor->ID){ 
						echo '<a class="edit-btn openModal" modal="update-grown-in" href="javascript: void(0);">Edit</a>';
					} ?>
			</div>
		</div>
			<p  class="pill">Search engine marketing</p>
	</div>


    <div id="update-grown-in" class="modal-box">
        <div class="container">
            <span id="close-login-modal" class="openModal" modal="update-grown-in" >x</span>
            <?php $options = array(
                    'post_id' => 'user_'.get_current_user_id() ,
                    'field_groups' => array(49),
                    'fields' => array('field_60dc9af96d0c0',),
                    'submit_value' => 'Save changes' 
                );
                acf_form( $options );
            ?>
        </div>
    </div>