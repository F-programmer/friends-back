<?php
require_once( '../database/connection.php' );
require_once( '../utils/queryToJson.php' );

header( 'Content-Type: application/json; charset: utf-8' );

// CORS HEADERS
header( 'Access-Control-Allow-Origin: *' );
header( 'Access-Control-Allow-Headers: X-Requested-With, Content-Type, Origin, Cache-Control, Pragma, Authorization, Accept, Accept-Encoding' );

header( 'Cache-Control: no-cache, must-revalidate' );
// HTTP/1.1
header( 'Expires: Sat, 26 Jul 1997 05:00:00 GMT' );
// Date in the past

$props = ['name', 'birthDate', 'preferedColor'];

$valid = true;
foreach ( $props as $key ) {
    if ( !$valid ) break;
    if ( !isset( $_POST[$key] ) || $_POST[$key] === '' || $_POST[$key] === null ) $valid = false;
}

if ( !$valid ) echo 'false';
else {
    $name = $_POST['name'];
    $birthDate = $_POST['birthDate'];
    $preferedColor = $_POST['preferedColor'];
    $connection = DatabaseConnection::getInstance();
    if ( $connection ) {
        $stmt = $connection->prepare( 'INSERT INTO tb_user (name, birth_date, favorite_color) VALUES (?,?,?)' );
        $stmt->bindValue( 1, $name );
        $stmt->bindValue( 2, $birthDate );
        $stmt->bindValue( 3, $preferedColor );

        $results = $stmt->execute();

        if ( $results > 0 ) echo 'true';
        else echo 'false';

    } else echo 'false';
}

?>