<?php
/**
 * Generates a basic placeholder screenshot.png for the theme.
 *
 * WordPress.org requires screenshot.png at 1200x900px. This script
 * produces a tasteful, branded placeholder so the theme has a valid
 * screenshot before you have a real one to swap in.
 *
 * Run from inside the theme folder:
 *   php scripts/generate-screenshot.php
 *
 * Output: screenshot.png in the theme root.
 */

$width  = 1200;
$height = 900;

$im = imagecreatetruecolor( $width, $height );

// Colors (Bootstrap-ish).
$bg        = imagecolorallocate( $im, 248, 249, 250 );   // light
$navbar    = imagecolorallocate( $im, 233, 236, 239 );   // gray-200
$primary   = imagecolorallocate( $im, 13, 110, 253 );    // primary
$dark_text = imagecolorallocate( $im, 33, 37, 41 );      // gray-900
$muted     = imagecolorallocate( $im, 108, 117, 125 );   // gray-600
$card      = imagecolorallocate( $im, 255, 255, 255 );   // white
$border    = imagecolorallocate( $im, 222, 226, 230 );   // gray-300

imagefilledrectangle( $im, 0, 0, $width, $height, $bg );

// Navbar.
imagefilledrectangle( $im, 0, 0, $width, 80, $navbar );
imagefilledrectangle( $im, 0, 78, $width, 80, $border );

// Logo dot.
imagefilledellipse( $im, 80, 40, 28, 28, $primary );

// Big hero heading.
$font = 5;
imagestring( $im, $font, 80, 150, 'Bootstrap 5 Starter', $dark_text );
imagestring( $im, 4, 80, 180, 'A clean, beginner-friendly WordPress theme', $muted );

// Primary CTA button.
imagefilledrectangle( $im, 80, 220, 220, 260, $primary );
imagestring( $im, 4, 110, 232, 'Get Started', $card );

// Three feature cards.
$card_y      = 340;
$card_height = 220;
$gap         = 30;
$card_width  = (int) ( ( $width - 160 - ( 2 * $gap ) ) / 3 );

for ( $i = 0; $i < 3; $i++ ) {
	$x1 = (int) ( 80 + $i * ( $card_width + $gap ) );
	$x2 = (int) ( $x1 + $card_width );

	imagefilledrectangle( $im, $x1, $card_y, $x2, $card_y + $card_height, $card );
	imagerectangle( $im, $x1, $card_y, $x2, $card_y + $card_height, $border );

	imagefilledrectangle( $im, $x1 + 20, $card_y + 20, $x1 + 60, $card_y + 60, $primary );
	imagestring( $im, 4, $x1 + 20, $card_y + 80, 'Feature ' . ( $i + 1 ), $dark_text );
	imagestring( $im, 2, $x1 + 20, $card_y + 110, 'Lorem ipsum dolor sit amet,', $muted );
	imagestring( $im, 2, $x1 + 20, $card_y + 130, 'consectetur adipiscing elit.', $muted );
}

// Footer band.
imagefilledrectangle( $im, 0, $height - 80, $width, $height, $navbar );
imagestring( $im, 3, 80, $height - 50, '(C) Powered by WordPress  -  Theme: Bootstrap 5 Starter', $muted );

imagepng( $im, __DIR__ . '/../screenshot.png' );
imagedestroy( $im );

echo "screenshot.png generated.\n";
