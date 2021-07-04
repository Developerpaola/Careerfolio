<?php

 echo '<h1>'.get_the_title().'</h1>
 <h3 class="subtitle">'.get_field('subtitle').'</h3>';

 acf_form(array(
    'post_id'		=> 'new_post',
	'post_title'	=> true,
	'post_content'	=> false,
    'new_post'		=> array(
        'post_type'		=> 'company',
        'post_status'	=> 'publish'
	),
	'fields' => array(
		'field_5ec6a7066441d',
		'field_5ec6a7256441f',
		'field_60ddccd2bb2e8',
		'field_5f28112dc819f',
		'field_5ec6a7206441e',
		'field_60ddcd0aeb7bc',
		'field_5ec6a6f56441c',
		'field_5ec6a7a915c94',
		'field_60ddcd99eb7bd',
		'field_60ddcee2ed4f2',
		'field_5ecfe1b0e6028',
		'field_5ecfe1bbe6029',
		'field_60ddcef4ed4f3'
	),
));

?>