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

$props = ['id', 'name', 'birthDate', 'preferedColor'];

$connection = DatabaseConnection::getInstance();

$extraQuery = '';

if ( isset( $_GET['search'] ) ) {
    $search = $_GET['search'];
    if ( $search != '' && $search != null && $search && $search != '' )
    $extraQuery = "WHERE tb_user.name LIKE '" . $search . "%'";
}

if ( $connection ) {
    $query = $connection->query(
        'SELECT * FROM tb_user
    INNER JOIN tb_color
    ON tb_user.favorite_color = tb_color.id_color
    ' . $extraQuery );
        if ( $query->rowCount() > 0 ) {
            $data = QueryToJson( $query );
            echo( json_encode( $data ) );
        }
    }

    ?>