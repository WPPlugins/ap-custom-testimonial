<?php defined('ABSPATH') or die("No script kiddies please!"); ?>

<?php
global $wpdb;
$options = get_option(APCT_SETTINGS);
$random_num = rand(111111111, 999999999);
$random_id = 'apct-' . $random_num;

//Defining Default Shortcode Attributes for Slider Controller option
$slider_mode = (isset($atts['slider_mode'])) ? $atts['slider_mode'] : 'horizontal';          //Slider mode horizontal by dafault
$adaptive_height = (isset($atts['adaptive_height'])) ? $atts['adaptive_height'] : 'true';    //Adaptive height true by dafault
$disp_slider_cntrl = (isset($atts['slider_control'])) ? $atts['slider_control'] : 'true';     //Slider Control true by default
$disp_slider_pager = (isset($atts['slider_pager'])) ? $atts['slider_pager'] : 'true';         //Slider Pager true by default
$slider_speed = (isset($atts['slider_speed'])) && !empty($atts['slider_speed']) ? $atts['slider_speed'] : '1000'; //Slider Speed 1000 by default
$auto_slide = (isset($atts['auto'])) ? $atts['auto'] : 'false';                              //slider auto control false by default
$pause_duration = (isset($atts['pause_duration'])) && !empty($atts['pause_duration']) ? $atts['pause_duration'] : '6000'; // Pause duration 6000 by default   
//Defining Default Shortcode attributes for Other options
$testimonial_layout = (isset($atts['type'])) ? $atts['type'] : 'list-layout';                 //Testimonial Type Grid layout by default
$testimonial_template = (isset($atts['template'])) ? $atts['template'] : 'template-1';        //Testimonial Template 1 by default
$enable_custom_layout = (isset($atts['custom_layout'])) ? $atts['custom_layout'] : 'disable'; // disable custom layout by default
$display_image = (isset($atts['image'])) ? $atts['image'] : 'show';                           // display Date by default
$display_title = (isset($atts['title'])) ? $atts['title'] : 'show';                           // display Author Name by default
$display_comp_detail = (isset($atts['comp_detail'])) ? $atts['comp_detail'] : 'show';         // display COmpany Name/URL by default
$display_date = (isset($atts['date'])) ? $atts['date'] : 'show';
$display_email = (isset($atts['email'])) ? $atts['email'] : 'show';                           // display Date by default
$display_rating = (isset($atts['rating'])) ? $atts['rating'] : 'show';                        // display rating as star by default 
$testimonial_no = (isset($atts['display_num'])) && !empty($atts['display_num']) ? $atts['display_num'] : 'all';  // Number of testimonial To Display
$order_by = (isset($atts['order_by'])) ? $atts['order_by'] : 'id';                            // Display order by id by default
$order_type = (isset($atts['order_type'])) ? $atts['order_type'] : 'ASC';                     // Display order type ASC by default
$content_length = (isset($atts['content_length'])) ? $atts['content_length'] : 'full';      //Content Length full by default    
?>
<?php
$apct_table_name = $wpdb->prefix . "apct_testimonial_detail";
if (isset($testimonial_no) && $testimonial_no == 'all') {
    $testimonial_number = '9999';
} else if (isset($testimonial_no) && $testimonial_no == $atts['display_num']) {
    $testimonial_number = $atts['display_num'];
}
if (isset($order_by) && $order_by == 'id') {
    $orders_by = 'id';
} else if (isset($order_by) && $order_by == 'author_name') {
    $orders_by = 'author_name';
} else if (isset($order_by) && $order_by == 'date') {
    $orders_by = 'date';
} else if (isset($order_by) && $order_by == 'random') {
    $orders_by = 'RAND()';
}
if (isset($order_type) && $order_type == 'ASC') {
    $order_types = 'ASC';
} else if (isset($order_type) && $order_type == 'DESC') {
    $order_types = 'DESC';
}

$testimonial_details = $wpdb->get_results("SELECT * FROM $apct_table_name ORDER BY $orders_by $order_types LIMIT $testimonial_number");
?>
<?php
if (isset($testimonial_layout) && $testimonial_layout == 'slider-layout') {
    $testimonial_layouts = 'apct-slider-layout';
} else if (isset($testimonial_layout) && $testimonial_layout == 'list-layout') {
    $testimonial_layouts = 'apct-list-layout';
}
?> 
<div class="apct-testim-wrapper" id="<?php echo $random_id; ?>">
    <?php
    if (isset($testimonial_template) && $testimonial_template == 'template-1') {
        include('templates/template-1.php');
        ?>
        <?php
    } else {
        $template = $testimonial_template . '.php';
        include('templates/' . $template);
    }
    ?>
</div>

