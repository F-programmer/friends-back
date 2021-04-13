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

$props = ['idUser'];

$valid = true;
foreach ( $props as $key ) {
    if ( !$valid ) break;
    if ( !isset( $_GET [$key] ) || $_GET [$key] === '' || $_GET [$key] === null ) $valid = false;
}

if ( !$valid ) echo 'false';
else {
    $idUser = $_GET['idUser'];
    $connection = DatabaseConnection::getInstance();
    if ( $connection ) {
        $query = "DELETE FROM tb_user WHERE id = ?";

        $stmt = $connection->prepare($query);

        $stmt->bindParam(1, $idUser);

        $stmt->execute();

        if( $stmt->rowCount())

        echo "true";
        else echo 'false';

    } else echo 'false';
}

?>