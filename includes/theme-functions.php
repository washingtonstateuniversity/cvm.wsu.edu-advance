<?php

namespace WSUWP\CVM\Advance_Newsletter;

class Theme_Functions {


    public function __construct() {

        $this->include_functions();

    } // End __construct


    private function include_functions(){

        require_once get_stylesheet_directory() . '/theme-functions/theme.php';

        require_once get_stylesheet_directory() . '/theme-functions/posts.php';

    } // End include_functions

} // End Theme_Functions

$cmv_theme_functions = new Theme_Functions();