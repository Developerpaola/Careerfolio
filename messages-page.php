<?php
/**
 * Template Name: Message page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

acf_form_head();
get_header();
?>

    <section id="primary" class="content-area container">
        <main id="main" class="site-main">

            <?php

            /* Start the Loop */
            while ( have_posts() ) :
                the_post();

                get_template_part( 'template-parts/content/content', 'page' );

                // If comments are open or we have at least one comment, load up the comment template.
                if ( comments_open() || get_comments_number() ) {
                    comments_template();
                }

            endwhile; // End of the loop.
            ?>

            <?php
                $fields = array(
                    'field_5f0cc6c803b9b',  // destination user
                    'field_5f0cd771ac401',
                    
                );
                acf_register_form(array(
                    'id'                => 'messages',
                    'post_id'           => 'new_post',
                    'new_post'          => array(
                        'post_type'     => 'recipe',
                        'post_status'   => 'publish'
                    ),
                    'post_title'        => true,
                    'post_content'      => true,
                    'uploader'          => 'basic',
                    'return'            => home_url('thank-your-for-submitting-your-recipe'),
                    'fields'                => $fields,
                    'submit_value'      => 'Send message'
                ));
                // Load the form
                acf_form('messages');
            ?>

        </main><!-- #main -->
    </section><!-- #primary -->

<?php
get_footer();