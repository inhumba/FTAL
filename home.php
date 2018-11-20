<?php get_header(); ?>

<main id="main" class="site-main">

	<div class="home-blog-space"></div>
	<div class="container">
		<div id="primary" class="content-area <?php echo '-'.$GLOBALS['s_blog_layout']; ?>">
			<main id="main" class="site-main">
				
				<?php 
				if ((int)$GLOBALS['s_blog_columns'] > 1) {
					echo '<div class="seed-grid-'.$GLOBALS['s_blog_columns'].'">';
					while ( have_posts() ) : the_post();
					get_template_part( 'template-parts/content','card-excerpt');
					endwhile; 
					echo '</div>';
				} else {
					while ( have_posts() ) : the_post();
					get_template_part( 'template-parts/content');
					endwhile; 
				}
				?>
				<?php seed_posts_navigation(); ?>
				
			</main>
		</div><!--primary-->
		<?php 
		switch ($GLOBALS['s_blog_layout']) {
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

</main><!--.site-main-->

<?php get_footer(); ?>