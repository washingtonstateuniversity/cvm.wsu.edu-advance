<?php

if ( spine_has_featured_image() ) {
	$featured_image_src = spine_get_featured_image_src();
	$featured_image_position = get_post_meta( get_the_ID(), '_featured_image_position', true );

	if ( ! $featured_image_position || sanitize_html_class( $featured_image_position ) !== $featured_image_position ) {
		$featured_image_position = '';
	}
} ?>
<div id="post-featured-banner" <?php if ( ! empty( $featured_image_src ) ) : ?>class="has-image"<?php endif; ?>>
	<?php if ( ! empty( $featured_image_src ) ) : ?>
		<figure class="featured-image <?php echo esc_attr( $featured_image_position ); ?>" style="background-image: url('<?php echo esc_url( $featured_image_src ); ?>');"><?php spine_the_featured_image(); ?></figure>
	<?php endif; ?>
	<h1><?php the_title(); ?></h1>
</div>
