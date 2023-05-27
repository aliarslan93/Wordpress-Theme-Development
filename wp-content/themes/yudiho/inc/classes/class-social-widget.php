<?php
/**
 * Category Widget
 * @package Yudiho
 */

namespace Yudiho_THEME\Inc;

use Yudiho_THEME\Inc\Traits\Singleton;
use WP_Widget;

class Social_Widget extends WP_Widget
{
    use Singleton;

    /**
     * Register widget with WordPress.
     */
    public function __construct()
    {
        parent::__construct(
            'social_media_widget', // Base ID
            'Yudiho Social Media Widget', // Name
            array('description' => __('Social Media Widget', 'yudiho'),) // Args
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

//        $title = apply_filters('widget_title', $instance['title']);
        $facebook = apply_filters('widget_title', $instance['facebook']);
        $twitter = apply_filters('widget_title', $instance['twitter']);
        $linkedin = apply_filters('widget_title', $instance['linkedin']);

        echo $before_widget;
        if (!empty($title)) {
            echo $before_title . $title . $after_title;
        }

        ?>
        <div class="share-social d-flex aligns-items-center justify-content-center ">
            <a href="<?php echo $facebook; ?>" target="_blank" rel="nofollow noopener noreferrer">
                <i class="lni lni-facebook align-self-center"></i>
            </a>
            <a href="<?php echo $twitter; ?>" target="_blank" rel="nofollow noopener noreferrer">
                <i class="lni lni-twitter align-self-center"></i>
            </a>
            <a href="<?php echo $linkedin; ?>" target="_blank" rel="nofollow noopener noreferrer">
                <i class="lni lni-linkedin align-self-center"></i>
            </a>
        </div>

        <?php
        echo $after_widget;
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
        $facebook = __('', 'yudiho');
        $twitter = __('', 'yudiho');
        $linkedin = __('', 'yudiho');

        if (isset($instance['facebook'])) {
            $facebook = $instance['facebook'];
        }
        if (isset($instance['twitter'])) {
            $twitter = $instance['twitter'];
        }
        if (isset($instance['linkedin'])) {
            $linkedin = $instance['linkedin'];
        }
        ?>

        <p>
            <label for="<?php echo $this->get_field_name('facebook'); ?>"><?php _e('Facebook:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('facebook'); ?>"
                   name="<?php echo $this->get_field_name('facebook'); ?>" type="text"
                   value="<?php echo esc_attr($facebook); ?>" placeholder="Facebook URL"/>
        </p>
        <p>
            <label for="<?php echo $this->get_field_name('twitter'); ?>"><?php _e('Twitter:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('twitter'); ?>"
                   name="<?php echo $this->get_field_name('twitter'); ?>" type="text"
                   value="<?php echo esc_attr($twitter); ?>" placeholder="Twitter URL"/>
        </p>
        <p>
            <label for="<?php echo $this->get_field_name('linkedin'); ?>"><?php _e('Linkedin:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('linkedin'); ?>"
                   name="<?php echo $this->get_field_name('linkedin'); ?>" type="text"
                   value="<?php echo esc_attr($linkedin); ?>" placeholder="Linkedin URL"/>
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
        $instance['facebook'] = (!empty($new_instance['facebook'])) ? strip_tags($new_instance['facebook']) : '';
        $instance['twitter'] = (!empty($new_instance['twitter'])) ? strip_tags($new_instance['twitter']) : '';
        $instance['linkedin'] = (!empty($new_instance['linkedin'])) ? strip_tags($new_instance['linkedin']) : '';

        return $instance;
    }
}