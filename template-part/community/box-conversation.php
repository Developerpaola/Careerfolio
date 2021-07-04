<?php 
$author_id = get_post_field( 'post_author',  get_the_ID() );
$user = get_userdata( $author_id );
?>
<div class="col-12">

    
        <div class="flag-conversation"> 
            <p>By <a href="<?php echo get_author_posts_url( $author_id ); ?>" ><?php echo esc_html( $user->first_name ) . ' ' . esc_html( $user->last_name ); ?></a></p>
            <h3><?php the_title(); ?></h3>
            <p class="excerpt"><?php  echo wp_trim_words(get_the_excerpt(), 40); ?></p>
            <p>35 replies &nbsp;&nbsp;&nbsp;&nbsp; Last activity: <?php echo get_the_modified_time('F jS, Y'); ?></p>
            <a href="<?php echo get_the_permalink(); ?>" class="read-more">Read More</a> 
        </div>
    
</div>