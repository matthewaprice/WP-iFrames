<?php
/*
Plugin Name: iFrame Shortcode
Plugin URI: https://matthewprice.com
Description: Allows iFrames
Author: Matthew Price
Version: 1.0
Author URI: http://matthewaprice.com
*/

if ( !defined( 'ABSPATH' ) ) exit;

function map_iframes_display( $atts, $shortcode = false ) {
	
	if ( empty( $atts['src'] ) )
		return false;
		
	if ( $shortcode )
	 	ob_start();

 	?>
 	<div id="<?php echo $atts['wrapper_id']; ?>" class="iframe-anchor"> 	
	 	<iframe src="<?php echo $atts['src']; ?>" width="<?php echo $atts['width']; ?>" height="<?php echo $atts['height']; ?>" frameborder="0" allowfullscreen></iframe>
 	</div>
 	<?php

	if ( $shortcode ) {
		$main_function_output = ob_get_contents();
		ob_end_clean();
		return $main_function_output;
	}

}

function map_iframes_display_shortcode( $atts ) {

	extract(
		shortcode_atts(
			array(
				'src' => '',
				'width' => '600',
				'height' => '450',
				'wrapper_id' => 'iframe_anchor-' . rand( 100000,999999 )
			),
			$atts
		)
	);

	return map_iframes_display( $atts, true );

}

add_shortcode( 'iframe', 'map_iframes_display_shortcode' );
