<?php require_once 'coneccion.php'; ?>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="estilo.css" type="text/css">
        <title> Test </title>
    </head>

    <body>
        <table>
            <tr>
                <th> Clave </th>
                <th> Desc. Corta </th>
                <th> Desc. Larga </th>
                <th> Unidad </th>
                <th> Costo </th>
                <th> Precio </th>
                <th> Tipo de cambio </th>
                <th> Precio Dolares </th>
            </tr>
            <?php
                $sql = "SELECT * FROM articulos";
                $login = mysqli_query($db, $sql);
                if($login->num_rows > 0):
                    while($row = $login->fetch_assoc()):
                        $id = $row['clave'];
                        echo "<tr> 
                        <td onclick='seleccionado($id)'>" . $id . "</td>  
                        <td onclick='seleccionado($id)'>" . $row['desc_corta'] . "</td>  
                        <td>" . $row['desc_larga'] . "</td>  
                        <td>" . $row['unidad'] . "</td>  
                        <td>" . $row['costo'] . "</td>  
                        <td>" . $row['precio'] . "</td>  
                        <td>" . $row['tipo_cambio'] . "</td>  
                        <td>" . $row['precio_dolares'] . "</td> 
                        </tr>";
                    endwhile;
            ?>  
                
            <?php
                else:
                    echo "No se encontraron resultados";
                endif;
            ?>
        </table>

        <br><a class="Nuevo" href="NuevoArticulo.php"> Nuevo </a>
        
        <script>
            function seleccionado(id){
                var datos = {
                    clave: id
                };
                var form = document.createElement("form");
                form.method = "post";
                form.action = "articulo.php";
                form.target = "_blank";

                // Agregar campos ocultos al formulario con los datos
                var input = document.createElement("input");
                input.type = "hidden";
                input.name = "clave";
                input.value = datos["clave"];
                form.appendChild(input);

                // Agregar el formulario al cuerpo del documento (fuera de la vista del usuario)
                form.style.display = "none";
                document.body.appendChild(form);

                // Enviar el formulario automáticamente
                form.submit();
            }
        </script>
    </body>
</html>