  /////////////////////////////////
 // Make sure booker is sticky //
////////////////////////////////

//Autofix_anything
!function(e){var t={customOffset:false,manual:false,onlyInContainer:true};e.fn.autofix_anything=function(n){var r=e.extend({},t,n),i=e(this),s=i.position(),o=r.customOffset,u=i.offset();i.addClass("autofix_sb");e.fn.manualfix=function(){var t=e(this),n=t.offset();if(t.hasClass("fixed")){t.removeClass("fixed")}else{t.addClass("fixed").css({top:0,left:n.left,right:"auto",bottom:"auto"})}};fixAll=function(t,n,r,i){if(n.customOffset==false)o=t.parent().offset().top;if(e(document).scrollTop()>o&&e(document).scrollTop()<=t.parent().height()+(o-e(window).height())){t.removeClass("bottom").addClass("fixed").css({top:0,left:i.left,right:"auto",bottom:"auto"})}else{if(e(document).scrollTop()>o){if(n.onlyInContainer==true){if(e(document).scrollTop()>t.parent().height()-e(window).height()){t.addClass("bottom fixed").removeAttr("style").css({left:r.left})}else{t.removeClass("bottom fixed").removeAttr("style")}}}else{t.removeClass("bottom fixed").removeAttr("style")}}};if(r.manual==false){e(window).scroll(function(){fixAll(i,r,s,u)})}}}(window.jQuery)

//And fire! 
jQuery(document).ready(function() {
    jQuery("#booker-wrap").autofix_anything({
      customOffset: false, // You can define custom offset for when you want the container to be fixed. This option takes the number of pixels from the top of the page. The default value is false which the plugin will automatically fix the container when the it is in the viewport
      manual: false, // Toggle this to true if you wish to manually fix containers with the public method. Default value is false
      onlyInContainer: false // Set this to false if you don't want the fixed container to limit itself to the parent's container.
    });
});


  /////////////////////////////////
 // Get our owl on right here  //
////////////////////////////////

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

  /////////////////////////////////
 // Sidebar agent stuff         //
///////////////////////////////// 

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

  ////////////////////////////////
 // Booker agent scripts       //
////////////////////////////////

//Let's add some stuff to toggle our booker agent

(function($) {
    $('#slide-out').click(function() {
        if ( $("#booker-agent").hasClass("clicked") ) {
             $('.book-content').hide();
             $("#booker-agent").removeClass("clicked").animate({ "right" : "-=3rem" });
        } else {
            $('.book-content').show();
            $("#booker-agent").addClass("clicked").animate({ "right" : "0" });
        }
    });
})(jQuery);