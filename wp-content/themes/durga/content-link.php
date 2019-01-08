<?php
/**
 * The template for displaying Link post formats.
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php durga_article_schema( 'CreativeWork' ); ?>>
	<div class="inside-article">
		<?php
		/**
		 * durga_before_content hook.
		 *
		 *
		 * @hooked durga_featured_page_header_inside_single - 10
		 */
		do_action( 'durga_before_content' );
		?>

		<header class="entry-header">
			<?php
			/**
			 * durga_before_entry_title hook.
			 *
			 */
			do_action( 'durga_before_entry_title' );

			the_title( sprintf( '<h2 class="entry-title" itemprop="headline"><a href="%s" rel="bookmark">', esc_url( durga_get_link_url() ) ), '</a></h2>' );

			/**
			 * durga_after_entry_title hook.
			 *
			 *
			 * @hooked durga_post_meta - 10
			 */
			do_action( 'durga_after_entry_title' );
			?>
		</header><!-- .entry-header -->

		<?php
		/**
		 * durga_after_entry_header hook.
		 *
		 *
		 * @hooked durga_post_image - 10
		 */
		do_action( 'durga_after_entry_header' );

		if ( durga_show_excerpt() ) : ?>

			<div class="entry-summary" itemprop="text">
				<?php the_excerpt(); ?>
			</div><!-- .entry-summary -->

		<?php else : ?>

			<div class="entry-content" itemprop="text">
				<?php
				the_content();

				wp_link_pages( array(
					'before' => '<div class="page-links">' . __( 'Pages:', 'durga' ),
					'after'  => '</div>',
				) );
				?>
			</div><!-- .entry-content -->

		<?php endif;

		/**
		 * durga_after_entry_content hook.
		 *
		 *
		 * @hooked durga_footer_meta - 10
		 */
		do_action( 'durga_after_entry_content' );

		/**
		 * durga_after_content hook.
		 *
		 */
		do_action( 'durga_after_content' );
		?>
	</div><!-- .inside-article -->
</article><!-- #post-## -->
