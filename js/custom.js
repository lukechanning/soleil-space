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
jQuery(document).resize(function() {
    updateSidebar();
});