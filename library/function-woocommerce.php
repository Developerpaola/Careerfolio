<?php
/**
 * Add WooCommerce support
 *
 * @package foundry
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

add_action( 'after_setup_theme', 'foundry_woocommerce_support' );
if ( ! function_exists( 'foundry_woocommerce_support' ) ) {
	/**
	 * Declares WooCommerce theme support.
	 */
	function foundry_woocommerce_support() {
		add_theme_support( 'woocommerce' );

		// Add Product Gallery support.
		add_theme_support( 'wc-product-gallery-lightbox' );
		// add_theme_support( 'wc-product-gallery-zoom' );
		add_theme_support( 'wc-product-gallery-slider' );

		}
}

/**
 * Remove the breadcrumbs 
 */
add_action( 'init', 'woo_remove_wc_breadcrumbs' );
function woo_remove_wc_breadcrumbs() {
    remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
}

/**
 * Remove sort and then added earlier
 */
remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20);
remove_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30);
add_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 10);



// CHANGE ORDERING TEXT
add_filter('woocommerce_catalog_orderby', 'wc_customize_product_sorting');

function wc_customize_product_sorting($sorting_options){
    $sorting_options = array(
        'menu_order' => __( 'Sorting', 'woocommerce' ),
        'popularity' => __( 'Sort by: popularity', 'woocommerce' ),
        // 'rating'     => __( 'Sort by average rating', 'woocommerce' ),
		'date'       => __( 'Sort by: Date', 'woocommerce' ),
        'price'      => __( 'Sort by: Price: low to high', 'woocommerce' ),
        'price-desc' => __( 'Sort by: Price: high to low', 'woocommerce' ),
    );

    return $sorting_options;
}

// REMOVE ADD TO CART
remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);


// MOVE RATING DOWN ONE
remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5);
add_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 20);


/* Customize Product Categories Labels */
add_filter( 'woocommerce_taxonomy_args_product_cat', 'custom_wc_taxonomy_args_product_cat' );
function custom_wc_taxonomy_args_product_cat( $args ) {
	$args['label'] = __( 'Product Categories', 'woocommerce' );
	$args['labels'] = array(
        'name' 				=> __( 'Brands', 'woocommerce' ),
        'singular_name' 	=> __( 'Brand', 'woocommerce' ),
        'menu_name'			=> _x( 'Brands', 'Admin menu name', 'woocommerce' ),
		'search_items' 		=> __( 'Search Brand', 'woocommerce' ),
        'all_items' 		=> __( 'All Brands', 'woocommerce' ),
        'parent_item' 		=> __( 'Parent Brand', 'woocommerce' ),
        'parent_item_colon' => __( 'Parent Brand:', 'woocommerce' ),
        'edit_item' 		=> __( 'Edit Brand', 'woocommerce' ),
        'update_item' 		=> __( 'Update Brand', 'woocommerce' ),
        'add_new_item' 		=> __( 'Add New Brand', 'woocommerce' ),
        'new_item_name' 	=> __( 'New Brand Name', 'woocommerce' )
	);

	return $args;
}


// MOVE REVIEWS DOWN ONE
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10);
add_action('woocommerce_single_product_summary', 'woocommerce_template_single_rating', 15);

// ADD SIZE AFTER TITLE FOR SIMPLE PRODUCT

add_action( 'woocommerce_single_product_summary', 'custom_action_after_single_product_title', 6 );
function custom_action_after_single_product_title() { 
    global $product; 

    $sizes = $product->get_attribute( 'size' ); 
    $sizes = explode(", ",$sizes);
    if($sizes[0]!='' && $product->is_type( 'simple' ) ) :// if product sizes are available
        foreach($sizes as $size):
            echo '<p class="fd_simple-product-size" style="margin-bottom:7px; margin-top:-20px; font-size:14px; font-weight:400; color:#6d6f7b">'. $size .'</p>';
        endforeach;
    endif;
}

/**
 * QTY Remove in all product type
 */
// function wc_remove_all_quantity_fields( $return, $product ) {
//     return true;
// }
// add_filter( 'woocommerce_is_sold_individually', 'wc_remove_all_quantity_fields', 10, 2 );


