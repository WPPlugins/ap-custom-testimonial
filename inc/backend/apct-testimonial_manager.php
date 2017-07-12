<?php defined( 'ABSPATH' ) or die( 'No script kiddies please!' ); ?>
<div class="apct-testimonial-manager-wrapper">
    <div class="apct-main-page-detail apct-option-heading-text"> 
        <?php _e( 'You can use this plugin to display testimonials using shortcode.', 'ap-custom-testimonial' ); ?>
        <?php _e( 'You can use default shortcode &nbsp;[ap_custom_testimonial]&nbsp; or generate shortcode as per your requirement using shortcode generator.', 'ap-custom-testimonial' ); ?>
                
    </div>
    <div class="apct-add-new-testim">
        <a href="<?php echo admin_url('admin.php?page=apct_testimonial_create'); ?>" class="button button-primary apct-testimonial-add"><?php _e('Add New Testimonial','ap-custom-testimonial');?></a> 
    </div>
<?php global $wpdb;                       
$table_name = $wpdb->prefix . "apct_testimonial_detail";
$testimonial_details =$wpdb->get_results( "SELECT * FROM $table_name");
if ( count( $testimonial_details ) > 0 ) { ?>
<table class="wp-list-table widefat fixed posts apct-table">
    <thead>
		<tr>
			<th scope="col" id="name" class="manage-column column-shortcode">
				<?php _e( 'Name', 'ap-custom-testimonial' ); ?>
			</th>
            <th scope="col" id="Email" class="manage-column column-shortcode">
				<?php _e( 'Email', 'ap-custom-testimonial' ); ?>
			</th>
            <th scope="col" id="Image" class="manage-column column-shortcode">
				<?php _e( 'Image', 'ap-custom-testimonial' ); ?>
			</th>
            <th scope="col" id="Description" class="manage-column column-shortcode">
				<?php _e( 'Description', 'ap-custom-testimonial' ); ?>
			</th>
           
		</tr>
	</thead>
    <tfoot>
		<tr>
			<th scope="col" id="name" class="manage-column column-shortcode">
				<?php _e( 'Name', 'ap-custom-testimonial' ); ?>
			</th>
            <th scope="col" id="Email" class="manage-column column-shortcode">
				<?php _e( 'Email', 'ap-custom-testimonial' ); ?>
			</th>
            <th scope="col" id="Image" class="manage-column column-shortcode">
				<?php _e( 'Image', 'ap-custom-testimonial' ); ?>
			</th>
            <th scope="col" id="Description" class="manage-column column-shortcode">
				<?php _e( 'Description', 'ap-custom-testimonial' ); ?>
			</th>  
		</tr>
	</tfoot>
 <?php $counter=1;  
 foreach ($testimonial_details as $row) { 
    $details = unserialize($row->author_details); ?>
    <tbody id="the-list">
    <tr class="<?php if ( $counter % 2 != 0 ) { ?>alternate<?php } ?>">
       <td class="title column-title has-row-actions"> 
            <strong><?php echo stripslashes_deep(esc_attr($row->author_name)); ?></strong>    
            <div id="testimonial-action" class="row-actions" >
                <span class="testinomial-view-entry">
                    <a href="javascript:void(0);" data-entry-id="<?php echo $row->id; ?>" class="testimonial-action-button"><?php _e('View Detail |','ap-custom-testimonial');?></a>
                    <?php $apct_view_nonce = wp_create_nonce( 'apct-view-testimonial-settings-nonce' ); ?>
                </span>
                <span class="testinomial-edit-entry">
                    <a href="<?php echo admin_url('admin.php?page=apct_testimonial_edit&id='.$row->id ); ?>" class="testimonial-action-button"><?php _e('Edit |','ap-custom-testimonial');?></a>
                    <input type="hidden" name="current_post_id" value="<?php echo $row->id ;?>" /> 
                </span>
                <span class="testinomial-delete-entry">
                    <?php $apct_delete_nonce = wp_create_nonce( 'apct-remove-testimonial-settings-nonce' ); ?>
                    <a class="apct-btn-wrap" href="<?php echo admin_url() . 'admin-post.php?action=apct_testimonial_delete_options&_wpnonce=' . $apct_delete_nonce.'&id='.$row->id ?>" onclick="return confirm('<?php _e( 'Are you sure you want to delete current testimonial ?', 'ap-custom-testimonial' ); ?>')"><?php _e( 'Delete', 'ap-custom-testimonial' ); ?></a>
                </span>
            </div>
       </td>
       <td class="title column-title">
            <?php echo esc_attr($details['author_email']); ?>
       </td> 
       <td class="title column-title">
          <?php if($details['author_image_path']){  
                $apct_object = new APCT_free();
                $image_id = $apct_object->apct_retrieve_image_id($details['author_image_path']);
                $image_thumb = wp_get_attachment_image_src($image_id, 'thumbnail'); ?>
                <img src="<?php echo $image_thumb[0]; ?>" width="60px" height="60px"/>
          <?php }else{ ?><div style="font-size: 4em;"><i class="fa fa-file-image-o"></i></div><?php } ?>
       </td>
       <td class="title column-title">
         <?php 
           $testim_content= strip_tags($details['author_description']); 
            echo substr($testim_content,0,50).'...';
         ?>
       </td>
    </tr>
    </tbody>
    <?php $counter++; } } else { ?> 
        <div class="apct-testim-content-none"><strong><?php _e('No Current Data To Display. Try Adding New Testimonial by Clicking "Add Testimonial" Button.','ap-custom-testimonial');?></strong></div>
    <?php } ?>
    </table>
    <div class="apct-add-new-testim">
        <a href="<?php echo admin_url('admin.php?page=apct_testimonial_create'); ?>" class="button button-primary apct-testimonial-add"><?php _e('Add New Testimonial','ap-custom-testimonial');?></a> 
    </div>
    
    <div class="apct-boxes-wrapper">
        <div class="apct-overlay" style="display:none;"></div>
        <div id="boxes" class="boxes" style="display:none;"></div>
        <div class="apct-view-wrap" style="display:none"><span class="view-ajax-loader"></span></div>
    </div>
</div>                             