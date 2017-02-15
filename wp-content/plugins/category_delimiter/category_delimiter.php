<?php
/**
* Plugin Name: Category delimetr
* Description: Плагин, которій в заголовок поста добавляет категорию
* Version: 0.1
* Author: Andrew Melnik
* Author URI:
* License: GPLv2
 */
//global $post;
function category_delimetr($title)
{
	$title = $title . ' - ' . $selected_category;
	return $title;
}
add_filter('the_title', 'category_delimetr');
//add_action('the_title', array('My_Category_Delimiter', 'sel_cat'));

class My_Category_Delimiter extends WP_Widget
{
	
	function __construct()	{
		parent::__construct(
			//base ID of the widget
			'my_category_delimetr',
			// name of the widget
			__('My Category Delimiter', 'wp-vi-1-05'),
			//widget options
			array (
				'description' => __('Виджет для выбора категории и разделителя', 'wp-vi-1-05')
			)
		);
	}
	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']) ;
		$instance['category_for_delimetr'] = strip_tags($new_instance['category_for_delimetr']) ;
		$instance['delimetr'] = strip_tags($new_instance['delimetr']) ;
		return $new_instance;
	}
	public function form($instance) {
		?>
		<p>
			<label for="<?php echo $this->get_field_id('title') ?>">Заголовок</label>
			<input type="text" name="<?php echo $this->get_field_name('title') ?>" 
			id="<?php echo $this->get_field_id('title') ?>" 
			value="<?php echo $instance['title']; ?>" class="widefat">
		</p>
		<?php 
			$args = array(
				'type' 			=> 'post',
				'orderby' 		=> 'name',
				'taxonomy'     	=> 'category',
				);
		$catt = get_categories($args); ?>
		<p>
			<label for="<?php echo $this->get_field_id('category_for_delimetr') ?>">Выберите категорию</label>
			<select name="<?php echo $this->get_field_name('category_for_delimetr'); ?>" id="<?php echo $this->get_field_id('category_for_delimetr'); ?>">
			<?php 

				foreach ($catt as $category_key) {
					echo '<option value="'.intval($category_key->term_id) . '"' . selected($instance['category_for_delimetr'], $category_key->term_id, false) . '>' . $category_key->name . "</option>\n";

				}
				//$selected_category = $instance['category_for_delimetr'];
				//return $selected_category;
			?>
			</select>
		</p>
	<?php
	}
	function widget($args, $instance) {
		$selected_category = $instance['category_for_delimetr'];
	}
	public function sel_cat($instance) {
//		$selected_category = $instance['category_for_delimetr'];
		$title = $title . ' - ' . $selected_category;
		return $title;
		
	}
}

function register_my_category_delimetr() {
	register_widget('My_Category_Delimiter');
}
add_action('widgets_init', 'register_my_category_delimetr');