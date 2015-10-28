    <!-- Navigation -->
    <div class="contain-to-grid sticky">

      <nav class="top-bar" data-topbar>
        <ul class="title-area">
          <li class="name">
            <h1>
              <a class="logo show-for-small-only" href='<?php echo esc_url( home_url( '/' ) ); ?>'
              title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>
              'rel='home'>
              <?php
                echo '<h3>'. wp_title('|', true, 'right'); bloginfo('name') . '</h3>';
              ?>
            </a></h1>
          </li>
          <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
        </ul>

        <section class="top-bar-section">

          <div class="logo-wrapper hide-for-small-only">
            <div class="logo">
              <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                <?php
                    if( get_theme_mod( 'soleil_logo') ) :
                        echo '<img src="' . esc_url(get_theme_mod( 'soleil_logo' )) . '" />';
                    else : 
                      echo '<h3>'. wp_title('|', true, 'right'); bloginfo('name') . '</h3>';
                    endif;
                ?>
              </a>
            </div>
          </div>

          <!-- Right Nav Section -->
           	    <?php
        	        wp_nav_menu( array(
        	            'theme_location' => 'primary',
        	            'container' => false,
        	            'depth' => 0,
        	            'items_wrap' => '<ul class="right">%3$s</ul>',
        	            'fallback_cb' => 'reverie_menu_fallback', // workaround to show a message to set up a menu
        	            'walker' => new reverie_walker( array(
        	                'in_top_bar' => true,
        	                'item_type' => 'li',
        	                'menu_type' => 'main-menu'
        	            ) ),
        	        ) );
        	    ?>

          <!-- Left Nav Section -->
          <?php
        wp_nav_menu( array(
	            'theme_location' => 'additional',
	            'container' => false,
	            'depth' => 0,
	            'items_wrap' => '<ul class="left">%3$s</ul>',
	            'walker' => new reverie_walker( array(
	                'in_top_bar' => true,
	                'item_type' => 'li',
	                'menu_type' => 'main-menu'
	            ) ),
	        ) );
          ?>

        </section>
      </nav>

    </div><!-- /navigation -->

