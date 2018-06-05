<?php

namespace CuisineHelper\Library\Http\View;

use Twig_Loader_Filesystem;
use Twig_Environment;
use Twig_Error_Loader;

class TwigView {

    static    $_instance     = null;
    protected $templatePaths = [];
    protected $options       = [];
    protected $errorView     = null;
    protected $loader        = null;
    protected $twig          = null;

    private function __construct( $config ) {
        $this->templatePath = $config['path'];
        $this->options      = $config['options'];
        $this->errorView    = $config['error_view'];
        $this->loader       = new Twig_Loader_Filesystem( $this->templatePath );
        $this->twig         = new Twig_Environment( $this->loader, $this->options );
    }

    public function render( $name = '', $variables = [] ) {
        try {
            return $this->twig->render( $name, $variables );
        } catch ( Twig_Error_Loader $ex ) {
            return $this->twig->render( $this->errorView );
        }

    }

    public static function getInstance($config) {
        if ( self::$_instance == null ) {
            self::$_instance = new self($config);
        }

        return self::$_instance;
    }

    private function __clone() { }
}
