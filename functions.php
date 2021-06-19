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




function sidebar_profile_shortcode( $attr ) { 
    
    $profile = '';
    $message = '';
    $userID = $attr['perfil'];
    $country = get_field('country', 'user_'.$userID);
    $locationtext = ",".get_field('location', 'user_'.$userID)."";

    if( get_field('profile_img', 'user_'.$userID ) ){
        $profile = 'background-image:url('. get_field('profile_img', 'user_'.$userID ).')';
    }

     $message .= '<div id="sidebar">
      
                    <div class="circle-img" style="'.$profile.'"> </div>
             
                    <p><strong>Location: </strong>'.esc_html( $country->name ).''.$locationtext.'</p>
                    <p><strong>Career Level:</strong> '.get_field('career_level', 'user_'.$userID ).'</p>
                    <p><strong>Industries:</strong> '.get_field('industries', 'user_'.$userID ).'</p>
                    ';
    $message .=  '<p>';
                    if( have_rows('companies', 'user_'.$userID) ):
    $message .= '<h2>Companies I follow</h2>';
                        $m = 1;
                        while( have_rows('companies', 'user_'.$userID) ) : the_row();
                         if ($m == 5) {
                            break;
                        }else{
                             $contentco = get_sub_field('companie', 'user_'.$userID); 
    $message .=     '<p style="margin-bottom:5px;"><a class="cofollow" href="'.get_the_permalink($contentco).'">'.get_the_title($contentco).'</a></p>';
                            $m++;
                        }
                        endwhile;
                    else :
                    endif;
    $message .=  '</p>';

    $authorindustries = get_field('industries', 'user_'.$userID );
$args1 = array(
 'role' => 'subscriber',
 'orderby' => 'user_nicename',
 'order' => 'ASC'
);
 $subscribers = get_users($args1);
 $cont = 0;
 foreach ($subscribers as $user) {
    if ($cont == 0) {
    $idsimilarprofiles = $user->ID;
    $similarprofiles = get_field('industries', 'user_'.$idsimilarprofiles);
    $similarprofileimg = get_field('profile_img', 'user_'.$idsimilarprofiles);
    if ($similarprofiles == $authorindustries && $idsimilarprofiles != $userID) {
        //$message .= '<p>'.$user->display_name.'</p>';
         $message .=  '<br><a class="view-all" href="'.get_home_url().'/companies/">View all</a>
                    <br>
                    <br>
                    <h2>Similar Profiles</h2>
                        <div class="similar-profiles">
                                    <div class="column c_25">
                                        <a href="'.get_author_posts_url($idsimilarprofiles).'"><div class="circle-img" style="background-image:url('.$similarprofileimg.');"></div></a>
                                    </div>
                                    <div class="column c_5">&nbsp;</div>
                                    <div class="column c_70">
                                    <a href="'.get_author_posts_url($idsimilarprofiles).'">
                                        <p class="name_user">'.$user->first_name.'&nbsp;'.$user->last_name.'</p>
                                        <p class="job">'.$similarprofiles.'</p>
                                    </a>
                                    </div>
                                    <div class="clear"></div>

                                </div>
                                <a class="view-all" href="'.get_home_url().'/similar-profile/?ind='.$authorindustries.'">View all</a>
                       </div>
                ';
        //
    }
}
$cont++;
 }
  $message .= '</div>';
    return $message;
} 

// register shortcode
add_shortcode('sidebar_profile', 'sidebar_profile_shortcode'); 


function sidebar_company_shortcode( $attr ) { 
    $message = '';
    $profile = '';
    $userID = $attr['id'];
    $location = get_field('location', $userID );
    $locationname = get_term($location);
    $city = get_field('city', $userID);



    if( get_field('logo', $userID ) ){
        $profile = 'background-image:url('. get_field('logo', $userID).')';
    }

    $terms = get_field('industries', $userID);
    $termsname='';
    if( $terms ): 
        foreach( $terms as $term ):
            $termsname .= '<div class="comma-sidebar">,</div><a class="grey-links" href="'.esc_url( get_term_link( $term ) ).'">'.esc_html( $term->name ).'</a>';
        endforeach; 
    endif; 

     $message .= '<div id="sidebar">
      
                    <div class="circle-img" style="'.$profile.'"> </div>
             
                    <p><strong>Location: </strong>'.$city.', '.$locationname->name.'</p>
                    <p class="industries-label"><strong>Industries:&nbsp;</strong><div class="all-terms"> '. $termsname.'</div></p>
                    <br>
                    <br>';
                    if (get_field('telephone', $userID ) || get_field('website', $userID )) {
                        $message .= '<h2>Contact Information</h2>';

                        if(get_field('telephone', $userID )){ $message .= '<p><strong>T:</strong> <a target="_blank" href="tel:'.get_field('telephone', $userID ).'">'.get_field('telephone', $userID ).'</a></p>'; }
                        if(get_field('website', $userID )){ $message .= ' <p class="urlweb"><strong>W:</strong> <a target="_blank" href="'.get_field('website', $userID ).'">'.get_field('website', $userID ).'</a></p>'; }
                    }
                                       
    $message .= ' <br>
                    <br>
                </div>';
 
    return $message;
} 
// register shortcode
add_shortcode('sidebar_company', 'sidebar_company_shortcode'); 



