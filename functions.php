<?php
/**
 * Main Functions File - used for:
 * • including other function-files
 * • WP-Support & WP-Setup
 * • general functions like replacements, translations
 *
 * @author jonathan Soto
 *
 */
/*==================================================================================
  WP SETUP
==================================================================================*/
// general setup like menu, login font, GTM
require get_template_directory() . '/library/function-setup.php';

/*==================================================================================
  SETTINGS
==================================================================================*/
// general settings, enqueue, theme support, disable backend-theme-editor & more
require get_template_directory() . '/library/function-settings.php';


/*==================================================================================
  DEVELOPER TOOLKIT
==================================================================================*/
// functions used for development purposes like debuggers, return SVG from ACF
require get_template_directory() . '/library/function-dev.php';



/*==================================================================================
  WOOCOMMERCE
==================================================================================*/
require get_template_directory() . '/library/function-woocommerce.php';
function mytheme_add_woocommerce_support() {
    add_theme_support( 'woocommerce' );
    add_theme_support( 'post-thumbnails' );
}
add_action( 'after_setup_theme', 'mytheme_add_woocommerce_support' );

function theme_name_scripts() {
    wp_enqueue_style( 'style', get_stylesheet_uri() );

}
add_action( 'wp_enqueue_scripts', 'theme_name_scripts' );




function get_system_message( $option ){

    $message = '';
    switch ( $option) {
        case 'no permission':
            $message = "You do not have enough permission";
            break;
        case 'delete insight':
            $message = "Your insight was deleted";
            break;
        case 'sure delete insight':
            $message = "Are you sure to delete this Insights?";
            break;
        case 'sure delete company':
            $message = "Are you sure to delete this Company?";
            break;
        case 'sure delete case':
            $message = "Are you sure to delete this Case?";
            break;
        case 'delete job':
            $message = "Your job was deleted";
            break;
        case 'sure delete job':
            $message = "Are you sure to delete this Job?";
            break;
    }
    return $message;
}

function wpdocs_create_skills_rewrite() {

     $args = array(
        'label'        => __( 'Skills', 'textdomain' ),
        'public'       => true,
        'rewrite'      => false,
        'hierarchical' => true,
        'slug' => 'insights/Skills'
    );

    register_taxonomy( 'skills', 'insights', $args);
}
add_action( 'init', 'wpdocs_create_skills_rewrite', 0 );

 
/**
 * Add a sidebar.
 */
function wpdocs_theme_slug_widgets_init() {
    register_sidebar( array(
        'name'          => __( 'Main Sidebar', 'textdomain' ),
        'id'            => 'sidebar-main',
        'description'   => __( 'Widgets in this area will be shown on all posts and pages.', 'textdomain' ),
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget'  => '</li>',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>',
    ) );
}
add_action( 'widgets_init', 'wpdocs_theme_slug_widgets_init' );







add_action('after_setup_theme', 'remove_admin_bar');

function remove_admin_bar() {
if (!current_user_can('administrator') && !is_admin()) {
  show_admin_bar(false);
}
}







add_action('acf/init', 'my_acf_form_init');
function my_acf_form_init(){


     /* Start the Loop */
           
                $fields = array(
                    'field_5f0cc6c803b9b',  // destination user
                    'field_5f0cd771ac401',
                    
                );
                acf_register_form(array(
                    'id'                => 'new-message',
                    'post_id'           => 'new_post',
                    'new_post'          => array(
                        'post_type'     => 'messages',
                        'post_status'   => 'publish'
                    ),
                    'post_title'        => false,
                    'post_content'      => false,
                    'uploader'          => 'basic',
                    'return'            =>  home_url(), 
                    'fields'                => $fields,
                    'submit_value'      => 'Send message'
                ));
                
}



function my_posts_where( $where ) {
     $where = str_replace("meta_key = 'messages_", "meta_key LIKE 'messages_", $where);
     // note if using wordpress < v4.8.3 add a % to the meta key like this: meta_key = 'cars_%",...
     return $where;
}

add_filter('posts_where', 'my_posts_where');





add_action('acf/save_post', 'YOUR_THEME_NAME_new_recipe_send_email');

