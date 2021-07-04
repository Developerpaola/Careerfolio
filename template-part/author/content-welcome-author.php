<?php
 $user = get_user_by('id', get_current_user_id() );

 echo '<h1>Welcome '.$user->first_name . ' ' . $user->last_name.'<br>Start building your profile.</h1>
 <h3 class="subtitle">'.get_field('subtitle').'</h3>';

 acf_form(array(
    'post_id'       => 'user_'.get_current_user_id(),
    'field_groups' => array('group_5e97370d63dd1'),
    'post_title'    => false,
    'post_content'  => false,
    'submit_value'  => __('Edit my profile')
));

?>