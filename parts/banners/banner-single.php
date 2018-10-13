<?php

if ( spine_has_featured_image() ) {
	$featured_image_src = spine_get_featured_image_src();
	$featured_image_position = get_post_meta( get_the_ID(), '_featured_image_position', true );

	if ( ! $featured_image_position || sanitize_html_class( $featured_image_position ) !== $featured_image_position ) {
		$featured_image_position = '';
	}
};

?>
<div id="banner-single" <?php if ( ! empty( $featured_image_src ) ) : ?> class="has-banner-img"<?php endif; ?>>
	<?php if ( ! empty( $featured_image_src ) ) : ?>
	<figure class="featured-image <?php echo sanitize_html_class( $featured_image_position ); ?>" style="background-image: url('<?php echo esc_url( $featured_image_src ); ?>');"><?php spine_the_featured_image(); ?></figure>
	<?php endif; ?>
	<?php if ( true === spine_get_option( 'articletitle_show' ) ) : ?>
	<header>
		<h1 class="single-title"><?php the_title(); ?></h1>
	</header>
	<?php endif; ?>
</div>
