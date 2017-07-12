(function ($) {
    $(function () {
     //Generate slider if has below class .apct-slider-layout
     $('.apct-slider-layout').each(function(){
          var slide_speed = $(this).attr('data-slide-speed');
          
          var slide_control = $(this).attr('data-slide-controls');
            slide_control = (slide_control=='true')?true:false;
          
          var slide_pager = $(this).attr('data-slide-pager');
            slide_pager = (slide_pager=='true')?true:false;
          
          var slide_auto = $(this).attr('data-slide-auto');
          slide_auto = (slide_auto=='true')?true:false;
           
         var data_adaptive_height = $(this).attr('data-adaptive-height');
         data_adaptive_height = (data_adaptive_height=='true')?true:false;
         var slide_pause_duration = $(this).attr('data-pause-duration');
          var data_slide_mode = $(this).attr('data-slide-mode');
          
  $(this).bxSlider ({
        mode: data_slide_mode,
        nextSelector: $(this).closest('.apct-testim-wrapper').find('.apct-slider-next'),
        prevSelector: $(this).closest('.apct-testim-wrapper').find('.apct-slider-prev'),
        nextText: '<i class="fa fa-chevron-right "></i>',
        prevText: '<i class="fa fa-chevron-left "></i>',
        pager: slide_pager,
        controls: slide_control,
        auto:slide_auto,
        pause:slide_pause_duration,
        speed: slide_speed,	
        infiniteLoop: true,
        adaptiveHeight: data_adaptive_height		
	   })
    });
  });
}(jQuery));