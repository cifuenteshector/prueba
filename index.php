<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Formulario de Votacion</title>
</head>
<body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<form id="formulario">
    <table>
        <tr>
            <td>
                Nombre y apellido
            </td>
            <td>
                <input type="text" name="name" required="required">
            </td>
        </tr>
        <tr>
            <td>
                Alias
            </td>
            <td>
                <input type="text" name="alias">
            </td>
        </tr>
        <tr>
            <td>
                Rut
            </td>
            <td>
                <input type="number" name="Rut">
            </td>
        </tr>
        <tr>
            <td>
                Email
            </td>
            <td>
                <input type="email" name="email">
            </td>
        </tr>
        <tr>
            <td>
                Region
            </td>
            <td>
                <div class="content">
                    <?php
                    include("config.php");
                    ?>
                    <select name="region" id="region" onChange="getComuna(this.value);">

                        <option value="">Selecciona una Region</option>
                        <?php
                        $host = "host = 127.0.0.1";
                        $port = "port = 5432";
                        $dbname = "dbname = hcifuentes";
                        $credentials = "user = postgres password=tito6223041";

                        $db= pg_connect("$host $port $dbname $credentials");
                        $query = "SELECT nombre FROM region";

                        $result = pg_query($query);
                        if (!$result) {
                            echo "Problema con la query " . $query . "<br/>";
                            echo pg_last_error();
                            exit();
                        }

                        while($myrow = pg_fetch_assoc($result)) {
                            printf ("<option value=$myrow[id_region]>$myrow[nombre]</option>");
                        }
                        ?>
                    </select>
                    <br>
                </div>
            </td>
        </tr
        <tr>
            <td>
                Comuna
            </td>
            <td>
                <select name="comuna" id="comuna">
                    <option value="">Selecciona comuna</option>
                </select>
            </td>
        </tr>
        </br>
        <tr>
            <td>
                Nosotros
            </td>
            <td>
                <input type="checkbox">Web
                <input type="checkbox" name="">TV
                <input type="checkbox" name="redesSociales">Redes sociales
                <input type="checkbox" name="amiga">
            </td>
        </tr>

        <tr>
            <td>
                <input type="submit" value="votar">
            </td>
        </tr>
    </table>
</form>

<script type="text/javascript">
    $(document).ready(function(){
        $('#region').on('change',function(){
            var id_region = $(this).val();
            if(id_region){
                $.ajax({
                    type:'POST',
                    url:'getComuna.php',
                    data:'id_region='+id_region,
                    success:function(html){
                        $('#comuna').html('<option value="">Selecciona region primero</option>');
                    }
                });
            }else{
                $('#comuna').html('<option value="">Seleccione comuna</option>');
            }
        });
    });
</script>
</body>