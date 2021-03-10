<?php

class DatabaseConnection {
    private function __construct() {
    }
    public static $instance;
    public static function getInstance() {
        if ( !isset( self::$instance ) ) {
            $server = 'localhost';
            $user = 'root';
            $password = '';
            $bd = 'bd_friends';

            try {
                self::$instance = new PDO(
                    /*	'mysql:host=localhost;dbname=bdbarbearia',
                    'root',    fdb30.awardspace.net
                    ''*/
                    "mysql:host=$server;
                    dbname=$bd",
                    "$user",
                    "$password"
                );
                self::$instance->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
                self::$instance->exec( 'SET CHARACTER SET utf8' );
            } catch ( Exception $error ) {
                self::$instance = null;
                echo( $error );
            }
        }
        return self::$instance;
    }
}
?>