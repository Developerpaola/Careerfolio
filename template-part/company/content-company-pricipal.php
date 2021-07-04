            <?php 
            $author_id = get_post_field( 'post_author',  get_the_ID() );
            ?>        
                    <div class="flag-box">
						<h1><?php the_title(); ?></h1>
						<h3 class="subtitle">		
							<div class="row count-info align-items-center">
								<div class="col-8">
									<?php the_field('description' ); ?>
								</div>
								<div class="col text-right">
									<?php if( get_current_user_id() ==  $author_id ){ 
										echo '<a class="edit-btn openModal" modal="update-user" href="javascript: void(0);">Edit</a>';
										echo '<div class="dot-btn">
                                                <div class="dots">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="34" height="34" viewBox="0 0 34 34">
                                                        <g id="Group_262" data-name="Group 262" transform="translate(-843 -77)">
                                                            <g id="Rectangle_390" data-name="Rectangle 390" transform="translate(843 77)" fill="#f0f1f7" stroke="#ededed" stroke-width="1">
                                                            <rect width="34" height="34" rx="5" stroke="none"/>
                                                            <rect x="0.5" y="0.5" width="33" height="33" rx="4.5" fill="none"/>
                                                            </g>
                                                            <g id="Group_89" data-name="Group 89" transform="translate(-330 -272)">
                                                            <circle id="Ellipse_15" data-name="Ellipse 15" cx="1.5" cy="1.5" r="1.5" transform="translate(1183 365)" fill="#ff3f7d"/>
                                                            <circle id="Ellipse_16" data-name="Ellipse 16" cx="1.5" cy="1.5" r="1.5" transform="translate(1189 365)" fill="#ff3f7d"/>
                                                            <circle id="Ellipse_17" data-name="Ellipse 17" cx="1.5" cy="1.5" r="1.5" transform="translate(1195 365)" fill="#ff3f7d"/>
                                                            </g>
                                                        </g>
                                                    </svg>
                                                </div>
                                                <div class="links-addons">
                                                    <a class="remove-btn"  href="'.get_the_permalink(874).'/?remove='.get_the_ID().'">Remove</a>
                                                </div>
                                            </div>';
									
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
                                <?php 
								acf_form(array(
									'post_id'		=> get_the_ID(),
									'post_title'	=> true,
									'post_content'	=> false,
									
									'fields' => array(
										'field_5ec6a7066441d',
										'field_5ec6a7256441f',
										'field_60ddccd2bb2e8',
										'field_5f28112dc819f',
										'field_5ec6a7206441e',
										'field_60ddcd0aeb7bc',
										'field_5ec6a6f56441c',
										'field_5ec6a7a915c94',
										'field_60ddcee2ed4f2',
										'field_5ecfe1b0e6028',
										'field_5ecfe1bbe6029',
										'field_60ddcef4ed4f3'
									),
									'submit_value' => 'Save changes' 
								));
								
                                ?>
                        </div>
                    </div>