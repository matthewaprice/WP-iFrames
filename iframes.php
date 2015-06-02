<?php
/*
Plugin Name: iFrame Shortcode
Plugin URI: https://matthewprice.com
Description: Allows iFrames
Author: Matthew Price
Version: 1.0
Author URI: http://matthewaprice.com
*/

function map_iframes_display( $atts, $shortcode = false ) {

	if ( $shortcode )
	 	ob_start();


 	?>
 	<iframe src="<?php echo $atts['src']; ?>" width="<?php echo $atts['width']; ?>" height="<?php echo $atts['height']; ?>" frameborder="0" allowfullscreen></iframe>
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
				'height' => '450'
			),
			$atts
		)
	);

	return map_iframes_display( $atts, true );

}

add_shortcode( 'iframe', 'map_iframes_display_shortcode' );