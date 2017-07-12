<?php   
 defined( 'ABSPATH' ) or die( "No script kiddies please!" );
   global $wpdb;
   $allowedposttags = array(
            'a' => array(
                'href' => array (),
                'title' => array ()),
            'hr' =>array(),
            'abbr' => array(
                'title' => array ()),
            'b' => array(),
            'ul' =>array(),
            'li' =>array(),
            'blockquote' => array(
                'cite' => array ()),
            'cite' => array (),
            'code' => array(),
            'del' => array(
                'datetime' => array ()),
            'em' => array (), 
            'i' => array (),
            'q' => array(
                'cite' => array ()),
            'strike' => array(),
            'strong' => array(),
        );
   if(isset($_POST['apct_save_new_testimonial'])) {
    $apct_testim_detail = array();
    $author_name         = sanitize_text_field( $_POST['author_name']);
    $author_position     = sanitize_text_field( $_POST['author_position']);
    $author_company      = sanitize_text_field( $_POST['author_company']);
    $author_company_url  = sanitize_text_field( $_POST['author_company_url']);
    $author_email        = sanitize_text_field( $_POST['author_email']);
    $author_image_path   = sanitize_text_field( $_POST['apct_upload_image_url']);
    $author_description  = wp_kses($_POST['author_description'],$allowedposttags);
    
    $admin_date        = date("Y-m-d");
        if(isset($_POST['testimonial_date_type']) && $_POST['testimonial_date_type'] == 'admin-date')
        { 
            $current_date = $admin_date; 
        } else if(isset($_POST['testimonial_date_type']) && $_POST['testimonial_date_type'] == 'custom-date')
        { 
            $current_date = sanitize_text_field($_POST['apct_custom_date']); 
        }
    $table_name          = $wpdb->prefix . "apct_testimonial_detail";
    $apct_testim_detail['author_position']    = $author_position;
    $apct_testim_detail['author_company']     = $author_company;
    $apct_testim_detail['author_company_url'] = $author_company_url;
    $apct_testim_detail['author_email']       = $author_email;
    $apct_testim_detail['author_rating_type'] = intval($_POST['author_rating_type']);
    $apct_testim_detail['author_image_path']  = $author_image_path;
    $apct_testim_detail['author_description'] = stripslashes_deep($author_description);
    $apct_testim_detail['publish_date']       = $current_date;
    $insert = $wpdb->query($wpdb->prepare
        ("INSERT INTO ".$table_name."
        	(author_name, author_details, date)
        	   VALUES(%s,%s,%s)",
                	array(
                    $author_name,
                	maybe_serialize($apct_testim_detail),
                    $current_date
	           )
            )
       );
    if($insert){
        $_SESSION['apct_message'] = __( 'Testimonial Added Successfully.', 'ap-custom-testimonial' );   
        wp_redirect( admin_url() . 'admin.php?page=apct-admin' );
        }
    else {
        $_SESSION['apct_message'] = __( 'Testimnoial Couldnot Be Added. Please Try Again.', 'ap-custom-testimonial' );   
        wp_redirect( admin_url() . 'admin.php?page=apct-admin' );
        }
    } elseif(isset($_POST['apct_save_current_testimonial'])) {

    $current_post_id     = sanitize_text_field($_POST['current_post_id']);
    $author_name         = sanitize_text_field($_POST['author_name']);
    $author_position     = sanitize_text_field($_POST['author_position']);
    $author_company      = sanitize_text_field($_POST['author_company']);
    $author_company_url  = sanitize_text_field($_POST['author_company_url']);
    $author_email        = sanitize_text_field($_POST['author_email']);
    $author_rating       = sanitize_text_field($_POST['author_rating_type']);
    $author_image_path   = sanitize_text_field($_POST['apct_upload_image_url']);
    $author_description  = wp_kses($_POST['author_description'],$allowedposttags);
    
    $admin_date = sanitize_text_field($_POST['current_testim_date']);
        if(isset($_POST['testimonial_date_type']) && $_POST['testimonial_date_type'] == 'admin-date')
        { 
            $current_date = $admin_date; 
        } else if(isset($_POST['testimonial_date_type']) && $_POST['testimonial_date_type'] == 'custom-date')
        { 
            $current_date = sanitize_text_field($_POST['apct_custom_date']); 
        }
    $table_name          = $wpdb->prefix . "apct_testimonial_detail";
    
    $apct_testim_detail['author_position']    = $author_position;
    $apct_testim_detail['author_company']     = $author_company;
    $apct_testim_detail['author_company_url'] = $author_company_url;
    $apct_testim_detail['author_email']       = $author_email;
    $apct_testim_detail['author_rating_type'] = intval($_POST['author_rating_type']);
    $apct_testim_detail['author_image_path']  = $author_image_path;
    $apct_testim_detail['author_description'] = stripslashes_deep($author_description);
    $update = $wpdb->update( ''.$wpdb->prefix.'apct_testimonial_detail', 
        array(
            'author_name'    => $author_name, 
            'author_details' => maybe_serialize($apct_testim_detail),
            'date'           => $current_date
            ),
             array( 
                'ID' => $current_post_id 
                ),
                array( 
                     '%s',
                     '%s',
                     '%s'
                      ),
                      array( 
                        '%d' 
                ));
    if($update){
        $_SESSION['apct_message'] = __( 'Testimonial Updated Successfully.', 'ap-custom-testimonial' );   
        wp_redirect( admin_url() . 'admin.php?page=apct-admin' );
        }
    else {
        $_SESSION['apct_message'] = __( 'No changes Made.', 'ap-custom-testimonial' );   
        wp_redirect( admin_url() . 'admin.php?page=apct-admin' );
        }
    }
    ?>