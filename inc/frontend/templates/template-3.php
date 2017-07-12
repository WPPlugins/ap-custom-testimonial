<?php defined( 'ABSPATH' ) or die( "No script kiddies please!" ); ?>

<div class="testim-template" id="<?php echo $testimonial_template;?>">
     <div class="<?php echo $testimonial_layouts; ?>" data-slide-controls="<?php echo $disp_slider_cntrl; ?>" data-slide-pager="<?php echo $disp_slider_pager; ?>" data-slide-speed="<?php echo $slider_speed; ?>" data-slide-auto="<?php echo $auto_slide; ?>" data-pause-duration="<?php echo $pause_duration; ?>" data-adaptive-height="<?php echo $adaptive_height; ?>" data-slide-mode="<?php echo $slider_mode; ?>" id="apct-layouts"> 
            <?php foreach ($testimonial_details as $row){
                    $testim_description = unserialize($row->author_details);
                   $author_name         = stripslashes_deep(esc_attr($row->author_name));
                    $author_company     = esc_attr($testim_description['author_company']);
                    $author_position    = esc_attr($testim_description['author_position']);
                    $company_url        = esc_url($testim_description['author_company_url']);
                    $author_rating      = esc_attr($testim_description['author_rating_type']);
                    $author_email       = esc_attr($testim_description['author_email']);
                    $testimonial_image  = esc_url($testim_description['author_image_path']); 
                    $author_description = html_entity_decode($testim_description['author_description']);
                    $publication_date   = strtotime($row->date);
                    $new_publicate_date = date('F d, Y', $publication_date); ?>     
     <div class="apct-testimonial-display-wrapper apct-testimonial-color 
     <?php if(isset($testimonial_layout)&& $testimonial_layout=='list-layout'){echo $testimonial_layouts_child='apct-grid-boxes';}?>
      <?php if(isset($display_image)&& $display_image == 'hide'){ echo 'apct-no-img-class'; } ?>">
        <div class="apct-upper-scetion-wrapper">
            <div class="apct-testimonial-content">
             <?php  
              if((isset($content_length)) && $content_length == 'full') { echo  $author_description; } 
              else if((isset($content_length)) && $content_length == 'excerpt') { ?>
                    <?php if ( strlen( $author_description ) >= 175 ) {
                        echo substr($author_description,0,175). '...'; }else{
                            echo $author_description; } } ?>
            </div>
        </div>
        <div class="apct-testimonial-bottom-section">
                 <div class="apct-bottom-top-section">
                    <?php if (( isset($display_title) ) && $display_title == 'show' && !empty($author_name)){ ?>
                        <div class="apct-testimonial-title-name">
                           <?php echo $author_name; ?>
                        </div>
                    <?php } ?>
                    <?php if(isset($display_rating) && $display_rating == 'show' && $author_rating != 0){ ?>                     
                        <div class="apct-testimonial-rating apct-rating-above-content clearfix">
                           <div class="apct-rating">             
                                <?php  for($i=1; $i<=$author_rating; $i++) { ?>
                                    <i class="fa fa-star"></i>
                                <?php } ?>
                           </div>
                        </div>
                    <?php } ?>             
            
                    <?php if (( isset($display_comp_detail) ) && $display_comp_detail == 'show'){ ?>                
                        <div class="apct-testimonial-company-name-position">
                           <?php if(!empty($author_position)){ ?>
                               <span class="apct-testimonial-company-position">
                                    <?php echo $author_position; ?>
                               </span>
                           <?php } ?>          
                           <?php if(!empty($company_url) && !empty($author_company) && !empty($author_position)){ ?>
                               <span class="apct-testimonial-company-name">
                                    <?php echo "&nbsp;-&nbsp;";?><a class="apct-links" href="<?php echo $company_url; ?>" target="_blank"><?php echo $author_company; ?></a>
                               </span>
                               <?php } else if(!empty($company_url) && !empty($author_company) && empty($author_position)){ ?>
                               <span class="apct-testimonial-company-name">
                                    <a class="apct-links" href="<?php echo $company_url; ?>" target="_blank"><?php echo $author_company; ?></a>
                               </span>
                           <?php } else if(!empty($company_url) && empty($author_company) && !empty($author_position)){ ?>
                               <span class="apct-testimonial-company-name">
                                    <?php $new_company_url = preg_replace('#^https?://#', '', $company_url); ?>
                                   <?php echo "&nbsp;-&nbsp;";?> <a class="apct-links" href="<?php echo $company_url; ?>" target="_blank"><?php echo $new_company_url; ?></a>
                               </span>
                           <?php } else if(!empty($company_url) && empty($author_company) && empty($author_position)){ ?>   
                               <span class="apct-testimonial-company-name">
                                    <?php $new_company_url = preg_replace('#^https?://#', '', $company_url); ?>
                                    <a class="apct-links" href="<?php echo $company_url; ?>" target="_blank"><?php echo $new_company_url; ?></a>
                                </span>
                            <?php } else if(empty($company_url) && !empty($author_company) && !empty($author_position)){ ?>
                               <span class="apct-testimonial-company-name">
                                    <?php echo "&nbsp;-&nbsp;";?><?php echo $author_company; ?>
                               </span>
                            <?php } else if(empty($company_url) && !empty($author_company) && empty($author_position)){ ?>
                               <span class="apct-testimonial-company-name">
                                    <?php echo $author_company; ?>
                               </span>
                            <?php } ?>
                        </div>
                      <?php } ?>                      
                         
                      <?php if(isset($display_email) && $display_email == 'show' && !empty($author_email))  { ?> 
                            <div class="apct-testimonial-email">
                                <?php echo $author_email; ?>
                            </div>
                      <?php } ?>  
                    
                         <?php if( isset($display_date) && $display_date == 'show' && !empty($publication_date)) { ?>
                             <div class="apct-testimonial-pub-date date-format">
                                <?php echo  $new_publicate_date; ?>
                             </div>  
                         <?php } ?>     
                </div><!-- .apct-bottom-section-right -->
                 
                <div class="apct-testimonial-bottom-lower-section testim-image-resize"> 
                    <?php  if (( isset( $display_image ) ) && $display_image == 'show')  {
                        if($testimonial_image){ ?>
                        <div class="apct-testimonial-image" >
                             <?php 
                                $apct_object = new APCT_free();
                                $image_id = $apct_object->apct_retrieve_image_id($testimonial_image);
                                $image_thumb = wp_get_attachment_image_src($image_id, 'thumbnail'); ?>
                                <img src="<?php echo $image_thumb[0]; ?>"/>
                        </div>                  
                        <?php } else{ ?><div class="apct-no-image"></div><?php }}?>
                 </div><!-- .apct-testimonial-bottom-lower-section --> 
        </div><!-- .apct-testimonial-bottom-section -->   
    </div><!-- .apct-testimonial-display-wrapper .apct-testimonial-color -->
    <?php } ?>
    </div>
        <div id="apct-bxslider-controller-3" class="apct-bxslider-controller" <?php if(isset($testimonial_layout)&& $testimonial_layout !=='slider-layout'){ echo 'style="display:none"';}?>>
             <span class="apct-slider-prev"></span>
             <span class="apct-slider-next"></span>
        </div>
    </div><!-- .testim-template #template-3 -->