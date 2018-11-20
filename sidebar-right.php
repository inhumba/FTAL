<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package plant
 */

if ( ! is_active_sidebar( 'rightbar' ) ) {
	return;
}
?>

<aside id="rightbar" class="widget-area -rightbar">
	<?php dynamic_sidebar( 'rightbar' ); ?>
</aside><!-- #secondary -->
