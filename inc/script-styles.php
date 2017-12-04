<?php
defined( 'ABSPATH' ) or die( 'Plugin file cannot be accessed directly.' );

/**
* Script styles to run jQuery on pages
*/
add_action( 'wp_enqueue_scripts', 'ezdep_live_setup_scripts' );

function ezdep_live_setup_scripts() {
	wp_enqueue_script( 'jquery' );
	//wp_enqueue_script( 'jquery-ui-core' );
}

/**
* Enqueue scripts
*/
add_action('wp_footer','ezdep_live_scripts',5);

function ezdep_live_scripts() { ?>

<?php//$var = get_option('trail_story_option'); ?>

	<script type="text/javascript">
		jQuery(document).ready(function($) {
			$('.flexslider').flexslider({
				controlNav: false,
				directionNav: false
			});

    	}); 
	</script>

<?php }