<?php if (isset($enable_custom_layout) && $enable_custom_layout = 'enable' && $enable_custom_layout != 'disable') { ?>

    <style> 
        #<?php echo $random_id; ?> #template-1 .apct-testimonial-image,
        #<?php echo $random_id; ?> #template-2 .apct-testimonial-image,
        #<?php echo $random_id; ?> #template-3 .apct-testimonial-image,
        #<?php echo $random_id; ?> #template-5 .apct-testimonial-image
        {
            border: <?php
            if (!empty($options['testim_img_brdr_width'])) {
                echo esc_attr($options['testim_img_brdr_width']);
            } else {
                print '2';
            }
            ?>px solid <?php
                if (!empty($options['testim_img_brdr_color'])) {
                    echo esc_attr($options['testim_img_brdr_color']);
                } else {
                    print '#BBBBBB';
                }
                ?>;
            overflow: hidden;  
        }

        #<?php echo $random_id; ?> #template-4 .apct-testimonial-image
        {
            border: <?php
            if (!empty($options['testim_img_brdr_width'])) {
                echo esc_attr($options['testim_img_brdr_width']);
            } else {
                print '2';
            }
            ?>px solid <?php
                if (!empty($options['testim_img_brdr_color'])) {
                    echo esc_attr($options['testim_img_brdr_color']);
                } else {
                    print '#BBBBBB';
                }
                ?>;   
        }

        #<?php echo $random_id; ?> .apct-testimonial-image,
        #<?php echo $random_id; ?> .apct-testimonial-image img
        {
            border-radius:<?php
            if (!empty($options['testim_image_radius'])) {
                echo esc_attr($options['testim_image_radius'] . '%!important');
            } else {
                print '0%';
            }
            ?>;
        }

        #<?php echo $random_id; ?> #template-1 .testim-image-resize,
        #<?php echo $random_id; ?> #template-2 .testim-image-resize,
        #<?php echo $random_id; ?> #template-3 .testim-image-resize,
        #<?php echo $random_id; ?> #template-4 .testim-image-resize,
        #<?php echo $random_id; ?> #template-5 .testim-image-resize
        {
            width:<?php
            if (!empty($options['testim_image_width'])) {
                echo esc_attr($options['testim_image_width']);
            } else {
                echo '125';
            }
            ?>px;  
        }

        #<?php echo $random_id; ?> #template-1 .apct-testimonial-color,
        #<?php echo $random_id; ?> #template-3 .apct-testimonial-color,
        #<?php echo $random_id; ?> #template-5 .apct-testimonial-left-section,
        #<?php echo $random_id; ?> #template-5 .apct-testimonial-right-section
        {
            background:<?php
            if (!empty($options['testim_bg_color'])) {
                echo esc_attr($options['testim_bg_color']);
            } else {
                echo '#FFF';
            }
            ?>; 
        }

        #<?php echo $random_id; ?> #template-4 .apct-testimonial-mid-section{
            background:<?php
            if (!empty($options['testim_bg_color'])) {
                echo esc_attr($options['testim_bg_color']);
            } else {
                echo '#eff1f2';
            }
            ?>;   


        }
        #<?php echo $random_id; ?> #template-2 .apct-upper-scetion-wrapper:before
        {
            color:<?php
            if (!empty($options['testim_bg_color'])) {
                echo esc_attr($options['testim_bg_color']);
            } else {
                echo '#eee';
            }
            ?>;   
        }

        #<?php echo $random_id; ?> #template-2 .apct-upper-scetion-wrapper
        {
            background-color:<?php
            if (!empty($options['testim_bg_color'])) {
                echo esc_attr($options['testim_bg_color']);
            } else {
                echo '#eee';
            }
            ?>;   
        }

        #<?php echo $random_id; ?> .apct-testimonial-content, 
        #<?php echo $random_id; ?> .apct-testimonial-title-name, 
        #<?php echo $random_id; ?> .apct-testimonial-company-position,
        #<?php echo $random_id; ?> .apct-testimonial-company-name,
        #<?php echo $random_id; ?> .apct-testimonial-email, 
        #<?php echo $random_id; ?> .apct-testimonial-pub-date, 
        #<?php echo $random_id; ?> a.apct-links 
        {
            font-family: <?php
            if ((!empty($options['testim_font_family'])) && $options['testim_font_family'] != 'default') {
                echo esc_attr($options['testim_font_family']);
            } else {
                echo 'inherit';
            }
            ?>;
            color: <?php
            if (!empty($options['testim_author_title_color'])) {
                echo esc_attr($options['testim_author_title_color']);
            } else {
                echo 'inherit';
            }
            ?>!important;
        }
        #<?php echo $random_id; ?> .apct-testimonial-content
        {
            font-size: <?php
            if (!empty($options['testim_font_size'])) {
                echo esc_attr($options['testim_font_size']) . 'px !important';
            } else {
                echo 'inherit';
            }
            ?>;      
        }

        #<?php echo $random_id; ?> .apct-testimonial-company-name,
        #<?php echo $random_id; ?> .apct-testimonial-title-name,
        #<?php echo $random_id; ?> span.apct-testimonial-company-position,
        #<?php echo $random_id; ?> .apct-testimonial-email,
        #<?php echo $random_id; ?> .apct-testimonial-pub-date,
        #<?php echo $random_id; ?> a.apct-links 
        {
            font-size: <?php
            if (!empty($options['testim_font_size'])) {
                echo esc_attr($options['testim_font_size'] / 1.1) . 'px !important';
            } else {
                echo 'inherit';
            }
            ?>;         
        }
    </style>
    <?php
    $font_family = $options['testim_font_family'];
    if ($font_family != "default") {
        $fonts_final = str_replace(' ', '+', $font_family);
        ?>
        <link rel='stylesheet' id='wpfm-google-fonts-style-css' href='//fonts.googleapis.com/css?family=<?php echo $fonts_final; ?>' type='text/css' media='all' />
    <?php } ?>
<?php } ?>