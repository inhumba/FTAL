<?php
/**
 * Loop Name: Car Content Post Detail
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('content-car'); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

		<?php if ( 'post' === get_post_type() ) : ?>
			<div class="entry-meta">
				<?php seed_posted_on(); ?>
			</div>
		<?php endif; ?>
	</header>

	<div class="entry-content">
		<div class="seed-grid-2">
			<div class="seed-col">
				<div class="car-pics">
					<div class="_big">
						<?php
							if( has_post_thumbnail() ) {
								echo '<a data-elementor-lightbox-slideshow="' . get_the_ID() . '" href="' . esc_url(get_the_post_thumbnail_url()) . '">';
								the_post_thumbnail();
								echo '</a>';
							} else {
								echo '<img src="' . esc_url( get_template_directory_uri()) .'/img/thumb.jpg" alt="'. get_the_title() .'" />';
							}
						?>
					</div>
					<div class="_small">
					<?php
						$images = get_field('pics');
						$size_small = 'thumbnail';
						$size_full = 'full';
						if( $images ): ?>
							<ul>
								<?php foreach( $images as $image ): ?>
								<li>
									<a data-elementor-lightbox-slideshow="<?php the_ID(); ?>" href="<?php echo $image['url']; ?>"><?php echo wp_get_attachment_image( $image['ID'], $size_small ); ?></a>
								</li>
								<?php endforeach; ?>
							</ul>
					<?php endif; ?>
					</div>
				</div>
			</div>
			<div class="seed-col">
				<div class="car-info">
					<?php if( get_field('brand') ): ?>
						<h2 class="car-title"><?php the_field('brand'); ?> <?php the_field('modal'); ?> <?php the_field('sub_modal'); ?></h2>
					<?php endif; ?>
					<?php if( get_field('year') ): ?>
						<h3 class="car-year">ปี <?php the_field('year'); ?> <?php if( get_field('color') ): ?>สี<?php the_field('color'); ?><?php endif; ?> <?php if( get_field('plate') ): ?>ทะเบียน <?php the_field('plate'); ?><?php endif; ?></h3>
					<?php endif; ?>
					<?php if( get_field('gear') ): ?>
						<h3 class="car-engine">เกียร์<?php the_field('gear'); ?> <?php if( get_field('engine') ): ?>เครื่อง <?php the_field('engine'); ?><?php endif; ?></h3>
					<?php endif; ?>
					<?php if( get_field('fuel') ): ?>
						<h3 class="car-fuel">เชื้อเพลิง <?php the_field('fuel'); ?></h3>
					<?php endif; ?>
					
					<?php if( get_field('price') ): ?>
						<div class="car-price">฿ <?php the_field('price'); ?></div>
					<?php endif; ?>
					<div class="car-content">
						<?php the_content(); ?>
					</div>
				</div>
			</div>
		</div>
	</div>

	<footer class="entry-footer">
		<?php seed_entry_footer(); ?>
	</footer>
</article>