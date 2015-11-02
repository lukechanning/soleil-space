<?php
//If it's got a thumbnail, let's get that custom photo
if (has_post_thumbnail( $post->ID ) ): ?>
  <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
    <aside id="sidebar" class="small-12 large-4 columns" role="sidebar" data-parallax="scroll" data-image-src="<?php echo $image[0]; ?>">
  <?php else: ?>
    <aside id="sidebar" class="small-12 large-4 columns" role="sidebar" data-parallax="scroll" data-image-src="/wp-content/themes/grunterie/img/testimonials-bg.png"">
<?php
  endif; 
  if ( sidebar_subtitle_get_meta($post->id, 'sidebar_subtitle_subtitle_text', true) ) :
    echo '<h2 class="subtitle">' . sidebar_subtitle_get_meta( 'sidebar_subtitle_subtitle_text' ) . '</h2>';
  endif;
?>

	<?php dynamic_sidebar("Sidebar"); ?>
	
</aside><!-- /#sidebar -->