function YOUR_THEME_NAME_new_recipe_send_email( $post_id ) {

    if( get_post_type($post_id) == 'message' && get_post_status($post_id) == 'publish' ) {
        $post_title = get_the_title( $post_id );
        $post_url   = get_permalink( $post_id );

        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=iso-8859-1\n";
        $headers .= "X-Mailer: PHP/".phpversion();

        $subject    = "You have a new message";
        $message .= '<div style="background-color: #31374a; color: #fff; text-align: center; padding: 10px;">Pilot Spider</div>
        <div style="background-color: #f1f1f1; padding: 15px 10px;">Hi, you have a new message</div>';
        $message   .= $post_title . ": " . $post_url;

        

        $source = get_field('id_source', $post_id);
        $destination = get_field('id_destination', $post_id);

        if ($source != get_current_user_id()) {
            $author_obj = get_user_by('id', $source);
            wp_mail( $author_obj->user_email , $subject, $message );
        }
        if ($destination != get_current_user_id()) {
            $author_obj = get_user_by('id', $destination);
             wp_mail( $author_obj->user_email, $subject, $message );
        }
        return;
    }
}






// Remove breadcrumbs only from shop page
add_filter( 'woocommerce_before_main_content', 'remove_breadcrumbs');
function remove_breadcrumbs() {
    if(!is_product() && !is_product_category()) {
        remove_action( 'woocommerce_before_main_content','woocommerce_breadcrumb', 20, 0);
    }
}


/**Change number or products per row to 3*/
add_filter('loop_shop_columns', 'loop_columns', 999);
if (!function_exists('loop_columns')) {
    function loop_columns() {
        return 2;
    }
}

/*-------Insert description ----------------*/
add_action( 'woocommerce_after_shop_loop_item_title', 'tutsplus_excerpt_in_product_archives', 40 );
function tutsplus_excerpt_in_product_archives() {
    the_excerpt();     
}


/*--------------Order completed----------------*/
add_action( 'woocommerce_order_status_completed', 'custom_wc_order_complete', 10, 2 );
function custom_wc_order_complete( $order_id, $order ) {
    $order = wc_get_order( $order_id );
    $iduser = $order->get_user_id();
    foreach ( $order->get_items() as $item_id => $item ){
         $product_id = $item->get_product_id();
         $quantity = $item->get_quantity();
         $typepost = "";
         if ($product_id == 431) {
            $typepost = "jobs";
         }elseif ($product_id == 432) {
             $typepost = "promotions";
         }
    $posts = get_posts(array(
        'posts_per_page'    => -1,
        'post_type'         => array( 'jobs', 'promotions' ),
        'post_status'      => 'draft',
        'meta_query'    => array(
        'relation'      => 'AND',
        array(
            'key'       => 'id_order',
            'value'     => $order_id,
            'compare'   => 'IN',
        ),
        array(
            'key'       => 'id_item',
            'value'     => $product_id,
            'compare'   => 'IN',
        ),
    ),
    ));

        if( $posts ){
            
        }else{
            $post_id = wp_insert_post(array (
               'post_author' => $iduser,
               'post_type' => $typepost,
               'post_title' => 'test',
               'post_content' => '',
               'post_status' => 'draft',
               'comment_status' => 'closed',   // if you prefer
               'ping_status' => 'closed',      // if you prefer
            ));

            add_post_meta($post_id, 'id_order', $order_id, true);
            add_post_meta($post_id, 'id_item', $product_id, true);
            //add_post_meta($post_id, 'company', 397, true);
        }
    } 
}



/*---------Post Views--------------*/
function getCrunchifyPostViews($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0";
    }
    return $count;
}
 
function setCrunchifyPostViews($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}
 
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);




//function likes post
// Register the new route
add_action( 'rest_api_init', function () {

  register_rest_route( 'example/v2', '/likes/(?P<id>\d+)', array(
        'methods' => array('GET','POST'),
        'callback' => 'example__like',
    ) );

});

function example__like( WP_REST_Request $request ) {
        // Custom field slug
        $field_name = 'likes_number';
        // Get the current like number for the post
        $current_likes = get_field($field_name, $request['id']);
        // Add 1 to the existing number
        $updated_likes = $current_likes + 1;
        // Update the field with a new value on this post
        $likes = update_field($field_name, $updated_likes, $request['id']);

        return $likes;
    }





?>