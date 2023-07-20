<?php require_once 'coneccion.php'; ?>
<html>
    <head>
        <meta charset='utf-8'>
        <title> articulo </title>
        <link rel="stylesheet" href="estilo.css" type="text/css">
    </head>

    <body>
        <?php 
            if($_SERVER["REQUEST_METHOD"] === "POST"):
                $id = $_POST["clave"];
                $sql = "SELECT * FROM articulos WHERE clave = $id";
                $login = mysqli_query($db, $sql);
                $row = mysqli_fetch_assoc($login);
        ?>
        <form>
            <label for="Clave"> Clave: </label>
            <input type="number" name="clave" value = <?= $id ?> readonly> <br>
            
            <label for="desc_corta"> Descripcion Corta: </label>
            <input type="text" name = "desc_corta" value = "<?= $row['desc_corta']?>" readonly>

            <label for="desc_larga"> Descripcion Larga: </label>
            <input type="text" name = "desc_larga" value = "<?= $row['desc_larga']?>" readonly> <br>

            <label for="unidad"> Unidad de medida: </label>
            <input type="number" name = "unidad" value = <?= $row['unidad']?> readonly> <br>

            <label for="costo"> Costo: </label>
            <input type="text" name = "costo" value = <?= $row['costo']?> readonly>

            <label for="precio"> Precio: </label>
            <input type="text" name = "precio" value = <?= $row['precio']?> readonly> <br>

            <label for="tipo_cambio"> Tipo de cambio: </label>
            <input type="text" name = "tipo_cambio" value = <?= $row['tipo_cambio']?> readonly>

            <label for="precio_dolares"> Precio en Dolares: </label>
            <input type="text" name = "precio_dolares" value = <?= $row['precio_dolares']?> readonly> <br>
        </form>
        
        <a href="index.php"> <button class="boton"> Regresar </button> </a>
        <?php 
            endif;
        ?>
    </body>
</html>