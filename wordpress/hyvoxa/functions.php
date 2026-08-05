<?php
/**
 * Hyvoxa Theme functions and definitions
 *
 * @package Hyvoxa
 * @since   1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

define( 'HYVOXA_VERSION', '1.0.0' );
define( 'HYVOXA_DIR', get_template_directory() );
define( 'HYVOXA_URI', get_template_directory_uri() );

require_once HYVOXA_DIR . '/inc/theme-setup.php';
require_once HYVOXA_DIR . '/inc/enqueue.php';
require_once HYVOXA_DIR . '/inc/custom-post-types.php';
require_once HYVOXA_DIR . '/inc/theme-data.php';
require_once HYVOXA_DIR . '/inc/activation.php';
require_once HYVOXA_DIR . '/inc/template-helpers.php';