add_action('after_setup_theme', 'remove_admin_bar');

function remove_admin_bar() {
if (!current_user_can('administrator') && !is_admin()) {
  show_admin_bar(false);
}
}


function my_acf_redirect_after_save( $post_id ) {
    
    // Only do it for "custom_post" post type
    if( get_post_type($post_id) != 'case_studies' and   get_post_type($post_id) != 'jobs' and get_post_type($post_id) != 'promotions' and get_post_type($post_id) != 'events'){
        return;
    }else{
        if( isset( $_GET['post']) ){
            return;
        }else{
             update_field('company', $_GET['c'], $post_id );

        }
    }


    
    
    // Only do it on the front end
    if( is_admin() ){
        return;
    }

    if(  get_post_type($post_id) == 'case_studies' ){
        wp_redirect( get_the_permalink( 174 ).'/?post=' . $post_id );
        die();

    }else if( get_post_type($post_id) == 'jobs' ){
        wp_redirect( get_the_permalink( 218 ).'/?post=' . $post_id );
        die();

    }else if( get_post_type($post_id) == 'promotions' ){
        wp_redirect( get_the_permalink( 250).'/?post=' . $post_id );
        die();

    }else if(get_post_type($post_id) == 'events'){
         wp_redirect( get_the_permalink( 514).'/?post=' . $post_id );
        die();
    }
    

}

// run after ACF saves the $_POST['acf'] data
add_action('acf/save_post', 'my_acf_redirect_after_save', 99);



add_action( 'init', 'custom_post_marketplace_type', 0 );
function custom_post_marketplace_type() {
 
// Set UI labels for Custom Post Type
    $labels = array(
        'name'                => _x( 'Marketplace', 'Post Type General Name', 'pilotspider' ),
        'singular_name'       => _x( 'Marketplace', 'Post Type Singular Name', 'pilotspider' ),
        'menu_name'           => __( 'Marketplace', 'pilotspider' ),
        'parent_item_colon'   => __( 'Parent Marketplace posts', 'pilotspider' ),
        'all_items'           => __( 'All Marketplace posts', 'pilotspider' ),
        'view_item'           => __( 'View Marketplace post', 'pilotspider' ),
        'add_new_item'        => __( 'Add New Marketplace post', 'pilotspider' ),
        'add_new'             => __( 'Add New', 'pilotspider' ),
        'edit_item'           => __( 'Edit Post', 'pilotspider' ),
        'update_item'         => __( 'Update Post', 'pilotspider' ),
        'search_items'        => __( 'Search Post', 'pilotspider' ),
        'not_found'           => __( 'Not Found', 'pilotspider' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'pilotspider' ),
    );
     
// Set other options for Custom Post Type
     
    $args = array(
        'label'               => __( 'Marketplace', 'pilotspider' ),
        'description'         => __( 'Marketplace posts news and reviews', 'pilotspider' ),
        'labels'              => $labels,
        // Features this CPT supports in Post Editor
        'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
        // You can associate this CPT with a taxonomy or custom taxonomy. 
    
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
        'menu_icon'           => 'dashicons-forms',
        'show_in_rest' => true,
 
    );
     
    // Registering your Custom Post Type
    register_post_type( 'marketplace', $args );
 
}


