<?php

use CuisineHelper\Library\Http\View\View as View;
use CuisineHelper\Library\Router\Router;
use CuisineHelper\Http\Models\Auth;

if ( ! function_exists( 'base_path' ) ) {

    function base_path() {
        $rootPath = ROOTPATH;
        return str_replace('/public', '/', $rootPath);
    }
}

if ( ! function_exists( 'config' ) ) {

    /**
     * @param string $config The config to load
     */
    function config( $config = '' ) {
        if ( $config == '' ) {
            return;
        }
        $path = base_path() . "config/{$config}.php";
        if ( ! file_exists( $path ) ) {
            return [];
        }

        return require $path;
    }
}

if ( ! function_exists( 'view' ) ) {

    /**
     * @param string $name   The name of the View to be loaded
     * @param array  $params The map of parameters sent to View
     *
     * @return string
     */
    function view( $name = '', $params = [] ) {
        return View::View( $name, array_merge($params, ['has_error' => 0]) );
    }
}

if ( ! function_exists( 'error_view' ) ) {

    /**
     * @param string $name   The name of the error View to be loaded
     * @param array  $params The map of parameters sent to View
     *
     * @return string
     */
    function error_view( $name = '', $params = [], $errMsg = '' ) {
        $newParams = array_merge($params, ['has_error' => 1, 'error_message' => $errMsg]);
        return View::View( $name, $newParams );
    }
}

if ( ! function_exists( 'asset' ) ) {

    /**
     * @param string $name The path of the asset file
     *
     * @return string The path to the file
     */
    function asset( $name = '' ) {
        $config = config( 'asset' )['asset'] ?? "/";

        return $name ? $config . $name : '';
    }
}

if ( ! function_exists( 'css' ) ) {

    /**
     * @param string $name   The path of the css file
     *
     * @return string The path to the file
     */
    function css( $name = '' ) {
        $config = config( 'asset' )['css'] ?? "/";
        return $name ? $config . $name . '.css' : '';
    }
}

if ( ! function_exists( 'js' ) ) {

    /**
     * @param string $name The path of the javascript file
     *
     * @return string The path to the file
     */
    function js( $name = '' ) {
        $config = config( 'asset' )['js'] ?? "/";
        return $name ? $config . $name . '.js' : '';
    }
}

if ( ! function_exists( 'img' ) ) {

    /**
     * @param string $name The path of the image file
     *
     * @return string The path to the file
     */
    function img( $name = '' ) {
        $config = config( 'asset' )['img'] ?? "/";

        return $name ? $config . $name : '';
    }
}

if ( ! function_exists( 'route' ) ) {

    /**
     * @param string $name   The name of the route
     *
     * @return string The path of the route
     */
    function route( $name = '', $params = [] ) {
        if (!$name) return '/';
        $route = Router::getInstance()->getKlein()->getPathFor($name, $params);
        if (strpos($route, '[') === false) {
            return $route;
        }
        return '/';
    }
}

if ( ! function_exists( 'env' ) ) {

    /**
     * @param string $name   The name of the route
     *
     * @return string The path of the route
     */
    function env( $name = '', $default = '' ) {
        $var = getenv($name);
        return $var == '' ? $default : $var;
    }
}

if ( ! function_exists( 'response' ) ) {

    /**
     * @param string $name   The name of the route
     *
     * @return string The path of the route
     */
    function response($redirect = '/', $params = []) {
        Router::response()->redirect(route($redirect, $params))->send();
        exit;
    }
}

if ( ! function_exists( 'isAuth' ) ) {

    /**
     * @param string $name   The name of the route
     *
     * @return string The path of the route
     */
    function isAuth() {
        return Auth::check();
    }
}

if ( ! function_exists( 'isAdmin' ) ) {

    /**
     * @param string $name   The name of the route
     *
     * @return string The path of the route
     */
    function isAdmin() {
        return Auth::checkAdmin();
    }
}

if ( ! function_exists( 'redirect' ) ) {

    /**
     * @param string $name   The name of the route
     *
     * @return string The path of the route
     */
    function redirect($route) {
        return Router::response()->redirect($route);
    }
}