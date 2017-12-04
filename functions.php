<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

// BEGIN ENQUEUE PARENT ACTION
// AUTO GENERATED - Do not modify or remove comment markers above or below:
include_once('inc/script-styles.php');
        
if ( !function_exists( 'chld_thm_cfg_parent_css' ) ):
    function chld_thm_cfg_parent_css() {
        wp_enqueue_style( 'chld_thm_cfg_parent', trailingslashit( get_template_directory_uri() ) . 'style.css' );
    }
endif;
add_action( 'wp_enqueue_scripts', 'chld_thm_cfg_parent_css' );


/**
* Enqueue the plugins JS and CSS files
*/
add_action( 'init', 'register_admin_trail_story_scripts' );

function register_admin_trail_story_scripts() {
    wp_register_script( 'ezd_js', '/wp-content/themes/ez-depositslip/inc/ezd.js', array('jquery'));
    wp_register_style( 'ezd_css', '/wp-content/themes/ez-depositslip/inc/ezd.css');
    wp_enqueue_script( 'ezd_js' );
    wp_enqueue_style( 'ezd_css' );
}

add_action( 'wp_enqueue_scripts', 'setup_pad_modules_scripts' );

function setup_pad_modules_scripts() {

	//wp_enqueue_script( 'jquery' );
	//wp_enqueue_script( 'jquery-ui-core' );

	wp_register_script( 'flex_js', '/wp-content/themes/ez-depositslip/inc/jquery.flexslider.js', array('jquery'));
	wp_register_script( 'flex_min_js', '/wp-content/themes/ez-depositslip/inc/jquery.flexslider-min.js', array('jquery'));
	wp_register_style( 'flex_css', '/wp-content/themes/ez-depositslip/inc/flexslider.css');

	wp_enqueue_script( 'flex_js' );
	//wp_enqueue_script( 'flex_min_js' );
	wp_enqueue_style( 'flex_css' ); ?>
	
	<?php
}

add_shortcode( 'tagline_slider', 'display_tagline_slider' );

function display_tagline_slider() {
	
	return '<div class="main flexslider">'.
  		'<ul class="slides">'.
  		'<li>Making money is hard enough, deposits should be EZ!</li>'.
  		'<li>Are you one of the millions of businesses that accepts checks but still hand write your deposit slips?</li>'.
		'</ul>'.
	'</div>';
}

add_shortcode( 'tagline_slider_reverse', 'display_tagline_reverse_slider' );

function display_tagline_reverse_slider() {
	
	return '<div class="flexslider">'.
  		'<ul class="slides">'.
  		'<li>Are you one of the millions of businesses that accepts checks but still hand write your deposit slips?</li>'.
  		'<li>Making money is hard enough, deposits should be EZ!</li>'.
		'</ul>'.
	'</div>';
}

add_shortcode( 'tagline_testimonial_slider', 'dipslay_testimoniail_tagline' );

function dipslay_testimoniail_tagline() {

	$slide = "<div class='test-slider flexslider'>".
			'<ul class="slides">';
		  		
	$args = array(
	'posts_per_page'   => -1,
	'post_type'        => 'jetpack-testimonial',
	'suppress_filters' => true);


	$posts_array = get_posts( $args );

	foreach ($posts_array as $post) {
		setup_postdata($post);
		$title = sanitize_text_field($post->post_title);
		$text = sanitize_text_field($post->post_content);
		$ex = $post->post_excerpt;
		$link = get_permalink($post);
		$excerpt = substr($text, 0,350);
		$link_str = '...&nbsp;<a style="color:#0089E8;" href='.$link.'>Read More&nbsp;&raquo;</a>';
		$slide .= '<li><a href='.$link.'><h6>'.$title.'</h6></a><p>'.$excerpt.$link_str.'</li>';

	}
	$slide .= '</ul></div>';

	wp_reset_postdata();

	return $slide;

}

/**
* Adding ACF options page
*/
if( function_exists('acf_add_options_page') ) {
	acf_add_options_page();
}