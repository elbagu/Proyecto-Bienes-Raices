<?php

function conectarDB() : mysqli{
    $db = new mysqli('localhost','isma','Ismael','bienesraices');

    if(!$db){
        echo "Error";
        exit;
    }

    return $db;
}