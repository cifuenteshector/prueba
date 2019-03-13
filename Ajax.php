<?php
/**
 * Created by PhpStorm.
 * User: hector
 * Date: 13-03-19
 * Time: 0:51
 */
//Include database configuration file
include("config.php");



if(isset($_POST["id_region"]) && !empty($_POST["id_region"])){
//Obtener todas las comunas
    $query = "SELECT nombre FROM comuna WHERE id_region = ".$_POST['id_region'];

    $result = pg_query($query);
    if (!$result) {
        echo "Problem with query " . $query . "<br/>";
        echo pg_last_error();
        exit();
    }

//Count total number of rows
    $get_total_rows = pg_numrows($results);

//Display states list
    if($get_total_rows > 0){
        echo '<option value="">Selecciona una Comuna</option>';
        while($myrow = pg_fetch_assoc($result)) {
            echo '<option value="'.$myrow['id_comuna'].'">'.$myrow['nombre'].'</option>';
        }
    }else{
        echo '<option value="">Comuna no disponible</option>';
    }

}