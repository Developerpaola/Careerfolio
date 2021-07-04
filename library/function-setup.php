<?php
/**
 * The starting point for setting up a new theme.
 * Go through this file to setup your preferences
 *
 * @author  Jonathan Soto
 *
 *
 */

/*=======================================================
Table of Contents:
–––––––––––––––––––––––––––––––––––––––––––––––––––––––––
  1.0 LOCALE SETTING
  2.0 DEFAULT BLOCK STYLES
  3.0 GOOGLE TAG MANAGER
  4.0 SETUP WP-MENUS
  5.0 SETUP LOGIN PAGE 
  6.0 ACF OPTIONS PAGE 
=======================================================*/



/*==================================================================================
  2.0 DEFAULT GUTENBERG BLOCK STYLES
==================================================================================*/
// Gutenberg comes with default styles for all blocks
// by default these styles are disabled. Change this to `true` to enqueue them
$load_default_block_styles = true;



/*==================================================================================
  3.0 GOOGLE TAG MANAGER
==================================================================================*/
// embed the GTM-scripts into head and body => WPSeed_gtm()
// add your GTM_id (for example 'GTM-ABC1234') or leave empty to not enqueue any GTM-script
$GTM_id = '';


/*==================================================================================
  4.0 SETUP WP-MENUS
==================================================================================*/
// loads wordpress-menus, add your custom menus here or remove if not needed
// by default, only 'mainmenu' is shown
// => https://codex.wordpress.org/Function_Reference/register_nav_menus
function wpseed_register_theme_menus() {
  register_nav_menus([
    'logged-out-menu' => __('Main menu Logout'),
    'navigate' => __('Navigate menu'),
    'careerfolio' => __('Careerfolio menu'),
    'legal' => __('Legal menu'),
    'pilotspider_menu' => __( 'PilotSpider Menu', 'text_domain' ),
    'company_menu' => __( 'Company Menu', 'text_domain' ),
  ]);
}
add_action( 'init', 'wpseed_register_theme_menus');




/*==================================================================================
  5.0 SETUP LOGIN PAGE 
==================================================================================*/

$gFontUrl = "https://use.typekit.net/ngk8ftl.css";
$fontFamily = "sofia-pro, sans-serif";
$customLogo = get_stylesheet_directory_uri()."/dist/images/header_footer/logo-careerfolio.svg";
$mainColor = "#1B033E";


/*==================================================================================
 6.0 ACF OPTION PAGE 
==================================================================================*/

