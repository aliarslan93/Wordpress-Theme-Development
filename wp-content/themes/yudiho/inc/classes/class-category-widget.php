<?php
/**
 * Category Widget
 * @package Yudiho
 */

namespace Yudiho_THEME\Inc;

use Yudiho_THEME\Inc\Traits\Singleton;
use WP_Widget;

class Category_Widget extends WP_Widget
{
    use Singleton;

    /**
     * Register widget with WordPress.
     */
    public function __construct()
    {
        parent::__construct(
            'category_widget', // Base ID
            'Yudiho Category Widget', // Name
            array('description' => __('Category Widget', 'yudiho'),) // Args
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

        echo $before_widget;
        if (!empty($title)) {
            echo $before_title . $title . $after_title;
        }
        $categories = get_categories(array(
            'orderby' => 'name',
            'order' => 'ASC'
        ));
        if (is_array($categories) && !empty($categories)):
            ?>

            <ul class="category-widget">
                <?php foreach ($categories as $category): ?>
                    <li class="item" style="background-image: url(<?php echo YUDIHO_DIR_URI."/assets/img/category-background.jpg"; ?>)">
                        <a href="<?php echo esc_attr( esc_url( get_category_link( $category->term_id ) ) ); ?>"><?php echo $category->name;?></a>
                    </li>
                <?php endforeach; ?>
            </ul>
            <?php
        endif;
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
        if (isset($instance['title'])) {
            $title = $instance['title'];
        } else {
            $title = __('Categories', 'yudiho');
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