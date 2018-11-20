<?php
/**
 * seed functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package plant
 */


$GLOBALS['s_foot_jquery'] 				= '1';
$GLOBALS['s_blog_layout'] 				= 'rightbar';
$GLOBALS['s_blog_layout_single'] 	= 'rightbar';
$GLOBALS['s_blog_columns'] 			= '1';
$GLOBALS['s_blog_show_profile']		= '0';
$GLOBALS['s_shop_layout'] 				= 'leftbar';
$GLOBALS['s_shop_pagebuilder'] 		= '0';
$GLOBALS['s_fontawesome'] 				= 'disable';
$GLOBALS['s_wp_comments'] 				= 'disable';


if ( ! function_exists( 'seed_setup' ) ) {
	function seed_setup() {
		load_theme_textdomain( 'seed', get_template_directory() . '/languages' );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'custom-logo', array(
			'width'       => 200,
			'height'      => 100,
			'flex-width'  => true,
			'flex-height' => true,
		) );
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 800, 600, TRUE );
		register_nav_menus( array(
			'primary' => esc_html__( 'Main Menu', 'seed' ),
			'mobile' => esc_html__( 'Mobile Menu', 'seed' ),
		) );
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );
	}
}
add_action( 'after_setup_theme', 'seed_setup' );
function seed_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'seed_content_width', 840 );
}
add_action( 'after_setup_theme', 'seed_content_width', 0 );

// function seed_theme_updater() {
// 	require( get_template_directory() . '/vendor/seedthemes/updater/theme-updater.php' );
// }
// add_action( 'after_setup_theme', 'seed_theme_updater' );

/**
 * Register widget area.
 */
