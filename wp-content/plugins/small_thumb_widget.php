<?php
/*Plugin Name: My Small Thumb
Description: This widget make small thumb.
Version: 0.1
Author: Andrew Melnik
Author URI: http://gnatkovsky.com.ua/sozdanie-vidzheta-wordpress.html
License: GPLv2
*/
class Small_Thumb_Widget extends WP_Widget
{
	
	function __construct()	{
		parent::__construct(
			'small_thumb_widget',
			'Виджет записи с миниатюрами',
			array('description' => __('Виджет для вывода записей с маленькими миниатюрами', 'wp-vi-1-05' ),)
			) ;
	}
	function update($new_instance, $old_instance) {
		$instance = array();
		$instance['title_thumb'] = strip_tags( $new_instance['title_thumb'] );
        $instance['cat_thumb'] = strip_tags( $new_instance['cat_thumb'] );
        $instance['numper_post_thumb'] = strip_tags( $new_instance['numper_post_thumb'] );
        $instance['size_thumb'] = strip_tags( $new_instance['size_thumb'] );
        return $instance;
	}
	function form($instance) {
		?>
		<p>
		<label for="<?php echo $this->get_field_id('title_thumb');?>">Заголовок</label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'title_thumb' ); ?>"
                 name="<?php echo $this->get_field_name( 'title_thumb' ); ?>" type="text"
                 value="<?php echo $instance['title_thumb']; ?>" />
		</p>
		<?php
	}
}
