<?php

class CVM_WSU_EDU_Advance {

	public static $theme_version = '0.0.2';

	public function __construct() {

		$this->setup_theme();

	} // end __construct


	private function setup_theme() {

		require_once __DIR__ . '/includes/theme-functions.php';

		require_once __DIR__ . '/includes/post-meta-give.php';

		require_once __DIR__ . '/includes/theme-scripts.php';

		require_once __DIR__ . '/includes/theme-sidebars.php';

		require_once __DIR__ . '/includes/theme-widgets.php';

		require_once __DIR__ . '/includes/theme-metaboxes.php';

		require_once __DIR__ . '/includes/theme-customizer.php';

		require_once __DIR__ . '/includes/theme-feeds.php';

	} // End setup_theme



} // End CVM_WSU_EDU_Advance

$cvm_wsu_edu_advance = new CVM_WSU_EDU_Advance();
