<?php namespace WSUWP\CVM\Advance_Newsletter;

class Theme_Metaboxes {


	public function __construct() {

		$this->add_metaboxes();

	} // End __construct


	private function add_metaboxes() {

		include_once get_stylesheet_directory() . '/classes/class-cmv-metabox.php';

		include_once get_stylesheet_directory() . '/metaboxes/post-images/post-image-metabox.php';

	} // End add_metaboxes


} // End Theme_Metaboxes

$cmv_theme_metaboxes = new Theme_Metaboxes();
