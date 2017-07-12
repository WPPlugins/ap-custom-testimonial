<?php defined('ABSPATH') or die('No script kiddies please!'); ?>
<div class="apct-testimonial-example apct-option-heading-text">
    <?php _e('You can generate dynamic shortcode as per your need using setting below.', 'ap-custom-testimonial'); ?>
</div>
<div class="apct-testim-shortcode-setting">
    <h3><?php _e('General Setting', 'ap-custom-testimonial'); ?></h3>
    <div class="clearfix">
        <div class="apct-general-setting-section">
            <div class="apct-shortcode-fields">
                <label for="testimonial_type">
                    <h4><?php _e('Select Layout', 'ap-custom-testimonial'); ?></h4></label>
                <div class="apct-shortcode-setting">
                    <select name="testimonial_type" id="testimonial-type" size="1">
                        <option value="list-layout"><?php _e('List Layout', 'ap-custom-testimonial'); ?></option>
                        <option value="slider-layout"><?php _e('Slider Layout', 'ap-custom-testimonial'); ?></option>
                    </select>
                </div>
            </div>
            <div class="apct-bx-slider-controller" style="display:none;">
                <div class="bxslider-field">
                    <label for="apct_bxslider_options_mode"><h4><?php _e('Slider Mode', 'ap-custom-testimonial'); ?></h4></label>
                    <label>
                        <select id="apct_bxslider_options_mode" type="checkbox" name="apct_bxslider_contr_mode" value="true">
                            <option value="horizontal"><?php _e('Horizontal', 'ap-custom-testimonial'); ?></option>
                            <option value="fade"><?php _e('Fade', 'ap-custom-testimonial'); ?></option>
                        </select>
                    </label>
                </div>
                <div class="bxslider-field">
                    <label for="apct_bxslider_options_adaptive"><h4><?php _e('Responsive', 'ap-custom-testimonial'); ?></h4></label>
                    <label>
                        <label><input id="apct_bxslider_options_adaptive" type="checkbox" name="apct_bxslider_options_adaptive" value="true" checked="checked"/><?php _e('True/False', 'ap-custom-testimonial'); ?></label>
                        <label for="apct_bxslider_options_controls" class="description"><?php _e('If unchecked, adaptive height will be disabled for slider.', 'ap-custom-testimonial'); ?></label>    
                    </label>
                </div>
                <div class="bxslider-field">
                    <label for="apct_bxslider_options_controls"><h4><?php _e('Display Prev/Next Controls', 'ap-custom-testimonial'); ?></h4></label>
                    <label><input id="apct_bxslider_options_controls" type="checkbox" name="apct_bxslider_contr_pos" value="true" checked="checked"/><?php _e('Show/Hide', 'ap-custom-testimonial'); ?></label>
                    <label for="apct_bxslider_options_controls" class="description"><?php _e('If unchecked, "Next" / "Prev" controls will be hided.', 'ap-custom-testimonial'); ?></label>
                </div>
                <div class="bxslider-field">
                    <label for="bxslider_options_pager"><h4><?php _e('Display Pager', 'ap-custom-testimonial'); ?></h4> </label>
                    <label><input id="bxslider_options_pager" type="checkbox" name="apct_bxslider_pager" value="true" checked="checked"/><?php _e('Show/Hide', 'ap-custom-testimonial'); ?></label>
                    <label for="bxslider_options_pager" class="description"><?php _e('If unchecked, pager will be hided.', 'ap-custom-testimonial'); ?></label>
                </div>
                <div class="bxslider-field">
                    <label for="bxslider_options_speed"><h4><?php _e('Slider Speed', 'bxslider'); ?></h4></label>
                    <input id="bxslider_options_speed" type="text" name="apct_bxslider_slider_speed" value="1000" />
                    <label for="bxslider_options_speed" class="description"><?php _e('Speed of slider(in milisecond). Default is 1000.', 'ap-custom-testimonial'); ?></label>
                </div>
                <div class="bxslider-field">
                    <label for="apct_bxslider_options_auto"><h4><?php _e('Auto Slide', 'ap-custom-testimonial'); ?></h4></label>
                    <label><input id="apct_bxslider_options_auto" type="checkbox" name="apct_bxslider_option_auto" value="true" /><?php _e('Yes/No', 'bxslider'); ?></label>
                    <label for="apct_bxslider_options_auto" class="description"><?php _e('If checked, auto slide will be implemented.', 'ap-custom-testimonial'); ?></label>
                </div>
                <div class="bxslider-field">
                    <label for="slider_pause_duration"><h4><?php _e('Pause Duration', 'ap-custom-testimonial'); ?></h4></label>
                    <input type="text" maxlength="4" name="slider_pause_duration" id="slider-pause-duration" class="apct_restrict" value="6000" />
                    <label for="slider_pause_duration" class="description"><?php _e('if auto slide enabled, slider pause duration(in millisecond).Default is 6000. ', 'ap-custom-testimonial'); ?></label>
                </div> 
            </div>
            <div class="apct-shortcode-fields">
                <label for="testimonial_template">
                    <h4><?php _e('Select Template', 'ap-custom-testimonial'); ?></h4></label>
                <div class="apct-shortcode-setting">
                    <select name="testimonial_template" id="testimonial-template" class="template-design" size="1" >
                        <?php for ($i = 1; $i <= 5; $i++) { ?>
                            <option class="apct-testim-temp" value="template-<?php echo $i; ?>"><?php
                                _e('Template', 'ap-custom-testimonial');
                                echo " " . $i;
                                ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
        </div>
        <div class="apct-template-demo">
            <?php for ($cnt = 1; $cnt <= 5; $cnt++) { ?>
                <div class="testim-common" id="tesim-temp-demo-<?php echo $cnt; ?>" <?php if ($cnt != 1) { ?>style="display:none;"<?php } ?>>
                    <img src="<?php echo APCT_IMAGE_DIR . '/template-' . $cnt . '.jpg' ?>"/>
                </div>
            <?php } ?> 
        </div>
    </div>
    <div class="apct-shortcode-fields">
        <h4><?php _e('Content Length', 'ap-custom-testimonial'); ?></h4>
        <label><input type="radio" id="excerpt_length" name="testim_cont_type" value="excerpt" class="testim-cont-type" />
            <?php _e('Use an excerpt for long Testimonial', 'ap-custom-testimonial'); ?></label>
        <label><input type="radio" id="full_length" name="testim_cont_type" value="full" class="testim-cont-type" checked="checked"/>
            <?php _e('Display full length Testimonial', 'ap-custom-testimonial'); ?></label>
        <label class="description" for="testim_cont_type"><?php _e('Choose content type you would like to display. If excerpt selected, content will be truncated', 'ap-custom-testimonial'); ?></label>
    </div>
    <div class="apct-shortcode-fields">
        <label for="testim_display_num"><h4><?php _e('Number of Testimonials you want to display', 'ap-custom-testimonial'); ?></h4></label>
        <div class="apct-shortcode-setting">
            <label><input type="radio" id="testim-all" name="testim_display_num" value="all" class="testim-no" checked="checked"/>Display All Testimonial</label>
            <label><input type="radio" id="testim-custom" name="testim_display_num" value="custom" class="testim-no" />Use Custom Numbers</label>
        </div>
        <div class="custom-display-testim-num" style="display:none;">
            <input type="number" name="custom_display_testim_num" id="custom-display-testim-num" value="8" placeholder="Ex@ 8" />
        </div>
    </div>
    <div class="apct-shortcode-fields">
        <label for="testim_custom_design"><h4><?php _e('Enable Custom Layout ?', 'ap-custom-testimonial'); ?></h4></label>
        <div class="apct-shortcode-setting">
            <label><input type="checkbox" name="testim_custom_design" value="disable" checked="checked"/>   
                <?php _e('Enable/Disable', 'ap-custom-testimonial'); ?></label>
            <label class="description" for="testim_custom_design"><?php _e('Uncheck to enable custom layout design. If enabled, custom layout design in option page will be implemented.<br/>Else default layout will be loaded for selected template.', 'ap-custom-testimonial'); ?></h4></label>
        </div>
    </div>

</div>

<div class="apct-show-hide-section">
    <h3><?php _e('Show/hide Contents', 'ap-custom-testimonial'); ?></h3>
    <div class="apct-shortcode-fields">
        <label for="show_testim_title"><h4><?php _e('Display Titles ?', 'ap-custom-testimonial'); ?></h4></label>
        <div class="apct-shortcode-setting">
            <label><input type="checkbox" name="show_testim_title" value="show" checked="checked"/>   
                <?php _e('Show/Hide', 'ap-custom-testimonial'); ?></label>
        </div>
    </div>

    <div class="apct-shortcode-fields">
        <label for="show_testim_comp_name"><h4><?php _e('Display Company Detail ?', 'ap-custom-testimonial'); ?></h4></label>
        <div class="apct-shortcode-setting">
            <label><input type="checkbox" name="show_testim_comp_name" value="show" checked="checked"/>
                <?php _e('Show/Hide', 'ap-custom-testimonial'); ?><label>
                    </div>
                    </div>

                    <div class="apct-shortcode-fields">
                        <label for="show_author_email"><h4><?php _e('Display Author Email ?', 'ap-custom-testimonial'); ?></h4></label>
                        <div class="apct-shortcode-setting">
                            <label><input type="checkbox" name="show_author_email" value="show" checked="checked"/>
                                <?php _e('Show/Hide', 'ap-custom-testimonial'); ?><label>
                                    </div>
                                    </div>

                                    <div class="apct-shortcode-fields">
                                        <label for="testim_publication_date"><h4><?php _e('Display Publication Date ?', 'ap-custom-testimonial'); ?></h4></label>
                                        <div class="apct-shortcode-setting">
                                            <label><input type="checkbox" name="testim_publication_date" value="show" checked="checked"/>
                                                <?php _e('Show/Hide', 'ap-custom-testimonial'); ?></label>
                                        </div>
                                    </div>

                                    <div class="apct-shortcode-fields">
                                        <label for="testim_featured_image"><h4><?php _e('Display Featured Images ?', 'ap-custom-testimonial'); ?></h4></label>
                                        <div class="apct-shortcode-setting">
                                            <label><input type="checkbox" name="testim_featured_image" value="show" checked="checked"/> 
                                                <?php _e('Show/Hide', 'ap-custom-testimonial'); ?><label>
                                                    </div>
                                                    </div>
                                                    <div class="apct-shortcode-fields"> 
                                                        <label for="testim_rating_type"><h4><?php _e('Display Ratings ?', 'ap-custom-testimonial'); ?></h4></label>
                                                        <div class="apct-backend-setting">
                                                            <label><input type="checkbox" id="rating_as_star" name="testim_rating_type" value="show" class="testim-rating-type" checked="checked"/>
                                                                <?php _e('Show/Hide', 'ap-custom-testimonial'); ?></label>
                                                        </div>
                                                    </div>
                                                    </div>

                                                    <div class="apct-orderby-section">
                                                        <h3><?php _e('Order of Testimonial', 'ap-custom-testimonial'); ?></h3>
                                                        <div class="apct-shortcode-fields">
                                                            <label for="testim_order_by"><h4><?php _e('Select Order of The Display', 'ap-custom-testimonial'); ?></h4></label>
                                                            <div class="apct-shortcode-setting">
                                                                <select name="testim_order_by_iand" id="testim_order_by_iand" size="1">
                                                                    <option value="id">
                                                                        <?php _e('ID', 'ap-custom-testimonial'); ?></option>
                                                                    <option value="author_name">
                                                                        <?php _e('Author Name', 'ap-custom-testimonial'); ?></option>
                                                                    <option value="date">
                                                                        <?php _e('Date', 'ap-custom-testimonial'); ?></option>
                                                                    <option value="random">
                                                                        <?php _e('Random', 'ap-custom-testimonial'); ?></option>
                                                                </select>
                                                            </div>

                                                            <label for="testim_order_by_ascdsc"><h4><?php _e('Select Order for Above Selected Option', 'ap-custom-testimonial'); ?></h4></label>
                                                            <div class="apct-shortcode-setting">
                                                                <select name="testim_order_by_ascdsc" id="testim_order_by_ascdsc" size="1">
                                                                    <option value="ASC">
                                                                        <?php _e('Ascending Order', 'ap-custom-testimonial'); ?></option>
                                                                    <option value="DESC">
                                                                        <?php _e('Descending Order', 'ap-custom-testimonial'); ?></option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="shorcode-generated">
                                                        <div class="apct-shortcode-buttons">
                                                            <input type="button" class="button-primary apct-shortcode-button" value="<?php _e('Generate Shortcode', 'ap-custom-testimonial'); ?>"/>
                                                        </div>
                                                        <div class="text-area-genertating-shortcode">
                                                            <?php _e('You can copy generated shortcode anywhere either post, page or widget.', 'ap-custom-testimonial'); ?>
                                                            <textarea name="apct_generated_shortcode" id="apct-generated-shortcode" readonly="readonly"></textarea>
                                                        </div>
                                                    </div>