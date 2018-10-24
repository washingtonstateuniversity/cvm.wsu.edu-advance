<?php namespace WSUWP\CVM\Advance_Newsletter;

class Theme_Widgets {


	public function __construct() {

		add_action( 'widgets_init', array( $this, 'add_widgets' ) );

	} // End __construct


	public function add_widgets() {

		include_once get_stylesheet_directory() . '/widgets/post-images.php';

		include_once get_stylesheet_directory() . '/widgets/give/post-give.php';

		register_widget( 'Post_Images_Widget' );

		register_widget( 'Post_Give_Widget' );

	} // End add_widgets

} // End Theme_Widgets

$cmv_theme_widgets = new Theme_Widgets();
