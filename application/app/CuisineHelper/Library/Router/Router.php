<?php

namespace CuisineHelper\Library\Router;

use \Klein\Klein as Klein;

class Router {

    static  $_router         = null;
    private $ext             = 'php';
    private $klein           = null;
    private $controllersPath = "\\CuisineHelper\\Http\\Controllers\\";

    private function __construct() {
    }

    /**
     * If $callback is callable, just pass it
     * otherwise, the format should be "Controller@Method"
     *
     * @param                 $method   The HTTP verb GET, POST etc...
     * @param                 $path     The path of the request
     * @param callable|String $callback The callback or the controller's action
     *
     * @return \Klein\Route|null
     * @throws \Exception
     */
    public static function route( $method, $path, $callback ) {
        try {
            $router = Router::getInstance();
            $klein  = $router->klein;
            if ( is_callable( $callback ) ) {
                $klein->respond( $method, $path, $callback );
            } else {
                $result = explode( "@", $callback );
                if ( is_array( $result ) && count( $result ) == 2 ) {
                    $controller = str_replace( '/', '\\', $result[0] );
                    $class      = $router->controllersPath . $controller;
                    if ( ! class_exists( ucfirst( $class ) ) ) {
                        throw new \Exception( "Controller <b>{$controller}</b> not found!" );
                    }
                    $route = $klein->respond( $method, $path, [ new $class(), $result[1] ] );
                }
            }
        } catch ( \Exception $ex ) {
            print $ex->getMessage();
            exit;
        }

        return $route;
    }

    /**
     * Get singleton instance
     *
     * @return \CuisineHelper\Library\Router\Router|null
     */
    public static function getInstance() {
        if ( ! isset( self::$_router ) ) {
            self::$_router = new Router();
            self::$_router->boot();
        }

        return self::$_router;
    }

    private function boot() {
        if ( $this->klein == null ) {
            $this->klein = new Klein();
            $this->addRoutes();
            $this->notFoundRoute();
            $this->klein->dispatch();
        }
    }

    /**
     * Loads routes from specific file
     */
    protected function addRoutes() {
        try {
            $path = base_path() . 'app/CuisineHelper/Http/Routes';
            require "{$path}.{$this->ext}";
        } catch ( \Exception $ex ) {
            print $ex->getMessage();
            exit;
        }
    }

    /**
     * Adding default route for bad requests
     */
    private function notFoundRoute() {
        $this->klein->onHttpError( function( $code, $router ) {
            switch ( $code ) {
                case 404:
                case 405:
                    $message = "Page not found!";
                    break;
                default:
                    $message = "An error occured";
            }
            $router->response()->body( $message );
        } );
    }

    public static function get($method, $callback) {
        return self::route('get', $method, $callback);
    }

    public static function post($method, $callback) {
        return self::route('post', $method, $callback);
    }

    public static function delete($method, $callback) {
        return self::route('delete', $method, $callback);
    }

    public function getKlein() {
        return $this->klein;
    }

    private function __clone() {
    }
}
