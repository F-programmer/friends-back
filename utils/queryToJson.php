<?php

function QueryToJson( $query ) {
    $jsonArray = array();
    foreach ( $query->fetchAll() as &$line ) {
        $jsonLine = array();
        foreach ( $line as $key => $value ) {
            if ( !is_numeric( $key ) ) {
                $jsonLine[$key] = $value;
            }
        }
        $jsonArray[] = $jsonLine;
    }
    return $jsonArray;
}
?>