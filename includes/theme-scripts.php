<?php

namespace WSUWP\CVM\Advance_Newsletter;

class Theme_Scripts {


	public function __construct() {

		add_action( 'wp_enqueue_scripts', array( $this, 'add_dev_scripts' ), 99999 );

	} // End __construct


	public function add_dev_scripts() {

		$dev_styles = array(
			'01-header.css',
			'02-banner-featured.css',
			'03-block-featured.css',
			'04-block-tabs.css',
			'06-banner-single.css',
			'99-site-footer.css',
		);

		$dev_scripts = array(
			'01-cmv-advance.js',
		);

		foreach ( $dev_styles as $style ) {

			wp_enqueue_style( 'theme-' . $style, get_stylesheet_directory_uri() . '/css/public/' . $style, array(), cvm_get_theme_version() );

		} // End foreach

		foreach ( $dev_scripts as $script ) {

			wp_enqueue_script( 'theme-' . $script, get_stylesheet_directory_uri() . '/js/public/' . $script, array( 'jquery', 'jquery-ui-tabs' ), cvm_get_theme_version(), true );

		} // End foreach

	} // End add_dev_scripts

} // End Theme_Functions

$cmv_theme_scripts = new Theme_Scripts();
