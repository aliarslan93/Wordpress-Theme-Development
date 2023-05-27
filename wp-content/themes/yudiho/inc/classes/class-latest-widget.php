<?php
/**
 * Category Widget
 * @package Yudiho
 */

namespace Yudiho_THEME\Inc;

use Yudiho_THEME\Inc\Traits\Singleton;
use WP_Widget;
use WP_Query;

class Latest_Widget extends WP_Widget
{
    use Singleton;

    /**
     * Register widget with WordPress.
     */
    public function __construct()
    {
        parent::__construct(
            'latest_widget', // Base ID
            'Yudiho Latest Widget', // Name
            array('description' => __('Latest Widget', 'yudiho')) // Args
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
        extract($args);

        $title = apply_filters('widget_title', $instance['title']);


        $args = array(
            'posts_per_page' => 5, /* how many post you need to display */
            'offset' => 0,
            'orderby' => 'post_date',
            'order' => 'DESC',
            'post_type' => 'post', /* your post type name */
            'post_status' => 'publish'
        );
        $query = new WP_Query($args);
        wp_reset_query();
        ?>
        <h4 class="latest-heading"><?php echo $title; ?></h4>
        <?php if (is_array($query->posts) && !empty($query->posts)): ?>
        <ul class="latest-widget">
            <?php foreach ($query->posts as $latest_post):
                $image = wp_get_attachment_image_src(get_post_thumbnail_id($latest_post->ID), 'carousel_slider');
                ?>
                <li class="item">
                    <a href="<?php the_permalink($latest_post->ID); ?>" title="<?php echo $latest_post->post_title; ?>">
                        <img src="<?php echo $image[0];?>" alt="<?php echo $latest_post->post_title; ?>" class="image">
                        <span class="heading"><?php echo $latest_post->post_title; ?></span>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
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
        if (isset($instance['title'])) {
            $title = $instance['title'];
        } else {
            $title = __('Latest', 'yudiho');
        }
        ?>
        <p>
            <label for="<?php echo $this->get_field_name('title'); ?>"><?php _e('Title:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>"
                   name="<?php echo $this->get_field_name('title'); ?>" type="text"
                   value="<?php echo esc_attr($title); ?>"/>
        </p>
        <?php
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
        $instance = array();
        $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';

        return $instance;
    }
}