<?php
/**
 * Template part for big center hero image
 * @author Jonathan Soto
 * @package foundry
 */
 ?>

<section id="hero-<?php the_ID(); ?>" class="hero simple-page" >
    <div class="container">
            <h1><?php the_title(); ?></h1>
            <h2><?php the_field('subtitle'); ?></h2>
    </div>
</section><!-- hero; ?> -->

