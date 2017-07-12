<?php defined( 'ABSPATH' ) or die( "No script kiddies please!" );
    global $wpdb;
    $table_name = $wpdb->prefix . "apct_testimonial_detail";
    if($_GET['id']){
			
        $current_post_id=$_GET['id'];
        $wpdb->delete(
    		$table_name,
    		array(
    			'ID' => $current_post_id
    			) 
    		); 
    }
    ?>