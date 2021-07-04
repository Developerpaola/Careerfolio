<?php if( is_user_logged_in()  ){ ?>
    <a href="<?php echo get_the_permalink(835); ?>" class="read-more">Create a group +</a>
    <a href="<?php echo get_the_permalink(711); ?>" class="btn-style-roundbox">Discover groups &#x279E;</a>
<?php } ?>

<?php 
    if( isset( $_GET['information'] ) ){
        $authorID = $_GET['information'];

    }else{
        $authorID = get_current_user_id();
    }
?>



<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
  <li class="nav-item" role="presentation">
    <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-admin" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Admin</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-member" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Member</button>
  </li>
  
</ul>

<div class="tab-content" id="pills-tabContent">
  <div class="tab-pane fade show active" id="pills-admin" role="tabpanel" aria-labelledby="pills-home-tab">
    <?php echo do_shortcode('[list_groups authorinfo='.$authorID.']'); ?>
  </div>
  <div class="tab-pane fade" id="pills-member" role="tabpanel" aria-labelledby="pills-profile-tab">...</div>
</div>