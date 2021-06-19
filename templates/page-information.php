<?php
/**
 *  Template Name: Information Page
 *
 * @author Jonathan Soto
 * @package foundry
 */

get_header();
?>

<main role="main" class=" main index-main content-block">
    <?php  get_template_part( 'template-parts/hero/content', 'hero' ); ?> 
    <section class="information-container">
            <?php  get_template_part( 'template-parts/content', 'subscriptions' ); ?> 
    </section>

    
    <?php  get_template_part( 'template-parts/content', 'tab' ); ?>

    <section class="section light big-padding fqa-section">
        <div class="container">
            <h2>Got questions? We have answers.</h2>
            <div class="line"></div>
            <div class="row">
                <div class="col">
                    <h3>Enter popular question headline?</h3>
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.</p>
                </div>
                <div class="col">
                    <h3>Enter popular question headline?</h3>
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.</p>
                
                </div>
                <div class="col">
                    <h3>Enter popular question headline?</h3>
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.</p>
                </div>
            </div>
            <a href="" class="read-more">See all FAQ</a>
        </div>
    </section>

    
    <?php  get_template_part( 'template-parts/content', 'testimonials' ); ?>

</main><!-- #main -->


<?php
get_footer();
