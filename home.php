<?php get_header(); ?>

<!-- Row for main content area -->
	<div class="large-12 columns home-content" id="content" role="main">
	    <?php
	      
	      //Let's pull in the big hero slider section
  	     get_template_part('parts/home/home-hero');
  	     
        //Now grab the middle blocks with our content / testimonials
        get_template_part('parts/home/home-middle');
        
	    ?>
	</div>
		
<?php get_footer(); ?>