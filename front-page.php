<?php
/**
 * The template for index,php
 *
 */

 get_header(); ?>

	<div id="primary" class="site-content">
		<div id="content" role="main" class="container">


			<section class="hero-home">
				<div class="row align-items-center">
					<div class="col-1"></div>
					<div class="col">
						<h1><?php the_title(); ?></h1>
						<p><?php the_field( 'subtitle' ); ?></p>
						<a href="" class="read-more">Create a free account today</a>
					</div>
					<div class="col-1"></div>
					<div class="col">
						<img src="<?php echo get_template_directory_uri(); ?>/dist/images/images/hero-placeholder-careerfolio.png" alt="Careerfolio" />
					</div>
					<div class="col-1"></div>
				</div>
			</section>


			


		</div><!-- #content -->

	<section class="flag-quick quick-back">
		<div class="container">
				<h2>At a quick glance…</h2>
				<div class="row  align-items-center">
					<div class="col">
						<h3><?php the_field( 'section_1' ); ?></h3>
						<p><?php the_field( 'section_info_1' ); ?></p>
					</div>
					<div class="col">
						<h3><?php the_field( 'section_2' ); ?></h3>
						<p><?php the_field( 'section_info_2' ); ?></p>
					</div>
					<div class="col">
						<h3><?php the_field( 'section_3' ); ?></h3>
						<p><?php the_field( 'section_info_3' ); ?></p>
					</div>
				</div>
		</div>
	</section>




	<section class="more-info">

		<?php
		if( have_rows('information') ):
			while( have_rows('information') ) : the_row(); 
				if( get_row_index() % 2 == 0 ){
					$odd = "order-last";
				} else{
					$odd = "";
				}
			
			
		?>
			<div class="info-row">
				<div class="container">
					<div class="row align-items-center">
						<div class="col <?php echo $odd; ?>">
							<h3><?php the_sub_field( 'title' ); ?></h3>
							<?php the_sub_field( 'column' ); ?>
							<?php 
							$link = get_sub_field('explore');
							if( $link ): 
								$link_url = $link['url'];
								$link_title = $link['title'];
								$link_target = $link['target'] ? $link['target'] : '_self';
								?>
								<a class="read-more" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
							<?php endif; ?>
						</div>
						<div class="col">
						<?php 
							$img = get_sub_field('image');
							if( $img ): 
								echo '<img src="'.$img.'" alt="'.get_sub_field( 'title' ).'" />';
							endif; 
						?>
						</div>
					</div>
				</div>
			</div>

		<?php
			endwhile;
		endif;
		?>


		
	</section>




	<section class="flag-quick">
		<div class="container">
			<a href="" class="read-more">Create a free account today</a>
		</div>
	</section>


	<?php  get_template_part( 'template-part/content', 'testimonials' ); ?>

</div><!-- #primary -->

<?php get_footer(); ?>