<?php

defined('ABSPATH') or die("No script kiddies please!");
/**
  Plugin name: AP Custom Testimonial
  Plugin URI: https://accesspressthemes.com/wordpress-plugins
  Description: A plugin to add testimonial to a site.
  Version: 1.3.5
  Author: AccessPress Themes
  Author URI: http://accesspressthemes.com
  Text Domain: ap-custom-testimonial
  Domain Path: /languages/
  License: GPLv2 or later
 */
//Decleration of the necessary constants for plugin
if (!defined('APCT_VERSION')) {
    define('APCT_VERSION', '1.3.5');
}

if (!defined('APCT_IMAGE_DIR')) {
    define('APCT_IMAGE_DIR', plugin_dir_url(__FILE__) . 'images');
}

if (!defined('APCT_JS_DIR')) {
    define('APCT_JS_DIR', plugin_dir_url(__FILE__) . 'js/');
}

if (!defined('APCT_CSS_DIR')) {
    define('APCT_CSS_DIR', plugin_dir_url(__FILE__) . 'css/');
}

if (!defined('APCT_TEXT_DOMAIN')) {
    define('APCT_TEXT_DOMAIN', 'ap-custom-testimonial');
}

if (!defined('APCT_LANG_DIR')) {
    define('APCT_LANG_DIR', basename(dirname(__FILE__)) . '/languages/');
}

