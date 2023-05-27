<?php
/**
 * Category Widget
 * @package Yudiho
 */

namespace Yudiho_THEME\Inc;

use Yudiho_THEME\Inc\Traits\Singleton;
use WP_Widget;

class Search_Widget extends WP_Widget
{
    use Singleton;

    /**
     * Register widget with WordPress.
     */
    public function __construct()
    {
        parent::__construct(
            'search_widget', // Base ID
            'Yudiho Search Widget', // Name
            array('description' => __('Search Widget', 'yudiho'),) // Args
        );
    }

    /**
     * Front-end display of widget.
     *
     * @see WP_Widget::widget()
     *
     * @param array $args Widget arguments.
     * @param array $instance Saved values from database.
     */
    public function widget($args, $instance)
    {
?>
        <div class="form-group search-widget">
            <h4 class="title">Search in Blog</h4>
            <span class="lni lni-keyword-research form-control-feedback"></span>
            <input type="text" class="form-control" placeholder="Search"  data-bs-toggle="modal" data-bs-target="#searchForm">
        </div>

        <?php

    }

    /**
     * Back-end widget form.
     *
     * @see WP_Widget::form()
     *
     * @param array $instance Previously saved values from database.
     */
    public function form($instance)
    {

    }

    /**
     * Sanitize widget form values as they are saved.
     *
     * @see WP_Widget::update()
     *
     * @param array $new_instance Values just sent to be saved.
     * @param array $old_instance Previously saved values from database.
     *
     * @return array Updated safe values to be saved.
     */
    public function update($new_instance, $old_instance)
    {
    }
}