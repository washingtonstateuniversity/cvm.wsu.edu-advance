<?php

class CVM_WSU_EDU_Advance {

	public static $theme_version = '0.0.1';

	public function __construct() {

		$this->setup_theme();

	} // end __construct


	private function setup_theme() {

		require_once __DIR__ . '/includes/theme-functions.php';

		require_once __DIR__ . '/includes/post-meta-give.php';

		require_once __DIR__ . '/includes/theme-scripts.php';

		require_once __DIR__ . '/includes/theme-sidebars.php';

	} // End setup_theme



} // End CVM_WSU_EDU_Advance

$cvm_wsu_edu_advance = new CVM_WSU_EDU_Advance();
