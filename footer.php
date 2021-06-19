		<footer>
			<div class="container">
				<div class="row">
					<div class="col-5">
						<a href="<?php echo get_site_url(); ?>/" class="logo">
							<svg xmlns="http://www.w3.org/2000/svg" width="176.308" height="176.308" viewBox="0 0 176.308 176.308">
								<g id="Group_298" data-name="Group 298" transform="translate(-157.691 -1274.692)">
									<path id="Path_1848" data-name="Path 1848" d="M236.61,1204.118A88.171,88.171,0,0,0,323,1117.727H236.61Z" transform="translate(11.001 156.964)" fill="#1b003e"/>
									<path id="Path_1849" data-name="Path 1849" d="M197.565,1156.772a88.171,88.171,0,0,0,86.388,86.391v-86.391Z" transform="translate(-39.874 207.837)" fill="#ff3f7d"/>
									<path id="Path_1850" data-name="Path 1850" d="M323,1243.163a88.17,88.17,0,0,0-86.388-86.391v86.391Z" transform="translate(11.001 207.837)" fill="#02a6d2"/>
									<path id="Path_1851" data-name="Path 1851" d="M283.953,1117.727a88.169,88.169,0,0,0-86.388,86.391h86.388Z" transform="translate(-39.874 156.964)" fill="#ffbc00"/>
								</g>
							</svg>
						</a>
					</div>

					<div class="col-7">
						<div class="row">
							<div class="col-4">
								<h3>Navigate</h3>
								<?php wp_nav_menu( array( 'theme_location' =>'navigate' ) ); ?>
							</div>
							<div class="col-4">
								<h3>Careerfolio</h3>
								<?php wp_nav_menu( array( 'theme_location' =>'careerfolio' ) ); ?>
							</div>
							<div class="col-4">
								<h3>Legal</h3>
								<?php wp_nav_menu( array( 'theme_location' =>'legal' ) ); ?>
							</div>
						</div>

					</div>
					
				</div>
				
				<div class="row foot">
						<div class="col-6">
							<p><?php echo '© '.date('Y').' careerfolio'; ?></p>
						</div>
						<div class="col-5 text-right">
							<?php if( get_field('twitter', 'option') ){ ?>
								<a href="<?php echo get_field('twitter', 'option'); ?>" class="twitter" target="_blank">
									<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30">
										<g id="Group_295" data-name="Group 295" transform="translate(-154 -1738)">
											<circle id="Ellipse_8" data-name="Ellipse 8" cx="15" cy="15" r="15" transform="translate(154 1738)" fill="#ff3f7d"/>
											<path id="Path_239" data-name="Path 239" d="M71.041,49.58a8.509,8.509,0,0,0,6.108,3.106c-.011-.307-.04-.6-.029-.888a2.964,2.964,0,0,1,2.146-2.655,2.934,2.934,0,0,1,2.905.743.19.19,0,0,0,.2.056,6.042,6.042,0,0,0,1.623-.613c.04-.022.082-.042.15-.076a3.1,3.1,0,0,1-1.225,1.609,5.338,5.338,0,0,0,1.586-.419l.031.035c-.236.277-.46.564-.711.826a8.006,8.006,0,0,1-.659.58.228.228,0,0,0-.1.2,8.583,8.583,0,0,1-1.6,5.232,7.928,7.928,0,0,1-5.249,3.364A8.572,8.572,0,0,1,71.66,60.3a8.332,8.332,0,0,1-1.535-.754c-.014-.009-.027-.021-.063-.051a6.051,6.051,0,0,0,4.362-1.229,3.045,3.045,0,0,1-2.774-2.071,3.244,3.244,0,0,0,1.33-.062,2.993,2.993,0,0,1-1.709-1.056,2.924,2.924,0,0,1-.653-1.9,3.05,3.05,0,0,0,1.332.362,2.987,2.987,0,0,1-1.233-1.811A2.95,2.95,0,0,1,71.041,49.58Z" transform="translate(92.165 1698.986)" fill="#fff"/>
										</g>
									</svg>
								</a>

							<?php } ?>
							<?php if( get_field('instagram', 'option') ){ ?>
								<a href="<?php echo get_field('instagram', 'option'); ?>" class="instagram" target="_blank">
									<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30">
										<g id="Group_297" data-name="Group 297" transform="translate(-199 -1738)">
											<circle id="Ellipse_9" data-name="Ellipse 9" cx="15" cy="15" r="15" transform="translate(199 1738)" fill="#ff3f7d"/>
											<g id="Group_85" data-name="Group 85" transform="translate(207 1746.592)">
											<path id="Path_241" data-name="Path 241" d="M428.43,139.533a29.9,29.9,0,0,1,.021-3.234,3.785,3.785,0,0,1,3.775-3.321q2.75-.031,5.5,0a3.878,3.878,0,0,1,3.85,3.908c.024,1.8.02,3.611,0,5.416a3.893,3.893,0,0,1-3.889,3.871q-2.708.022-5.416,0a3.893,3.893,0,0,1-3.893-3.911c-.009-.91,0-1.82,0-2.729Zm6.511,5.456v0c.938,0,1.877.016,2.815,0a2.653,2.653,0,0,0,2.623-2.525q.069-2.856,0-5.714a2.632,2.632,0,0,0-2.612-2.577q-2.793-.034-5.587,0a2.669,2.669,0,0,0-2.611,2.67q-.012,2.687,0,5.374a2.693,2.693,0,0,0,2.771,2.775C433.206,144.995,434.073,144.989,434.941,144.989Z" transform="translate(-428.376 -132.962)" fill="#fff"/>
											<path id="Path_242" data-name="Path 242" d="M467.316,168.374a3.591,3.591,0,1,1-3.653,3.5A3.6,3.6,0,0,1,467.316,168.374Zm-2.479,3.576a2.417,2.417,0,1,0,2.385-2.4A2.44,2.44,0,0,0,464.836,171.949Z" transform="translate(-460.65 -165.35)" fill="#fff"/>
											<path id="Path_243" data-name="Path 243" d="M542.22,163.264c-.024.362-.185.567-.526.569a.521.521,0,0,1-.031-1.041A.5.5,0,0,1,542.22,163.264Z" transform="translate(-531.541 -160.244)" fill="#fff"/>
											</g>
										</g>
									</svg>
								</a>
							<?php } ?>
							<?php if( get_field('linkedin', 'option') ){ ?>
								<a href="<?php echo get_field('linkedin', 'option'); ?>" class="linkedin" target="_blank">
									<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30">
										<g id="Group_294" data-name="Group 294" transform="translate(-244 -1738)">
											<circle id="Ellipse_10" data-name="Ellipse 10" cx="15" cy="15" r="15" transform="translate(244 1738)" fill="#ff3f7d"/>
											<g id="Group_84" data-name="Group 84" transform="translate(253 1746.592)">
											<path id="Path_236" data-name="Path 236" d="M352.715,485.144c-.059,0-.118-.014-.177-.014H349.96v-.184c0-1.386.006-2.772,0-4.158a4.408,4.408,0,0,0-.106-.932,1.186,1.186,0,0,0-1.005-1.012,1.447,1.447,0,0,0-1.458.555,1.616,1.616,0,0,0-.332,1.046c.005,1.5,0,2.992,0,4.487v.187H344.3v-8.276h2.755v1.1l.031.007c.086-.113.168-.228.258-.337a2.588,2.588,0,0,1,1.815-.953,3.169,3.169,0,0,1,2.269.552,3.018,3.018,0,0,1,1.132,1.828c.066.285.089.58.132.87.007.049.017.1.025.146Z" transform="translate(-339.853 -472.836)" fill="#fff"/>
											<path id="Path_237" data-name="Path 237" d="M260.476,488.97h-2.731v-8.277h2.731Z" transform="translate(-257.57 -476.687)" fill="#fff"/>
											<path id="Path_238" data-name="Path 238" d="M255.719,402.365a1.474,1.474,0,0,1-1.507-1.17,1.406,1.406,0,0,1,1.287-1.7,1.633,1.633,0,0,1,1.291.338,1.378,1.378,0,0,1,.466,1.36,1.3,1.3,0,0,1-.914,1.049A4.657,4.657,0,0,1,255.719,402.365Z" transform="translate(-254.187 -399.476)" fill="#fff"/>
											</g>
										</g>
									</svg>
								</a>
							<?php } ?>
							<?php if( get_field('facebook', 'option') ){ ?>
								<a href="<?php echo get_field('facebook', 'option'); ?>" class="facebook" target="_blank">
									<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30">
										<g id="Group_296" data-name="Group 296" transform="translate(-289 -1738)">
											<circle id="Ellipse_11" data-name="Ellipse 11" cx="15" cy="15" r="15" transform="translate(289 1738)" fill="#ff3f7d"/>
											<path id="Path_240" data-name="Path 240" d="M702.09,301.264h-2.962v-7.109h-1.4v-2.514h1.4c0-.08,0-.142,0-.2.006-.588-.02-1.178.024-1.762a2.684,2.684,0,0,1,1.3-2.252,2.568,2.568,0,0,1,1.271-.372c.853-.017,1.707,0,2.573,0v2.429h-.165c-.463,0-.925,0-1.388,0a.577.577,0,0,0-.646.586c-.018.516,0,1.032,0,1.569h2.253l-.258,2.517H702.09Z" transform="translate(-396.727 1458.957)" fill="#fff"/>
										</g>
									</svg>
								</a>
							<?php } ?>
							
						</div>
				</div>
		</footer>
		<?php wp_footer(); ?>
	</body>
</html>