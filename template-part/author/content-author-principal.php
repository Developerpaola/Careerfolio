<?php
    global $wp_query;
    $userauthor = $wp_query->get_queried_object(); 
?>           
                    
                    <div class="flag-box">
						<h1><?php echo esc_html( $userauthor->first_name ) . ' ' . esc_html( $userauthor->last_name ); ?></h1>
						<h3 class="subtitle">		
							<div class="row count-info align-items-center">
								<div class="col-8">
									<?php the_field('job_title_information', 'user_'.$userauthor->ID ); ?>
								</div>
								<div class="col text-right">
									<?php if( get_current_user_id() == $userauthor->ID){ 
										echo '<a class="edit-btn openModal" modal="update-user" href="javascript: void(0);">Edit</a>';
									} ?>
								</div>
							</div>
						</h3>
					
						<div class="row count-info align-items-center">
							<div class="col-2">
								<h4>0</h4>
								<p>Contributions</p>
							</div>
							<div class="col-2">
								<h4>0</h4>
								<p>Resources</p>
							</div>
							<div class="col-2">
								<h4>0</h4>
								<p>Connections</p>
							</div>
							<div class="col-1">
							</div>
							<div class="col text-right">
								<!-- Estar Btn--->
								<?php get_template_part("template-part/community/box","connect-message-btns"); ?>
								<!-- End BTN--->
							</div>
						</div>
					</div>

                    <div id="update-user" class="modal-box">
                        <div class="container">
                            <span id="close-login-modal" class="openModal" modal="update-user" >x</span>
                            <h3>Update Profile Information</h3>
                                <?php $options = array(
                                        'post_id' => 'user_'.get_current_user_id() ,
                                        'field_groups' => array(49),
                                        'fields' => array(
                                            'field_5e9737114bae7',
                                            'field_5e98bff61f97e',
                                            'field_5e98bfe51f97d',
                                            'field_5e97373a4bae9',
                                            'field_5e9737434baea',
                                            'field_5e9737304bae8',
                                            'field_5ecffb56a73f5',
                                        ),
                                        'submit_value' => 'Save changes' 
                                    );
                                    acf_form( $options );
                                ?>
                        </div>
                    </div>