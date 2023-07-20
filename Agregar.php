<?php
    if(isset($_POST)){
        require_once 'coneccion.php';

        $Errores = array();
        $id = isset($_POST['clave']) ? mysqli_real_escape_string($db, trim($_POST['clave'])) : "";
        $desc_corta =  isset($_POST['desc_corta']) ? mysqli_real_escape_string($db, trim($_POST['desc_corta'])) : "";
        $desc_larga = isset($_POST['desc_larga']) ? mysqli_real_escape_string($db, trim($_POST['desc_larga'])) : "";
        $unidad = isset($_POST['unidad']) ? (int)mysqli_real_escape_string($db, $_POST['unidad']) : "";
        $costo = isset($_POST['costo']) ? (int)mysqli_real_escape_string($db, $_POST['costo']) : "";
        $precio = isset($_POST['precio']) ? (int)mysqli_real_escape_string($db, $_POST['precio']) : "";
        
        if(empty($desc_corta) || empty($desc_larga) || empty($unidad) || empty($costo) || empty($precio)){
            $Errores['nulo'] = "Error en los datos"; 
        }

        if(count($Errores) == 0){
            $tipo_cambio = 16.7858;
            $precio_dolar = $precio/$tipo_cambio;
            $sql = "INSERT INTO articulos VALUES(null, '$desc_corta', '$desc_larga', $unidad, $costo, $precio, $tipo_cambio, $precio_dolar)";
            $Guardar = mysqli_query($db, $sql);

            if($Guardar){
                header("Location: index.php");
            }
        }
        else{
            $_SESSION['Errores'] = $Errores;
            $_SESSION['desc_corta'] = $desc_corta;
            $_SESSION['desc_larga'] = $desc_larga;
            $_SESSION['unidad'] = $unidad;
            $_SESSION['costo'] = $costo;
            $_SESSION['precio'] = $precio;
            header("Location: NuevoArticulo.php"); 
        }
    }
?>