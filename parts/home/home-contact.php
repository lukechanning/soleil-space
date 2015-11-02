<div class="footer-contact row">
    <div class="large-4 columns photo-pop" data-parallax="scroll"
    <?php
        if( get_theme_mod( 'soleil_contact_section') ) :
            echo 'data-image-src="' . esc_url(get_theme_mod( 'soleil_contact_section' )) . '">';
        else : 
          echo 'data-image-src="'. get_stylesheet_directory_uri() .'/img/bottom-footer.jpg">';
        endif;
    ?>
        <?php
        if ( ! dynamic_sidebar("footer-contact-flash") ) :
            dynamic_sidebar("footer-contact-flash");
        endif;
        ?>
    </div>
    <div class="large-8 columns info-block">
        <?php
        if ( ! dynamic_sidebar('footer-contact-one') ) :
            dynamic_sidebar('footer-contact-one');
        endif;
        if ( ! dynamic_sidebar('footer-contact-two') ) :
            dynamic_sidebar('footer-contact-two');
        endif;
        ?>
    </div>
</div>