<?php defined( 'ABSPATH' ) or die( 'No script kiddies please!' ); ?>
 <span class="apct-popup-close">X</span>
 <div class="apct-view-testimonia-wrap">
      <?php global $wpdb; 
       $table_name = $wpdb->prefix . "apct_testimonial_detail";
       $testimonial_detail = $wpdb->get_results("SELECT * FROM $table_name WHERE id=".$entry_id);
       foreach ($testimonial_detail as $row) {                               
        $testim_description = unserialize($row->author_details);
        $publiced_date   = strtotime($row->date);
        $new_publiced_date = date('F d, Y', $publiced_date); 
        } ?>                                                             
         <div class="apct-view-testim-details-container">                                         
           <div id="name" class="apct-view-testimonial-details">
			  <span><?php _e( 'Name:', 'ap-custom-testimonial' ); ?></span> 
               <div class="apct-view-detail-data">
                    <?php echo stripslashes_deep(esc_attr($row->author_name));?>
               </div>
           </div>
           <?php if(isset($testim_description['author_position']) && !empty($testim_description['author_position'])){ ?>
           <div id="company-position" class="apct-view-testimonial-details">
              <span><?php _e( 'Company Position:', 'ap-custom-testimonial' ); ?></span>
                    <div class="apct-view-detail-data">
                    <?php echo esc_attr($testim_description['author_position']); ?>
                    </div>
            </div>
            <?php }?>             
            <?php if(isset($testim_description['author_company']) && !empty($testim_description['author_company'])){ ?>
            <div id="company-name" class="apct-view-testimonial-details">
            	<span><?php _e( 'Company Name:', 'ap-custom-testimonial' ); ?></span>
                   <div class="apct-view-detail-data">
                        <?php echo esc_attr($testim_description['author_company']);?>
                   </div>
            </div>
            <?php }?> 
            <?php if(isset($testim_description['author_company_url']) && !empty($testim_description['author_company_url'])){ ?>
            <div id="company-url" class="apct-view-testimonial-details">
            	<span><?php _e( 'Company URL:', 'ap-custom-testimonial' ); ?></span>
                    <div class="apct-view-detail-data">
                        <?php echo esc_url($testim_description['author_company_url']);?>
                    </div>
            </div>
            <?php }?>                   
            <?php if(isset($testim_description['author_email']) && !empty($testim_description['author_email'])){ ?>
            <div id="email" class="apct-view-testimonial-details">  
                <span><?php _e( 'Email:', 'ap-custom-testimonial' ); ?></span>
                    <div class="apct-view-detail-data">
                        <?php echo esc_url($testim_description['author_email']);?>
                    </div>
            </div>
            <?php }?> 
          <?php if(isset($testim_description['author_rating_type']) && $testim_description['author_rating_type'] !='default'){ ?>
          <div id="author-rating" class="apct-view-testimonial-details"> 
		       <span><?php _e( 'Author Rating:', 'ap-custom-testimonial' ); ?></span>
                    <div class="apct-view-detail-data">
                        <?php echo esc_attr($testim_description['author_rating_type']); ?>
                    </div>
           </div>
           <?php }?> 
           <div id="image" class="apct-view-testimonial-details">
				<span><?php _e( 'Image:', 'ap-custom-testimonial' ); ?></span>
                    <div class="apct-view-detail-data">
                    <?php if($testim_description['author_image_path']){ 
                        $apct_object = new APCT_free();
                        $image_id = $apct_object->apct_retrieve_image_id($testim_description['author_image_path']);
                        $image_thumb = wp_get_attachment_image_src($image_id, 'thumbnail'); ?>
                        <img src="<?php echo $image_thumb[0]; ?>"/>
                        <?php }else{ ?><div style="font-size: 4em;"><i class="fa fa-file-image-o"></i></div><?php } ?>
                    </div>
            </div>
            <div id="description" class="apct-view-testimonial-details">
			    <span><?php _e( 'Description:', 'ap-custom-testimonial' ); ?></span>
                      <div class="apct-view-detail-data">
                        <?php echo strip_tags($testim_description['author_description']); ?>
                      </div>
            </div>
            <div id="date" class="apct-view-testimonial-details">
			    <span><?php _e( 'Date:', 'ap-custom-testimonial' ); ?></span>
                      <div class="apct-view-detail-data">
                        <?php echo esc_attr($new_publiced_date); ?>
                      </div>
            </div>
        </div><!-- .apct-view-testim-details-container -->   
</div><!-- .apct-view-testimonia-wrap -->