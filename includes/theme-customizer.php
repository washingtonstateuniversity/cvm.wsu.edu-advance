<?php

namespace WSUWP\CVM\Advance_Newsletter;

class Theme_Customizer {


	public function __construct() {

		add_action( 'customize_register', array( $this, 'add_customizer' ) );

	} // End __construct


	public function add_customizer( $wp_customize ) {

		$wp_customize->add_setting(
			'home_tab_1',
			array(
				'default'   => 'Tab 1',
				'transport' => 'refresh',
			)
		);

		$wp_customize->add_setting(
			'home_tab_2',
			array(
				'default'   => 'Tab 2',
				'transport' => 'refresh',
			)
		);

		$wp_customize->add_setting(
			'home_tab_3',
			array(
				'default'   => 'Tab 3',
				'transport' => 'refresh',
			)
		);

		$wp_customize->add_control(
			'home_tab_1_control',
			array(
				'label'    => 'Tab 1 Label',
				'section'  => 'static_front_page',
				'settings' => 'home_tab_1',
			)
		);

		$wp_customize->add_control(
			'home_tab_2_control',
			array(
				'label'    => 'Tab 2 Label',
				'section'  => 'static_front_page',
				'settings' => 'home_tab_2',
			)
		);

		$wp_customize->add_control(
			'home_tab_3_control',
			array(
				'label'    => 'Tab 3 Label',
				'section'  => 'static_front_page',
				'settings' => 'home_tab_3',
			)
		);

	} // End add_dev_scripts

} // End Theme_Functions

$cmv_theme_customizer = new Theme_Customizer();
