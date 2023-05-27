<?php
/**
 * Enqueue Blog
 * @package Yudiho
 */

namespace Yudiho_THEME\Inc;

use Yudiho_THEME\Inc\Traits\Singleton;

class Blog
{
    use Singleton;

    protected function __construct()
    {
        $this->setup_hooks();
    }

    protected function setup_hooks()
    {
        /**
         * Actions.
         */
    }

    public function get_view_count($post_id = 0)
    {
        global $wpdb;
        return $wpdb->get_var($wpdb->prepare("SELECT meta_value FROM $wpdb->postmeta WHERE post_id=%s AND meta_key ='entry_views'", $post_id));
    }

    public function get_comments_count($post_id = 0)
    {
        global $wpdb;
        return $wpdb->get_var($wpdb->prepare("SELECT comment_count FROM $wpdb->posts WHERE ID=%s", $post_id));
    }

    public function get_categories($post_id = 0)
    {
        global $wpdb;
        return $wpdb->get_var($wpdb->prepare("SELECT comment_count FROM $wpdb->posts WHERE ID=%s", $post_id));
    }
}