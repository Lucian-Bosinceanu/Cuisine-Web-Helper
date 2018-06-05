<?php

namespace CuisineHelper\Library\Router;

use \Klein\Klein as Klein;

class Router {

    static  $_router         = null;
    private $routeFile       = 'Routes';
    private $ext             = 'php';
    private $klein           = null;
    private $controllersPath = "\\CuisineHelper\\Http\\Controllers\\";

    private function __construct() {
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
            require "{$this->routeFile}.{$this->ext}";
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
                    $message = "Page not found!";
                    break;
                default:
                    $message = "An error occured";
            }
            $router->response()->body( $message );
        } );
    }

    /**
     * If $callback is callable, just pass it
     * otherwise, the format should be "Controller@Method"
     * @param                 $method   The HTTP verb GET, POST etc...
     * @param                 $path     The path of the request
     * @param callable|String $callback The callback or the controller's action
     *
     * @return \CuisineHelper\Library\Router\Router|null
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
                    $class = $router->controllersPath . $result[0];
                    if ( ! class_exists( ucfirst( $class ) ) ) {
                        throw new \Exception( "Controller not found!" );
                    }
                    $klein->respond( $method, $path, [ new $class(), $result[1] ] );
                }
            }
        } catch (\Exception $ex) {
            print $ex->getMessage();
            exit;
        }
        return $router;
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

    public static function get() {

    }

    public static function post() {

    }

    private function __clone() {
    }
}
