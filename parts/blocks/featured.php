<?php

$featured = cmv_get_featured_posts();

?>
<div id="featured-block">
	<h2>Features</h2>
	<div class="featured-set-wrapper">
		<?php foreach ( $featured as $feature ) : ?>
		<article class="featured-issue-article">
			<figure style="background-image:url(<?php echo esc_url( $feature['img_src'] ); ?>)">
				<img src="<?php echo esc_url( $feature['img_src'] ); ?>" alt="<?php echo esc_html( $feature['img_alt'] ); ?>"/>
			</figure>
			<h3><?php echo esc_html( $feature['title'] ); ?></h3>
			<p><?php echo wp_kses_post( $feature['excerpt'] ); ?></p>
			<a class="article-link" href="<?php echo esc_url( $feature['link'] ); ?>">Learn more about <?php echo esc_html( $feature['title'] ); ?></a>
		</article>
		<?php endforeach; ?>
	</div>
</div>
