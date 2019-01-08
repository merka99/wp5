<?php
/**
 * The template for displaying the footer.
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>

	</div><!-- #content -->
</div><!-- #page -->

<?php
/**
 * durga_before_footer hook.
 *
 */
do_action( 'durga_before_footer' );
?>

<div <?php durga_footer_class(); ?>>
	<?php
	/**
	 * durga_before_footer_content hook.
	 *
	 */
	do_action( 'durga_before_footer_content' );

	/**
	 * durga_footer hook.
	 *
	 *
	 * @hooked durga_construct_footer_widgets - 5
	 * @hooked durga_construct_footer - 10
	 */
	do_action( 'durga_footer' );

	/**
	 * durga_after_footer_content hook.
	 *
	 */
	do_action( 'durga_after_footer_content' );
	?>
</div><!-- .site-footer -->

<?php
/**
 * durga_after_footer hook.
 *
 */
do_action( 'durga_after_footer' );

wp_footer();
?>

</body>
</html>
