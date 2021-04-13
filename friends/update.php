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

$props = ['name', 'birthDate', 'preferedColor', 'idUser'];

$valid = true;
foreach ( $props as $key ) {
    if ( !$valid ) break;
    if ( !isset( $_POST[$key] ) || $_POST[$key] === '' || $_POST[$key] === null ) $valid = false;
}

if ( !$valid ) echo 'false';
else {
    $name = $_POST['name'];
    $birthDate = $_POST['birthDate'];
    $preferedColor = intVal($_POST['preferedColor']);
    $idUser = $_POST['idUser'];
    $connection = DatabaseConnection::getInstance();
    if ( $connection ) {
        $query = "UPDATE tb_user SET name = ?, birth_date = ?, favorite_color = ? WHERE id = ?";

        $stmt = $connection->prepare($query);

        $stmt->bindParam(1, $name);
        $stmt->bindParam(2, $birthDate);
        $stmt->bindParam(3, $preferedColor);
        $stmt->bindParam(4, $idUser);

        $stmt->execute();

        if( $stmt->rowCount())

        echo "true";
        else echo 'false';

    } else echo 'false';
}

?>