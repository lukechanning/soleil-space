	</div><!-- Row End -->
</div><!-- Container End -->

<!-- Footer -->
<footer class="footer">
  <div class="row full-width">
    <?php
      if ( is_active_sidebar('footer-one') || is_active_sidebar('footer-two') || is_active_sidebar('footer-three') || is_active_sidebar('footer-four') ) :
        //Fire that footer!
          dynamic_sidebar('footer-one');
          dynamic_sidebar('footer-two');
          dynamic_sidebar('footer-three');
          dynamic_sidebar('footer-four');
      else :
          //or you know . . . maybe not
          echo '<h3>Nothing to show here — go grab some text widgets and get cranking!</h3>';
      endif;
    ?>
  </div>
</footer>

<?php wp_footer(); ?>

<script>
	(function($) {
		$(document).foundation();
	})(jQuery);
</script>

</body>
</html>