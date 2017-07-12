<?php defined( 'ABSPATH' ) or die( 'No script kiddies please!' ); ?>

<div class="wrap">
  <div class="apct-head">     
    <div class="apct-setting-header clearfix">
     <?php include(APCT_FILE_ROOT_DIR. 'inc/backend/apct-header.php');?> 
</div>    
  </div>
  <?php
    $options = get_option( APCT_SETTINGS );
    if( isset( $_SESSION['apct_message'] ) ) { ?>
        <div class="apct-message">
            <p><?php echo $_SESSION['apct_message']; unset( $_SESSION['apct_message'] ); ?></p>
        </div>
    <?php } ?>
  <h2 class="nav-tab-wrapper">                             
        <a href="javascript:void(0)" id="apct-custom-settings" class="apct-tabs-trigger nav-tab nav-tab-active"><?php _e( 'Testimonial Manager', 'ap-custom-testimonial' ); ?></a>
        <a href="javascript:void(0)" id="apct-settings" class="apct-tabs-trigger nav-tab"><?php _e( 'Custom Display Setting', 'ap-custom-testimonial' ); ?></a>
        <a href="javascript:void(0)" id="apct-shorcode" class="apct-tabs-trigger nav-tab"><?php _e( 'Shortcode Generator', 'ap-custom-testimonial' ); ?></a>
        <a href="javascript:void(0)" id="apct-about" class="apct-tabs-trigger nav-tab"><?php _e( 'About', 'ap-custom-testimonial' ); ?></a>
        <a id="apct-more-wordpress-resources" class="nav-tab" href="http://wpall.club" target="_blank"><?php _e( 'More WordPress Resources', 'ap-custom-testimonial' ); ?></a>
   </h2>
  <div id="poststuff">
    <div id="post-body" class="metabox-holder columns-2">
        <div id="post-body-content">
            <div class="meta-box-sortables ui-sortable">
                <div class="postbox">
                    <div class="apct-backend-wrapper clearfix" id="col-container">
                        <div class="apct-form-wraper">
                             <div class="inside">
                                 <form action="<?php echo admin_url() . 'admin-post.php' ?>" method='post' class="apct-setting-form" style="display:none;">
                                    <input type="hidden" name="action" value="apct_save_options" />
                                        <div class='apct-tab-contents' id='tab-apct-settings' style="display:none">
                                            <?php include( 'apct-settings.php' ); ?>
                                        </div>                                         
                                        <div class="apct-actions" id="tab-apct-submit">
                                            <input type="submit" class="button-primary" name='apct_save_settings' value="<?php _e( 'Save Settings', 'ap-custom-testimonial' ); ?>" />
                                            <?php wp_nonce_field( 'apct_nonce_save_settings', 'apct_add_nonce_save_settings' ); ?>
                                         <?php $restore_nonce = wp_create_nonce( 'apct-restore-default-settings-nonce' ); ?>
                                                <a class="apct-btn-wrap" href="<?php echo admin_url() . 'admin-post.php?action=apct_restore_default_settings&_wpnonce=' . $restore_nonce; ?>" onclick="return confirm('<?php _e( 'Reset Default Settings?', 'accesspress-custom-css' ); ?>')"><input type="button" value="<?php _e( 'Restore Default Setting', 'ap-custom-testimonial' ); ?>" class="button-primary"/></a>
                                        </div>
                                </form>
                                
                                <!-- Main page -->
                                <div class='apct-tab-contents apct-active-tab apct-main-page' id='tab-apct-custom-settings'>
                                     <?php include( 'apct-testimonial_manager.php' ); ?>
                                </div>
                                
                                <!-- About Plugin page -->
                                <div class='apct-tab-contents apct-about' id='tab-apct-about' style="display:none">
                                     <?php include( 'apct-about.php' ); ?>
                                </div>
                                
                                <!-- Shortcode page -->
                                <div class='apct-tab-contents' id='tab-apct-shorcode' style="display:none">
                                     <?php include( 'apct-shortcode.php' ); ?>
                                </div>
                            </div><!-- .inside -->
                            
                        </div><!-- .apccss-form-wraper -->
                    </div><!--  .apccss backend wrapper --> 
                </div><!-- .postbox -->
            </div><!--  .meta-box-sortables ui-sortable -->
        </div> <!-- #post-body-content -->
   
        <div id="postbox-container-1" class="postbox-container">
            <?php include(APCT_FILE_ROOT_DIR. 'inc/backend/apct-sidebar.php');?>
        </div> <!-- #postbox-container-1 .postbox-container -->
   </div><!-- .metabox-holder columns-2 #post-body -->
</div><!-- .poststuff -->
</div><!-- wrap -->
<a href="#" class="apct-scrollToTop" style="display:none; text-align:center;">
	<i class="fa  fa-angle-double-up fa-3x"></i>
</a>