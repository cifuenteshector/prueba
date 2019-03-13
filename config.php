<?php
/**
 * Created by PhpStorm.
 * User: hector
 * Date: 12-03-19
 * Time: 22:37
 */

    $host = "host = 127.0.0.1";
    $port = "port = 5432";
    $dbname = "dbname = hcifuentes";
    $credentials = "user = postgres password=tito6223041";

    $db = pg_connect("$host $port $dbname $credentials");
    if (!$db) {
      echo "Error: Incapaz de abrir la base de datos\n";
    } else {
        echo "Base de datos conectada satisfactoriamente </br>\n";
    }

