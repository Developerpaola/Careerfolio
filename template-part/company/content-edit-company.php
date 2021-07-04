<?php
if( isset( $_GET['remove'] ) ){
    $author_id = get_post_field( 'post_author',  $_GET['remove'] );
    
    if( $author_id == get_current_user_id() ){
        echo '<h1>Remove '.get_the_title( $_GET['remove'] ).'</h1>
        <h3 class="subtitle">Your Company has been remove</h3>';
        wp_update_post(array( 'ID' =>  $_GET['remove'], 'post_status'   =>  'draft' ));
    }
   

}

 
?>