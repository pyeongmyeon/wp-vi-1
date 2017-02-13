<?php
/*Plugin Name: Type Post Widget
Description: Виджет вывода постов определенного типа.
Version: 0.1
Author: Andrew Melnik
Author URI:
License: GPLv2
*/
class Type_Post_Widget extends WP_Widget
{

    function __construct()
    {
        parent::__construct(
        //base ID of the widget
            'type_post_widget',
            // name of the widget
            __('Type Post Widget', 'wp-vi-1-05'),
            //widget options
            array(
                'description' => __('Виджет вывода постов определенного типа', 'wp-vi-1-05')
            )
        );
    }
    function form( $instance ) {
        ?>

        <p>
            <label for="<?php echo $this->get_field_id('title') ?>">Заголовок</label>
            <input type="text" name="<?php echo $this->get_field_name('title') ?>"
                   id="<?php echo $this->get_field_id('title') ?>"
                   value="<?php echo $instance['title']; ?>" class="widefat">
        </p>
        <?php $format = get_post_format(); ?>
        <p>
            <label for="<?php echo $this->get_field_id('type_post'); ?>">Выберите формат поста</label>
            <label><?php print_r($format);?></label>
            
        </p>
        <?php
    }
    function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']) ;
        $instance['type_post'] = strip_tags($new_instance['type_post']);
        return $new_instance;
    }
    function widget( $args, $instance ) {

    }
}
function register_type_post_widget() {
    register_widget('Type_Post_Widget');
}
add_action('widgets_init', 'register_type_post_widget');