<?php 
get_header(); 

if(!is_front_page()){ // Show Shop title
	$shop_page_id = get_option( 'woocommerce_shop_page_id' ); ?>
	<div class="main-header">
		<div class="container">
			<h2 class="main-title -shop"><a href="<?php echo esc_url( get_permalink( $shop_page_id ) ); ?>"><?php echo get_the_title( $shop_page_id ); ?></a></h2>
		</div>
	</div>
	<div class="main-bc">
		<div class="container">
			<?php woocommerce_breadcrumb(); ?>
		</div>
	</div>
	<?php	
} 
?>

<div class="container -shopbar">
	<div id="primary" class="content-area -shopbar">
		<main id="main" class="site-main">
			<?php 
			if(is_shop() && !(is_search()) && ($GLOBALS['s_shop_pagebuilder'])) { 

				/* Use Shop Page instead of Archive Product */
				$the_query = new WP_Query( array( 'page_id' => $shop_page_id ));
				while ( $the_query->have_posts() ) : $the_query->the_post(); 
				the_content();
				endwhile; 
				edit_post_link(
					sprintf(
						esc_html__( 'Edit %s', 'seed' ),
						the_title( '<span class="screen-reader-text">"', '"</span>', false )
						),
					'<span class="edit-link">',
					'</span>',
					$shop_page_id
					);
				wp_reset_postdata();

			} else {
				woocommerce_content();
				seed_entry_footer();
			}
			?>
		</main><!-- #main -->
	</div><!-- #primary -->
	<?php if($GLOBALS['s_shop_layout'] != 'full-width') get_sidebar('shop'); ?>
</div><!--.container-->
<?php get_footer(); ?>
