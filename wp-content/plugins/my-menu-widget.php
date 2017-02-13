<?php
/*Plugin Name: My Menu Widget
Description: This widget make my menu.
Version: 0.1
Author: Andrew Melnik
Author URI:
License: GPLv2
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
				'description' => __('Виджет для меню с иерархией', 'wp-vi-1-05')
			)
		);
	}
	function form($instance) {
		?>
		
		<p>
			<label for="<?php echo $this->get_field_id('title') ?>">Заголовок</label>
			<input type="text" name="<?php echo $this->get_field_name('title') ?>" 
			id="<?php echo $this->get_field_id('title') ?>" 
			value="<?php echo $instance['title']; ?>" class="widefat">
		</p>
		<?php $menus = wp_get_nav_menus(); ?> 
		<p>
			<label for="<?php echo $this->get_field_id('menu_for_output'); ?>">Выберите меню</label>
			<select name="<?php echo $this->get_field_name('menu_for_output'); ?>" id="<?php echo $this->get_field_id('menu_for_output'); ?>">
			<?php
				foreach ($menus as $key_menu) {
					echo '<option value="'.intval($key_menu->term_id) . '"' . selected($instance['menu_for_output'], $key_menu->term_id, false) . '>' . $key_menu->name . "</option>\n";
				}
			?>	
			</select>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'depth' ); ?>">Глубина вложения меню</label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'depth' );
			?>" name="<?php echo $this->get_field_name( 'depth' ); ?>" value="<?php echo $instance ['depth']; ?>">
		</p>
		<?php
	}
	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']) ;
		$instance['menu_for_output'] = strip_tags($new_instance['menu_for_output']);
		$instance['depth'] = strip_tags($new_instance['depth']) ;
		return $new_instance;
	}
	function widget($args, $instance) {
		// kick things off
		extract( $args );
		echo $before_widget;
		echo $before_title . 'Меню должно быть здесь' . $after_title;
		?>
		<section class="my_menu_widget">
			<h4 class="titlebg"><?php echo $instance['title']?></h4>
			<?php //print_r($instance);
			$args = array (
				'menu' => $instance['menu_for_output'],
				'depth' => $instance['depth'],
			);
			wp_nav_menu($args)?>
			<ul>

			</ul>
		</section>
		<?php
	}
}

function register_my_menu_widget() {
	register_widget('My_Menu_Widget');
}
add_action('widgets_init', 'register_my_menu_widget');