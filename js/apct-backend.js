(function ($) {
    $(function () {
	    $( '.apct-tabs-trigger' ).click(function(){
		    $( '.apct-tabs-trigger' ).removeClass( 'nav-tab-active' );
		    $(this).addClass( 'nav-tab-active' );
		    var board_id = 'tab-'+$(this).attr('id');
		    $('.apct-tab-contents').hide();
		    $('#'+board_id).show();
            var board_class = $(this).attr('id');
            if((board_class=="apct-about")||(board_class=="apct-shorcode")||(board_class=="apct-custom-settings")){$('.apct-setting-form').hide();}
            else{$('.apct-setting-form').show();}
	   	});
       
         /** JS For Template preview **/
         $(".testim-common").first().addClass( "temp-active" );
         $('#testimonial-template').on('change', function() {
         template_value = $(this).val();
             var array_break = template_value.split('-');
             var current_id = array_break[1];  
                $('#tesim-temp-demo-'+current_id).removeClass('temp-active');
                $('.testim-common').hide();
                $(this).addClass( 'temp-active' );
                $('#tesim-temp-demo-'+current_id).show();
         });
            
       //Js For Media Uploader
       $('#apct_upload_image_button').click(function(e) {
        e.preventDefault();
        var image = wp.media({ 
            title: 'Upload Image',
            multiple: false
        }).open()
        .on('select', function(e){
            var uploaded_image = image.state().get('selection').first();
            console.log(uploaded_image);
            var image_url = uploaded_image.toJSON().url;
            $('#apct_upload_image_url').val(image_url);
            $('.current-image').find('img').attr('src', image_url);
            if($('#apct_upload_image_url').val(image_url) != ''){
                $('.image-preview').show(); 
            }else{
                $('.image-preview').hide();    
            }
            tb_remove();            
        });
    });
    
       //Show hide custom input field on radio button on setting option
       $('input[name="testim_display_num"]').bind('change',function(){
            var showOrHide = ($(this).val() == 'custom') ? true : false;
            $('.custom-display-testim-num').toggle(showOrHide);
         });
         
        //Show/Hide BX slider controller in shortcode generator page
        $('select[name="testimonial_type"]').bind('change',function(){
            var showOrHide = ($(this).val() == 'slider-layout') ? true : false;
            $('.apct-bx-slider-controller').toggle(showOrHide);
         });
       
       //Generate color field for rest of the fields
       $('.apct-color-field').wpColorPicker();
       
       ///Generate preview for typography
            $('#testimonial-google-font').change(function (){
            var font_family = $(this).val();
            $(".title-font-style").html('');
            $("#apct-font-family").css( {
                'font-family': font_family
                 });           
           if(font_family != "default" && font_family != ''){
            WebFont.load({
                google: {
                    families: [font_family]
                    }
                 });
                } 
            });
            
        //color picker for background color
        var myOptions = {
            palettes: true,
            change: function(event, ui){
                $('.apct-font-demo-wrap').css('background-color',ui.color.toString());
               //alert(ui.color.toString());
              }, 
            
            };
        $('#testim_bg_color').wpColorPicker(myOptions);
        
        //color picker for font color
        var myOptions = {
            palettes: true,
            change: function(event, ui){
                $('.apct-font-demo-wrap #apct-font-family').css('color',ui.color.toString());
              }, 
            
            };
        
        //Content Font Colorpicker Implementation
        $('#testim_author_title_color').wpColorPicker(myOptions);
        
            
        //Live Preview for Font size change
        $("#testim_font_size").bind('keyup mouseup', function () {
            $('#apct-font-family').css({
            'font-size': $(this).val() + 'px'
            });           
        });
                
        //display dynamic shorcode on jquery on generate shortcode button clicked             
        $(".apct-shortcode-button").click(function(){        
            testim_type         = $( "#testimonial-type option:selected" ).val();
            testim_template     = $( "#testimonial-template option:selected" ).val();
            testim_number       = ($("input[name=testim_display_num]:checked").attr('id') == 'testim-all')?$("input[name=testim_display_num]:checked").val():$('#custom-display-testim-num').val();
            enable_custom_layout= ($("input[name=testim_custom_design]").attr('checked'))?'disable':'enable';
            show_title          = ($("input[name=show_testim_title]").attr('checked'))?'show':'hide';
            show_comp_detail    = ($("input[name=show_testim_comp_name]").attr('checked'))?'show':'hide';
            show_rating         = ($("input[name=testim_rating_type]").attr('checked'))?'show':'hide';
            testim_orderby      = $("#testim_order_by_iand option:selected" ).val();
            testim_ordertype    = $("#testim_order_by_ascdsc option:selected" ).val();
            show_date           = ($("input[name=testim_publication_date]").attr('checked'))?'show':'hide';
            show_image          = ($("input[name=testim_featured_image]").attr('checked'))?'show':'hide';
            show_email          = ($("input[name=show_author_email]").attr('checked'))?'show':'hide';
            content_length      =  $("input[name=testim_cont_type]:checked").val();
            /** Slider options value */
            slider_mode         = $( "#apct_bxslider_options_mode option:selected" ).val();
            slider_adapt_height = $("input[name=apct_bxslider_options_adaptive]").attr('checked')?'true':'false';
            slider_pos          = $( "#bxslider_control_position option:selected" ).val();
            display_control     = $("input[name=apct_bxslider_contr_pos]").attr('checked')?'true':'false';
            display_pager       = $("input[name=apct_bxslider_pager]").attr('checked')?'true':'false';
            slider_speed        = $("input[name=apct_bxslider_slider_speed]").val();
            allow_auto          = $("input[name=apct_bxslider_option_auto]").attr('checked')?'true':'false';
            pause_duration      = $('#slider-pause-duration').val();
            
        if (testim_type == 'list-layout') {
        $( "#apct-generated-shortcode" ).html( "[ap_custom_testimonial" +" "+ "type='" + testim_type + 
            "'" +" "+"template='" + testim_template + "'" +" "+ "display_num='" + testim_number +
            "'" +" "+ "content_length='" + content_length + 
            "'" +" "+ "custom_layout='" + enable_custom_layout + "'" +" "+ "title='" + show_title + 
            "'" +" "+ "comp_detail='" + show_comp_detail + "'"+" " +"email='" + show_email + 
            "'" +" "+ "rating='" + show_rating + "'" +" "+"order_by='" + testim_orderby +
            "'" +" "+ "order_type='" + testim_ordertype + "'" +" "+"date='" + show_date + 
            "'" +" "+ "image='" + show_image + "']" );
        }
        else{
        $( "#apct-generated-shortcode" ).html( "[ap_custom_testimonial" +" "+ "type='" + testim_type + 
            "'" +" "+ "template='" + testim_template +"'" +" "+ "slider_mode='" + slider_mode +
            "'" +" "+ "slider_speed='" + slider_speed +"'" +" "+ "adaptive_height='" + slider_adapt_height + 
            "'" +" "+ "slider_control='" + display_control +"'" +" "+ "slider_pager='" + display_pager +
            "'" +" "+ "auto='" + allow_auto +"'" +" "+ "pause_duration='" + pause_duration +
            "'" +" "+ "display_num='" + testim_number +"'" +" "+ "content_length='" + content_length + 
            "'" +" "+ "custom_layout='" + enable_custom_layout +"'" +" "+ "title='" + show_title + 
            "'" +" "+ "comp_detail='" + show_comp_detail +"'" +" "+"email='" + show_email + 
            "'" +" "+ "rating='" + show_rating +"'" +" "+"order_by='" + testim_orderby +
            "'" +" "+ "order_type='" + testim_ordertype +"'" +" "+"date='" + show_date + 
            "'" +" "+ "image='" + show_image + "']" );
        }
        });
                
        /** Backend Js for Popup to display full detail about Testimonial */
        $('.testinomial-view-entry > a').click(function(e) {        
        var entry_id = $(this).data('entry-id');
        $.ajax({
                url: apct_backend_js_params.ajax_url,
                data: {
                    entry_id: entry_id,
                    _wpnonce: apct_backend_js_params.ajax_nonce,
                    action: 'apct_testimonial_view_actions'
                },
                type: 'post',
                beforeSend: function () {
                    $('#boxes').fadeIn(300, function () {
                       $('.apct-view-wrap').show();
                       $('.apct-overlay').show();
                    });
                },
                success: function (res) {
                    $('.apct-view-wrap').hide();
                    $('#boxes').html(res);
                }
            }); 
            
         /** Entry Popup Close on Clicking outside popup display div */
        $(document).mouseup(function (e) {
             var popup = $(".boxes");
             if (!$('.boxes').is(e.target) && !popup.is(e.target) && popup.has(e.target).length == 0) {
                 popup.fadeOut(100);
                 $('.boxes').html('');
             $('.apct-overlay').fadeOut(100);
             }
         });
        /** Entry Popup Close whilde clicking close button on popup display div */ 
        $('body').on('click','.apct-popup-close', function () {
            $('.boxes').fadeOut(100, function () {
                $('.loading').html('<span class="view-ajax-loader"></span>');
                $('.boxes').html('');
            });
            $('.boxes').fadeOut(100);
            $('.apct-overlay').fadeOut(100);
            });
        });
            
        /** Add Scroll to Top */
        $(window).scroll(function(){
            if ($(this).scrollTop() > 100) {
                $('.apct-scrollToTop').fadeIn();
            } else {
                $('.apct-scrollToTop').fadeOut();
            }
        });
        $('.apct-scrollToTop').click(function(){
            $('html, body').animate({scrollTop : 0},400);
            return false;
        });
        
         //Implementing Date Picker
            $('#apct-custom-date').datepicker({ dateFormat: 'yy-mm-dd' });
    
        //Show hide Date field
         $('#testimonial-publish-date-type').on('change',function(){
            if($(this).val() == 'custom-date'){
            $('.apct-date-field').slideDown(300); } else{$('.apct-date-field').slideUp(300);}
         });         
  });
}(jQuery));