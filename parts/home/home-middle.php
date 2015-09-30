<section class="home-middle">
    <?php
        if( ! dynamic_sidebar('home-middle')):
            dynamic_sidebar('home-middle');
        endif;
    ?>
    <div class="large-6 box right columns">
        <div class="owl-carousel owl-theme">
            <?php
                query_posts( array ( 'post_type' => 'testimonial', 'posts_per_page' => 6, 'order' => 'RAND' ) );
              	while (have_posts()) : the_post(); //Make sure there are posts to get
              			echo '<div class="testimonial item"><blockquote>';
              			the_content();
              			echo '</blockquote><p><span>- ';
              			    the_title();
              			echo '</span></p></div>';
              	endwhile;
              	wp_reset_query();
          	?>
        </div>
    </div>
</section>