// remove meta product Tags and SKU from single-product
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', '40' );


// remove meta product tabs not needed from single-product

add_filter( 'woocommerce_product_tabs', 'misha_remove_description_tab', 11 );
 
function misha_remove_description_tab( $tabs ) {
 
	unset( $tabs['description'] );
	return $tabs;
 
}


add_filter( 'woocommerce_product_tabs', 'misha_remove_additional_information' );
 
function misha_remove_additional_information( $tabs ) {
 
	unset( $tabs['additional_information'] );
	return $tabs;
}


/**
 * Change number of products that are displayed per page (shop page)
 */
add_filter( 'loop_shop_per_page', 'new_loop_shop_per_page', 20 );

function new_loop_shop_per_page( $cols ) {
  // $cols contains the current number of products per page based on the value stored on Options –> Reading
  // Return the number of products you wanna show per page.
  $cols =-1;
  return $cols;
}




/**
 * Change number of related products output
 */ 
function woo_related_products_limit() {
    global $product;
      
      $args['posts_per_page'] = 6;
      return $args;
  }
add_filter( 'woocommerce_output_related_products_args', 'jk_related_products_args', 20 );
function jk_related_products_args( $args ) {
    $args['posts_per_page'] = 4; // 4 related products
    $args['columns'] = 4; // arranged in 2 columns
    return $args;
}

// add CONTAINER IN CART and TITLE

add_action( 'woocommerce_before_cart', 'contentBlockBefore' );
function contentBlockBefore() {
    echo '<div class="cart-wrapper cart-full content-block">';
    echo '<div class="cart-title-fd">';
    echo '<svg xmlns="http://www.w3.org/2000/svg" width="22.228" height="22.227" viewBox="0 0 22.228 22.227"><path data-name="Path 21" d="M22.217 21.074L19.972 5.358a1.01 1.01 0 00-1-.867h-1.589a6.621 6.621 0 00-12.538 0H3.256a1.01 1.01 0 00-1 .867L.01 21.074a1.011 1.011 0 001 1.153h20.207a1.011 1.011 0 001-1.153zm-11.1-19.053a4.6 4.6 0 014.075 2.47h-8.15a4.6 4.6 0 014.071-2.47zM2.179 20.207l1.957-13.7h.361V9.24a1.01 1.01 0 002.021 0V6.623c0-.038 0-.075.006-.112h9.194c0 .038.006.074.006.112v2.621a1.01 1.01 0 002.021 0V6.511h.361l1.957 13.7z" fill="#191919"/></svg>';
    echo '<h1>Your bag</h1>';
    echo '<a href="'.esc_url( apply_filters( 'woocommerce_return_to_shop_redirect', wc_get_page_permalink( 'shop' ) ) ).'">Continue shopping</a>';
    echo '</div">';
}
add_action( 'woocommerce_after_cart', 'contentBlockAfter' );
function contentBlockAfter() {
	echo '</div>';
}

// add CONTENT TO CART IS EMPTY
add_action( 'woocommerce_cart_is_empty', 'contentEmpty' );
function contentEmpty(){
    echo '<div class="cart-title-fd">' ;
    echo '<svg xmlns="http://www.w3.org/2000/svg" width="22.228" height="22.227" viewBox="0 0 22.228 22.227"><path data-name="Path 21" d="M22.217 21.074L19.972 5.358a1.01 1.01 0 00-1-.867h-1.589a6.621 6.621 0 00-12.538 0H3.256a1.01 1.01 0 00-1 .867L.01 21.074a1.011 1.011 0 001 1.153h20.207a1.011 1.011 0 001-1.153zm-11.1-19.053a4.6 4.6 0 014.075 2.47h-8.15a4.6 4.6 0 014.071-2.47zM2.179 20.207l1.957-13.7h.361V9.24a1.01 1.01 0 002.021 0V6.623c0-.038 0-.075.006-.112h9.194c0 .038.006.074.006.112v2.621a1.01 1.01 0 002.021 0V6.511h.361l1.957 13.7z" fill="#191919"/></svg>';
    echo '<h1>Your bag</h1>';
    echo '</div">';
    echo '<div class="cart-wrapper">';
    echo '<p>Your bag is currently empty</p>';
    echo '</div>';
}


