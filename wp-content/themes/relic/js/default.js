jQuery(window).scroll(function(){
	var stickyHeaderTop = jQuery('.menubar').offset().top;
	var wpAdminBar = jQuery('#wpadminbar').height();
	if(jQuery(document).width() > 980){
		if (jQuery(window).scrollTop() > stickyHeaderTop) {
			 if (jQuery('body').hasClass('logged-in'))
                  jQuery('.header_bottom').css({position: 'fixed', padding: '0px 0', top: '32px'});
             else
                  jQuery('.header_bottom').css({position: 'fixed', padding: '0px 0', top: '0px'});
		} else {
				  jQuery('.header_bottom').css({position: 'absolute', top: wpAdminBar + 32 , padding: '0px 0'});
			}
	    }
	    
});