if (!defined('APCT_SETTINGS')) {
    define('APCT_SETTINGS', 'apct-settings');
}
if (!defined('APCT_FILE_ROOT_DIR')) {
    define('APCT_FILE_ROOT_DIR', plugin_dir_path(__FILE__));
}
include(APCT_FILE_ROOT_DIR . 'inc/backend/apct-widget.php');
if (!class_exists('APCT_free')) {

    class APCT_free {

        var $apct_settings;

        function __construct() {
            $this->apct_settings = get_option(APCT_SETTINGS);
            add_action('init', array($this, 'apct_start_session_init'));
            add_action('init', array($this, 'apct_plugin_text_domain'));
            register_activation_hook(__FILE__, array($this, 'apct_plugin_activation'));
            add_action('admin_menu', array($this, 'apct_add_plugin_menu'));
            add_action('admin_enqueue_scripts', array($this, 'apct_register_admin_assets'));
            add_action('wp_enqueue_scripts', array($this, 'apct_register_frontend_assets'));
            add_action('admin_post_apct_save_options', array($this, 'apct_save_options'));
            add_action('admin_post_apct_restore_default_settings', array($this, 'apct_restore_default_settings'));
            add_action('admin_post_apct_new_testimonial_options', array($this, 'apct_new_testimonial_options'));
            add_action('admin_post_apct_current_testimonial_options', array($this, 'apct_current_testimonial_options'));
            add_action('admin_post_apct_testimonial_delete_options', array($this, 'apct_testimonial_delete_options'));
            add_action('wp_ajax_apct_testimonial_view_actions', array($this, 'apct_testimonial_view_actions'));
            add_action('widgets_init', array($this, 'apct_register_widget'));
            add_shortcode('ap_custom_testimonial', array($this, 'apct_shortcode'));
            add_action('wp_print_styles', array($this, 'apct_load_fonts'));
        }

        /** Starting Session if Not Already Started */
        function apct_start_session_init() {
            if (!session_id()) {
                session_start();
            }
        }

        /** Defining Plugin Text Domain */
        function apct_plugin_text_domain() {
            load_plugin_textdomain('ap-custom-testimonial', false, APCT_LANG_DIR);
        }

        /** On Plugin Activation */
        function apct_plugin_activation() {
            include( 'inc/backend/activate.php' );
        }

        /** On New Plugin Menu */
        function apct_add_plugin_menu() {
            add_menu_page('AP Custom Testimonial', 'AP Custom<br/>Testimonial', 'manage_options', 'apct-admin', array($this, 'apct_main_page'), 'dashicons-id');
            add_submenu_page('apct-admin', 'Testimonial Setting', 'Settings', 'manage_options', 'apct-admin', array($this, 'apct_main_page'));
            add_submenu_page('null', 'Create Testimonial', 'Create Testimonial', 'manage_options', 'apct_testimonial_create', array($this, 'apct_testimonial_create'));
            add_submenu_page('null', 'Edit Testimonial', 'Edit Testimonial', 'manage_options', 'apct_testimonial_edit', array($this, 'apct_testimonial_edit'));
            add_submenu_page('null', 'View Testimonial', 'View Testimonial', 'manage_options', 'apct_testimonial_view', array($this, 'apct_testimonial_view'));
        }

        /** Add Main Page for Plugin Admin */
        function apct_main_page() {
            include( 'inc/backend/main-page.php' );
        }

        function apct_testimonial_view() {
            include( 'inc/model/apct_view_testimonial.php' );
        }

        /** Create New Testimonial */
        function apct_testimonial_create() {
            include( 'inc/model/apct_new_testimonial.php' );
        }

        /** Edit Current Testimonial */
        function apct_testimonial_edit() {
            include( 'inc/model/apct_current_testimonial.php' );
        }

        /** Register all JS/CSS Required for Plugin Admin */
        function apct_register_admin_assets() {
            if (isset($_GET['page']) && $_GET['page'] == 'apct-admin' || 'apct_tetimonial_create') {
                $admin_ajax_nonce = wp_create_nonce('apct-admin-ajax-nonce');
                $admin_ajax_object = array('ajax_url' => admin_url('admin-ajax.php'), 'ajax_nonce' => $admin_ajax_nonce);
                wp_enqueue_script('apct-admin-js', APCT_JS_DIR . 'apct-backend.js', array('jquery', 'jquery-ui-sortable', 'wp-color-picker'), APCT_VERSION);
                wp_localize_script('apct-admin-js', 'apct_backend_js_params', $admin_ajax_object);
                wp_enqueue_style('apct-backend-css', APCT_CSS_DIR . 'backend.css', '', APCT_VERSION);
                wp_enqueue_script('apct-webfont', '//ajax.googleapis.com/ajax/libs/webfont/1.4.7/webfont.js');
                wp_enqueue_style('apct-fontawesome', APCT_CSS_DIR . 'font-awesome/font-awesome.min.css');
                wp_enqueue_style('wp-color-picker');
                wp_enqueue_media();
                wp_enqueue_style('apct-jquery-ui-css', APCT_CSS_DIR . 'jquery-ui.css');
                wp_enqueue_script('jquery-ui-datepicker');
            }
        }

        /** Registering Front end JS and CSS required */
        function apct_register_frontend_assets() {
            wp_enqueue_script('jquery');
            wp_enqueue_script('apct-bxslider-js', APCT_JS_DIR . 'jquery.bxslider.min.js', array('jquery'), true, APCT_VERSION); //Bx slider script for frontend
            wp_enqueue_style('apct-frontend-css', APCT_CSS_DIR . 'frontend.css', true, APCT_VERSION); //Frontend css
            wp_enqueue_style('apct-slider-css', APCT_CSS_DIR . 'jquery.bxslider.css', true, APCT_VERSION); //bxslider css for frontend
            wp_enqueue_script('apct-front-end-js', APCT_JS_DIR . 'frontend.js', array('apct-bxslider-js'), APCT_VERSION); //Js for Frontend
            wp_enqueue_style('apct-fontawesome', APCT_CSS_DIR . 'font-awesome/font-awesome.min.css');
        }

        /** Save Value Into Option Table */
        function apct_save_options() {
            if (isset($_POST['apct_add_nonce_save_settings']) && isset($_POST['apct_save_settings']) && wp_verify_nonce($_POST['apct_add_nonce_save_settings'], 'apct_nonce_save_settings')) {
                include( 'inc/backend/save-settings.php' );
            } else {
                die('No script kiddies please!');
            }
        }

        /** Restore Default Setting */
        function apct_restore_default_settings() {
            $restore_nonce = $_REQUEST['_wpnonce'];
            if (!empty($_GET) && wp_verify_nonce($restore_nonce, 'apct-restore-default-settings-nonce')) {
                //restore the default plugin activation settings from the activation page.
                include( 'inc/backend/activate.php' );
                $_SESSION['apct_message'] = __('Setting Restored Successfully.', 'ap-custom-testimonial');
                wp_redirect(admin_url() . 'admin.php?page=apct-admin');
                exit;
            } else {
                die('No script kiddies please!');
            }
        }

        /** Add New Testimonial Detail Into The Database Table */
        function apct_new_testimonial_options() {
            if (isset($_POST['apct_add_nonce_new_testimonial']) && isset($_POST['apct_save_new_testimonial']) && wp_verify_nonce($_POST['apct_add_nonce_new_testimonial'], 'apct_nonce_new_testimonial')) {
                include( 'inc/model-control/apct-testimonial-action.php' );
            } else {
                die('No script kiddies please!');
            }
        }

        /** Update Testimonial details into the Database */
        function apct_current_testimonial_options() {
            if (isset($_POST['apct_add_nonce_current_testimonial']) && isset($_POST['apct_save_current_testimonial']) && wp_verify_nonce($_POST['apct_add_nonce_current_testimonial'], 'apct_nonce_current_testimonial')) {
                include( 'inc/model-control/apct-testimonial-action.php' );
            } else {
                die('No script kiddies please!');
            }
        }

        /** Delete Testimonial */
        function apct_testimonial_delete_options() {
            //function to restore the default settings of a plugin       
            $apct_delete_nonce = $_REQUEST['_wpnonce'];
            if (!empty($_GET) && wp_verify_nonce($apct_delete_nonce, 'apct-remove-testimonial-settings-nonce')) {
                //restore the default plugin activation settings from the activation page.
                include( 'inc/model-control/apct-testimonial-delete.php' );
                $_SESSION['apct_message'] = __('Testimonial Deleted Successfully.', 'ap-custom-testimonial');
                wp_redirect(admin_url() . 'admin.php?page=apct-admin');
                exit;
            } else {
                die('No script kiddies please!');
            }
        }

        /** Register Testimonial Widget */
        function apct_register_widget() {
            register_widget('APCT_Widget');
        }

        /** Register font for front end */
        function apct_load_fonts() {
            wp_register_style('apct-google-fonts', '//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic|Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic|Raleway:400,100,100italic,200,200italic,300,300italic,400italic,500,500italic,600,600italic,700,700italic,800italic,800,900,900italic');
            wp_enqueue_style('apct-google-fonts');
        }

        /** Create Short codes */
        function apct_shortcode($atts) {
            ob_start();
            include( 'inc/frontend/shortcode.php' );
            $html = ob_get_contents();
            ob_get_clean();
            return $html;
        }

        /** View Testimonial Details */
        function apct_testimonial_view_actions() {
            if (isset($_POST['_wpnonce']) && wp_verify_nonce($_POST['_wpnonce'], 'apct-admin-ajax-nonce')) {
                global $wpdb;
                $entry_id = sanitize_text_field($_POST['entry_id']);
                include( 'inc/model/apct_view_testimonial.php' );
                die();
            } else {
                die('No script kiddies please!');
            }
        }

        /** Function to Retrieve thumbnail version of image in testimonial * */
        function apct_retrieve_image_id($image_url) {
            global $wpdb;
            $attachment = $wpdb->get_col($wpdb->prepare("SELECT ID FROM $wpdb->posts WHERE guid='%s';", $image_url));
            return $attachment[0];
        }

    }

    $apct_object = new APCT_free();
}