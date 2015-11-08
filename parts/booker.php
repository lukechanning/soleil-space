<div id="booker-agent" class="book">
    <div id="slide-out" class="small-3 columns book-header">
        <!-- Add a header -->
        <h3 class="book-title">Book Now</h3>
    </div>
    <div class="small-9 columns book-content">
        <?php
            if ( ! dynamic_sidebar('booker') ) :
                dynamic_sidebar('booker');
            endif;
        ?>
    </div>
</div>