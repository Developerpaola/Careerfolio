<?php 

/**
 * Functions used for development purposes.
 *
 * @author Jonathan Soto
 *
 */

 // List groups
function wpb_my_groups_shortcode() { 
 
    $message = get_template_part("template-part/post/content","group"); 
     
    return $message;
} 
add_shortcode('my_groups', 'wpb_my_groups_shortcode');