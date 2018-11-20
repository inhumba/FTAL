<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600" rel="stylesheet">
	<style><?php  echo (file_get_contents( get_template_directory_uri() . '/css/critical.min.css' ));  ?></style>
	<?php wp_head(); ?>
</head>

<?php $bodyClass = ''; if (is_active_sidebar( 'headbar' )) { $bodyClass = 'has-headbar'; } ?>

<body <?php body_class($bodyClass); ?>>
	<?php wp_after_body(); ?>
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'seed' ); ?></a>
	<div id="page" class="site">
		
		<header id="masthead" class="site-header _heading">
			
			<div class="container-fluid">
				
				<div class="site-branding">
					<div class="site-logo"><?php if(function_exists('the_custom_logo')) {the_custom_logo();} ?></div>
					<?php if ( is_front_page() && is_home() ) : ?>
						<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<?php else : ?>
						<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
					<?php endif; ?>

					<?php 
					$description = get_bloginfo( 'description', 'display' ); 
					if ( $description || is_customize_preview() ) : ?><p class="site-description"><?php echo $description; ?></p><?php endif; ?>
				</div>

				<a class="site-toggle _mobile">
					<i><span></span><span></span><span></span><span></span></i><b>MENU</b>
				</a>

				<?php if ($bodyClass == 'has-headbar'): ?>
					<div id="headbar" class="_desktop"><?php dynamic_sidebar( 'headbar' ); ?></div>
				<?php else: ?>
					<div class="site-top-right _desktop"><?php dynamic_sidebar( 'top-right' ); ?></div>
					<nav id="site-nav-d" class="site-nav-d _desktop">
						<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
					</nav>
				<?php endif; ?>

			</div>
			<nav id="site-nav-m" class="site-nav-m _mobile">
				<div class="container">
					<?php wp_nav_menu( array( 'theme_location' => 'mobile', 'menu_id' => 'mobile-menu' ) ); ?>
				</div>
			</nav>
		</header>

		
		<div class="site-header-space"></div>
		<?php 
		if (is_front_page()) {
			if (is_active_sidebar( 'home_banner' )) {
				echo '<div class="home-banner">'; dynamic_sidebar( 'home_banner' ); echo '</div>';
			} 
		} else {
			if (is_active_sidebar( 'page_banner' )) {
				echo '<div class="page-banner">'; dynamic_sidebar( 'page_banner' ); echo '</div>';
			}
		}
		?>
		<div id="content" class="site-content">