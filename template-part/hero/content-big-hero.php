<?php
/**
 * Template part for big center hero image
 * @author Jonathan Soto
 * @package foundry
 */
$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'full' ); 
 ?>

<section id="hero-<?php the_ID(); ?>" class="hero bigger" style="background-image:url('<?php echo $url; ?>')">
    <div class="hero-container">
        <div class="container">
            <h1><?php the_title(); ?></h1>
            <div class="line"></div>
            <h3><?php the_excerpt()  ?></h3>
            <a href="" class="read-more">Get started</a>
        </div>
    </div>
</section><!-- hero; ?> -->
