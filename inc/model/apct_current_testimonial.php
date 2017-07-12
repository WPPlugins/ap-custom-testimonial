<?php defined( 'ABSPATH' ) or die( 'No script kiddies please!' ); ?>
<div class="apct-editor-wrapper wrap">
<div class="apct-head">
        <div class="apct-setting-header clearfix">
             <?php include(APCT_FILE_ROOT_DIR. 'inc/backend/apct-header.php');?> 
        </div> 
 </div>
  <div id="poststuff">
    <div id="post-body" class="metabox-holder columns-2">
        <div id="post-body-content">
            <div class="meta-box-sortables ui-sortable">
                <div class="postbox">
                    <div class="apct-backend-wrapper clearfix" id="col-container">
                        <div class="apct-form-wraper">
                            <?php
                                $options = get_option( APCT_SETTINGS );
                                if( isset( $_SESSION['apct_message'] ) ) { ?>
                                    <div class="apccss-message">
                                        <p><?php echo $_SESSION['apct_message']; unset( $_SESSION['apct_message'] ); ?></p>
                                    </div>
                                <?php } ?>
                             <div class="inside">
                              <?php global $wpdb; 
                               $table_name = $wpdb->prefix . "apct_testimonial_detail";
                               $testimonial_detail = $wpdb->get_results("SELECT * FROM $table_name WHERE id=".$_GET['id']);
                               foreach ($testimonial_detail as $row){
                                $id = $_GET['id'];
                                $testim_description = unserialize($row->author_details);
                                } ?>
                               <form method="post" action="<?php echo admin_url() . 'admin-post.php' ?>" enctype="multipart/form-data" class="apct-testimonial-form">
                                        <input type="hidden" name="action" value="apct_current_testimonial_options" />
                                        <input type="hidden" name="current_post_id" value="<?php echo $_GET['id'];?>" />
                                        <div class='apct-tab-contents apct-active-tab apct-option-heading-text' id='tab-apct-custom-testimonial-settings'>
                                            <p class="apct-info"><?php _e( 'Edit Current Testimonial', 'ap-custom-testimonial' ); ?> </p>
                                              <p><?php _e( 'Edit current testimonial from here and hit "Save Your Change" button to save.', 'ap-custom-testimonial' ); ?></p>
                                            <a href="<?php echo admin_url('admin.php?page=apct-admin'); ?>" class="button button-primary">Back To Main Page</a>
                                        </div>
                                        <div class="apct-testimonial-input-field">
                                            <label for="author_name"><?php _e( 'Author Name:', 'ap-custom-testimonial' ); ?> </label>
                                            <div class="apct-testimonial-input-area">
                                                <input type="text" class="input-controller required" name="author_name" size="25" value="<?php echo esc_attr($row->author_name);?>"/>
                                            </div>
                                        </div>
                                        <div class="apct-testimonial-input-field">
                                            <label for="author_company"><?php _e( 'Company:', 'ap-custom-testimonial' ); ?></label>
                                            <div class="apct-testimonial-input-area">
                                                <input type="text" class="input-controller required" name="author_company" size="25" value="<?php echo esc_attr($testim_description['author_company']);?>"/>
                                            </div>
                                        </div>
                                        <div class="apct-testimonial-input-field">
                                            <label for="author_position"><?php _e( 'Position:', 'ap-custom-testimonial' ); ?></label>
                                            <div class="apct-testimonial-input-area">
                                                <input type="text" class="input-controller required" name="author_position" size="25" value="<?php echo esc_attr($testim_description['author_position']); ?>"/>
                                            </div>
                                        </div>                    
                                        <div class="apct-testimonial-input-field">
                                            <label for="author_company_url"><?php _e( 'Company URL:', 'ap-custom-testimonial' ); ?></label>
                                            <div class="apct-testimonial-input-area">
                                                <input type="url" class="input-controller required" name="author_company_url" size="25" value="<?php echo esc_url($testim_description['author_company_url']);?>"/>
                                            </div>
                                        </div>
                                        <div class="apct-testimonial-input-field">
                                            <label for="author_email"><?php _e( 'Email:', 'ap-custom-testimonial' ); ?></label>
                                            <div class="apct-testimonial-input-area">
                                            <input type="email" class="input-controller required" name="author_email" size="25" value="<?php echo esc_attr($testim_description['author_email']);?>"/>
                                            </div>
                                        </div>                    
                                        <div class="apct-testimonial-input-field">
                                            <!-- <label for="author_rating">< ?php _e( 'Rating:', 'ap-custom-testimonial' ); ?></label>  
                                            <input type="text" class="" placeholder="Author rating(in number)" name="author_rating" size="25"/>-->
                                            <label class="description" for="author_rating_type"><?php _e('Choose Author Rating:', 'ap-custom-testimonial'); ?></label><br />
                                               <div class="apct-testimonial-input-area">
                                                <select id="author-rating-types" size="1" name="author_rating_type" class="input-controller required">
                                                    <option value="default"><?php _e('Select Rating','ap-custom-testimonial'); ?></option>
                                                    <option value="1" <?php if(isset($testim_description['author_rating_type']) && $testim_description['author_rating_type'] == '1') echo 'selected="selected"';?>>
                                                        <?php _e('1', 'ap-custom-testimonial'); ?></option>
                                                    <option value="2" <?php if(isset($testim_description['author_rating_type']) && $testim_description['author_rating_type'] == '2') echo 'selected="selected"';?>>
                                                        <?php _e('2', 'ap-custom-testimonial'); ?></option>
                                                    <option value="3" <?php if(isset($testim_description['author_rating_type']) && $testim_description['author_rating_type'] == '3') echo 'selected="selected"';?>>
                                                        <?php _e('3', 'ap-custom-testimonial'); ?></option>
                                                    <option value="4" <?php if(isset($testim_description['author_rating_type']) && $testim_description['author_rating_type'] == '4') echo 'selected="selected"';?>>
                                                        <?php _e('4', 'ap-custom-testimonial'); ?></option>
                                                    <option value="5" <?php if(isset($testim_description['author_rating_type']) && $testim_description['author_rating_type'] == '5') echo 'selected="selected"';?>>
                                                        <?php _e('5', 'ap-custom-testimonial'); ?></option>
                                                </select>
                                                </div>
                                        </div> 
                                        <div class="apct-testimonial-input-field">
                                           <label for="apct_upload_image_url"><?php _e( 'Author Image:', 'ap-custom-testimonial' ); ?></label>
                                           <div class="apct-testimonial-input-area">
                                               <input id="apct_upload_image_url" type="text" name="apct_upload_image_url" value="<?php echo $testim_description['author_image_path']; ?>" class="input-controller required"/>
                                               <input id="apct_upload_image_button" type="button" class="input-controller image_button button-secondary"  value="Upload Image" size="25"/> 
                                            </div>
                                            <div class="image-preview">
                                                    <h4><?php _e('Image Preview:', 'ap-custom-testimonial-pro'); ?></h4>
                                                    <div class="current-image" ><img src="<?php echo esc_url($testim_description['author_image_path']); ?>" style="height:180px; width:180px;"/></div>
                                            </div>
                                        </div>
                                        <div class="apct-testimonial-input-field apct-date-select">
                                            <label class="description" for="testimonial_date"><?php _e('Select Publish Date:', 'ap-custom-testimonial'); ?></label><br />
                                            <div class="apct-testimonial-input-area">
                                                <select name="testimonial_date_type" id="testimonial-publish-date-type" class="input-controller">
                                                    <option value="admin-date"><?php _e('Use Current Saved Date', 'ap-custom-testimonial'); ?></option>
                                                    <option value="custom-date"><?php _e('Generate Custom Date', 'ap-custom-testimonial'); ?></option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="apct-testimonial-input-field apct-date-field" style="display:none">
                                            <label for="testimonial_date"><?php _e('Select Date:', 'ap-custom-testimonial') ?></label>                      
                                                <div class="apct-testimonial-input-area">
                                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                                    <input type="text" name="apct_custom_date" id="apct-custom-date" class="apct-datepicker"/>                                       
                                                </div>
                                        </div>
                                        <div class="apct-testimonial-input-field">
                                            <label for="author_description"><?php _e( 'Description:', 'ap-custom-testimonial' ); ?></label>  
                                            <div class="apct-testimonial-input-area">
                                            <?php wp_editor( $testim_description['author_description'] , 'textarea',$settings = array('textarea_name'=>'author_description','class'=>'required','media_buttons' => false)); ?> 
                                            </div>
                                        </div> 
                                        <input type="hidden" name="current_testim_date" value="<?php if(isset($row->date)){ echo $row->date; }?>"/>       
                                        <div class="apct-actions">
                                            <input type="submit" class="button-primary" name='apct_save_current_testimonial' value="<?php _e( 'Save Your Change', 'ap-custom-testimonial' ); ?>" />
                                            <?php wp_nonce_field( 'apct_nonce_current_testimonial', 'apct_add_nonce_current_testimonial' ); ?>
                                        </div>
                                </form><!-- .apct-testimonial-form -->
                            </div><!-- .inside -->
                        </div><!-- .apccss-form-wraper -->
                    </div><!--  .apccss backend wrapper -->              </div><!-- .postbox -->
            </div><!--  .meta-box-sortables ui-sortable -->
        </div> <!-- #post-body-content -->
   
        <div id="postbox-container-1" class="postbox-container">
            <?php include(APCT_FILE_ROOT_DIR. 'inc/backend/apct-sidebar.php');?>
        </div> <!-- #postbox-container-1 .postbox-container -->
   </div><!-- .metabox-holder columns-2 #post-body -->
</div> <!-- .poststuff -->
</div><!-- .apct-editor-wrapper -->