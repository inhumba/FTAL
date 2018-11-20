<?php
/**
 * The template for single truck posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package plant
 */

get_header(); ?>
<div class="main-header">
	<div class="container">
		<h2 class="main-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
	</div>
</div>
<div class="container">
	<div id="primary" class="content-area <?php echo '-'.$GLOBALS['s_blog_layout_single']; ?>">
		<main id="main" class="site-main -hide-title">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'template-parts/content-truck', get_post_type() ); ?>


			<?php //the_post_navigation(); ?>

			<?php
				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
			?>

		<?php endwhile; // End of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php 
	switch ($GLOBALS['s_blog_layout_single']) {
		case 'rightbar':
			get_sidebar('right'); 
			break;
		case 'leftbar':
			get_sidebar('left'); 
			break;
		case 'full-width':
			break;
		default:
			break;
	}
	?>
</div><!--container-->
<?php get_footer(); ?>
