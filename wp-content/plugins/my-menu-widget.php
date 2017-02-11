<?php
/*Plugin Name: My Menu Widget
Description: This widget make my menu.
Version: 0.1
Author: Andrew Melnik
Author URI:
License: GPLv2
*/

/**
* 
*/
class My_Menu_Widget extends WP_Widget
{
	
	function __construct() {
		parent::__construct(
			//base ID of the widget
			'my_menu_widget',
			// name of the widget
			__('My Menu Widget', 'wp-vi-1-05'),
			//widget options
			array (
				'description' => __('My Menu Widget, list of menu', 'wp-vi-1-05')
			)
		);
	}
	function form($instance, $title) {
		$defaults = array(
				'title' => 'Простой заголовок'
		);
		?>
		<p>
			<label for="<?php echo $this->get_field_id('title') ?>">Заголовок</label>
			<input type="text" name="<?php echo $this->get_field_name('title') ?>" id="<?php echo $this->get_field_id('title') ?>" value="<?php if(null !== $title) echo esc_attr($title); ?>" class="my-widget-title">
		</p>
		<?php
	}
	function update($new_instance, $old_instance) {
		$new_instance['title'] = !empty($new_instance['title']) ? strip_tags($new_instance['title']) : '';
		return $new_instance;
	}
	function widget($args, $instance) {

	}
}

function register_my_menu_widget() {
	register_widget('My_Menu_Widget');
}
add_action('widgets_init', 'register_my_menu_widget');