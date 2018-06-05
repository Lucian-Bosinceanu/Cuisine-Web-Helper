<?php

use CuisineHelper\Library\Http\View\View as View;


if ( ! function_exists( 'config' ) ) {

    /**
     * @param string $config The config to load
     */
    function config( $config = '' ) {
        if ( $config == '' ) {
            return;
        }

        return require_once ROOTPATH . "/config/{$config}.php";
    }
}

if ( ! function_exists( 'view' ) ) {

    /**
     * @param string $name The name of the View to be loaded
     * @param array  $params The map of parameters sent to View
     *
     * @return string
     */
    function view( $name = '', $params = [] ) {
        return View::View( $name, $params );
    }
}
