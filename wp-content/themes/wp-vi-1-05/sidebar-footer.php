<?php
/**
 * Created by PhpStorm.
 * User: Andrew
 * Date: 11.02.2017
 * Time: 13:37
 * The sidebar containing the main widget area in footer
 * @package wp-vi-1-05
 */
if ( ! is_active_sidebar( 'sidebar-2' ) ) {
    return;
}
?>
<div id="footer-secondary" class="widget-area" role="complementary">
    <?php dynamic_sidebar( 'sidebar-2' ); ?>
</div>