add_action( 'init', 'create_marketplace_taxonomies', 0 );
function create_marketplace_taxonomies() {

  

    register_taxonomy(
        'categorie_marketplace',
        'marketplace',
        array(
            'labels' => array(
                'name' => 'Categories',
                'add_new_item' => 'Add New Categorie',
                'new_item_name' => "New Categorie"
            ),
            'show_ui' => true,
            'show_tagcloud' => false,
            'public'       => true,
            'hierarchical' => true
        )
    );
    register_taxonomy(
        'categorie_tags',
        'marketplace',
        array(
            'labels' => array(
                'name' => 'Tags',
                'add_new_item' => 'Add New tag',
                'new_item_name' => "New Tag"
            ),
            'show_ui' => true,
            'show_tagcloud' => false,
            'public'       => true,
            'hierarchical' => true
        )
    );
}

/*
* Creating a function to create our CPT
*/
 
function custom_post_type_messages() {
 
// Set UI labels for Custom Post Type
    $labels = array(
        'name'                => _x( 'Messages', 'Post Type General Name', 'twentytwenty' ),
        'singular_name'       => _x( 'Message', 'Post Type Singular Name', 'twentytwenty' ),
        'menu_name'           => __( 'Messages', 'twentytwenty' ),
        'parent_item_colon'   => __( 'Parent Message', 'twentytwenty' ),
        'all_items'           => __( 'All Messages', 'twentytwenty' ),
        'view_item'           => __( 'View Message', 'twentytwenty' ),
        'add_new_item'        => __( 'Add New Message', 'twentytwenty' ),
        'add_new'             => __( 'Add New', 'twentytwenty' ),
        'edit_item'           => __( 'Edit Message', 'twentytwenty' ),
        'update_item'         => __( 'Update Message', 'twentytwenty' ),
        'search_items'        => __( 'Search Message', 'twentytwenty' ),
        'not_found'           => __( 'Not Found', 'twentytwenty' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'twentytwenty' ),
    );
     
// Set other options for Custom Post Type
     
    $args = array(
        'label'               => __( 'messages', 'twentytwenty' ),
        'description'         => __( 'Message news and reviews', 'twentytwenty' ),
        'labels'              => $labels,
        // Features this CPT supports in Post Editor
        'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
        // You can associate this CPT with a taxonomy or custom taxonomy. 
        'taxonomies'          => array( 'genres' ),
        /* A hierarchical CPT is like Pages and can have
        * Parent and child items. A non-hierarchical CPT
        * is like Posts.
        */ 
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
        'show_in_rest' => true,
        'menu_icon' => 'dashicons-admin-comments',
 
    );
     
    // Registering your Custom Post Type
    register_post_type( 'messages', $args );
 
}
 
/* Hook into the 'init' action so that the function
* Containing our post type registration is not 
* unnecessarily executed. 
*/
 
add_action( 'init', 'custom_post_type_messages', 0 );




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


//CPT to events
function custom_post_type_events() {
 
// Set UI labels for Custom Post Type
    $labels = array(
        'name'                => _x( 'Events', 'Post Type General Name', 'twentytwenty' ),
        'singular_name'       => _x( 'Event', 'Post Type Singular Name', 'twentytwenty' ),
        'menu_name'           => __( 'Events', 'twentytwenty' ),
        'parent_item_colon'   => __( 'Parent Event', 'twentytwenty' ),
        'all_items'           => __( 'All Events', 'twentytwenty' ),
        'view_item'           => __( 'View Event', 'twentytwenty' ),
        'add_new_item'        => __( 'Add New Event', 'twentytwenty' ),
        'add_new'             => __( 'Add New', 'twentytwenty' ),
        'edit_item'           => __( 'Edit Event', 'twentytwenty' ),
        'update_item'         => __( 'Update Event', 'twentytwenty' ),
        'search_items'        => __( 'Search Event', 'twentytwenty' ),
        'not_found'           => __( 'Not Found', 'twentytwenty' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'twentytwenty' ),
    );
     
// Set other options for Custom Post Type
     
    $args = array(
        'label'               => __( 'events', 'twentytwenty' ),
        'description'         => __( 'Event news and reviews', 'twentytwenty' ),
        'labels'              => $labels,
        // Features this CPT supports in Post Editor
        'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
        // You can associate this CPT with a taxonomy or custom taxonomy. 
        'taxonomies'          => array( 'genres' ),
        /* A hierarchical CPT is like Pages and can have
        * Parent and child items. A non-hierarchical CPT
        * is like Posts.
        */ 
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
        'show_in_rest' => true,
 
    );
     
    // Registering your Custom Post Type
    register_post_type( 'events', $args );
 
}
 
/* Hook into the 'init' action so that the function
* Containing our post type registration is not 
* unnecessarily executed. 
*/
 
add_action( 'init', 'custom_post_type_events', 0 );



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