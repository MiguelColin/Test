<html>
    <head>
        <meta charset='utf-8'>
        <title> Nuevo </title>
        <link rel="stylesheet" href="estilo.css" type="text/css">
    </head>

    <body>
        <?php
            //Funcion para borrar todas las variables $_SESSION que ya no ocupamos
            function Borrarsessiones(){
                $borrado = false;
        
                if(isset($_SESSION['Errores'])){
                    $_SESSION['Errores'] = null;
                }
                if(isset($_SESSION['desc_corta'])){
                    $_SESSION['desc_corta'] = null;
                }
                if(isset($_SESSION['desc_larga'])){
                    $_SESSION['desc_larga'] = null;
                }
                if(isset($_SESSION['unidad'])){
                    $_SESSION['unidad'] = null;
                }
                if(isset($_SESSION['costo'])){
                    $_SESSION['costo'] = null;
                }
                if(isset($_SESSION['precio'])){
                    $_SESSION['precio'] = null;
                }
                return $borrado;
            }
            require_once 'coneccion.php';

            //Recorre toda la base de datos para obtener el ultimo Id y mostrarlo al usuario
            $sql = "SELECT clave FROM articulos";
            $login = mysqli_query($db, $sql);
            if($login->num_rows > 0):
                while($row = $login->fetch_assoc()):
                    $ultimoId = $row['clave'];
                endwhile;
            else:
                $ultimoId = 0;
            endif;

        ?>
        <form id="formulario" action="agregar.php" method = "POST">
            <label for="Clave"> Clave: </label>
            <input type="number" name="clave" value = <?= $ultimoId+1 ?> readonly> <br>
                    
            <label for="desc_corta"> Descripcion Corta: </label>
            <input type="text" name = "desc_corta" value = " <?= isset($_SESSION['desc_corta']) ? $_SESSION['desc_corta'] : ""; ?>">

            <label for="desc_larga"> Descripcion Larga: </label>
            <input type="text" name = "desc_larga" value = " <?= isset($_SESSION['desc_larga']) ? $_SESSION['desc_larga'] : ""; ?>"> <br>

            <label for="unidad"> Unidad de medida: </label>
            <input type="number" name = "unidad" value = <?= isset($_SESSION['unidad']) ? $_SESSION['unidad'] : 0; ?>> <br>

            <label for="costo"> Costo: </label>
            <input type="text" name = "costo" value = " <?= isset($_SESSION['costo']) ? $_SESSION['costo'] : ""; ?>">

            <label for="precio"> Precio: </label>
            <input type="text" name = "precio" value = " <?= isset($_SESSION['precio']) ? $_SESSION['precio'] : ""; ?>"> <br>

            <button type="submit"> Enviar </button>
            
        </form>
        <a href="index.php"> <button class="boton"> Cancelar </button> </a> <br> <br>
        <div class="Error">
            <?php if(isset($_SESSION['Errores']['nulo'])): ?>
                <?= $_SESSION['Errores']['nulo']; ?>
            <?php endif; Borrarsessiones(); ?>
        </div>

    </body>
</html>