if( function_exists('acf_add_options_page') ) {
	
    acf_add_options_page();
 
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




/*----------List Users--------------*/
add_shortcode( 'list_user', 'list_user_func' );
function list_user_func($atts) {
    $namejob = $atts['textjob'];
    $peopleindustries = $atts['peopleindustries'];
    $locationpeople = $atts['locationpeople'];
    $carrer_level = $atts['carrerlevel'];
    
    $args =    array(
            'role' => 'subscriber',
        );
    if ($namejob != '') {
        $args['meta_query'][] = array('key' => 'job_title_information', 'value' => $namejob, 'compare' => 'LIKE');
    }
    if ($peopleindustries != '') {
        $args['meta_query'][] = array('key' => 'industries', 'value' => $peopleindustries, 'compare' => 'LIKE');
    }
    if($locationpeople != ''){
        $args['meta_query'][] = array('key' => 'country', 'value' => $locationpeople, 'compare' => 'LIKE');
    }
    if($carrer_level != ''){
        $args['meta_query'][] = array('key' => 'career_level', 'value' => $carrer_level, 'compare' => '=');
    }
    
    $wp_user_query = new WP_User_Query($args);
    $blogusers = $wp_user_query->get_results();
   
    echo '<div class="row  align-items-center">';

    // Array of WP_User objects.
    foreach ( $blogusers as $user ) {
      setup_userdata( $user->ID );
      get_template_part( 'template-part/community/box', 'people' ); 
    }

    echo '</div>';
}

/*-----------List jobs--------------*/
add_shortcode( 'list_jobs', 'list_jobs_func' ); 
function list_jobs_func( ) {

    $msg = '';
    $post_list = get_posts( array(
                                'orderby'    => 'date',
                                'sort_order' => 'asc',    
                                'post_type'  => 'jobs',
                                'posts_per_page' => 50,
                                'post_status'   => 'any',
                            ) );

                            
                             
                            foreach ( $post_list as $post ) {
                                

                                $post_author_id = get_post_field ('post_author', $post->ID  );

                                $companyPostId = get_field('company', $post->ID );
                                $city = get_field('city', $companyPostId);
                                $city = ucfirst($city);
                                $country = get_field('location', $companyPostId);
                                $countryname = get_term($country);

                               $msg .='<a href="'.get_the_permalink( $post->ID ) .'">
                                            <div class="post-box find-job">
                                                <div class="circle-img" style="background-image:url('.get_field('logo', $companyPostId ).' )"> </div>
                                                <div class="post-box-info">
                                                    <div class="clear"></div>
                                                    <h3>'.get_the_title($post->ID).'</h3>
                                                    <p>'.$city.', '. $countryname->name.'</p>
                                                    <div class="excert_box"><p>'.wp_trim_words(get_field('description', $post->ID ), 20).'</p></div>
                                                     <center><a href="'.get_the_permalink( $post->ID ) .'" class="btn-style-round getpromo" style="right:0!important;">Read more</a></center>
                                                </div>
                                             </div>
                                        </a>';
                            }
                            wp_reset_postdata();
    return $msg;
}


//List groups
add_shortcode( 'list_groups', 'list_groups_func' ); 
function list_groups_func( $atts) {

    $text = $atts['text'];
    $sort = $atts['sort'];
    $industries = $atts['industries'];
    $location = $atts['location'];
    $author = $atts['authorinfo'];
  

    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    $args =  array( 
                                'orderby' => 'title',
                                'order' => $sort,  
                                'post_type'  => 'group',
                                'posts_per_page' => 6,
                                's' => $text,
                                'paged' => $paged,
                                
                            ) ;
    if ($industries != "") {
        $args['meta_query'][] = array('key' => 'industries', 'value' => $industries, 'compare' => 'LIKE');
    }
    if ($location != "") {  
        $args['meta_query'][] = array('key' => 'location', 'value' => $location, 'compare' => 'LIKE');
    }
    if ($author != "") {  
        $args['author'] = $author;
    }
    $postslist = new WP_Query( $args );
  

    if ( $postslist->have_posts() ){
        echo  '<div class="row align-items-start">';
        while ( $postslist->have_posts() ) : $postslist->the_post(); 

                                get_template_part("template-part/community/box","groups");
                            
         endwhile;  
         wp_reset_postdata();
         echo '</div>';

             $big = 999999999;
     echo '<nav class="pagination">'.paginate_links( array(
          'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
          'format' => '?paged=%#%',
          'current' => max( 1, get_query_var('paged') ),
          'total' => $postslist->max_num_pages,
          'prev_text' => '&laquo;',
          'next_text' => '&raquo;'
     ) ).'</nav>';

    }else{
        echo "<center><h2>Sorry there are no groups matching your selection</h2></center>";
    }
                            
   
}

// list conversations
add_shortcode( 'list_conversations', 'list_conversations_func' ); 
function list_conversations_func( $atts) {
    
    $group = $atts['group'];
    $text = $atts['text'];
    $sort = $atts['sort'];
  

    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    $args =  array( 
                                'orderby' => 'title',
                                'order' => $sort,  
                                'post_type'  => 'conversation',
                                'posts_per_page' => 6,
                                's' => $text,
                                'paged' => $paged,
                                
                            ) ;
   
    if ($group != "") {  
        //$args['meta_key'] = 'group';
        //$args['meta_value'] = $group;
    }
    $postslist = new WP_Query( $args );
  
    
    if ( $postslist->have_posts() ){
        echo  '<div class="row align-items-start">';
        while ( $postslist->have_posts() ) : $postslist->the_post(); 

                                get_template_part("template-part/community/box","conversation");
                            
         endwhile;  
         wp_reset_postdata();
         echo '</div>';

             $big = 999999999;
     echo '<nav class="pagination">'.paginate_links( array(
          'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
          'format' => '?paged=%#%',
          'current' => max( 1, get_query_var('paged') ),
          'total' => $postslist->max_num_pages,
          'prev_text' => '&laquo;',
          'next_text' => '&raquo;'
     ) ).'</nav>';

    }else{
        echo "<center><h2>Sorry there are no groups matching your selection</h2></center>";
    }
                            
   
}

/*-------------List industries-------------*/
add_shortcode( 'list_industries', 'list_industries_func' ); 
function list_industries_func($atts) {
    $id = $atts['post_id'];
    $msg = '';
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    $args =  array(
                                'orderby' => 'date',  
                                'post_type'  => 'company',
                                'posts_per_page' => 6,
                                'paged' => $paged,
                                'meta_query' => array(
                                array(
                                    'key' => 'industries',
                                    'value' => $id,
                                    'compare' => 'LIKE'
                                )
                            )
                                
    
                                
                            ) ;
    $postslist = new WP_Query( $args );
    if ( $postslist->have_posts() ) :
        while ( $postslist->have_posts() ) : $postslist->the_post(); 

                            
                            
                                $post_author_id = get_post_field( 'post_author');
                                $terms = get_field('industries');
                                $termsname='';
                                if( $terms ): 
                                    foreach( $terms as $term ):
                                        $termsname .= '<a href="'.esc_url( get_term_link( $term ) ).'">'.esc_html( $term->name ).'</a>, ';
                                    endforeach; 
                                endif; 

                                if( get_field('logo')){
                                     $logo = 'background-image:url('. get_field('logo').');';
                                }else{
                                    $logo = "";
                                }

                                if(get_field('hero_image')){
                                     $hero = 'background-image:url('. get_field('hero_image' ).');';
                                }else{
                                    $hero = "";
                                }


                                

                               $msg .='<div class="post-box company_box">
                                        <a href="'.get_permalink( ).'"><div class="post-box-img" style="'.$hero.'"></div></a>
                                        <div class="table-box" style="'.$hero.'">
                                            <div class="table-cell">
                                                <a class="black-btn" href="'.get_permalink( ).'">View company</a>
                                                <a class="white-btn" href="'.get_permalink( ).'/?open=true">Connect</a>
                                            </div>
                                        </div>
                                        <div class="post-box-info">
                                            <div class="clear"></div>
                                            <div class="column c_30"> <a href="'.get_permalink( ).'"><div class="circle-img" style="'.$logo.'"> </div></a></div>
                                           <div class="column c_70"><a href="'.get_permalink( ).'"><h3>'.get_the_title( ).'</h3><p>'.wp_trim_words(get_field('description'), 10) .'</p></a></div>
                                           <div class="clear"></div>
                                           <div class="line"></div>
                                           <div class="info-co">
                                            <p><strong>Location: </strong>'.get_field('location')->taxonomy.'</p>
                                            <p><strong>Industries: </strong>'. $termsname.'</p>
                                           </div>

                                           <span class="info-label">Case Studies: 54</span>
                                           <span class="info-label">Promotions: 5</span>
                                           <span class="info-label">Active Jobs: 4</span>
                                        </div>
                               </div>
                               ';
                            
         endwhile;  

             $big = 999999999;
     echo '<nav class="pagination">'.paginate_links( array(
          'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
          'format' => '?paged=%#%',
          'current' => max( 1, get_query_var('paged') ),
          'total' => $postslist->max_num_pages,
          'prev_text' => '&laquo;',
          'next_text' => '&raquo;'
     ) ).'</nav>';

    endif;
                            

    return $msg;
}

/*-------------List events-------------*/
add_shortcode( 'list_events', 'list_events_func' ); 
function list_events_func() {
    $msg = '';
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    $args =  array(
                                'orderby' => 'date',  
                                'post_type'  => 'events',
                                'posts_per_page' => 6,
                                'paged' => $paged,
                                
                                
    
                                
                            ) ;
    $postslist = new WP_Query( $args );
    if ( $postslist->have_posts() ) :
        while ( $postslist->have_posts() ) : $postslist->the_post(); 

                                                            

                                if(get_field('event_image')){
                                     $hero = 'background-image:url('. get_field('event_image' ).');';
                                }else{
                                    $hero = "";
                                }
                                $startevent = get_field('event_start_date');
                                $expevent = get_field('event_end_date');
                                $currentdate = date("d/m/Y");
                                $countdownevent = $expevent - $currentdate;
                                $expi = $expevent;


                               $msg = '<div class="post-box all-promotions">
                                        <a href="'.get_permalink( ).'">
                                        <div class="exp"><p>Exp '. $expi.'</p></div> <div class="exp-days"><p>'.$countdownevent .' days !</p></div>
                                        <div class="post-box-img" style="'.$hero.'">
                                            <div class="post-box-img-cell"></div>
                                        </div>

                                       
                                        <div class="post-box-info">
                                            <div class="column c_50">&nbsp;</div>
                                                    <div class="column c_50 pos_right"><span class="date-info">'.$startevent.'</span></div>
                                            <div class="clear"></div>
                                            <div class="line"></div>
                                            <div class="clear"></div>
                                            <h3>'.get_the_title().'</h3>
                                            <div class="excert_box"><p>'.wp_trim_words(get_field('event_description'),17).'</p></div>
                                            <div class="line"></div>
                                            <p class="info-view"><img class="icon-view" src="'.get_template_directory_uri().'/images/views.svg">'.getCrunchifyPostViews(get_the_ID()).'<img class="icon-like" src="'.get_template_directory_uri().'/images/likes.svg">'.get_field('likes_number').'</p>
                                                        <a href="'.get_the_permalink().'" class="btn-style-round getpromo getevent">View</a>
                                        </div>
                               </div>';
                            
         endwhile;  

             $big = 999999999;
     echo '<nav class="pagination">'.paginate_links( array(
          'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
          'format' => '?paged=%#%',
          'current' => max( 1, get_query_var('paged') ),
          'total' => $postslist->max_num_pages,
          'prev_text' => '&laquo;',
          'next_text' => '&raquo;'
     ) ).'</nav>';

    endif;
                            

    return $msg;
}

/*-----------List companies--------------*/
add_shortcode( 'list_companies', 'list_companies_func' ); 
function list_companies_func($atts) {
    $text = $atts['text'];
    $sort = $atts['sort'];
    $industries = $atts['industries'];
    $location = $atts['location'];
    $author = $atts['author'];
    //$locationname = get_term($location);

    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    $args =  array( 
                                'orderby' => 'title',
                                'order' => $sort,  
                                'post_type'  => 'company',
                                'posts_per_page' => 6,
                                's' => $text,
                                'paged' => $paged,
                                
                            ) ;
    if ($industries != "") {
        $args['meta_query'][] = array('key' => 'industries', 'value' => $industries, 'compare' => 'LIKE');
    }
    if ($location != "") {  
        $args['meta_query'][] = array('key' => 'location', 'value' => $location, 'compare' => 'LIKE');
    }
    
    if ($author != "") {  
        $args['author__in'] = $author;
    }
    $postslist = new WP_Query( $args );

    if ( $postslist->have_posts() ){
        echo  '<div class="row align-items-start">';
        while ( $postslist->have_posts() ) : $postslist->the_post(); 

                                get_template_part("template-part/community/box","company");
                            
         endwhile;  
         echo '</div>';

             $big = 999999999;
     echo '<nav class="pagination">'.paginate_links( array(
          'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
          'format' => '?paged=%#%',
          'current' => max( 1, get_query_var('paged') ),
          'total' => $postslist->max_num_pages,
          'prev_text' => '&laquo;',
          'next_text' => '&raquo;'
     ) ).'</nav>';

    }else{
        echo "<center><h2>Sorry there are no companies matching your selection</h2></center>";
    }
                            

}


/*-----------List companies--------------*/
add_shortcode( 'list_post', 'list_post_func' ); 
function list_post_func($atts) {
    $text = $atts['text'];
    $sort = $atts['sort'];
    $industries = $atts['industries'];
    $location = $atts['location'];
    $author = $atts['author'];
    //$locationname = get_term($location);

    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    $args =  array( 
                                'orderby' => 'title',
                                'order' => $sort,  
                                'post_type'  => 'insights',
                                'posts_per_page' => 6,
                                's' => $text,
                                'paged' => $paged,
                                
                            ) ;
    if ($industries != "") {
        $args['meta_query'][] = array('key' => 'industries', 'value' => $industries, 'compare' => 'LIKE');
    }
    if ($location != "") {  
        $args['meta_query'][] = array('key' => 'location', 'value' => $location, 'compare' => 'LIKE');
    }
    
    if ($author != "") {  
        $args['author__in'] = $author;
    }
    $postslist = new WP_Query( $args );

    if ( $postslist->have_posts() ){
        echo  '<div class="row align-items-start">';
        while ( $postslist->have_posts() ) : $postslist->the_post(); 

                                get_template_part("template-part/community/box","contributions");
                            
         endwhile;  
         echo '</div>';

             $big = 999999999;
     echo '<nav class="pagination">'.paginate_links( array(
          'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
          'format' => '?paged=%#%',
          'current' => max( 1, get_query_var('paged') ),
          'total' => $postslist->max_num_pages,
          'prev_text' => '&laquo;',
          'next_text' => '&raquo;'
     ) ).'</nav>';

    }else{
        echo "<center><h2>Sorry there are no contributions matching your selection</h2></center>";
    }
                            

}

/*------------list promotions-------------------*/
add_shortcode( 'list_promotions', 'list_promotions_func' ); 
function list_promotions_func() {
    $msgpro = '';
    $pagedpro = (get_query_var('paged')) ? get_query_var('paged') : 1;
    $argspro =  array(
                                'orderby' => 'date',  
                                'post_type'  => 'promotions',
                                'posts_per_page' => 6,
                                'paged' => $pagedpro,
                                
    
                                
                            ) ;
    $postslistpro = new WP_Query( $argspro );
    if ( $postslistpro->have_posts() ) :
        while ( $postslistpro->have_posts() ) : $postslistpro->the_post(); 

                            
                            
                                $post_author_id = get_post_field( 'post_author');
                                $terms = get_field('industries');
                                $termsname='';
                                if( $terms ): 
                                    foreach( $terms as $term ):
                                        $termsname .= '<a href="'.esc_url( get_term_link( $term ) ).'">'.esc_html( $term->name ).'</a>';
                                    endforeach; 
                                endif; 

                                $companyparent = get_field('company');
                                $logo = get_field('logo', $companyparent);

                                $group = get_field('discount_code', $post->ID);
                                $starpromotion = $group['start'];
                                $endpromotion = $group['finish'];
                                $currentdate = date("d/m/Y");
                                $countdownpromotion = $endpromotion - $currentdate;


                               $msgpro .='<div class="post-box all-promotions">
                                        <a href="'.get_permalink( ).'">
                                        <div class="exp"><p>Exp '.$endpromotion.'</p></div> <div class="exp-days"><p>'.$countdownpromotion. ' days !</p></div>
                                        <div class="post-box-img" style="background-image:url('.$logo.');">
                                            <div class="post-box-img-cell"></div>
                                        </div>

                                       
                                        <div class="post-box-info">
                                            <div class="column c_50"><div class="btn-style-round">'.$termsname.'</div></div>
                                                    <div class="column c_50 pos_right"><span class="date-info">'.$starpromotion.'</span></div>
                                            <div class="clear"></div>
                                            <div class="line"></div>
                                            <div class="clear"></div>
                                            <h3>'.get_the_title().'</h3>
                                            <div class="excert_box"><p>'.wp_trim_words(get_field('description'),17).'</p></div>
                                            <div class="line"></div>
                                            <p class="info-view"><img class="icon-view" src="'.get_template_directory_uri().'/images/views.svg">'.getCrunchifyPostViews(get_the_ID()).'<img class="icon-like" src="'.get_template_directory_uri().'/images/likes.svg">'.get_field('likes_number').'</p>
                                                        <a href="'.get_the_permalink().'" class="btn-style-round getpromo">Get now</a>
                                        </div>
                               </div>
                               ';

                            
         endwhile;  

             $bigpro = 999999999;
     echo '<nav class="pagination">'.paginate_links( array(
          'base' => str_replace( $bigpro, '%#%', get_pagenum_link( $bigpro ) ),
          'format' => '?paged=%#%',
          'current' => max( 1, get_query_var('paged') ),
          'total' => $postslistpro->max_num_pages,
          'prev_text' => '&laquo;',
          'next_text' => '&raquo;'
     ) ).'</nav>';

    endif;
                            

    return $msgpro;
}



function custom_post_type() {
 
    // Set UI labels for Custom Post Type
        $labels = array(
            'name'                => _x( 'Insights', 'Post Type General Name', 'pilotspider' ),
            'singular_name'       => _x( 'Insight', 'Post Type Singular Name', 'pilotspider' ),
            'menu_name'           => __( 'Insights', 'pilotspider' ),
            'parent_item_colon'   => __( 'Parent Insights', 'pilotspider' ),
            'all_items'           => __( 'All Insights', 'pilotspider' ),
            'view_item'           => __( 'View Insight', 'pilotspider' ),
            'add_new_item'        => __( 'Add New Insight', 'pilotspider' ),
            'add_new'             => __( 'Add New', 'pilotspider' ),
            'edit_item'           => __( 'Edit Insight', 'pilotspider' ),
            'update_item'         => __( 'Update Insight', 'pilotspider' ),
            'search_items'        => __( 'Search Insight', 'pilotspider' ),
            'not_found'           => __( 'Not Found', 'pilotspider' ),
            'not_found_in_trash'  => __( 'Not found in Trash', 'pilotspider' ),
        );
         
    // Set other options for Custom Post Type
         
        $args = array(
            'label'               => __( 'Insights', 'pilotspider' ),
            'description'         => __( 'Insight news and reviews', 'pilotspider' ),
            'labels'              => $labels,
            // Features this CPT supports in Post Editor
            'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
            // You can associate this CPT with a taxonomy or custom taxonomy. 
            'taxonomies'          => array( 'skills' ),
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
        register_post_type( 'insights', $args );
     
    }
     
     
    add_action( 'init', 'custom_post_type', 0 );
    
    
    function custom_post_company_type() {
     
    // Set UI labels for Custom Post Type
        $labels = array(
            'name'                => _x( 'Company', 'Post Type General Name', 'pilotspider' ),
            'singular_name'       => _x( 'Company', 'Post Type Singular Name', 'pilotspider' ),
            'menu_name'           => __( 'Company', 'pilotspider' ),
            'parent_item_colon'   => __( 'Parent Company', 'pilotspider' ),
            'all_items'           => __( 'All Company', 'pilotspider' ),
            'view_item'           => __( 'View Company', 'pilotspider' ),
            'add_new_item'        => __( 'Add New Company', 'pilotspider' ),
            'add_new'             => __( 'Add New', 'pilotspider' ),
            'edit_item'           => __( 'Edit Company', 'pilotspider' ),
            'update_item'         => __( 'Update Company', 'pilotspider' ),
            'search_items'        => __( 'Search Company', 'pilotspider' ),
            'not_found'           => __( 'Not Found', 'pilotspider' ),
            'not_found_in_trash'  => __( 'Not found in Trash', 'pilotspider' ),
        );
         
    // Set other options for Custom Post Type
         
        $args = array(
            'label'               => __( 'Company', 'pilotspider' ),
            'description'         => __( 'Company news and reviews', 'pilotspider' ),
            'labels'              => $labels,
            // Features this CPT supports in Post Editor
            'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
            // You can associate this CPT with a taxonomy or custom taxonomy. 
            'taxonomies'          => array( 'skills' ),
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
        register_post_type( 'Company', $args );
     
    }
     
     
    add_action( 'init', 'custom_post_company_type', 0 );
    
    
    function custom_post_group_type() {
     
    // Set UI labels for Custom Post Type
        $labels = array(
            'name'                => _x( 'Groups', 'Post Type General Name', 'pilotspider' ),
            'singular_name'       => _x( 'Group', 'Post Type Singular Name', 'pilotspider' ),
            'menu_name'           => __( 'Group', 'pilotspider' ),
            'parent_item_colon'   => __( 'Parent Group', 'pilotspider' ),
            'all_items'           => __( 'All Groups', 'pilotspider' ),
            'view_item'           => __( 'View Group', 'pilotspider' ),
            'add_new_item'        => __( 'Add New Group', 'pilotspider' ),
            'add_new'             => __( 'Add New', 'pilotspider' ),
            'edit_item'           => __( 'Edit Group', 'pilotspider' ),
            'update_item'         => __( 'Update Group', 'pilotspider' ),
            'search_items'        => __( 'Search Group', 'pilotspider' ),
            'not_found'           => __( 'Not Found', 'pilotspider' ),
            'not_found_in_trash'  => __( 'Not found in Trash', 'pilotspider' ),
        );
         
    // Set other options for Custom Post Type
         
        $args = array(
            'label'               => __( 'Groups', 'pilotspider' ),
            'description'         => __( 'Group news and reviews', 'pilotspider' ),
            'labels'              => $labels,
            // Features this CPT supports in Post Editor
            'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
            // You can associate this CPT with a taxonomy or custom taxonomy. 
            'taxonomies'          => array( 'skills' ),
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
        register_post_type( 'group', $args );
     
    }

     
    add_action( 'init', 'custom_post_group_type', 0 );


    function custom_post_conversation_type() {
     
        // Set UI labels for Custom Post Type
            $labels = array(
                'name'                => _x( 'Conversation', 'Post Type General Name', 'pilotspider' ),
                'singular_name'       => _x( 'Conversation', 'Post Type Singular Name', 'pilotspider' ),
                'menu_name'           => __( 'Conversation', 'pilotspider' ),
                'parent_item_colon'   => __( 'Parent conversation', 'pilotspider' ),
                'all_items'           => __( 'All conversation', 'pilotspider' ),
                'view_item'           => __( 'View conversation', 'pilotspider' ),
                'add_new_item'        => __( 'Add New conversation', 'pilotspider' ),
                'add_new'             => __( 'Add New', 'pilotspider' ),
                'edit_item'           => __( 'Edit conversation', 'pilotspider' ),
                'update_item'         => __( 'Update conversation', 'pilotspider' ),
                'search_items'        => __( 'Search conversation', 'pilotspider' ),
                'not_found'           => __( 'Not Found', 'pilotspider' ),
                'not_found_in_trash'  => __( 'Not found in Trash', 'pilotspider' ),
            );
             
        // Set other options for Custom Post Type
             
            $args = array(
                'label'               => __( 'conversation', 'pilotspider' ),
                'description'         => __( 'conversation news and reviews', 'pilotspider' ),
                'labels'              => $labels,
                // Features this CPT supports in Post Editor
                'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
                // You can associate this CPT with a taxonomy or custom taxonomy. 
                'taxonomies'          => array( 'skills' ),
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
            register_post_type( 'conversation', $args );
         
    }
    
         
    add_action( 'init', 'custom_post_conversation_type', 0 );
    
    
    function custom_post_case_studie_type() {
     
    // Set UI labels for Custom Post Type
        $labels = array(
            'name'                => _x( 'Case Studies', 'Post Type General Name', 'pilotspider' ),
            'singular_name'       => _x( 'Case Studies', 'Post Type Singular Name', 'pilotspider' ),
            'menu_name'           => __( 'Case Studies', 'pilotspider' ),
            'parent_item_colon'   => __( 'Parent Case Studies', 'pilotspider' ),
            'all_items'           => __( 'All Case Studies', 'pilotspider' ),
            'view_item'           => __( 'View Case Studies', 'pilotspider' ),
            'add_new_item'        => __( 'Add New Case Studies', 'pilotspider' ),
            'add_new'             => __( 'Add New', 'pilotspider' ),
            'edit_item'           => __( 'Edit Case Studies', 'pilotspider' ),
            'update_item'         => __( 'Update Case Studies', 'pilotspider' ),
            'search_items'        => __( 'Search Case Studies', 'pilotspider' ),
            'not_found'           => __( 'Not Found', 'pilotspider' ),
            'not_found_in_trash'  => __( 'Not found in Trash', 'pilotspider' ),
        );
         
    // Set other options for Custom Post Type
         
        $args = array(
            'label'               => __( 'Case Studies', 'pilotspider' ),
            'description'         => __( 'Case Studies news and reviews', 'pilotspider' ),
            'labels'              => $labels,
            // Features this CPT supports in Post Editor
            'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
            // You can associate this CPT with a taxonomy or custom taxonomy. 
            'taxonomies'          => array( 'skills' ),
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
        register_post_type( 'case_studies', $args );
     
    }
     
     
    add_action( 'init', 'custom_post_case_studie_type', 0 );
    
    
    function custom_post_promotions_type() {
     
    // Set UI labels for Custom Post Type
        $labels = array(
            'name'                => _x( 'Promotions', 'Post Type General Name', 'pilotspider' ),
            'singular_name'       => _x( 'Promotion', 'Post Type Singular Name', 'pilotspider' ),
            'menu_name'           => __( 'Promotions', 'pilotspider' ),
            'parent_item_colon'   => __( 'Parent Promotions', 'pilotspider' ),
            'all_items'           => __( 'All Promotions', 'pilotspider' ),
            'view_item'           => __( 'View Promotions', 'pilotspider' ),
            'add_new_item'        => __( 'Add New Promotions', 'pilotspider' ),
            'add_new'             => __( 'Add New', 'pilotspider' ),
            'edit_item'           => __( 'Edit Promotions', 'pilotspider' ),
            'update_item'         => __( 'Update Promotions', 'pilotspider' ),
            'search_items'        => __( 'Search Promotions', 'pilotspider' ),
            'not_found'           => __( 'Not Found', 'pilotspider' ),
            'not_found_in_trash'  => __( 'Not found in Trash', 'pilotspider' ),
        );
         
    // Set other options for Custom Post Type
         
        $args = array(
            'label'               => __( 'Promotions', 'pilotspider' ),
            'description'         => __( 'Promotions news and reviews', 'pilotspider' ),
            'labels'              => $labels,
            // Features this CPT supports in Post Editor
            'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
            // You can associate this CPT with a taxonomy or custom taxonomy. 
            'taxonomies'          => array( 'skills' ),
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
        register_post_type( 'promotions', $args );
     
    }
     
     
    add_action( 'init', 'custom_post_promotions_type', 0 );
    
    
    add_action( 'init', 'create_my_taxonomies', 0 );
    function create_my_taxonomies() {
    
      
    
        register_taxonomy(
            'categorie_genre',
            'insights',
            array(
                'labels' => array(
                    'name' => 'Category',
                    'add_new_item' => 'Add New Category',
                    'new_item_name' => "New Category"
                ),
                'show_ui' => true,
                'show_tagcloud' => false,
                 'public'       => true,
    
                'hierarchical' => true
            )
        );
    
        register_taxonomy(
            'categorie_industries',
            'company',
            array(
                'labels' => array(
                    'name' => 'Industries',
                    'add_new_item' => 'Add New industry',
                    'public'       => true,
                    'new_item_name' => "New Industry"
                ),
                'show_ui' => true,
                'show_tagcloud' => false,
                'hierarchical' => true
            )
        );
    
        register_taxonomy(
            'categorie_country',
            'company',
            array(
                'labels' => array(
                    'name' => 'Country',
                    'add_new_item' => 'Add New country',
                    'new_item_name' => "New IndustryCountry"
                ),
                'show_ui' => true,
                'show_tagcloud' => false,
                'public'       => true,
                'hierarchical' => true
            )
        );
        register_taxonomy(
            'categorie_tags',
            'company',
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
    
    