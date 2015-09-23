<?php get_header(); ?>

<!-- Row for main content area -->
	<div class="large-12 columns home-content" id="content" role="main">
	    <!--
	    <div class="large-8 large-centered columns">
	        <div class="owl-carousel owl-theme">
                <div class="item"><img src="http://placehold.it/350x150"></div>
                <div class="item"><img src="http://placehold.it/350x150"></div>
                <div class="item"><img src="http://placehold.it/350x150"></div>
                <div class="item"><img src="http://placehold.it/350x150"></div>
                <div class="item"><img src="http://placehold.it/350x150"></div>
                <div class="item"><img src="http://placehold.it/350x150"></div>
                <div class="item"><img src="http://placehold.it/350x150"></div>
                <div class="item"><img src="http://placehold.it/350x150"></div>
                <div class="item"><img src="http://placehold.it/350x150"></div>
            </div>
	    </div>
	    -->
	    
  	     <div class="owl-carousel owl-theme">
  	        <?php
  	        //Let's call up our query to pull posts in the "Featured" category
  	          query_posts( array ( 'category_name' => 'featured', 'posts_per_page' => -1, 'order' => 'ASC' ) );
	              while (have_posts()) : the_post(); //Make sure there are posts to get
	                ?>
	                  <?php if (has_post_thumbnail( $post->ID ) ): ?>
                      <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
                      <section class="hero item" style="background-image: url('<?php echo $image[0]; ?>')">
                        <?php else: ?>
                        <section class="hero item">
                    <?php endif; ?>
	                     <div class="row">
	                       
	                       <div class="large-6 large-push-2 columns">
                            <div class="circle-bg quote-1">
                              <h2><?php the_title(); ?></h3>
                            </div>
                          </div>
                          
                          <div class="large-6 large-pull-2 columns">
                            <div class="circle-bg quote-2">
                                <?php 
                                the_content();
                                ?>
                            </div>
                          </div>
                          
	                     </div>
	                  </section>
	                <?php
	              endwhile;
  	        
  	        ?>
  	        <section class="hero item">
              <div class="row">
                <div class="large-6 large-push-2 columns">
                  <div class="circle-bg quote-1">
                    <p>I found freedom.<br> Losing all hope was freedom.</p>
                  </div>
                </div>
                <div class="large-6 large-pull-2 columns">
                  <div class="circle-bg quote-2">
                    <p>It's only after we've lost everything that we're free to do anything.</p>
                  </div>
                </div>
              </div>
            </section>
            
             <section class="hero item">
              <div class="row">
                <div class="large-6 large-push-2 columns">
                  <div class="circle-bg quote-1">
                    <p>I found freedom.<br> Losing all hope was freedom.</p>
                  </div>
                </div>
                <div class="large-6 large-pull-2 columns">
                  <div class="circle-bg quote-2">
                    <p>It's only after we've lost everything that we're free to do anything.</p>
                  </div>
                </div>
              </div>
            </section>
            
          </div>

	    
	</div>
		
<?php get_footer(); ?>