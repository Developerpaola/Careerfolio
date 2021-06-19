<?php
/**
 * Main Site Header Template
 * @author   Foundry Digital
 * @package  Foundry
 */

?>



<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	
	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

<header>
	<div class="container">
		<div class="row ">
			<div class="col-2">
				<a href="<?php echo get_site_url(); ?>/"><img src="<?php echo get_template_directory_uri(); ?>/dist/images/header_footer/logo-careerfolio.svg" class="img-fluid" alt="<?php bloginfo('name'); ?>"></a>
			</div>
			<div class="col-6">
				<?php //wp_nav_menu( array( 'theme_location' => is_user_logged_in() ? 'logged-in-menu' : 'logged-out-menu') ); 
					wp_nav_menu( array( 'theme_location' => 'logged-out-menu') );
				?>
			</div>
		
			<div class="col-4 text-right">
				<div class="fix-menu">
					<?php if( !is_user_logged_in() ){ ?>
						<a id="login-nav"  class="read-more" href="<?php echo get_the_permalink(430); ?>">Create an account</a>
					<?php }else{ 
							
					?>
						<a id="login-nav" class="read-more" href="<?php echo get_the_permalink(45); ?>">My Account</a>
					<?php } ?>
					<a href="" class="icon-link">
						<svg xmlns="http://www.w3.org/2000/svg" width="17.824" height="20.521" viewBox="0 0 17.824 20.521">
							<g id="Group_246" data-name="Group 246" transform="translate(-849.972 -243.066)">
								<path id="Path_1810" data-name="Path 1810" d="M884.442,346.145c-.232-.073-.469-.133-.695-.222a2.722,2.722,0,0,1-1.706-2.557h5.567a2.689,2.689,0,0,1-.64,1.752,2.722,2.722,0,0,1-1.663.975,1,1,0,0,0-.151.052Z" transform="translate(-25.931 -82.558)" fill="#1b033e"/>
								<path id="Path_1811" data-name="Path 1811" d="M860.64,245.214a7.271,7.271,0,0,1,2.309.871,5.945,5.945,0,0,1,2.739,3.565,6.844,6.844,0,0,1,.244,1.933c0,1.538,0,3.076,0,4.615a.418.418,0,0,0,.175.354c.465.382.934.763,1.377,1.163.618.557.284,1.453-.595,1.628a1.766,1.766,0,0,1-.342.023H851.208a1.155,1.155,0,0,1-1.142-.607.867.867,0,0,1,.294-1.113c.44-.367.873-.74,1.317-1.1a.376.376,0,0,0,.158-.32q-.008-2.365,0-4.731a6.271,6.271,0,0,1,1.039-3.576,6.347,6.347,0,0,1,4.047-2.651c.148-.033.217-.079.21-.219a4.085,4.085,0,0,1,.015-.656,1.668,1.668,0,0,1,1.842-1.326,1.616,1.616,0,0,1,1.655,1.434C860.646,244.732,860.64,244.963,860.64,245.214Z" transform="translate(0 0)" fill="#1b033e"/>
							</g>
						</svg>
					</a>

					<a href="" class="icon-link">
						<svg xmlns="http://www.w3.org/2000/svg" width="21.226" height="18.423" viewBox="0 0 21.226 18.423">
							<path id="Path_1809" data-name="Path 1809" d="M565.948,273.152c.213-.243.444-.469.647-.722a6.022,6.022,0,0,0,1.237-2.475.137.137,0,0,0-.082-.179,9.251,9.251,0,0,1-3.081-2.75,6.886,6.886,0,0,1-1.265-3.457,6.683,6.683,0,0,1,1-4.08,9.3,9.3,0,0,1,3.923-3.468,12.215,12.215,0,0,1,4.151-1.2,13.073,13.073,0,0,1,6.1.731,10.184,10.184,0,0,1,4.169,2.8,7.211,7.211,0,0,1,1.723,3.39,6.6,6.6,0,0,1-.651,4.45,8.72,8.72,0,0,1-3.237,3.378,11.926,11.926,0,0,1-4.688,1.664,13.319,13.319,0,0,1-5.134-.261.184.184,0,0,0-.149.017,29.9,29.9,0,0,1-2.975,1.454c-.518.229-1.04.448-1.56.67a.272.272,0,0,1-.126.04Z" transform="translate(-563.383 -254.736)" fill="#1b003e"/>
						</svg>
					</a>
				</div>
			</div>
		</div>
	</div>

</header>

<?php  get_template_part( 'template-part/content', 'fixed-flag' ); ?>