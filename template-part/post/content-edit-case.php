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
            'field_groups' => array(179),
            'fields' => array(
                'field_5ed6743a7bf47',
                'field_60e1e387d0b08',
                'field_5ed674d3e8762',
                'field_5ed6682fb9445',
                'field_5ed66f4ba58f5'
            ),
			'return' => get_the_permalink( $_GET['edit'] ),
            'submit_value'  => __('Edit Case')
        );
        acf_form( $options );
    }
   

}else if( isset( $_GET['remove'] ) ){
    $author_id = get_post_field( 'post_author',  $_GET['remove'] );
    
    if( $author_id == get_current_user_id() ){
        echo '<h1>Remove '.get_the_title( $_GET['remove'] ).'</h1>
        <h3 class="subtitle">Your Case has been remove</h3>';
        wp_update_post(array( 'ID' =>  $_GET['remove'], 'post_status'   =>  'draft' ));
    }
   

}else{
    echo '<h1>'.get_the_title().'</h1>
    <h3 class="subtitle">'.get_field('subtitle').'</h3>';
    $options = array(
        'post_id'		=> 'new_post',

        'post_title'    => true,
        'post_content'	=> true,
        'field_groups' => array(179),
        'fields' => array(
            'field_5ed6743a7bf47',
            'field_60e1e387d0b08',
            'field_5ed674d3e8762',
            'field_5ed6682fb9445',
            'field_5ed526ab0abe1',
            'field_5ed66f4ba58f5',
        ),
        'submit_value'  => __('Add New Case'),
        'return' => get_the_permalink( $_GET['information'] ),
        'new_post'		=> array(
                                'post_type'		=> 'case_studies',
                                'post_status'	=> 'publish'
                            )
    );
    acf_form( $options );

    echo "<script> $('#acf-field_5ed526ab0abe1').val('".$_GET['information']."'); </script>";

}

 
?>