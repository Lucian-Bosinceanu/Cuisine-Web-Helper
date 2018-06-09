<?php

namespace CuisineHelper\Library\Http\Model;

use ORM as Database;

class ParisModel {

    static    $_instance = null;
    protected $dbConfig  = [
        'host'     => 'host',
        'db_name'  => 'db_name',
        'username' => 'username',
        'password' => 'password'
    ];

    private function __construct() {
    }

    public static function getInstance() {
        if ( ! isset( self::$_instance ) ) {
            self::$_instance = new ParisModel();
            self::$_instance->boot( config( 'database' ) );
        }

        return self::$_instance;
    }

    private function boot( $config ) {
        foreach ( $this->dbConfig as $key => $value ) {
            if ( ! isset( $config[ $key ] ) ) {
                throw new \Exception( "Database config error!" );
                exit;
            }
        }
        try {
            Database::configure( "mysql:host={$config['host']};dbname={$config['db_name']}" );
            Database::configure( 'username', $config['username'] );
            Database::configure( 'password', $config['password'] );
        } catch ( \Error $err ) {
            print "Database configuration error!";
            exit;
        }
    }

    private function __clone() {
    }
}
