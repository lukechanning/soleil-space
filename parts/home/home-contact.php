<div class="footer-contact row">
    <div class="large-4 columns photo-pop">
        <?php
            if( get_theme_mod( 'soleil_contact_section') ) :
                echo '<img src="' . esc_url(get_theme_mod( 'soleil_contact_section' )) . '" />';
            else : 
              echo '<img src="'. get_stylesheet_directory_uri() .'/img/bottom-footer.jpg" />';
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