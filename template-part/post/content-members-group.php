<?php

if( isset( $_GET['edit'] ) ){
    $group = $_GET['edit'] ;
    $author_id = get_post_field( 'post_author',  $group );
    $title = 'Edit Group';
}else{
    $post_list = get_posts( array(

        'post_author' => get_current_user_id(),
        'orderby'    => 'date',
        'sort_order' => 'asc',
        'post_type' => 'group',
        'posts_per_page' => 1
    ) );
     
    foreach ( $post_list as $post ) {
        $group = $post->ID;
        $author_id = get_post_field( 'post_author',  $group );
    }
    $title = get_the_title(843);
}
    
if( $author_id == get_current_user_id() ){
        echo '<h1>'.$title.'</h1>
        <h3 class="subtitle">This is a group '.get_the_title($group).'</h3>';
        $options = array(
            'post_id'		=> $group,
            'post_title'    => false,
            'post_content'	=> false,
            'field_groups' => array(738),
            'fields' => array(
                'field_60d08cfeac894'
            ),  
            'submit_value'  => __('Go to your group'),
            'return' => get_the_permalink( $group ),
        );
        acf_form( $options );
}

echo  '<center><a href="'.get_the_permalink( $group ).'">Skip this step</a></center>';

?>