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
	function form($instance) {
		
	}
	function update($new_instance, $old_instance) {

	}
	function widget($args, $instance) {

	}
}

function register_my_menu_widget() {
	register_widget('My_Menu_Widget');
}
add_action('widgets_init', 'register_my_menu_widget');