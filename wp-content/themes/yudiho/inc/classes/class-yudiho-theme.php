<?php
/**
 * Bootstrap Theme
 * @package Yudiho
 */

namespace Yudiho_THEME\Inc;

use Yudiho_THEME\Inc\Traits\Singleton;

class Yudiho_THEME
{
    use Singleton;

    protected function __construct()
    {
        //Load Class
        Assets::get_instance();
        Menus::get_instance();
        Blog::get_instance();
        Newest_Patterns::get_instance();
        Social_Widget::get_instance();
        Carousel_Slider::get_instance();
        Sidebar::get_instance();
        Gallery_Widget::get_instance();
        Trending::get_instance();
        Search_Widget::get_instance();
        $this->setup_hooks();
    }

    protected function setup_hooks()
    {
        /**
         * Actions.
         */
        add_action('after_setup_theme', [$this, 'setup_theme']);
    }

    public function setup_theme()
    {
        add_theme_support('title-tag');
        add_theme_support('custom-logo', array(
            'header-text' => ['site-title', 'site-description'],
            'height' => 30,
            'width' => 120,
            'flex-height' => true,
            'flex-width' => true,

        ));

        add_theme_support('editor-styles');
        add_theme_support('custom-background', array(
            'default-color' => '#FFF',
            'default-image' => '',
        ));
        add_theme_support('post-thumbnails');
        add_theme_support('costumize-selective-refresh-widgets');
        add_theme_support('automatic-feed-links');
        add_theme_support('html5',
            array(
                'search-form',
                'comment-form',
                'comment-list',
                'gallery',
                'caption',
                'script',
                'style',
            ));
        add_editor_style();
        add_theme_support('wp-block-styles');
        add_theme_support('aling-wide');
        global $content_width;
        if (!isset($content_width)) {
            $content_width = 1378;
        }
        //Add Image Size
        add_image_size('featured_big', 640, 640, true);
        add_image_size('featured_small', 640, 320, true);
        add_image_size('circle_big', 130, 130, true);
        add_image_size('carousel_slider', 320, 320, true);
        add_image_size('image_container', 310, 310, true);
        add_image_size('testimonial_big', 416, 620, true);
        add_image_size('gallery_widget_big', 305, 350, true);
        add_image_size('author_profile_big', 100, 100, true);
        add_image_size('author_profile_small', 50, 50, true);
        add_image_size('latest_widget_small', 80, 80, true);
    }


}