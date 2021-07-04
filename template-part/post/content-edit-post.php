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
            'field_groups' => array(86),
			'return' => get_the_permalink( $_GET['edit'] ),
            'submit_value'  => __('Edit Insight')
        );
        acf_form( $options );
    }
   

}else if( isset( $_GET['remove'] ) ){
    $author_id = get_post_field( 'post_author',  $_GET['remove'] );
    
    if( $author_id == get_current_user_id() ){
        echo '<h1>Remove '.get_the_title( $_GET['remove'] ).'</h1>
        <h3 class="subtitle">Your Contribution has been remove</h3>';
        wp_update_post(array( 'ID' =>  $_GET['remove'], 'post_status'   =>  'draft' ));
    }
   

}else{
    echo '<h1>'.get_the_title().'</h1>
    <h3 class="subtitle">'.get_field('subtitle').'</h3>';
    $options = array(
        'post_id'		=> 'new_post',

        'post_title'    => true,
        'post_content'	=> true,
        'field_groups' => array(86),
        'submit_value'  => __('Add New Insight'),
        'return' => get_author_posts_url( get_current_user_id() ),
        'new_post'		=> array(
                                'post_type'		=> 'insights',
                                'post_status'	=> 'publish'
                            )
    );
    acf_form( $options );

}

 
?>