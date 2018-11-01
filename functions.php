<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// BEGIN ENQUEUE PARENT ACTION
// AUTO GENERATED - Do not modify or remove comment markers above or below:
include_once( 'inc/script-styles.php' );


if ( ! function_exists( 'chld_thm_cfg_parent_css' ) ) :
	/**
	 *
	 */
	function chld_thm_cfg_parent_css() {
		wp_enqueue_style( 'chld_thm_cfg_parent', trailingslashit( get_template_directory_uri() ) . 'style.css' );
	}
endif;
add_action( 'wp_enqueue_scripts', 'chld_thm_cfg_parent_css' );


/**
 * Enqueue the plugins JS and CSS files
 */
add_action( 'init', 'register_admin_trail_story_scripts' );

/**
 *
 */
function register_admin_trail_story_scripts() {
	wp_register_script( 'ezd_js', '/wp-content/themes/ez-depositslip/inc/ezd.js', [ 'jquery' ] );
	wp_register_style( 'ezd_css', '/wp-content/themes/ez-depositslip/inc/ezd.css' );
	wp_enqueue_script( 'ezd_js' );
	wp_enqueue_style( 'ezd_css' );
}

add_action( 'wp_enqueue_scripts', 'setup_pad_modules_scripts' );

/**
 *
 */
function setup_pad_modules_scripts() {

	//wp_enqueue_script( 'jquery' );
	//wp_enqueue_script( 'jquery-ui-core' );

	wp_register_script( 'flex_js', '/wp-content/themes/ez-depositslip/inc/jquery.flexslider.js', [ 'jquery' ] );
	wp_register_script( 'flex_min_js', '/wp-content/themes/ez-depositslip/inc/jquery.flexslider-min.js', [ 'jquery' ] );
	wp_register_style( 'flex_css', '/wp-content/themes/ez-depositslip/inc/flexslider.css' );

	wp_enqueue_script( 'flex_js' );
	//wp_enqueue_script( 'flex_min_js' );
	wp_enqueue_style( 'flex_css' ); ?>

	<?php
}

/*add_shortcode( 'tagline_slider', 'display_tagline_slider' );

function display_tagline_slider() {

    return '<div class="main flexslider">'.
        '<ul class="slides">'.
        '<li>Let us keep you up-to -date with the #1 RBRVS solution on the market!</li>'.
        '<li>Since 1998, RBRVS EZ-Fees has helped thousands of health care professionals simplify the Medicare payment formula.</li>'.
        '</ul>'.
    '</div>';
}

add_shortcode( 'tagline_slider_reverse', 'display_tagline_reverse_slider' );

function display_tagline_reverse_slider() {

    return '<div class="flexslider">'.
        '<ul class="slides">'.
        '<li>Since 1998, RBRVS EZ-Fees has helped thousands of health care professionals simplify the Medicare payment formula.</li>'.
        '<li>Let us keep you up-to -date with the #1 RBRVS solution on the market!</li>'.
        '</ul>'.
    '</div>';
}*/

add_shortcode( 'main_message', 'display_panes' );
function display_main_message2() {

	return 'hi';
}

/**
 * @return string
 */
function display_panes() {

	$slides = [];

	if ( have_rows( 'panes', 'options' ) ) {
		while ( have_rows( 'panes', 'options' ) ) :
			the_row();

			// Your loop code
			$active     = get_sub_field( 'active' );

			$text     = get_sub_field( 'text' );
			$slides[] = $text;
		endwhile;
	}


	if ( $slides ) {

		$slide_text = "";
		$i = 0;

		foreach ( $slides as $slid ) {

			# code...
			$t          = '' . $slid;
			$slide_text = '<li>' . $slid . '</li>';
		}
	}


	return '<div class="main flexslider">' . '<ul class="slides">' . '' . $slide_text . '' . '</ul>' . '</div>';
}
/**
 * @return string
 */
