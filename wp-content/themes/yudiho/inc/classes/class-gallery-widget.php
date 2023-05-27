<?php
/**
 * Gallery Widget
 * @package Yudiho
 */

namespace Yudiho_THEME\Inc;

use Yudiho_THEME\Inc\Traits\Singleton;
use WP_Widget;

class Gallery_Widget extends WP_Widget
{
    use Singleton;

    /**
     * Register widget with WordPress.
     */
    public function __construct()
    {
        parent::__construct(
            'gallery_widget', // Base ID
            'Yudiho Gallery Widget', // Name
            array('description' => __('Gallery Widget', 'yudiho'),) // Args
        );
        add_action('admin_enqueue_scripts', [$this, 'register_custom_image_upload']);
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
        $img_urls = array();
        $title = apply_filters('widget_title', $instance['title']);
        $images = apply_filters('widget_title', $instance['custom_widget_image_url']);
        $img_urls = explode(',', $images);

        ?>
        <?php if (is_array($img_urls) && !empty($img_urls)): ?>

        <div class="gallery-widget">
            <h5 class="gallery-widget-heading"><?php echo $title; ?></h5>
            <div class="swiper-container gallerySwiper">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">
                    <?php foreach ($img_urls as $img_url): ?>
                        <?php if ($img_url != ''):
                            $img_name = explode('/', $img_url);
                            ?>
                            <div class="swiper-slide">
                                <figure>
                                    <img src="<?php echo $img_url; ?>" alt="<?php echo end($img_name); ?>">
                                </figure>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
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
        $title = __('Yudiho Gallery', 'yudiho');
        $custom_widget_image_url = __('', 'yudiho');


        $imges = array();
        if (isset($instance['title'])) {
            $title = $instance['title'];
        }
        if (isset($instance['custom_widget_image_url'])) {
            $custom_widget_image_url = $instance['custom_widget_image_url'];
        }
        if ($custom_widget_image_url != '') {
            $imges = explode(',', $custom_widget_image_url);
        }
        ?>
        <p>
            <label for="<?php echo $this->get_field_name('title'); ?>"><?php _e('Title:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>"
                   name="<?php echo $this->get_field_name('title'); ?>" type="text"
                   value="<?php echo esc_attr($title); ?>"/>
        </p>
        <?php if (is_array($imges) && !empty($imges)):
        foreach ($imges as $img_order => $img):
            ?>

            <p class="<?php echo $img_order . "-" . $this->id; ?>">
            <img src="<?php echo $img; ?>" style="width: 80px;">
            <button type="button" class="img-delete btn components-button is-primary"
                    data-order="<?php echo $img_order; ?>"
                    data-widget-id="<?php echo $this->id; ?>"><?php _e('Delete'); ?></button>
        <?php endforeach; endif; ?>
        </p>
        <p>
            <label for="<?php echo $this->get_field_name('file'); ?>"><?php _e('File:'); ?></label>
            <button class="btn components-button is-primary widget_image_upload" id="widget_image_upload"
                    data-widget-id="<?php echo $this->id; ?>">
                Upload Image
            </button>
        </p>
        <p>
            <input class="widefat image_er_link <?php echo $this->get_field_id('custom_widget_image_url'); ?>"
                   id="<?php echo $this->get_field_id('custom_widget_image_url'); ?>"
                   name="<?php echo $this->get_field_name('custom_widget_image_url'); ?>" type="hidden"
                   value="<?php echo esc_attr($custom_widget_image_url); ?>" data-widget-id="<?php echo $this->id; ?>"/>
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
        $instance['custom_widget_image_url'] = (!empty($new_instance['custom_widget_image_url'])) ? strip_tags($new_instance['custom_widget_image_url']) : '';

        return $instance;
    }

    public function register_custom_image_upload()
    {
        wp_enqueue_media();
        wp_register_script('admin_custom_js', YUDIHO_DIR_URI . "/assets/js/gallery-widget-upload.js");
        wp_enqueue_script('admin_custom_js');
    }
}