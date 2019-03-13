<?php
/*/**
 * Created by PhpStorm.
 * User: hector
 * Date: 13-03-19
 * Time: 1:09
 */
    require_once ("config.php");
    $host = "host = 127.0.0.1";
    $port = "port = 5432";
    $dbname = "dbname = hcifuentes";
    $credentials = "user = postgres password=tito6223041";

    $db= pg_connect("$host $port $dbname $credentials");
    if (! empty($_POST["id_region"])) {
        $query = "SELECT nombre FROM comuna WHERE id_region =" . $_POST["id_region"];
        $result = pg_query($query);
        if (!$result) {
            echo "Problem with query " . $query . "<br/>";
            echo pg_last_error();
            exit();
        }

        $get_total_rows = pg_numrows($result);
        if ($get_total_rows > 0) {
            echo '<option value="">Selecciona una Comuna</option>';
            while ($myrow = pg_fetch_assoc($result)) {
                echo '<option value="' . $myrow[id_comuna] . '">' . $myrow[nombre] . '</option>';
            }
        } else {
            echo '<option value="">Comuna no disponible</option>';
        }
    }

    ?>