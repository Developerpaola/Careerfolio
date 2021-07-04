<?php

if( isset( $_GET['edit'] ) ){
    $author_id = get_post_field( 'post_author',  $_GET['edit'] );
    
    if( $author_id == get_current_user_id() ){
        echo '<h1>Edit  Group</h1>
        <h3 class="subtitle">'.get_the_title($_GET['edit']).'</h3>';
        $options = array(
            'post_id'		=> $_GET['edit'],
            'post_title'    => true,
            'post_content'	=> true,
            'field_groups' => array(738),
            'fields' => array(
                'field_60df0a5e8cb82',
                'field_60d08cc7ac892',
                'field_60df0acb8cb83',
                'field_60df0b2a8cb85',
                'field_60d08eaf123da',
                'field_60df0af48cb84'
            ),  
			'return' => get_the_permalink( 843 ).'/?edit='.$_GET['edit'],
            'submit_value'  => __('Edit Group')
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
        'field_groups' => array(738),
        'fields' => array(
            'field_60df0a5e8cb82',
            'field_60d08cc7ac892',
            'field_60df0acb8cb83',
            'field_60df0b2a8cb85',
            'field_60d08eaf123da',
            'field_60df0af48cb84'
        ),  
        'submit_value'  => __('Create group'),
        'return' => get_the_permalink( 843 ),
        'new_post'		=> array(
                                'post_type'		=> 'group',
                                'post_status'	=> 'publish'
                            )
    );
    acf_form( $options );

}

 
?>