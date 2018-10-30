<?php

namespace WSUWP\CVM\Advance_Newsletter;

class Theme_Feeds {


	public function __construct() {

		add_filter( 'wsuwp_content_syndicate_json_output', array( $this, 'filter_wspuwp_json_output' ), 10, 3 );

	} // End __construct


	public function filter_wspuwp_json_output( $content, $new_data, $atts ) {

		// By default, we output a JSON object that can then be used by a script.
		if ( 'excerpts' === $atts['output'] ) {

			ob_start();
			?>
			<div class="wsuwp-content-syndicate-wrapper">
				<ul class="wsuwp-content-syndicate-list">
					<?php
					$offset_x = 0;
					foreach ( $new_data as $content ) {
						if ( $offset_x < absint( $atts['offset'] ) ) {
							$offset_x++;
							continue;
						}

						if ( $content->thumbnail && isset( $content->featured_media->alt_text ) && ! empty( $content->featured_media->alt_text ) ) {
							$alt_text = $content->featured_media->alt_text;
						} else {
							$alt_text = '';
						}

						?>
						<li class="wsuwp-content-syndicate-item">
					<span class="content-item-thumbnail" <?php if ( $content->thumbnail ) : ?>style="background-image:url( <?php echo esc_url( $content->thumbnail ); ?> )"<?php endif; ?>><?php if ( $content->thumbnail ) : ?><img src="<?php echo esc_url( $content->thumbnail ); ?>" alt="<?php echo esc_attr( $alt_text ); ?>"><?php endif; ?></span>
							<span class="content-item-title"><?php echo esc_html( $content->title ); ?></span>
							<span class="content-item-byline">
								<span class="content-item-byline-date"><?php echo esc_html( date( $atts['date_format'], strtotime( $content->date ) ) ); ?></span>
								<span class="content-item-byline-author"><?php echo esc_html( $content->author_name ); ?></span>
							</span>
							<span class="content-item-excerpt"><?php echo wp_kses_post( $content->excerpt ); ?> <span class="content-item-read-story">Read Story</span></span>
							<span class="content-item-link"><a class="content-item-read-story" href="<?php echo esc_url( $content->link ); ?>">Read Story <?php echo esc_html( $content->title ); ?></a></span>
						</li>
						<?php
					}
					?>
				</ul>
			</div>
			<?php

			$content = ob_get_clean();

		} // End if

		return $content;

	} // wsuwp_content_syndicate_json

} // End Theme_Functions

$cmv_theme_feeds = new Theme_Feeds();