function seed_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Right Sidebar', 'seed' ),
		'id'            => 'rightbar',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Home Banner', 'seed' ),
		'id'            => 'home_banner',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	
}
add_action( 'widgets_init', 'seed_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function seed_scripts() {

	if($GLOBALS['s_foot_jquery'] == '1') {
		wp_deregister_script( 'jquery' );
		wp_register_script( 'jquery', includes_url( '/js/jquery/jquery.js' ), false, NULL, true );
		wp_enqueue_script( 'jquery' );
	}
	
	
	wp_enqueue_script( 'seed-main', get_template_directory_uri() . '/js/main.min.js', array('jquery'), '2018-1', true );
	// wp_enqueue_script( 'magnific', get_template_directory_uri() . '/vendor/magnific-popup/jquery.magnific-popup.min.js', array('jquery'), '1.1.0', true );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'seed_scripts' );


function seed_styles_footer() {
	wp_enqueue_style( 'seed-min', get_template_directory_uri() . '/css/style.min.css' );
	// wp_enqueue_style( 'magnific', get_template_directory_uri() . '/vendor/magnific-popup/magnific-popup.css' );
	wp_enqueue_style( 'seed-style', get_stylesheet_uri() );
};
add_action( 'get_footer', 'seed_styles_footer' );

/**
 * Registers an editor stylesheet for the theme.
 */
function seed_add_editor_styles() {
	add_editor_style( get_template_directory_uri() . '/css/wp-editor-style.css' );
}
add_action( 'admin_init', 'seed_add_editor_styles' );


/**
 * WooCommerce
 */
function seed_woo_setup() {
	add_theme_support( 'woocommerce' );
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
}
add_action( 'after_setup_theme', 'seed_woo_setup' );

/* Custom Breadcrumb delimiter */
add_filter( 'woocommerce_breadcrumb_defaults', 'seed_change_breadcrumb_delimiter' );
function seed_change_breadcrumb_delimiter( $defaults ) {
	$defaults['delimiter'] = '<i class="si-angle-right"></i>';
	return $defaults;
}


/* Custom Thai Province Order */
if (get_locale() == 'th') {
	add_filter( 'woocommerce_states', 'seed_woocommerce_states' );
}
function seed_woocommerce_states( $states ) {
	$states['TH'] = array(
		'TH-81' => 'กระบี่',
		'TH-10' => 'กรุงเทพมหานคร',
		'TH-71' => 'กาญจนบุรี',
		'TH-46' => 'กาฬสินธุ์',
		'TH-62' => 'กำแพงเพชร',
		'TH-40' => 'ขอนแก่น',
		'TH-22' => 'จันทบุรี',
		'TH-24' => 'ฉะเชิงเทรา',
		'TH-20' => 'ชลบุรี',
		'TH-18' => 'ชัยนาท',
		'TH-36' => 'ชัยภูมิ',
		'TH-86' => 'ชุมพร',
		'TH-57' => 'เชียงราย',
		'TH-50' => 'เชียงใหม่',
		'TH-92' => 'ตรัง',
		'TH-23' => 'ตราด',
		'TH-63' => 'ตาก',
		'TH-26' => 'นครนายก',
		'TH-73' => 'นครปฐม',
		'TH-48' => 'นครพนม',
		'TH-30' => 'นครราชสีมา',
		'TH-80' => 'นครศรีธรรมราช',
		'TH-60' => 'นครสวรรค์',
		'TH-12' => 'นนทบุรี',
		'TH-96' => 'นราธิวาส',
		'TH-55' => 'น่าน',
		'TH-38' => 'บึงกาฬ',
		'TH-31' => 'บุรีรัมย์',
		'TH-13' => 'ปทุมธานี',
		'TH-77' => 'ประจวบคีรีขันธ์',
		'TH-25' => 'ปราจีนบุรี',
		'TH-94' => 'ปัตตานี',
		'TH-14' => 'พระนครศรีอยุธยา',
		'TH-56' => 'พะเยา',
		'TH-82' => 'พังงา',
		'TH-93' => 'พัทลุง',
		'TH-66' => 'พิจิตร',
		'TH-65' => 'พิษณุโลก',
		'TH-76' => 'เพชรบุรี',
		'TH-67' => 'เพชรบูรณ์',
		'TH-54' => 'แพร่',
		'TH-83' => 'ภูเก็ต',
		'TH-44' => 'มหาสารคาม',
		'TH-49' => 'มุกดาหาร',
		'TH-58' => 'แม่ฮ่องสอน',
		'TH-35' => 'ยโสธร',
		'TH-95' => 'ยะลา',
		'TH-45' => 'ร้อยเอ็ด',
		'TH-85' => 'ระนอง',
		'TH-21' => 'ระยอง',
		'TH-70' => 'ราชบุรี',
		'TH-16' => 'ลพบุรี',
		'TH-52' => 'ลำปาง',
		'TH-51' => 'ลำพูน',
		'TH-42' => 'เลย',
		'TH-33' => 'ศรีสะเกษ',
		'TH-47' => 'สกลนคร',
		'TH-90' => 'สงขลา',
		'TH-91' => 'สตูล',
		'TH-11' => 'สมุทรปราการ',
		'TH-75' => 'สมุทรสงคราม',
		'TH-74' => 'สมุทรสาคร',
		'TH-27' => 'สระแก้ว',
		'TH-19' => 'สระบุรี',
		'TH-17' => 'สิงห์บุรี',
		'TH-64' => 'สุโขทัย',
		'TH-72' => 'สุพรรณบุรี',
		'TH-84' => 'สุราษฎร์ธานี',
		'TH-32' => 'สุรินทร์',
		'TH-43' => 'หนองคาย',
		'TH-39' => 'หนองบัวลำภู',
		'TH-15' => 'อ่างทอง',
		'TH-37' => 'อำนาจเจริญ',
		'TH-41' => 'อุดรธานี',
		'TH-53' => 'อุตรดิตถ์',
		'TH-61' => 'อุทัยธานี',
		'TH-34' => 'อุบลราชธานี'
	);
	return $states;
}

/* Facebook Login */
add_action('woocommerce_login_form_end', 'add_fbl_form'); 
// add_action('woocommerce_register_form_end', 'add_fbl_form'); 
function add_fbl_form(){
	do_action( 'facebook_login_button' );
};

/**
 * Admin CSS
 */
function seed_admin_style() {
	wp_enqueue_style('seed-admin-style', get_template_directory_uri() . '/css/wp-admin.css');
}
add_action('admin_enqueue_scripts', 'seed_admin_style');


/**
 * Remove references to SiteOrigin Premium
 */
add_filter( 'siteorigin_premium_upgrade_teaser', '__return_false' );


/**
 * Remove "Category: ", "Tag: ", "Taxonomy: " from archive title
 */
add_filter( 'get_the_archive_title', 'seed_get_the_archive_title');
function seed_get_the_archive_title($title) {
	if ( is_category() ) {
		$title = single_cat_title( '', false );
	} elseif ( is_tag() ) {
		$title = single_tag_title( '', false );
	} elseif ( is_post_type_archive() ) {
		$title = post_type_archive_title( '', false );
	} elseif ( is_author() ) {
		$title = '<span class="vcard">' . get_the_author() . '</span>' ;
	} elseif ( is_tax() ) {
		$title = single_term_title( '', false ) ;
	}
	return $title;
}

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) { require get_template_directory() . '/inc/jetpack.php'; }

