<?php

if ( ! function_exists( 'foundationpress_scripts' ) ) :
	function foundationpress_scripts() {

		/* Stylesheet */

		// Google Font
		wp_enqueue_style( 'Google Font', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://fonts.googleapis.com/css?family=Roboto", false, null );
		// Main stylesheet
		wp_enqueue_style( 'Style.css', get_stylesheet_directory_uri() . '/css/styles.min.css', false, null );

		/* JavaScript */

		// Deregister the jquery version bundled with wordpress
		wp_deregister_script( 'jquery' );

		// Top
		// Modernizr is used for polyfills and feature detection. Must be placed in header. (Not required)
		wp_register_script( 'modernizr', get_template_directory_uri() . '/js/vendor/modernizr.js', array(), '2.8.3', false );
		// Fastclick removes the 300ms delay on click events in mobile environments. Must be placed in header. (Not required)
		wp_register_script( 'fastclick', get_template_directory_uri() . '/js/vendor/fastclick.js', array(), '1.0.0', false );
		// CDN hosted jQuery placed in the header, as some plugins require that jQuery is loaded in the header.
		//wp_enqueue_script( 'jquery', '//ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js', array(), '2.1.0', false);
		// Self hosted jQuery placed in the footer. (Comment the script above and uncomment the script below if you want to switch).
		//wp_register_script( 'jquery', get_template_directory_uri() . '/js/vendor/jquery.js', array(), '2.1.3', true );

		// Bottom
		wp_register_script( 'jquery', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://code.jquery.com/jquery-2.1.4.min.js", false, null, true );
		wp_register_script( 'lib', get_template_directory_uri() . '/js/lib.min.js', array(), null, true );
		wp_register_script( 'ng-app', get_template_directory_uri() . '/js/app.min.js', array(), null, true );
		// Inject WordPress Theme URL into Angular Application
		wp_localize_script( 'ng-app', 'site', array( 'theme_url' => get_template_directory_uri() ) );
		// Enqueue all registered scripts
		wp_enqueue_script( 'modernizr' );
		wp_enqueue_script( 'fastclick' );
		wp_enqueue_script( 'jquery' );
		wp_enqueue_script( 'lib' );
		wp_enqueue_script( 'ng-app' );

	}
	add_action( 'wp_enqueue_scripts', 'foundationpress_scripts' );

	function dl_favicon() {
		echo '<link rel="Shortcut Icon" type="image/x-icon" href="' . get_template_directory_uri() . '/favicon.ico" />';
	}
	add_action('wp_head', 'dl_favicon');
endif;

?>
