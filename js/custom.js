//Fire the Owl!

jQuery(document).ready(function() {
		jQuery('.owl-carousel').owlCarousel({
        loop:true,
        items: 1,
        center: true,
        margin:10
    });	
    jQuery('.owl-carousel-testimonial').owlCarousel({
        loop:true,
        items: 1,
        center: true,
        nav: true,
        margin: 10
    });	
});

//Custom code to make sure that our image section matches the height of our content
function updateSidebar() {
    var $width = document.documentElement.clientWidth,
        $height = document.documentElement.clientHeight,
        $main = jQuery('#content').outerHeight();

    if($width > 755) {
        if($main < $height) {
            jQuery('#sidebar').css({'min-height': $main});
        } else {
            jQuery('#sidebar').css({'min-height': $height});
        }
    } else {
        jQuery('#sidebar').removeAttr('style');
    }
}

// then call it on load AND browser resize

jQuery(document).ready(function() {
    updateSidebar();
})
jQuery(window).resize(function() {
    updateSidebar();
});