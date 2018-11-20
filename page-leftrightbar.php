<?php 
/**
 * Template Name: Left & Right Sidebar
 */
get_header(); ?>

<div class="main-header">
	<div class="container">
		<h2 class="main-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
	</div>
</div>

<div class="container">
	<div class="wrap-leftrightbar">
		<div id="primary" class="content-area -leftrightbar">
			<main id="main" class="site-main -hide-title">
				<?php while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'template-parts/content', 'page' ); ?>
					<?php
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
					?>
				<?php endwhile; // End of the loop. ?>
			</main><!-- #main -->
		</div><!-- #primary -->
		<?php get_sidebar('left'); ?>
		<?php get_sidebar('right'); ?>
	</div>
</div><!--container-->
<?php get_footer(); ?>