// open DIV for login page
add_action( 'woocommerce_before_customer_login_form', 'loginWrapper' );
function loginWrapper(){
    echo '<div class="account-wrapper-fd">' ;
}
// close DIV for login page
add_action( 'woocommerce_after_customer_login_form', 'loginWrapperClose' );
function loginWrapperClose(){
    echo '</div>' ;
}

// open DIV for lostpass page
add_action( 'woocommerce_before_lost_password_form', 'lostWrapper' );
function lostWrapper(){
    echo '<div class="lost-wrapper-fd">' ;
    echo '<h2>Lost your password?</h2>' ;
} 
// close DIV for lostpass page
add_action( 'woocommerce_after_customer_login_form', 'lostWrapperClose' );
function lostWrapperClose(){
    echo '</div>' ;
}



// Remove form login from checkout
remove_action( 'woocommerce_after_lost_password_form', 'woocommerce_checkout_coupon_form', 10 );

/**
 * @snippet       Change "Place Order" Button text @ WooCommerce Checkout
 * @sourcecode    https://rudrastyh.com/?p=8327#woocommerce_order_button_text
 * @author        Misha Rudrastyh
 */
add_filter( 'woocommerce_order_button_text', 'misha_custom_button_text' );
 
function misha_custom_button_text( $button_text ) {
   return 'Buy now'; 
}

/* WooCommerce Add To Cart Text */

add_filter('woocommerce_product_single_add_to_cart_text', 'woocommerce_custom_add_to_cart_text');
 
function woocommerce_custom_add_to_cart_text() {
return __('ADD TO BASKET', 'woocommerce');
}

add_filter( 'gettext', 'woocommerce_rename_coupon_field_on_cart', 10, 3 );
add_filter( 'gettext', 'woocommerce_rename_coupon_field_on_cart', 10, 3 );
add_filter('woocommerce_coupon_error', 'rename_coupon_label', 10, 3);
add_filter('woocommerce_coupon_message', 'rename_coupon_label', 10, 3);
add_filter('woocommerce_cart_totals_coupon_label', 'rename_coupon_label',10, 1);


function woocommerce_rename_coupon_field_on_cart( $translated_text, $text, $text_domain ) {
	// bail if not modifying frontend woocommerce text
	if ( is_admin() || 'woocommerce' !== $text_domain ) {
		return $translated_text;
	}
	if ( 'Coupon:' === $text ) {
		$translated_text = 'Discount Code:';
	}

	if ('Coupon has been removed.' === $text){
		$translated_text = 'Discount Code has been removed.';
	}

	if ( 'Apply coupon' === $text ) {
		$translated_text = 'Apply Code';
	}

	if ( 'Coupon code' === $text ) {
		$translated_text = 'Discount Code';
	
	} 

	return $translated_text;
}





function rename_coupon_label($err, $err_code=null, $something=null){

	$err = str_ireplace("Coupon","Discount Code ",$err);

	return $err;
}


/**
 * @snippet       WooCommerce User Registration Shortcode
 * @how-to        Get CustomizeWoo.com FREE
 * @author        Rodolfo Melogli
 * @compatible    WooCommerce 4.0
 * @donate $9     https://businessbloomer.com/bloomer-armada/
 */
   
add_shortcode( 'wc_reg_form_bbloomer', 'bbloomer_separate_registration_form' );
    
