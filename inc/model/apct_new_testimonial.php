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
                             <div class="inside">
                                   <form method="post" action="<?php echo admin_url() . 'admin-post.php' ?>" enctype="multipart/form-data" class="apct-testimonial-form">
                                    <input type="hidden" name="action" value="apct_new_testimonial_options" />
                                    <div class='apct-tab-contents apct-active-tab apct-option-heading-text' id='tab-apct-custom-testimonial-add-settings'>
                                        <p class="apct-info"><?php _e( 'Create New Testimonial', 'ap-custom-testimonial' ); ?> </p>
                                       <p><?php _e( 'You can add new testimonial from here. Just add detail required in given input field and hit Add New Testimonial.', 'ap-custom-testimonial' ); ?></p>
                                        <a href="<?php echo admin_url('admin.php?page=apct-admin'); ?>" class="button button-primary"><?php _e('Back To Main Page','ap-custom-testimnonial');?></a>
                                        
                                    </div>
                                    <div class="apct-testimonial-input-field">
                                        <label for="author_name"><?php _e( 'Author Name:', 'ap-custom-testimonial' ); ?> </label>
                                        <div class="apct-testimonial-input-area">
                                            <input type="text" class="input-controller" name="author_name" size="25" required="required"/>
                                        </div>
                                    </div>  
                                    <div class="apct-testimonial-input-field">
                                        <label for="author_company"><?php _e( 'Company Name:', 'ap-custom-testimonial' ); ?></label>
                                        <div class="apct-testimonial-input-area">
                                            <input type="text" class="input-controller required" name="author_company" size="25"/>
                                        </div>
                                    </div>
                                    <div class="apct-testimonial-input-field">
                                        <label for="author_position"><?php _e( 'Position:', 'ap-custom-testimonial' ); ?></label>
                                        <div class="apct-testimonial-input-area">
                                            <input type="text" class="input-controller" name="author_position" size="25"/>
                                        </div>
                                    </div>
                                    <div class="apct-testimonial-input-field">
                                        <label for="author_company_url"><?php _e( 'Company URL:', 'ap-custom-testimonial' ); ?></label>
                                        <div class="apct-testimonial-input-area">
                                            <input type="url" class="input-controller" name="author_company_url" size="25"/>
                                        </div>
                                    </div>
                                    <div class="apct-testimonial-input-field">
                                        <label for="author_email"><?php _e( 'Email:', 'ap-custom-testimonial' ); ?></label>
                                        <div class="apct-testimonial-input-area">
                                            <input type="email" class="input-controller" name="author_email" size="25" />
                                       </div>
                                    </div>
                                   <div class="apct-testimonial-input-field">
                                        <!-- <label for="author_rating">< ?php _e( 'Rating:', 'ap-custom-testimonial' ); ?></label>  
                                        <input type="text" class="" placeholder="Author rating(in number)" name="author_rating" size="25"/>-->
                                        <label class="description" for="author_rating_type"><?php _e('Choose Author Rating:', 'ap-custom-testimonial'); ?></label><br />
                                          <div class="apct-testimonial-input-area">
                                            <select name="author_rating_type" id="author-rating-type" class="input-controller">
                                                <option value="default"><?php _e('Select Rating','ap-custom-testimonial'); ?></option>
                                                <option value="1"><?php _e('1', 'ap-custom-testimonial'); ?></option>
                                                <option value="2"><?php _e('2', 'ap-custom-testimonial'); ?></option>
                                                <option value="3"><?php _e('3', 'ap-custom-testimonial'); ?></option>
                                                <option value="4"><?php _e('4', 'ap-custom-testimonial'); ?></option>
                                                <option value="5"><?php _e('5', 'ap-custom-testimonial'); ?></option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="apct-testimonial-input-field">
                                        <label for="apct_upload_image_url"><?php _e( 'Author Image:', 'ap-custom-testimonial' ); ?></label>
                                        <div class="apct-testimonial-input-area">
                                           <input id="apct_upload_image_url" type="text" name="apct_upload_image_url" class="input-controller" required="required"/>
                                           <input id="apct_upload_image_button" type="button" class="image_button button-secondary input-controller"  value="Upload Image" size="25"/>
                                        </div>
                                         <div class="image-preview" style="display:none;">
                                            <h4><?php _e('Image Preview:', 'ap-custom-testimonial'); ?></h4>
                                            <div class="current-image"><img src="<?php echo APCT_IMAGE_DIR."/default.png" ?>" style="height:180px; width:180px;"/></div>
                                        </div>
                                    </div>
                                    <div class="apct-testimonial-input-field apct-date-select">
                                        <label class="description" for="testimonial_date"><?php _e('Select Publish Date:', 'ap-custom-testimonial'); ?></label><br />
                                        <div class="apct-testimonial-input-area">
                                            <select name="testimonial_date_type" id="testimonial-publish-date-type" class="input-controller">
                                                <option value="admin-date"> <?php _e('Use Today\'s Date', 'ap-custom-testimonial'); ?></option>
                                                <option value="custom-date"> <?php _e('Use Custom Date', 'ap-custom-testimonial'); ?></option>
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
                                            <?php wp_editor( '' , 'textarea',$settings = array('textarea_name'=>'author_description','required'=>'required','media_buttons' => false)); ?> 
                                         </div>
                                    </div>                                       
                                    <div class="apct-actions">
                                        <input type="submit" class="button-primary" name='apct_save_new_testimonial' value="<?php _e( 'Add new testimonial', 'ap-custom-testimonial' ); ?>" />
                                        <?php wp_nonce_field( 'apct_nonce_new_testimonial', 'apct_add_nonce_new_testimonial' ); ?>
                                    </div>
                            </form>
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
</div> <!-- poststuff -->
</div> <!-- .apct-editor-wrapper --> 