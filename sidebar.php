<?php
//If it's got a thumbnail, let's get that custom photo
if (has_post_thumbnail( $post->ID ) ): ?>
  <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
  <aside id="sidebar" class="small-12 large-4 columns" role="sidebar" style="background-image: url('<?php echo $image[0]; ?>')">
    <?php else: ?>
    <aside id="sidebar" class="small-12 large-4 columns">
<?php endif; ?>

	<?php dynamic_sidebar("Sidebar"); ?>
	
</aside><!-- /#sidebar -->