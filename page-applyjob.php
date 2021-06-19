<?php
/**
 * Template Name: Apply jobs
 * The template for displaying sidebar pages
 *
 */
 get_header(); 
 $idco = $_GET["coid"];
 $companyname = get_the_title($idco);
 $jobid = $_GET["jobid"];
 $jobtitle = get_the_title($jobid);

 $ceoid = get_post_field( 'post_author', $jobid );
 $ceoemail = get_the_author_meta( 'email', $ceoid);


 $thumbnail = get_the_post_thumbnail_url();
$heroImg = '';
if ( $thumbnail ) {
	$heroImg = 'background-image:url('.$thumbnail .')';
}  ?>


	<script>
		$( document ).ready(function() {
    		document.getElementById("companyname").value = "<?php echo $companyname; ?>";
    		document.getElementById("jobtitle").value = "<?php echo $jobtitle; ?>";
    		document.getElementById("adminemail").value = "<?php echo $ceoemail; ?>";

    		document.getElementById("adminemail").style.visibility = "hidden";
    		document.getElementById("jobtitle").style.visibility = "hidden";
    		document.getElementById("companyname").style.visibility = "hidden";
		});
	</script>


<section id="hero-image" style="<?php echo $heroImg; ?>">
 		<div class="hero-cell" >
 			<h1><?php the_title(); ?></h1>
 			<h2><?php the_field('subtitle'); ?></h2>
 		</div>
 	</section>

<div class="container internal-page">
	<div id="primary" class="site-content">
		<?php echo do_shortcode('[contact-form-7 id="609" title="Apply for job"]'); ?>
	</div>
</div>

 <?php get_footer(); ?>