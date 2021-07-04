<?php

if( isset( $_GET['edit'] ) ){
    $author_id = get_post_field( 'post_author',  $_GET['edit'] );
    
    if( $author_id == get_current_user_id() ){
        echo '<h1>Edit '.get_the_title( $_GET['edit'] ).'</h1>
        <h3 class="subtitle">'.get_field('subtitle').'</h3>';
        $options = array(
            'post_id'		=> $_GET['edit'],
            'post_title'    => true,
            'post_content'	=> true,
			'return' => get_the_permalink( $_GET['edit'] ),
            'submit_value'  => __('Edit conversation')
        );
        acf_form( $options );
    }
   

}else if( isset( $_GET['remove'] ) ){
    $author_id = get_post_field( 'post_author',  $_GET['remove'] );
    
    if( $author_id == get_current_user_id() ){
        echo '<h1>Remove '.get_the_title( $_GET['remove'] ).'</h1>
        <h3 class="subtitle">Your Conversation has been remove</h3>';
        wp_update_post(array( 'ID' =>  $_GET['remove'], 'post_status'   =>  'draft' ));
    }
   

}else if( isset( $_GET['information'] ) ){
    echo '<h1>'.get_the_title().'</h1>
    <h3 class="subtitle">'.get_field('subtitle').'</h3>';
    $options = array(
        'post_id'		=> 'new_post',

        'post_title'    => true,
        'post_content'	=> true,
        'submit_value'  => __('Create conversation'),
        'return' => get_the_permalink( $_GET['information'] ),
        'new_post'		=> array(
                                'post_type'		=> 'conversation',
                                'post_status'	=> 'publish'
                            )
    );
    acf_form( $options );

    echo "<script> $('#acf-field_60df870f868de').val('".$_GET['information']."'); </script>";

}

 
?>

