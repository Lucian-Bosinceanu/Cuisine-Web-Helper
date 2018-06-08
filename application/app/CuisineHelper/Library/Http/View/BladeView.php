<?php

namespace CuisineHelper\Library\Http\View;

use Philo\Blade\Blade;
use InvalidArgumentException;

class BladeView {

    static    $_instance  = null;
    protected $views      = '';
    protected $cache      = '';
    protected $blade      = null;
    protected $error_view = '';

    private function __construct( $config ) {
        $this->views = $config['path'];
        $this->cache = $config['cache'];
        $this->blade = new Blade( $this->views, $this->cache );
        if ( isset( $config['error_view'] ) ) {
            $this->errorView = $config['error_view'];
        }
    }

    public function render( $name, $params ) {
        try {
            return $this->blade->view()->make( $name, $params )->render();
        } catch ( InvalidArgumentException $ex ) {
            return $this->blade->view()->make( $this->errorView )->render();
        }
    }

    public static function getInstance( $config ) {
        if ( self::$_instance == null ) {
            self::$_instance = new self( $config );
        }

        return self::$_instance;
    }

    private function __clone() { }
}
