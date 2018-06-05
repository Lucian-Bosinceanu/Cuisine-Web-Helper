<?php

namespace CuisineHelper\Library\Http\View;

use CuisineHelper\Library\Http\View\TwigView as TwigView;
use CuisineHelper\Library\Http\View\BladeView as BladeView;

class ViewEngine {

    static    $_instance = null;
    protected $view      = null;
    protected $config = null;

    private function __construct( $config ) {
        $this->config = $config;
        $this->view = $this->make( $config );
    }

    private function make( $config ) {

        try {
            if ( !isset($config['engine']) || ! isset( $config['options'] ) ) {
                throw new \Exception( 'Invalid View options config' );
            }
            $engine = $config['engine'];
            $config = $config['options'][ $engine ];
            switch ( $engine ) {
                case 'twig':
                    return TwigView::getInstance( $config );
                case 'blade':
                    return BladeView::getInstance( $config );
            }
        } catch (\Exception $ex) {
            print $ex->getMessage();
            exit;
        }
    }

    public function render( $name = '', $variables = [] ) {
        try {
            return $this->view->render( $name, $variables );
        } catch (\Exception $ex) {
            print $ex->getMessage();
            exit;
        }
    }

    public static function getInstance() {
        if ( self::$_instance == null ) {
            try {
                self::$_instance = new self( config('view') );
            } catch (\Exception $ex) {
                return 'Error';
            }
        }

        return self::$_instance;
    }

}
