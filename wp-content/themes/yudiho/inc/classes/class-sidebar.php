<?php
/**
 * Register Sidebar
 * @package Yudiho
 */

namespace Yudiho_THEME\Inc;

use Yudiho_THEME\Inc\Traits\Singleton;

class Sidebar
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
        add_action('widgets_init', [$this, 'register_sidebars']);
        add_action('widgets_init', [$this, 'register_latest_post']);
        add_action('widgets_init', [$this, 'register_gallery_widget']);
        add_action('widgets_init', [$this, 'register_search_widget']);
        add_action('widgets_init', [$this, 'register_category_widget']);
        add_action('widgets_init', [$this, 'register_social_media_widget']);

    }

    public function register_sidebars()
    {
        register_sidebar([
            'name' => __('Home Sidebar', 'yudiho'),
            'id' => 'home-sidebar-widget',
            'description' => __('This widget opens a col-3 div next to the trending area', 'yudiho'),
            'before_widget' => '<div id="%1$s">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="category-widget-header">',
            'after_title' => '</h3>',
        ]);
        register_sidebar([
            'name' => __('Page Sidebar', 'yudiho'),
            'id' => 'page-sidebar-widget',
            'description' => __('This widget opens a col-3 div next to the page area', 'yudiho'),
            'before_widget' => '<div id="%1$s">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="page-widget-header">',
            'after_title' => '</h3>'
        ]);
        register_sidebar([
            'name' => __('Blog Sidebar', 'yudiho'),
            'id' => 'blog-sidebar-widget',
            'description' => __('This widget opens a col-3 div next to the trending area', 'yudiho'),
            'before_widget' => '<div id="%1$s">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="category-widget-header">',
            'after_title' => '</h3>',
        ]);
        register_sidebar([
            'name' => __('Footer Sidebar', 'yudiho'),
            'id' => 'footer-sidebar-widget',
            'description' => __('Edit for footer section', 'yudiho'),
            'before_widget' => '<div id="%1$s" class="col-xl-4 col-lg-4 col-md-6 mb-50 footer-widget">',
            'after_widget' => '</div>',
        ]);
        register_sidebar([
            'name' => __('Copyright Sidebar', 'yudiho'),
            'id' => 'copyright-sidebar-widget',
            'description' => __('', 'yudiho'),
            'before_widget' => '<div id="%1$s">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="widget-header">',
            'after_title' => '</h3>',
        ]);
    }


    public function register_category_widget()
    {
        register_widget('Yudiho_THEME\Inc\Category_Widget');
    }

    public function register_social_media_widget()
    {
        register_widget('Yudiho_THEME\Inc\Social_Widget');
    }


    public function register_latest_post()
    {
        register_widget('Yudiho_THEME\Inc\Latest_Widget');
    }

    public function register_gallery_widget()
    {
        register_widget('Yudiho_THEME\Inc\Gallery_Widget');
    }
    public function register_search_widget()
    {
        register_widget('Yudiho_THEME\Inc\Search_Widget');
    }

    public function getSliderIdByGuid($guid)
    {
        global $wpdb;
        return $wpdb->get_var($wpdb->prepare("SELECT ID FROM $wpdb->posts WHERE guid=%s", $guid));
    }

}