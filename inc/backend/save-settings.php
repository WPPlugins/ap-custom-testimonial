<?php defined( 'ABSPATH' ) or die( 'No script kiddies please!' );
$apct_settings = array();

//update setting page
$apct_settings['testim_image_width']        = sanitize_text_field($_POST['testim_image_width']);
$apct_settings['testim_img_brdr_color']     = sanitize_text_field($_POST['testim_img_brdr_color']);
$apct_settings['testim_bg_color']           = sanitize_text_field($_POST['testim_bg_color']);
$apct_settings['testim_image_radius']       = sanitize_text_field($_POST['testim_image_radius']);
$apct_settings['testim_author_title_color'] = sanitize_text_field($_POST['testim_author_title_color']);
$apct_settings['testim_font_family']        = sanitize_text_field($_POST['testim_font_family']);
$apct_settings['testim_font_size']          = sanitize_text_field($_POST['testim_font_size']);

update_option( APCT_SETTINGS, $apct_settings );
$_SESSION['apct_message'] = __( 'Setting Saved Successfully.', 'ap-custom-testimonial' );
wp_redirect( admin_url() . 'admin.php?page=apct-admin' );
exit;
?>