/* ADD GTM TO HEAD AND BELOW OPENING BODY */
// add_action('wp_head', 'google_tag_manager_head', 20);
function google_tag_manager_head() {
	echo "
	<!-- Google Tag Manager -->
	<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
	new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
	j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
	'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
	})(window,document,'script','dataLayer','GTM-5PG9QBM');</script>
	<!-- End Google Tag Manager -->";
}

// add_action( 'wp_after_body', 'google_tag_manager_body' );
function wp_after_body() {  
	do_action('wp_after_body');
}
function google_tag_manager_body() {
	echo '
	<!-- Google Tag Manager (noscript) -->
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5PG9QBM"
	height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<!-- End Google Tag Manager (noscript) -->';
}


// Loop
function custom_query_shortcode($atts) {

   // EXAMPLE USAGE:
   // [loop the_query="showposts=100&post_type=page&post_parent=453"]
   
   // Defaults
	extract(shortcode_atts(array(
		"the_query" => ''
	), $atts));

	// de-funkify query
	// $the_query = preg_replace('~&#x0*([0-9a-f]+);~ei', 'chr(hexdec("\\1"))', $the_query);
	// $the_query = preg_replace('~&#0*([0-9]+);~e', 'chr(\\1)', $the_query);

	// query is made
	$the_query = new WP_Query($the_query);          
	// query_posts($the_query);
   
	// the loop
	if ( $the_query->have_posts() ) : ?>
		<div class="shortcode-content">
		<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
		<div class="car-card">
			<div class="car-pic">
			<?php if( has_post_thumbnail() ) { ?>
				<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark"><?php the_post_thumbnail(); ?></a>
			<?php } else { ?>
				<img src="<?php echo esc_url( get_template_directory_uri()); ?>/img/thumb.jpg" alt="<?php get_the_title(); ?>">
			<?php } ?>
			</div>
			<div class="car-info">
			<?php if( get_field('brand') ): ?>
				<h2 class="car-title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark"><?php the_field('brand'); ?> <?php the_field('modal'); ?><br><?php the_field('sub_modal'); ?></a></h2>
			<?php endif; ?>
			<?php if( get_field('year') ): ?>
				<h3 class="car-year">ปี <?php the_field('year'); ?></h3>
			<?php endif; ?>
			<?php if( get_field('gear') ): ?>
				<h3 class="car-engine">เกียร์<?php the_field('gear'); ?> เครื่อง <?php the_field('engine'); ?></h3>
			<?php endif; ?>
			<?php if( get_field('price') ): ?>
				<div class="car-price">฿ <?php the_field('price'); ?></div>
			<?php endif; ?>
			<a class="car-button" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark">ดูรายละเอียด</a>
			</div>
		</div>
          
	<?php endwhile; ?>

	</div>

	<?php else:

		$output .= "nothing found.";
      
	endif;

	wp_reset_query();

	return $output;
}
add_shortcode('loop', 'custom_query_shortcode');

