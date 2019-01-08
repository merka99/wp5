<?php
/**
 * Builds our admin page.
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! function_exists( 'durga_create_menu' ) ) {
	add_action( 'admin_menu', 'durga_create_menu' );
	/**
	 * Adds our "Durga" dashboard menu item
	 *
	 */
	function durga_create_menu() {
		$durga_page = add_theme_page( 'Durga', 'Durga', apply_filters( 'durga_dashboard_page_capability', 'edit_theme_options' ), 'durga-options', 'durga_settings_page' );
		add_action( "admin_print_styles-$durga_page", 'durga_options_styles' );
	}
}

if ( ! function_exists( 'durga_options_styles' ) ) {
	/**
	 * Adds any necessary scripts to the Durga dashboard page
	 *
	 */
	function durga_options_styles() {
		wp_enqueue_style( 'durga-options', get_template_directory_uri() . '/css/admin/admin-style.css', array(), DURGA_VERSION );
	}
}

if ( ! function_exists( 'durga_settings_page' ) ) {
	/**
	 * Builds the content of our Durga dashboard page
	 *
	 */
	function durga_settings_page() {
		?>
		<div class="wrap">
			<div class="metabox-holder">
				<div class="durga-masthead clearfix">
					<div class="durga-container">
						<div class="durga-title">
							<a href="<?php echo esc_url(DURGA_THEME_URL); ?>" target="_blank"><?php esc_html_e( 'Durga', 'durga' ); ?></a> <span class="durga-version"><?php echo DURGA_VERSION; ?></span>
						</div>
						<div class="durga-masthead-links">
							<?php if ( ! defined( 'DURGA_PREMIUM_VERSION' ) ) : ?>
								<a class="durga-masthead-links-bold" href="<?php echo esc_url(DURGA_THEME_URL); ?>" target="_blank"><?php esc_html_e( 'Premium', 'durga' );?></a>
							<?php endif; ?>
							<a href="<?php echo esc_url(DURGA_WPKOI_AUTHOR_URL); ?>" target="_blank"><?php esc_html_e( 'WPKoi', 'durga' ); ?></a>
                            <a href="<?php echo esc_url(DURGA_DOCUMENTATION); ?>" target="_blank"><?php esc_html_e( 'Documentation', 'durga' ); ?></a>
						</div>
					</div>
				</div>

				<?php
				/**
				 * durga_dashboard_after_header hook.
				 *
				 */
				 do_action( 'durga_dashboard_after_header' );
				 ?>

				<div class="durga-container">
					<div class="postbox-container clearfix" style="float: none;">
						<div class="grid-container grid-parent">

							<?php
							/**
							 * durga_dashboard_inside_container hook.
							 *
							 */
							 do_action( 'durga_dashboard_inside_container' );
							 ?>

							<div class="form-metabox grid-70" style="padding-left: 0;">
								<h2 style="height:0;margin:0;"><!-- admin notices below this element --></h2>
								<form method="post" action="options.php">
									<?php settings_fields( 'durga-settings-group' ); ?>
									<?php do_settings_sections( 'durga-settings-group' ); ?>
									<div class="customize-button hide-on-desktop">
										<?php
										printf( '<a id="durga_customize_button" class="button button-primary" href="%1$s">%2$s</a>',
											esc_url( admin_url( 'customize.php' ) ),
											esc_html__( 'Customize', 'durga' )
										);
										?>
									</div>

									<?php
									/**
									 * durga_inside_options_form hook.
									 *
									 */
									 do_action( 'durga_inside_options_form' );
									 ?>
								</form>

								<?php
								$modules = array(
									'Backgrounds' => array(
											'url' => DURGA_THEME_URL,
									),
									'Blog' => array(
											'url' => DURGA_THEME_URL,
									),
									'Colors' => array(
											'url' => DURGA_THEME_URL,
									),
									'Copyright' => array(
											'url' => DURGA_THEME_URL,
									),
									'Disable Elements' => array(
											'url' => DURGA_THEME_URL,
									),
									'Demo Import' => array(
											'url' => DURGA_THEME_URL,
									),
									'Hooks' => array(
											'url' => DURGA_THEME_URL,
									),
									'Import / Export' => array(
											'url' => DURGA_THEME_URL,
									),
									'Menu Plus' => array(
											'url' => DURGA_THEME_URL,
									),
									'Page Header' => array(
											'url' => DURGA_THEME_URL,
									),
									'Secondary Nav' => array(
											'url' => DURGA_THEME_URL,
									),
									'Spacing' => array(
											'url' => DURGA_THEME_URL,
									),
									'Typography' => array(
											'url' => DURGA_THEME_URL,
									),
									'Elementor Addon' => array(
											'url' => DURGA_THEME_URL,
									)
								);

								if ( ! defined( 'DURGA_PREMIUM_VERSION' ) ) : ?>
									<div class="postbox durga-metabox">
										<h3 class="hndle"><?php esc_html_e( 'Premium Modules', 'durga' ); ?></h3>
										<div class="inside" style="margin:0;padding:0;">
											<div class="premium-addons">
												<?php foreach( $modules as $module => $info ) { ?>
												<div class="add-on activated durga-clear addon-container grid-parent">
													<div class="addon-name column-addon-name" style="">
														<a href="<?php echo esc_url( $info[ 'url' ] ); ?>" target="_blank"><?php echo esc_html( $module ); ?></a>
													</div>
													<div class="addon-action addon-addon-action" style="text-align:right;">
														<a href="<?php echo esc_url( $info[ 'url' ] ); ?>" target="_blank"><?php esc_html_e( 'More info', 'durga' ); ?></a>
													</div>
												</div>
												<div class="durga-clear"></div>
												<?php } ?>
											</div>
										</div>
									</div>
								<?php
								endif;

								/**
								 * durga_options_items hook.
								 *
								 */
								do_action( 'durga_options_items' );
								?>
							</div>

							<div class="durga-right-sidebar grid-30" style="padding-right: 0;">
								<div class="customize-button hide-on-mobile">
									<?php
									printf( '<a id="durga_customize_button" class="button button-primary" href="%1$s">%2$s</a>',
										esc_url( admin_url( 'customize.php' ) ),
										esc_html__( 'Customize', 'durga' )
									);
									?>
								</div>

								<?php
								/**
								 * durga_admin_right_panel hook.
								 *
								 */
								 do_action( 'durga_admin_right_panel' );

								  ?>
                                
                                <div class="wpkoi-doc">
                                	<h3><?php esc_html_e( 'Durga documentation', 'durga' ); ?></h3>
                                	<p><?php esc_html_e( 'If You`ve stuck, the documentation may help on WPKoi.com', 'durga' ); ?></p>
                                    <a href="<?php echo esc_url(DURGA_DOCUMENTATION); ?>" class="wpkoi-admin-button" target="_blank"><?php esc_html_e( 'Durga documentation', 'durga' ); ?></a>
                                </div>
                                
                                <div class="wpkoi-social">
                                	<h3><?php esc_html_e( 'WPKoi on Facebook', 'durga' ); ?></h3>
                                	<p><?php esc_html_e( 'If You want to get useful info about WordPress and the theme, follow WPKoi on Facebook.', 'durga' ); ?></p>
                                    <a href="<?php echo esc_url(DURGA_WPKOI_SOCIAL_URL); ?>" class="wpkoi-admin-button" target="_blank"><?php esc_html_e( 'Go to Facebook', 'durga' ); ?></a>
                                </div>
                                
                                <div class="wpkoi-review">
                                	<h3><?php esc_html_e( 'Help with You review', 'durga' ); ?></h3>
                                	<p><?php esc_html_e( 'If You like Durga theme, show it to the world with Your review. Your feedback helps a lot.', 'durga' ); ?></p>
                                    <a href="<?php echo esc_url(DURGA_WORDPRESS_REVIEW); ?>" class="wpkoi-admin-button" target="_blank"><?php esc_html_e( 'Add my review', 'durga' ); ?></a>
                                </div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php
	}
}

if ( ! function_exists( 'durga_admin_errors' ) ) {
	add_action( 'admin_notices', 'durga_admin_errors' );
	/**
	 * Add our admin notices
	 *
	 */
	function durga_admin_errors() {
		$screen = get_current_screen();

		if ( 'appearance_page_durga-options' !== $screen->base ) {
			return;
		}

		if ( isset( $_GET['settings-updated'] ) && 'true' == $_GET['settings-updated'] ) {
			 add_settings_error( 'durga-notices', 'true', esc_html__( 'Settings saved.', 'durga' ), 'updated' );
		}

		if ( isset( $_GET['status'] ) && 'imported' == $_GET['status'] ) {
			 add_settings_error( 'durga-notices', 'imported', esc_html__( 'Import successful.', 'durga' ), 'updated' );
		}

		if ( isset( $_GET['status'] ) && 'reset' == $_GET['status'] ) {
			 add_settings_error( 'durga-notices', 'reset', esc_html__( 'Settings removed.', 'durga' ), 'updated' );
		}

		settings_errors( 'durga-notices' );
	}
}
