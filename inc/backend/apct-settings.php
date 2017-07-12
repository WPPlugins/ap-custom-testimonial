<?php defined( 'ABSPATH' ) or die( 'No script kiddies please!' ); ?>

<?php 
$font_family = $options['testim_font_family'];
if($font_family !="default"){ 
        $fonts_final = str_replace(' ', '+', $font_family);?>
     <link rel='stylesheet' id='wpfm-google-fonts-style-css' href='//fonts.googleapis.com/css?family=<?php echo $fonts_final;?>' type='text/css' media='all' />
<?php } ?>
  <div class="afct-option-setting-wrapper">
        <div class="apct-testtim-option-detail apct-option-heading-text">
            <?php _e( 'Adjust settings below to control testimonial as you require.', 'ap-custom-testimonial' ); ?>
        </div>                
        <div class="apct-general-setting-section image-setting-section"> 
           <h3><?php _e('Image Setting', 'ap-custom-testimonial'); ?></h3>
                <label for="testim_image_size"><h4><?php _e('Image Size', 'ap-custom-testimonial'); ?></h4></label>
                <div class="apct-image-section">
                    <input type="number" name="testim_image_width" placeholder="Ex@ 100" value="<?php if( isset( $options['testim_image_width'] ) ) { echo $options['testim_image_width']; } ?>" /><br />
                    <label class="description" for="testim_image_size"><?php _e('Image width value (without px)', 'ap-custom-testimonial'); ?></label>
                </div>
                
                <div class="apct-image-section">
                    <label for="testim_img_brdr_color"><h4><?php _e('Image Border Color', 'ap-custom-testimonial'); ?></h4></label>
                            <input type="text" name="testim_img_brdr_color" class="apct-color-field" value="<?php if( isset( $options['testim_img_brdr_color'] ) ) { echo $options['testim_img_brdr_color']; } ?>"  />
                </div>
                
                <div class="apct-image-section">
                    <label for="testim_img_brdr_width"><h4><?php _e('Image Border Width', 'ap-custom-testimonial'); ?></h4></label>
                            <input type="number" name="testim_img_brdr_width" placeholder="Ex@ 2" value="<?php if( isset( $options['testim_img_brdr_width'] ) ) { echo $options['testim_img_brdr_width']; } ?>"  /><br />
                            <label class="description" for="testim_img_brdr_width"><?php _e('Image border width value (without px).', 'ap-custom-testimonial'); ?></label>
                </div> 
                
                <div>
                    <label for="testim_image_radius"><h4><?php _e('Image Border Radius', 'ap-custom-testimonial'); ?></h4></label>
                        <input type="number" name="testim_image_radius" placeholder="Ex@ 50" class="testim-image-radius" value="<?php if( isset( $options['testim_image_radius'] ) ) { echo $options['testim_image_radius']; } ?>" /><br />
                            <label class="description" for="testim_image_radius"><?php _e('Image border radius value (without %).', 'ap-custom-testimonial'); ?></label>
                </div>
        </div>
         <div class="apct-general-setting-section color-setting-section"> 
            <h3><?php _e('Color Setting', 'ap-custom-testimonial'); ?></h3>
            <div class="color-setting-op">
                <label for="testim_bg_color"><h4><?php _e('Background Color', 'ap-custom-testimonial'); ?></h4></label>
                        <input type="text" name="testim_bg_color" id="testim_bg_color" value="<?php if( isset( $options['testim_bg_color'] ) ) { echo $options['testim_bg_color']; } ?>"  />
            </div>
            
             <div class="color-setting-op">
                <label for="testim_author_title_color"><h4><?php _e('Font Color', 'ap-custom-testimonial'); ?></h4></label>
                        <input type="text" id="testim_author_title_color" name="testim_author_title_color" value="<?php if( isset( $options['testim_author_title_color'] ) ) { echo $options['testim_author_title_color']; } ?>"  />
            </div>
        </div>
        <div class="apct-general-setting-section typography-setting-section"> 
        <h3><?php _e('Typography Setting', 'ap-custom-testimonial'); ?></h3>
            <div class="apct-font-select">
                <?php
                    $apct_tes_fonts = get_option('apct_tes_fonts');
                    //var_dump($apct_tes_fonts);    
                ?>
                <label for="testim_font_family"><h4><?php _e('Font Family','ap-custom-testimonial');?></h4></label>
                <select name="testim_font_family" id="testimonial-google-font" class="testimnial-font">
                    <option value="default">Default</option>
                    <?php foreach ($apct_tes_fonts as $apct_tes_font) { ?>
                          <option value="<?php echo $apct_tes_font;?>" <?php if( $options['testim_font_family'] == $apct_tes_font )echo 'selected="selected"';?>><?php echo $apct_tes_font;?></option>
                    <?php } ?>
                </select><br />
                <label class="description" for="testim_font_family"><?php _e('Choose Testimonial content font family.','ap-custom-testimonial')?></label>
            </div>
            
            <div class="apct-font-demo-wrap">
                <span id="apct-font-family">The Quick Brown Fox Jumps Over The Lazy Dog.</span>
            </div>
            
            <div>
                <label for="testim_font_size"><h4><?php _e('Font Size', 'ap-custom-testimonial'); ?></h4></label>
                <input type="number" id="testim_font_size" name="testim_font_size" placeholder="Ex@ 22px" value="<?php if( isset( $options['testim_font_size'] ) ) { echo $options['testim_font_size']; } ?>" /><br />
                <label class="description" for="testim_font_size"><?php _e('Font size value (without px)', 'ap-custom-testimonial'); ?></label>
            </div>
        </div>
</div>
    <style>
    .apct-font-demo-wrap {
      background:<?php echo esc_attr($options['testim_bg_color']);?>;
    }
    .apct-font-demo-wrap #apct-font-family {
        font-family: <?php echo isset($options['testim_font_family']) && $options['testim_font_family'] != 'default'?esc_attr($options['testim_font_family']):'inherit';?>;
        font-size: <?php echo esc_attr($options['testim_font_size']).'px';?>;
        color:<?php echo esc_attr($options['testim_author_title_color']); ?>
    }
    </style>        