function display_main_message() {

	$slides = [];

	if ( have_rows( 'messages', 'options' ) ) {
		while ( have_rows( 'messages', 'options' ) ) :
			//the_row();

			$active     = get_sub_field( 'active' );
			$text       = get_sub_field( 'text' );
			$slide_text = "";
			$slid       = "";
			$esc        = false;


//			if ( $active === true && $esc === false) {
//				$slide_text .= '<li>' . $slid . '</li>';
//				$slides[] = $text;
//				$esc = true;
//			}
			if ( $active === true ) {
				$slides[] = $text;

			}
		endwhile;
	}


	if ( $slides !== null ) {

		foreach ( $slides as $slide ) {

			$slide_text .= '<li>' . $slide . '</li>';

		}
	}

	$html = '<div class="main flexslider">' . '<ul class="slides">' . '' . $slide_text . '' . '</ul>' . '</div>';

	return '';
}


add_shortcode( 'tagline_slider', 'display_tagline_slider_2' );

/**
 * @return string
 */
function display_tagline_slider_2() {

	$slides = [];

	if ( have_rows( 'slides', 'options' ) ) {
		while ( have_rows( 'slides', 'options' ) ) :
			the_row();

			// Your loop code
			$text = get_sub_field( 'text' );
			array_push( $slides, $text );
		endwhile;
	}


	if ( $slides ) {
		//$slides = array_reverse($slides);

		$slide_text = "";

		foreach ( $slides as $slid ) {
			# code...
			$t          = '' . $slid;
			$slide_text .= '<li>' . $slid . '</li>';
		}
	}

	if ( get_field( 'styles', 'options' ) ) {
		$styles = get_field( 'styles', 'options' );
	}

	return '<style>' . $styles . '</style>' .

	       '<div class="main flexslider">' . '<ul class="slides">' . '' . $slide_text . '' . '</ul>' . '</div>';
}

add_shortcode( 'tagline_slider_reverse', 'display_tagline_reverse_slider' );


/**
 * @return string
 */
function display_tagline_reverse_slider() {

	$slides = [];

	if ( have_rows( 'slides', 'options' ) ) {
		while ( have_rows( 'slides', 'options' ) ) :
			the_row();

			// Your loop code
			$text     = get_sub_field( 'text' );
			$slides[] = $text;
		endwhile;
	}


	if ( $slides ) {
		$slides = array_reverse( $slides );

		$slide_text = "";

		foreach ( $slides as $slid ) {
			# code...
			$t          = '' . $slid;
			$slide_text .= '<li>' . $slid . '</li>';
		}
	}


	return '<div class="main flexslider">' . '<ul class="slides">' . '' . $slide_text . '' . '</ul>' . '</div>';
}

add_shortcode( 'tagline_testimonial_slider', 'dipslay_testimoniail_tagline' );

/**
 * @return string
 */
function dipslay_testimoniail_tagline() {

	$slide = "<div class='test-slider flexslider'>" . '<ul class="slides">';

	$args = [
		'posts_per_page'   => - 1,
		'post_type'        => 'jetpack-testimonial',
		'suppress_filters' => true,
	];


	$posts_array = get_posts( $args );

	foreach ( $posts_array as $post ) {
		setup_postdata( $post );
		$title    = sanitize_text_field( $post->post_title );
		$text     = sanitize_text_field( $post->post_content );
		$ex       = $post->post_excerpt;
		$link     = get_permalink( $post );
		$excerpt  = substr( $text, 0, 350 );
		$link_str = '...&nbsp;<a style="color:#0089E8;" href=' . $link . '>Read More&nbsp;&raquo;</a>';
		$slide    .= '<li><a href=' . $link . '><h6>' . $title . '</h6></a><p>' . $excerpt . $link_str . '</li>';
	}
	$slide .= '</ul></div>';

	wp_reset_postdata();

	return $slide;
}

/**
 * Adding ACF options page
 */
if ( function_exists( 'acf_add_options_page' ) ) {
	acf_add_options_page();
}
