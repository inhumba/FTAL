<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package plant
 */

get_header();?>

<div class="main-header">
	<div class="container">
		<h2 class="main-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

		<nav>
			<ul class="breadcrumb">
				<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">หน้าแรก</a><span>/</span></li>
				<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
			</ul>
		</nav>

	</div>
</div>

<div class="container">

	<div id="primary" class="content-area">
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
</div><!--container-->
<?php get_footer(); ?>
