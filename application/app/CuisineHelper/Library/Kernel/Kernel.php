<?php

namespace CuisineHelper\Library\Kernel;

use CuisineHelper\Library\Http\Model\ParisModel;
use CuisineHelper\Library\Router\Router as Router;
use CuisineHelper\Library\Http\View\ViewEngine as ViewEngine;

class Kernel {

    static  $_instance  = null;
    private $config     = [];
    private $router     = null;
    private $viewEngine = null;

    private function __construct() {
        $this->boot();
        $this->viewEngine = ViewEngine::getInstance();
        $this->database   = ParisModel::getInstance();
        $this->router     = Router::getInstance();
    }

    private function boot() {
        $this->readConfig();
    }

    private function readConfig() {
        $this->config = config( 'app' );
        $this->setDebugMode( $this->config['debug'] );
        $this->setMaintenance( $this->config['maintenance'] );
    }

    private function setDebugMode( $debug = false ) {
        if ( $debug ) {
            ini_set( 'display_errors', 1 );
            ini_set( 'display_startup_errors', 1 );
            error_reporting( E_ALL );
        } else {
            error_reporting( 0 );
        }
    }

    private function setMaintenance( $maintenance = false ) {

    }

    public static function getInstance() {
        if ( self::$_instance == null ) {
            self::$_instance = new Kernel();
        }

        return self::$_instance;
    }

    private function __clone() { }
}
