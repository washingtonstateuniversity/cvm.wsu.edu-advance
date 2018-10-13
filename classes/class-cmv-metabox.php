<?php namespace WSUWP\CVM\Advance_Newsletter;

class CVM_Metabox {

	protected $post_types = array();

	protected $nonce_name = 'cvm_meta';

	protected $nonce_action = 'cvm_save_meta';

	public function __construct() {

		$this->add_actions();

	} // End __construct


	private function add_actions() {

		if ( method_exists( $this, 'register_metabox' ) ) {

			add_action( 'add_meta_boxes', array( $this, 'register_metabox' ) );

		} // end if

		foreach ( $this->post_types as $post_type ) {

			add_action( 'save_post_' . $post_type, array( $this, 'save_post' ), 10, 3 );

		} // End foreach

	} // End add_actions


	public function save_post( $post_id, $post, $update ) {

		if ( in_array( $post->post_type, $this->post_types, true ) && method_exists( $this, 'get_sanitize_settings' ) ) {

			if ( ! $update ) {

				return;

			} // End if

			// If this is an autosave, our form has not been submitted, so we don't want to do anything.
			if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {

				return false;

			} // end if

			if ( ! isset( $_POST[ $this->nonce_name ] ) || ! wp_verify_nonce( $_POST[ $this->nonce_name ], $this->nonce_action ) ) {

				return false;

			} // End if

			// Check the user's permissions.
			if ( 'page' === $post->post_type ) {

				if ( ! current_user_can( 'edit_page', $post_id ) ) {

					return false;

				} // end if
			} else {

				if ( ! current_user_can( 'edit_post', $post_id ) ) {

					return false;

				} // end if
			} // end if

			$settings = $this->get_sanitize_settings( $post_id, $post, $update );

			foreach ( $settings as $key => $data ) {

				update_post_meta( $post_id, $key, $data );

			} // End foreach
		} // End if

	} // End save_post


} // End CMV_Metabox
