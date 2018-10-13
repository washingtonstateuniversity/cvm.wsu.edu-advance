<?php

namespace WSUWP\CVM\Advance_Newsletter;

class Post_Image_Metabox extends CVM_Metabox {

	protected $post_types = array(
		'post',
	);


	public function __construct() {

		parent::__construct();

		add_filter( 'admin_post_thumbnail_html', array( $this, 'add_additional_images' ), 99, 2 );

	} // End __construct


	public function add_additional_images( $html, $post_id ) {

		ob_start();

		wp_nonce_field( $this->nonce_action, $this->nonce_name );

		$html .= ob_get_clean();

		$images = get_post_meta( $post_id, '_additional_images', true );

		$html .= '<p><label for="_additional_images">Additional Images (ID,ID...)</label><input type="text" name="_additional_images" id="_additional_images" value="' . $images . '" /></p>';

		return $html;

	} // End add_additional_images


	protected function get_sanitize_settings( $post_id, $post, $update ) {

		$settings = array();

		if ( isset( $_REQUEST['_additional_images'] ) && ! empty( $_REQUEST['_additional_images'] ) ) {

			$settings['_additional_images'] = sanitize_text_field( $_REQUEST['_additional_images'] );

		} // End if

		return $settings;

	} // End get_sanitize_settings

} // End Theme_Functions

$cmv_post_image_metabox = new Post_Image_Metabox();