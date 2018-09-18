<?php

namespace WSUWP\CVM\Advance_Newsletter;

add_action( 'add_meta_boxes_post', __NAMESPACE__ . '\\add_meta_boxes', 10 );
add_action( 'save_post_post', __NAMESPACE__ . '\\save_post', 10, 2 );

/**
 * Adds a meta box for capturing a "Give Now" URL for a post.
 *
 * @since 0.0.1
 *
 * @param string $post_type
 */
function add_meta_boxes() {
	add_meta_box(
		'cvm-advance-newsletter-give-now',
		'Give Now',
		__NAMESPACE__ . '\\display_give_now_meta_box',
		'post',
		'normal',
		'high'
	);
}

/**
 * Displays a meta box used to capture a "Give Now" URL for a post.
 *
 * @since 0.0.1
 *
 * @param \WP_Post $post
 */
function display_give_now_meta_box( $post ) {
	$link_label = get_post_meta( $post->ID, '_wsuwp_cvm_advance_post_give_label', true );
	$link_url = get_post_meta( $post->ID, '_wsuwp_cvm_advance_post_give_url', true );

	wp_nonce_field( 'wsuwp_cvm_advance_post_give', 'wsuwp_cvm_advance_post_give_nonce' );
	?>
	<label for="wsuwp-cvm-advance-post-give-label">Link Label</label>

	<input type="text"
		   id="wsuwp-cvm-advance-post-give-label"
		   class="widefat"
		   name="_wsuwp_cvm_advance_post_give_label"
		   value="<?php echo esc_attr( $link_label ); ?>" />

	<label for="wsuwp-cvm-advance-post-give-url">Link URL</label>

	<input type="text"
		   id="wsuwp-cvm-advance-post-give-url"
		   class="widefat"
		   name="_wsuwp_cvm_advance_post_give_url"
		   value="<?php echo esc_url( $link_url ); ?>" />
	<?php
}

/**
 * Saves the featured excerpt of an event.
 *
 * @since 0.0.1
 *
 * @param int      $post_id
 * @param \WP_Post $post
 */
function save_post( $post_id, $post ) {
	if ( ! isset( $_POST['wsuwp_cvm_advance_post_give_nonce'] ) || ! wp_verify_nonce( $_POST['wsuwp_cvm_advance_post_give_nonce'], 'wsuwp_cvm_advance_post_give' ) ) {
		return;
	}

	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	if ( 'auto-draft' === $post->post_status ) {
		return;
	}

	if ( isset( $_POST['_wsuwp_cvm_advance_post_give_label'] ) ) {
		update_post_meta( $post_id, '_wsuwp_cvm_advance_post_give_label', sanitize_text_field( $_POST['_wsuwp_cvm_advance_post_give_label'] ) );
	} else {
		delete_post_meta( $post_id, '_wsuwp_cvm_advance_post_give_label' );
	}

	if ( isset( $_POST['_wsuwp_cvm_advance_post_give_url'] ) ) {
		update_post_meta( $post_id, '_wsuwp_cvm_advance_post_give_url', esc_url_raw( $_POST['_wsuwp_cvm_advance_post_give_url'] ) );
	} else {
		delete_post_meta( $post_id, '_wsuwp_cvm_advance_post_give_url' );
	}
}
