jQuery(document).ready(function() {
    jQuery("#blog_slide").owlCarousel({
        items: 2,
        itemsDesktop: [1199, 2],
        itemsTablet: [768, 1],
        itemsDesktopSmall: [979, 2],
        itemsMobile: [480, 1]
    });
    var owl = jQuery("#blog_slide");
    owl.owlCarousel();
    jQuery(".blog-next").click(function() {
        owl.trigger('owl.next');
    });
    jQuery(".blog-prev").click(function() {
        owl.trigger('owl.prev');
    });
    if (jQuery(document).width() > 980) {
        jQuery(".transparent-menubar .header_bottom").css({
            'position': 'absolute'
        });
        if (!(jQuery('body > section > div').hasClass('banner'))) {
            jQuery('body > section').css({
                'margin-top': jQuery('.header_bottom').height() + 40
            });
            jQuery('.header_bottom').css({
                'background': 'none repeat scroll 0 0 rgba(22, 22, 22, 0.9)'
            });
            jQuery(".custom-header").css({
                'position': 'relative',
                'top': '97px',
                'margin-bottom': '-3px'
            });
        }
    }
});
