<?php
/*
Plugin Name: Elementor Xplrme
Plugin URI: 
Description: Elementor Xplrme Plugin Support for Elementor Page Builder to develop a nice looking website.
Author: Asad
Author URI:  https://asaduzzaman.me/
licenses:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Version: 1.0
Text Domain: xplrme
*/


if ( ! defined( 'ABSPATH' ) ) {
	die( __(" Direct Access is not allowed", 'xplrme') );
}

use Elementor\Plugin as plugin;

/**
 * Main Elementor xplrme Extension Class
 *
 * The main class that initiates and runs the plugin.
 *
 * @since 1.0.0
 */
final class Elementor_Xplrme_Extension {

	const VERSION = '1.0.0';
	const MINIMUM_ELEMENTOR_VERSION = '2.0.0';
	const MINIMUM_PHP_VERSION = '7.0';
	private static $_instance = null;


	public static function instance() {

		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;

	}

	public function __construct() {

		add_action( 'plugins_loaded', [ $this, 'on_plugins_loaded' ] );

	}

	public function i18n() {

		load_plugin_textdomain( 'xplrme' );

	}


	public function on_plugins_loaded() {

		if ( $this->is_compatible() ) {
			add_action( 'elementor/init', [ $this, 'init' ] );
		}

	}

	public function is_compatible() {

		// Check if Elementor installed and activated
		if ( ! did_action( 'elementor/loaded' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_missing_main_plugin' ] );
			return false;
		}

		// Check for required Elementor version
		if ( ! version_compare( ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_minimum_elementor_version' ] );
			return false;
		}

		// Check for required PHP version
		if ( version_compare( PHP_VERSION, self::MINIMUM_PHP_VERSION, '<' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_minimum_php_version' ] );
			return false;
		}

		return true;

	}

	public function init() {
	
		$this->i18n();
		// Add Plugin actions
		add_action( 'elementor/widgets/widgets_registered', [ $this, 'init_widgets' ] );
		add_action( 'elementor/controls/controls_registered', [ $this, 'init_controls' ] );
		add_action ( 'elementor/elements/categories_registered', [ $this, 'register_new_category' ] );

	}

	public function register_new_category( $elements_manager ) {
		
		$elements_manager -> add_category (
			'xplrme',
			[
				'title' => __ ( 'Xplrme', 'xplrme' ),
				'icon'  => 'fa fa-plug',
			]
		);
	}
	
	public function admin_notice_missing_main_plugin() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			/* translators: 1: Plugin name 2: Elementor */
			esc_html__( '"%1$s" requires "%2$s" to be installed and activated.', 'xplrme' ),
			'<strong>' . esc_html__( 'Elementor Test Extension', 'xplrme' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'xplrme' ) . '</strong>'
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

	}

	public function admin_notice_minimum_elementor_version() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			/* translators: 1: Plugin name 2: Elementor 3: Required Elementor version */
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'xplrme' ),
			'<strong>' . esc_html__( 'Elementor Test Extension', 'xplrme' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'xplrme' ) . '</strong>',
			 self::MINIMUM_ELEMENTOR_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

	}

	public function admin_notice_minimum_php_version() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			/* translators: 1: Plugin name 2: PHP 3: Required PHP version */
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'xplrme' ),
			'<strong>' . esc_html__( 'Elementor Test Extension', 'xplrme' ) . '</strong>',
			'<strong>' . esc_html__( 'PHP', 'xplrme' ) . '</strong>',
			 self::MINIMUM_PHP_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

	}

	public function init_widgets() {

		// Include Widget files
		require_once(__DIR__ . '/widgets/banner-widget.php');
		require_once(__DIR__ . '/widgets/tab-widget.php');
		require_once(__DIR__ . '/widgets/review-widget.php');
		require_once(__DIR__ . '/widgets/join-widget.php');

		// Register widget Class name
		plugin::instance()->widgets_manager->register( new \Xplrme_Elementor_Banner_Widget() );
		plugin::instance()->widgets_manager->register( new \Xplrme_Elementor_Tab() );
		plugin::instance()->widgets_manager->register( new \xplrme_Elementor_Review() );
		plugin::instance()->widgets_manager->register( new \xplrme_Join_Widget() );

	}

	public function init_controls() {

	}

}

Elementor_Xplrme_Extension::instance();