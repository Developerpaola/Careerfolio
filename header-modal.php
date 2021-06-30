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

<header class="modal-style">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-2">
				<button id="close-modal" class="close-btn">Cancel</button>
			</div>
			<div class="col-6">
				
			</div>
		
			<div class="col-4 text-right">
			<a href="<?php echo get_site_url(); ?>/"><img src="<?php echo get_template_directory_uri(); ?>/dist/images/header_footer/logo-careerfolio.svg" class="img-fluid" alt="<?php bloginfo('name'); ?>"></a>	
			</div>
		</div>
	</div>

</header>
