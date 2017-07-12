<?php
defined('ABSPATH') or die("No script kiddies please!");

/**
 * AP Custom Testimonial Widget
 */
class APCT_Widget extends WP_Widget {

    /**
     * Register widget with WordPress.
     */
    function __construct() {
        parent::__construct(
                'apct_widget', // Base ID
                __('AP Custom Testimonial', 'ap-custom-testimonial'), // Name OF widget
                array('description' => __('AP Custom Testimonial Widget', 'ap-custom-testimonial')) // Args For Widget
        );
    }

    /**
     * Front-end display of widget.
     *
     * @see WP_Widget::widget()
     *
     * @param array $args     Widget arguments.
     * @param array $instance Saved values from database.
     */
    public function widget($args, $instance) {
        echo $args['before_widget'];
        if (!empty($instance['title'])) {
            echo $args['before_title'] . apply_filters('widget_title', $instance['title']) . $args['after_title'];
        }

        if (isset($instance['shortcode']) && $instance['shortcode'] != '') {
            echo do_shortcode($instance['shortcode']);
        }
        echo $args['after_widget'];
    }

    /**
     * Back-end widget form.
     *
     * @see WP_Widget::form()
     *
     * @param array $instance Previously saved values from database.
     */
    public function form($instance) {
        $title = isset($instance['title']) ? $instance['title'] : '';
        $shortcode = isset($instance['shortcode']) ? $instance['shortcode'] : '';
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'ap-custom-testimonial'); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>"/>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('shortcode'); ?>"><?php _e('Shortcode:', 'ap-custom-testimonial'); ?></label>
            <textarea class="apct-widget-textarea" id="<?php echo $this->get_field_id('shortcode'); ?>" name="<?php echo $this->get_field_name('shortcode'); ?>"><?php echo esc_attr($shortcode); ?></textarea>
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
    public function update($new_instance, $old_instance) {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title']) ) ? sanitize_text_field($new_instance['title']) : '';
        $instance['shortcode'] = (!empty($new_instance['shortcode']) ) ? sanitize_text_field($new_instance['shortcode']) : '';
        return $instance;
    }

}