function bbloomer_separate_registration_form() {
   if ( is_admin() ) return;
   if ( is_user_logged_in() ) return;
   ob_start();
 
   // NOTE: THE FOLLOWING <FORM></FORM> IS COPIED FROM woocommerce\templates\myaccount\form-login.php
   // IF WOOCOMMERCE RELEASES AN UPDATE TO THAT TEMPLATE, YOU MUST CHANGE THIS ACCORDINGLY
 
   do_action( 'woocommerce_before_customer_login_form' );
 
   ?>
     <form method="post" class="woocommerce-form woocommerce-form-register register" <?php do_action( 'woocommerce_register_form_tag' ); ?> >

<?php do_action( 'woocommerce_register_form_start' ); ?>

<?php if ( 'no' === get_option( 'woocommerce_registration_generate_username' ) ) : ?>

    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
        <label for="reg_username"><?php esc_html_e( 'Username', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
        <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="username" id="reg_username" autocomplete="username" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
    </p>

<?php endif; ?>

<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
    <label for="reg_email"><?php esc_html_e( 'Email address', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
    <input type="email" class="woocommerce-Input woocommerce-Input--text input-text" name="email" id="reg_email" autocomplete="email" value="<?php echo ( ! empty( $_POST['email'] ) ) ? esc_attr( wp_unslash( $_POST['email'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
</p>

<?php if ( 'no' === get_option( 'woocommerce_registration_generate_password' ) ) : ?>

    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide validate-required woocommerce-invalid woocommerce-invalid-required-field">
        <label for="reg_password"><?php esc_html_e( 'Password', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
        <input type="password" class="woocommerce-Input woocommerce-Input--text input-text" name="password" id="reg_password" autocomplete="new-password" />
    </p>
    <!-- <p class="form-row validate-required woocommerce-invalid woocommerce-invalid-required-field" id="account_password_field" data-priority="">
    <label for="account_password" class="">Create account password&nbsp;<abbr class="required" title="required">*</abbr></label><span class="woocommerce-input-wrapper password-input">
    <input type="password" class="input-text " name="account_password" id="account_password" placeholder="Password" value="" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAYAAABzenr0AAAAAXNSR0IArs4c6QAABKRJREFUWAnNl0tsVGUUxzvTTlslZUaCloZHY6BRFkp9sDBuqgINpaBp02dIDImwKDG6ICQ8jBYlhg0rxUBYEALTpulMgBlqOqHRDSikJkZdGG0CRqAGUuwDovQ1/s7NPTffnTu3zMxGvuT2vP7n8Z3vu+dOi4r+5xUoJH8sFquamZmpTqfTVeIfCARGQ6HQH83NzaP5xsu5gL6+vuVzc3NdJN1Kkhd8Ev1MMYni4uJjra2tt3wwLvUjCxgYGFg8Pj7+MV5dPOUub3/hX0zHIpFId0NDw6Q/jO4tZOzv76+Znp6+AOb5TBw7/YduWC2Hr4J/IhOD/GswGHy7vb39tyw2S+VbAC1/ZXZ29hKoiOE8RrIvaPE5WvyjoS8CX8sRvYPufYpZYtjGS0pKNoD/wdA5bNYCCLaMYMMEWq5IEn8ZDof3P6ql9pF9jp8cma6bFLGeIv5ShdISZUzKzqPIVnISp3l20caTJsaPtwvc3dPTIx06ziZkkyvY0FnoW5l+ng7guAWnpAI5w4MkP6yy0GQy+dTU1JToGm19sqKi4kBjY+PftmwRYn1ErEOq4+i2tLW1DagsNGgKNv+p6tj595nJxUbyOIF38AwipoSfnJyMqZ9SfD8jxlWV5+fnu5VX6iqgt7d3NcFeUiN0n8FbLEOoGkwdgY90dnbu7OjoeE94jG9wd1aZePRp5AOqw+9VMM+qLNRVABXKkLEWzn8S/FtbdAhnuVQE7LdVafBPq04pMYawO0OJ+6XHZkFcBQA0J1xKgyhlB0EChEWGX8RulsgjvOjEBu+5V+icWOSoFawuVwEordluG28oSCmXSs55SGSCHiXhmDzC25ghMHGbdwhJr6sAdpnyQl0FYIyoEX5CeYOuNHg/NhvGiUUxVgfV2VUAxjtqgPecp9oKoE4sNnbX9HcVgMH8nD5nAoWnKM/5ZmKyySRdq3pCmDncR4DxOwVC64eHh0OGLOcur1Vey46xUZ3IcVl5oa4OlJaWXgQwJwZyhUdGRjqE14VtSnk/mokhxnawiwUvsZmsX5u+rgKamprGMDoA5sKhRCLxpDowSpsJ8vpCj2AUPzg4uIiNfKIyNMkH6Z4hF3k+RgTYz6vVAEiKq2bsniZIC0nTtvMVMwBzoBT9tKkTHp8Ak1V8dTrOE+NgJs7VATESTH5WnVAgfHUqlXK6oHpJEI1G9zEZH/Du16leqHyS0UXBNKmeOMf5NvyislJPB8RAFz4g8IuwofLy8k319fUP1EEouw7L7mC3kUTO1nn3sb02MTFxFpsz87FfJuaH4pu5fF+reDz+DEfxkI44Q0ScSbyOpDGe1RqMBN08o+ha0L0JdeKi/6msrGwj98uZMeon1AGaSj+elr9LwK9IkO33n8cN7Hl2vp1N3PcYbUXOBbDz9bwV1/wCmXoS3+B128OPD/l2LLg8l9APXVlZKZfzfDY7ehlQv0PPQDez6zW5JJdYOXdAwHK2dGIv7GH4YtHJIvEOvvunLCHPPzl3QOLKTkl0hPbKaDUvlTU988xtwfMqQBPQ3m/4mf0yBVlDCSr/CRW0CipAMnGzb9XU1NSRvIX7kSgo++Pg9B8wltxxbHKPZgAAAABJRU5ErkJggg==&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%; cursor: auto;"><span class="show-password-input"></span></span></p> -->

<?php else : ?>

    <p><?php esc_html_e( 'A password will be sent to your email address.', 'woocommerce' ); ?></p>

<?php endif; ?>

<?php do_action( 'woocommerce_register_form' ); ?>

<p class="woocommerce-form-row form-row">
    <?php wp_nonce_field( 'woocommerce-register', 'woocommerce-register-nonce' ); ?>
    <button type="submit" class="woocommerce-Button woocommerce-button button woocommerce-form-register__submit" name="register" value="<?php esc_attr_e( 'Register', 'woocommerce' ); ?>"><?php esc_html_e( 'Register', 'woocommerce' ); ?></button>
</p>

<?php do_action( 'woocommerce_register_form_end' ); ?>

</form>

 
   <?php
     
   return ob_get_clean();
}



add_filter( 'woocommerce_registration_redirect', 'custom_redirection_after_registration', 10, 1 );
function custom_redirection_after_registration( $redirection_url ){
    // Change the redirection Url
    $redirection_url = wc_get_page_permalink( 'myaccount' ); // My account

    return $redirection_url; // Always return something
}

/**
 * @snippet       Add First & Last Name to My Account Register Form - WooCommerce
 * @how-to        Get CustomizeWoo.com FREE
 * @author        Rodolfo Melogli
 * @compatible    WC 3.9
 * @donate $9     https://businessbloomer.com/bloomer-armada/
 */
  
///////////////////////////////
// 1. ADD FIELDS
  
add_action( 'woocommerce_register_form_start', 'bbloomer_add_name_woo_account_registration' );
  
function bbloomer_add_name_woo_account_registration() {
    ?>
  <div class="form-flex">
  
    <p class="form-row form-row-first">
    <label for="reg_billing_first_name"><?php _e( 'First name', 'woocommerce' ); ?> <span class="required">*</span></label>
    <input type="text" class="input-text" name="billing_first_name" id="reg_billing_first_name" value="<?php if ( ! empty( $_POST['billing_first_name'] ) ) esc_attr_e( $_POST['billing_first_name'] ); ?>" />
    </p>
  
    <p class="form-row form-row-last">
    <label for="reg_billing_last_name"><?php _e( 'Last name', 'woocommerce' ); ?> <span class="required">*</span></label>
    <input type="text" class="input-text" name="billing_last_name" id="reg_billing_last_name" value="<?php if ( ! empty( $_POST['billing_last_name'] ) ) esc_attr_e( $_POST['billing_last_name'] ); ?>" />
    </p>
  </div>
  
    
  
    <?php
}
  
///////////////////////////////
// 2. VALIDATE FIELDS
  
add_filter( 'woocommerce_registration_errors', 'bbloomer_validate_name_fields', 10, 3 );
  
function bbloomer_validate_name_fields( $errors, $username, $email ) {
    if ( isset( $_POST['billing_first_name'] ) && empty( $_POST['billing_first_name'] ) ) {
        $errors->add( 'billing_first_name_error', __( '<strong>Error</strong>: First name is required!', 'woocommerce' ) );
    }
    if ( isset( $_POST['billing_last_name'] ) && empty( $_POST['billing_last_name'] ) ) {
        $errors->add( 'billing_last_name_error', __( '<strong>Error</strong>: Last name is required!.', 'woocommerce' ) );
    }
    return $errors;
}
  
///////////////////////////////
// 3. SAVE FIELDS
  
add_action( 'woocommerce_created_customer', 'bbloomer_save_name_fields' );
  
function bbloomer_save_name_fields( $customer_id ) {
    if ( isset( $_POST['billing_first_name'] ) ) {
        update_user_meta( $customer_id, 'billing_first_name', sanitize_text_field( $_POST['billing_first_name'] ) );
        update_user_meta( $customer_id, 'first_name', sanitize_text_field($_POST['billing_first_name']) );
    }
    if ( isset( $_POST['billing_last_name'] ) ) {
        update_user_meta( $customer_id, 'billing_last_name', sanitize_text_field( $_POST['billing_last_name'] ) );
        update_user_meta( $customer_id, 'last_name', sanitize_text_field($_POST['billing_last_name']) );
    }
  
}

/**
 * Change the strength requirement on the woocommerce password
 *
 * Strength Settings
 * 4 = Strong
 * 3 = Medium (default) 
 * 2 = Also Weak but a little stronger 
 * 1 = Password should be at least Weak
 * 0 = Very Weak / Anything
 */
add_filter( 'woocommerce_min_password_strength', 'misha_change_password_strength' );
 
function misha_change_password_strength( $strength ) {
	 return 4;
}

add_filter( 'woocommerce_get_script_data', 'misha_strength_meter_settings', 20, 2 );
 
function misha_strength_meter_settings( $params, $handle  ) {
 
	if( $handle === 'wc-password-strength-meter' ) {
		$params = array_merge( $params, array(
			'min_password_strength' => 4,
			'i18n_password_error' => 'Do not you want to be protected? Make it stronger!',
			'i18n_password_hint' => 'Yes, I know, it is simple to use the same weak password each time for all websites you use. I\'m sorry, but I won\'t let you do so, just because I care about your account security. Please make your password <strong>at least 7 characters</strong> long and use a mix of <strong>UPPER</strong> and <strong>lowercase</strong> letters, <strong>numbers</strong>, and <strong>symbols</strong> (e.g., <strong> ! " ? $ % ^ & </strong>).'
		) );
	}
	return $params;
 
}

// CREATE CUSTOM TAXONOMY

add_action( 'init', 'custom_taxonomy_Item' );
function custom_taxonomy_Item()  {
$labels = array(
    'name'                       => 'Groups',
    'singular_name'              => 'Group',
    'menu_name'                  => 'Group',
    'all_items'                  => 'All Groups',
    'parent_item'                => 'Parent Group',
    'parent_item_colon'          => 'Parent Group:',
    'new_item_name'              => 'New Group Name',
    'add_new_item'               => 'Add New Group',
    'edit_item'                  => 'Edit Group',
    'update_item'                => 'Update Group',
    'separate_items_with_commas' => 'Separate Group with commas',
    'search_items'               => 'Search Groups',
    'add_or_remove_items'        => 'Add or remove Groups',
    'choose_from_most_used'      => 'Choose from the most used Groups',
);
$args = array(
    'labels'                     => $labels,
    'hierarchical'               => true,
    'public'                     => true,
    'show_ui'                    => true,
    'show_admin_column'          => true,
    'show_in_nav_menus'          => true,
    'show_tagcloud'              => true,
    'sort'                       => true,
    'query_var'                  => true,  
);
register_taxonomy( 'group', 'product', $args );
register_taxonomy_for_object_type( 'group', 'product' );
}