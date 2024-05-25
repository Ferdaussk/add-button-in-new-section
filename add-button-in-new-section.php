<?php
/**
 * Plugin Name: Add Button In New Section
 * Description: Adds a custom icon next to the 'Add New Container' button in Elementor.
 * Plugin URI:  https://bestwpdeveloper.com/add-button-in-new-section
 * Version:     1.0
 * Author:      Best WP Developer
 * Author URI:  https://bestwpdeveloper.com/
 * Text Domain: add-button-in-new-section
 * Domain Path: /languages
 * Elementor tested up to: 3.13.4
 * Elementor Pro tested up to: 3.13.2
 */

 if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
 define("ferdaussk01_THE_PLUGIN_FILE", __FILE__);

/*
 define('BDTEP_VER', '6.12.1');
 define('BDTEP_TPL_DB_VER', '1.0.0');
 define('BDTEP__FILE__', __FILE__);
 if (!defined('BDTEP_TITLE')) {
     define('BDTEP_TITLE', 'Element Pack Pro');
 }


 define('BDTEP_PNAME', basename(dirname(BDTEP__FILE__)));
define('BDTEP_PBNAME', plugin_basename(BDTEP__FILE__));
define('BDTEP_PATH', plugin_dir_path(BDTEP__FILE__));
define('BDTEP_URL', plugins_url('/', BDTEP__FILE__));
define('BDTEP_ADMIN_PATH', BDTEP_PATH . 'admin/');
define('BDTEP_ADMIN_URL', BDTEP_URL . 'admin/');
define('BDTEP_MODULES_PATH', BDTEP_PATH . 'modules/');
define('BDTEP_INC_PATH', BDTEP_PATH . 'includes/');
define('BDTEP_ASSETS_URL', BDTEP_URL . 'assets/');
define('BDTEP_ASSETS_PATH', BDTEP_PATH . 'assets/');
define('BDTEP_MODULES_URL', BDTEP_URL . 'modules/');
*/
 final class ferdaussk01ElementorPlugiN {
     const VERSION = '1.0';
     const MINIMUM_ELEMENTOR_VERSION = '3.0.0';
     const MINIMUM_PHP_VERSION = '7.0';
     public function __construct() {
         add_action( 'ferdaussk01_init', array( $this, 'ferdaussk01_loaded_textdomain' ) );
         add_action( 'plugins_loaded', array( $this, 'ferdaussk01_init' ) );
         $this->_includes();
     }

     public function _includes(){
        
		// if (is_admin()) {
			// if (!defined('BDTEP_CH')) {
				// require_once ('admin/admin.php');

				// if (!defined('BDTEP_CH') and $template_library == 'on') {
					// require_once('template-library/template-library-base.php');
					// require_once('template-library/editor/manager/api.php');
				// }

				// Load admin class for admin related content process
				// new Admin();
			// }
		// }
     }
 
     public function ferdaussk01_loaded_textdomain() {
         load_plugin_textdomain( 'elementor-extention', false, basename(dirname(__FILE__)).'/languages' );
     }
 
     public function ferdaussk01_init() {
         // Check if Elementor installed and activated
         if ( ! did_action( 'elementor/loaded' ) ) {
             add_action( 'admin_notices', 'ferdaussk01_register_required_plugins');
             return;
         }
         // Check for required Elementor version
         if ( ! version_compare( ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=' ) ) {
             add_action( 'admin_notices', array( $this, 'ferdaussk01_admin_notice_minimum_elementor_version' ) );
             return;
         }
 
         // Check for required PHP version
         if ( version_compare( PHP_VERSION, self::MINIMUM_PHP_VERSION, '<' ) ) {
             add_action( 'admin_notices', array( $this, 'ferdaussk01_admin_notice_minimum_php_version' ) );
             return;
         }
         require_once( 'sk-import.php' );
     }
 
     public function ferdaussk01_admin_notice_minimum_elementor_version() {
         if ( isset( $_GET['activate'] ) ) {
             unset( $_GET['activate'] );
         }
 
         $message = sprintf(
             esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'elementor-extention' ),
             '<strong>' . esc_html__( 'Elementor Extention', 'elementor-extention' ) . '</strong>',
             '<strong>' . esc_html__( 'Elementor', 'elementor-extention' ) . '</strong>',
             self::MINIMUM_ELEMENTOR_VERSION
         );
         printf( '<div class="notice notice-warning is-dismissible"><p>' . esc_html__('%1$s', 'elementor-extention') . '</p></div>', $message );
     }
 
     public function ferdaussk01_admin_notice_minimum_php_version() {
         if ( isset( $_GET['activate'] ) ) {
             unset( $_GET['activate'] );
         }
 
         $message = sprintf(
             esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'elementor-extention' ),
             '<strong>' . esc_html__( 'Elementor Extention', 'elementor-extention' ) . '</strong>',
             '<strong>' . esc_html__( 'PHP', 'elementor-extention' ) . '</strong>',
             self::MINIMUM_PHP_VERSION
         );
 
         printf( '<div class="notice notice-warning is-dismissible"><p>' . esc_html__('%1$s', 'elementor-extention') . '</p></div>', $message );
     }
 }
 
 // Instantiate elementor-extention.
 new ferdaussk01ElementorPlugiN();
 remove_action( 'shutdown', 'wp_ob_end_flush_all', 1 );