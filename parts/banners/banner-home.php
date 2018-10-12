<?php

$featured = cmv_get_featured_posts( 1, 0, 'large' );

$feature = $featured[0];

?><div id="home-banner" style="background-image:url(<?php echo esc_url( $feature['img_src'] ); ?>)">
	<div class="banner-title-wrapper">
		<div class="banner-title-inner">
			<h1 class="banner-title">Advance</h1>
			<div class="banner-subtitle">Healthy Animals  |  Healthy People  |  Healthy Planet</div>
		</div>
	</div>
	<div class="banner-article-title">
		<a href="<?php echo esc_url( $feature['link'] ); ?>"><?php echo esc_html( $feature['title'] ); ?></a>
	</div>
</div>
