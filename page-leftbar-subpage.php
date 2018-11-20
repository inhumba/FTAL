<?php 
/**
 * Template Name: Left Sidebar (Sub Page)
 */
get_header(); 
global $post;
$parents = get_post_ancestors( $post->ID );
$root_id = ($parents) ? $parents[count($parents)-1]: $post->ID;
?>

<div class="main-header">
	<div class="container">
		<h2 class="main-title">
			<a href="<?php echo get_permalink($root_id); ?>"><?php echo get_the_title($root_id); ?></a></h2>
	</div>
</div>

<div class="container -leftbar">

	<div id="primary" class="content-area -leftbar">
		<main id="main" class="site-main">

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
</div><!--container-->
<?php get_footer(); ?>
