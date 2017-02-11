<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package wp-vi-1-05
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'wp-vi-1-05' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'wp-vi-1-05' ), 'WordPress' ); ?></a>
			<span class="sep"> | </span>
			<?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'wp-vi-1-05' ), 'wp-vi-1-05', '<a href="https://automattic.com/" rel="designer">Underscores.me</a>' ); ?>
			<!-- Добавляем меню в футер-->
			<div class="footer-menu-1">
				<?php wp_nav_menu(array('theme_location' =>'footer-menu-1', 'menu_class' => 'my-link-list'));?>
			</div>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php get_sidebar('footer'); ?>
<?php wp_footer(); ?>

</body>
</html>
