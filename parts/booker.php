<div id="booker-agent" class="book">
    <a id="booker-button" href="#sidr">
        <div id="slide-out" class="book-header">
            <!-- Add a header -->
            <h3 class="book-title">Book Now</h3>
        </div>
    </a>
    <div id="sidr">
        <?php
            if ( ! dynamic_sidebar('booker') ) :
                dynamic_sidebar('booker');
            endif;
        ?>
    </div>
</div>