<?php
/**
 * Theme Functions
 * @package Yudiho
 */

if (!defined('YUDIHO_DIR_PATH')) {
    define('YUDIHO_DIR_PATH', untrailingslashit(get_template_directory()));
}

if (!defined('YUDIHO_DIR_URI')) {
    define('YUDIHO_DIR_URI', untrailingslashit(get_template_directory_uri()));
}

require_once YUDIHO_DIR_PATH . '/inc/helpers/autoloader.php';

function yudiho_instance_theme()
{
    \Yudiho_THEME\Inc\Yudiho_THEME::get_instance();
}

yudiho_instance_theme();



// Comment Result
require_once YUDIHO_DIR_PATH . '/inc/classes/comment-result.php';

// Custom Search Modal
require_once YUDIHO_DIR_PATH . '/inc/classes/search-modal.php';
?>

