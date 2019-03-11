<?php
/*
Plugin Name: com5940 demo
Plugin URI: http://www.hongkiat.com/
Description: This is just a simple plugin demo.
Author: Yiming
Version: 1.0
Author URI: https://www.github.com/acezym
*/


if (! defined('ABSPATH')) {
  exit;
}

add_action( 'the_content', 'by_yiming' );

function by_yiming ( $content ) {
    return $content .= '<p>By Yiming!</p>';
}
