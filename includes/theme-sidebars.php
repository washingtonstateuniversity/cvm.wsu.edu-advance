<?php namespace WSUWP\CVM\Advance_Newsletter;

class Theme_Sidebars {


	public function __construct() {

		add_action( 'widgets_init', array( $this, 'add_sidebars' ) );

	} // End __construct


	public function add_sidebars() {

		$sidebars = array(
			array(
				'name'          => __( 'Site Footer', 'spine' ),
				'id'            => 'site_footer',
				'description'   => '',
				'class'         => '',
				'before_widget' => '<div class="footer-item">',
				'after_widget'  => '</div>',
				'before_title'  => '<h2 class="widgettitle">',
				'after_title'   => '</h2>',
			),
			array(
				'name'          => __( 'Site Header Right', 'spine' ),
				'id'            => 'site_header_right',
				'description'   => '',
				'class'         => '',
				'before_widget' => '<div class="site-header-item">',
				'after_widget'  => '</div>',
				'before_title'  => '<h2 class="widgettitle">',
				'after_title'   => '</h2>',
			),
			array(
				'name'          => __( 'Home Tab 1', 'spine' ),
				'id'            => 'home_tab_1',
				'description'   => '',
				'class'         => '',
				'before_widget' => '<div id="tabs-1" class="cmv-tab-panel">',
				'after_widget'  => '</div>',
				'before_title'  => '<h2 class="tab-content-title">',
				'after_title'   => '</h2>',
			),
			array(
				'name'          => __( 'Home Tab 2', 'spine' ),
				'id'            => 'home_tab_2',
				'description'   => '',
				'class'         => '',
				'before_widget' => '<div id="tabs-2" class="cmv-tab-panel">',
				'after_widget'  => '</div>',
				'before_title'  => '<h2 class="tab-content-title">',
				'after_title'   => '</h2>',
			),
			array(
				'name'          => __( 'Home Tab 3', 'spine' ),
				'id'            => 'home_tab_3',
				'description'   => '',
				'class'         => '',
				'before_widget' => '<div id="tabs-3" class="cmv-tab-panel">',
				'after_widget'  => '</div>',
				'before_title'  => '<h2 class="tab-content-title">',
				'after_title'   => '</h2>',
			),
		);

		foreach ( $sidebars as $sidebar ) {

			register_sidebar( $sidebar );

		} // End foreach

	} // End add_sidebars

} // End Site_Footer

$cmv_theme_sidebars = new Theme_Sidebars();
