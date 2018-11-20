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

	$args = [ 'url' => site_url(), 'user' => get_current_user_id() ];

	wp_register_script( 'ezd_js', '/wp-content/themes/ez-depositslip/inc/ezd.js', [ 'jquery' ] );
	wp_register_style( 'ezd_css', '/wp-content/themes/ez-depositslip/inc/ezd.css' );
	wp_enqueue_script( 'ezd_js' );
	wp_enqueue_style( 'ezd_css' );
	wp_localize_script( 'ezd_js', 'ezd', $args );
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

//
//add_action( 'admin_notices',  'notice' );
add_action( 'save_post', 'cache_notify', 10, 3 );
//add_action( 'activated_plugin', 'cache_notify');
//add_action( 'switch_theme', 'cache_notify');
//add_action( 'activated_plugin', 'cache_notify');
//add_action( 'deactivated_plugin', 'cache_notify');
//add_action( 'updated_option', 'cache_notify');
//add_action( 'media_upload_file', 'cache_notify');
//add_action( 'deleted_option', 'cache_notify');


function cache_notify( $post_id, $post ) {

	$new   = get_post( $post_id );
	$obj_2 = new WP_Post( $post );


	add_option( 'save_count', 0 );


	$list = [];
	if ( (int) get_option( 'save_count' ) === 0 ) {
	}

	if ( (int) get_option( 'save_count' ) >= 10 ) {
		update_option( 'save_count', 0 );
	}


	$count = (int) get_option( 'save_count' );

	//if ($count === 0) {

	$count ++;

	update_option( 'save_count', $count );
	delete_transient( 'cache_exp' );
	$exp = get_transient( 'cache_exp' );

	//if (($exp === null) || (!isset($exp))) {


	$to      = get_field( 'email_to', 'options' );
	$sub     = get_field( 'subject', 'options' );
	$msg     = get_field( 'message', 'options' );
	$int     = (double) get_field( 'email_interval', 'options' );
	$exp2    = (double) $int * HOUR_IN_SECONDS;
	$time    = date( 'm/d/Y H:i:s', $exp );
	$trans   = [ 'sent' => true, 'interval' => $int, 'exp' => $exp2, 'time' => $time ];
	$headers = [ 'Content-Type: text/html; charset=UTF-8' ];

	set_transient( 'cache_exp', $trans, $exp2 );

	$ip  = $_SERVER['REMOTE_ADDR'];
	$str = [];

	//$post = get_post($post_id);
	$notify_users = ( get_field( 'notify_users', 'options' ) !== null ) ? (array) get_field( 'notify_users', 'options' ) : [ 'andrewmgunn26@gmail.com' ];

	foreach ( $notify_users as $user ) {

		$user_id = new WP_User( $user );

		$str[] = $user_id->user_email;

	}

	$user_id = get_current_user_id();

	$now = current_time( '
	    H:i:s' );


	$subject = get_bloginfo() . ' ' . ' may need caches purged to see updates';
//	    $html    = 'Site changes may be not showing correctly, purge
//            <a href="https://rbrvs.net/wp-admin/options-general.php?page=cloudflare#/home" target="_blank" rel="noopener">WP Cloudflare</a>?'.
//            .<a href="https://app.getflywheel.com/rwasser63/rbrvs/flush_cache" target="_blank" rel="noopener">Cloudflare Dashboard</a>'.
//            <a href="https://dash.cloudflare.com/7df9c8a72539623a2ea35e834b1c304b/rbrvs.net/caching" target="_blank" rel="noopener">Flywheel Cache</a>';


	$r = '<span style="font-family: verdana, geneva, sans-serif;">RBRVS has detected updates made on site. <strong>If you dont see the changes,</strong> using the links below to purge the caches will solve this issue!</span>' .
	     '<ul>' .
	     '<li><span style="font-family: verdana, geneva, sans-serif;"><a href="https://rbrvs.net/wp-admin/options-general.php?page=cloudflare#/home" target="_blank" rel="noopener">WP Cloudflare</a></span></li>' .
	     '<li><span style="font-family: verdana, geneva, sans-serif;"><a href="https://app.getflywheel.com/rwasser63/rbrvs/flush_cache" target="_blank" rel="noopener">Flywheel Cache</a></span></li>' .
	     '<li><span style="font-family: verdana, geneva, sans-serif;"><a href="https://dash.cloudflare.com/7df9c8a72539623a2ea35e834b1c304b/rbrvs.net/caching" target="_blank" rel="noopener">Cloudflare Dashboard</a></span></li>' .
	     '</ul>';

	$message = 'Changes made to: ' . sanitize_text_field( $new->post_title ) . '<br>' .
	           'Modified at: ' . current_time( 'Y-m-d H:i:s' ) .
	           // 'Done by: '.$post->post_author .
	           '<p>' . $r . '</p>';

	$m = get_field( 'notify_email', 'options' );


	//wp_mail( 'andrewmgunn26@gmail.com', $sub, $msg, $headers );


	    wp_mail( $m, $subject, $message, $headers );

	// } else {
	// wp_mail( 'andrewmgunn26@gmail.com', $exp, $exp2, $headers );

	//}
	//}

}

/**
 *
 */
function admin_js() {


	wp_mail( 'andrewmgunn26@gmail.com', 'yeah', 'yeah' );

}

/**
 *
 */
function notice() {


	if ( ! add_option( 'cache_txt', true ) ) {

	}

	$ct = get_option( 'cache_txt' );
	// if ($ct === true) {
	// Compile default message.
	$default_message = sprintf( __( 'BOM is missing requirements and has been <a href="%s">deactivated</a>. Please make sure all requirements are available.', 'bom' ), admin_url( 'plugins.php' ) );

	// Default details to null.
	$details = null;


	update_option( 'cache_txt', false );

	// Output errors.
	?>
    <div id="message" class="error">
    <p><?php echo wp_kses_post( $default_message ); ?></p>
	<?php echo wp_kses_post( $details ); ?>
    </div><?php //}
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
/**
 * @return string
 */
function display_main_message2() {

	return 'hi';
}


/**
 *
 */
function parse_elements() {


	?>

    <script>


    </script>
	<?php


	$green = '#3ab300';
	$red   = '#ff1919';

	$html = '';


	$wcb_data = get_option( 'wcb_data' );

	if ( $wcb_data === 'on' ) {
		$c = $red;

	} else {
		$c = $green;
	}

	if ( have_rows( 'elements', 'options' ) ) {


		while ( have_rows( 'elements', 'options' ) ) :
			the_row();

			// Your loop code
			$sel = get_sub_field( 'selector' );
			$css = get_sub_field( 'css' );

			$html .= $sel . '{ ' . $css . '} ';

			//$slides[] = $text;

		endwhile;
		echo '<style>';
		echo '		#copyright div.copytext a {';
		echo 'color:' . $c . ';';
		echo '} ';
		echo $html;

		echo '</style>';

	}
}

/**
 * @return string
 */
function display_panes() {

	$slides = [];
	$pane   = '';

	if ( have_rows( 'panes', 'options' ) ) {
		while ( have_rows( 'panes', 'options' ) ) :
			the_row();

			// Your loop code
			$active = get_sub_field( 'active' );

			$text = get_sub_field( 'text' );

			if ( $active === true ) {
				$slides[] = $text;

				if ( $pane === '' ) {
					$pane = '<li>' . $text . '</li>';
				}

			}
		endwhile;
	}


	if ( $slides ) {

		$slide_text = "";
		$i          = 0;

		foreach ( $slides as $slid ) {

			# code...
			$t          = '' . $slid;
			$slide_text = '<li>' . $slid . '</li>';
		}
	}


	echo parse_elements();

	return '<div id="top_slider" class="main top_slider flexslider">' . '<ul class="slides">' . '' . $pane . '' .
	       '</ul>' .
	       '</div>';
}

/**
 * @return string
 */
function display_main_message() {

	$slide = '';
	$off   = false;

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
			if ( ( $active === true ) && ( $slide === '' ) ) {
				//$slides[] = $text;
				$slide = $text;
				$off   = true;
			}
		endwhile;
	}


	$slide_text .= '<li>' . $slide . '</li>';


	$html = '<div id="main_pane" class="main flexslider">' . '<ul class="slides">' . '' . $slide_text . '' . '</ul>' . '</div>';

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

	       '<div id="tag_pane" class="main flexslider">' . '<ul class="slides">' . '' . $slide_text . '' . '</ul>' . '</div>';
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
