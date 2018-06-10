<?php

namespace CuisineHelper\Library\Router;

use \Klein\Klein as Klein;

class Router {

    static  $_router         = null;
    private $ext             = 'php';
    private $klein           = null;
    private $controllersPath = "\\CuisineHelper\\Http\\Controllers\\";
    private $middlewaresPath = "\\CuisineHelper\\Http\\Middlewares\\";
    private $middlewares     = [];

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
    public static function route( $method, $path, $callback, $options = [] ) {
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
        if (isset($options['middleware'])) {
            $router->addMiddleware($route->getMethod() . $route->getPath(), $options['middleware']);
        }
        return $route;
    }

    public function addMiddleware($route, $middleware = []) {
        if (isset($route) && ! empty($route)) {
            $this->middlewares[$route] = $middleware;
        }
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
            $this->klein->afterDispatch([$this, 'runMiddlewares']);
            $this->klein->dispatch();
        }
    }

    public function runMiddlewares($klein) {
        $request = $klein->request();
        $response = $klein->response();
        $path = $request->pathname();
        $method = strtolower($request->method());
        if (isset($this->middlewares[$method . $path])) {
            $middlewares = $this->middlewares[$method . $path];
            foreach ($middlewares as $middleware) {
                $class = $this->middlewaresPath . $middleware;
                call_user_func([ new $class(), "handle" ], $request, $response);
            }
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

    public static function get($method, $callback, $options = []) {
        return self::route('get', $method, $callback, $options);
    }

    public static function post($method, $callback, $options = []) {
        return self::route('post', $method, $callback, $options);
    }

    public static function delete($method, $callback, $options = []) {
        return self::route('delete', $method, $callback, $options);
    }

    public static function response() {
        return self::getInstance()->getResponse();
    }

    public static function request() {
        return self::getInstance()->getRequest();
    }

    public function getKlein() {
        return $this->klein;
    }

    public function getResponse() {
        return $this->klein->response();
    }

    public function getRequest() {
        return $this->klein->request();
    }

    private function __clone() {
    }
}
