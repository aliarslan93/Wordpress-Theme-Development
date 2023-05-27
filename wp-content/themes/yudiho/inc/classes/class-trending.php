<?php
/**
 * Enqueue Blog
 * @package Yudiho
 */

namespace Yudiho_THEME\Inc;

use WP_Query;
use Yudiho_THEME\Inc\Traits\Singleton;

class Trending
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

    public function get_trending_post()
    {
        $args = array(
            'posts_per_page' => 7, /* how many post you need to display */
            'offset' => 0,
            'orderby' => 'ID',
            'order' => 'DESC',
            'post_type' => 'post', /* your post type name */
            'post_status' => 'publish'
        );
        $query = new WP_Query($args);
        wp_reset_query();
        return $query;
    }

}