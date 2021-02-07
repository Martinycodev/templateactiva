<?php

include 'connection.php';

$respuesta = array();

if(isset($_GET['point'])){
    $point = $_GET['point'];
    if(isset($_GET['tabla'])){
        $tabla = $_GET["tabla"];
        if(isset($_GET['identificador'])){
            $identificador = $_GET["identificador"];
            $consulta = "select * from $tabla WHERE $identificador = '$point'";

            $resultado = $connection -> query($consulta);
            while($row = mysqli_fetch_object($resultado)){
	            $respuesta[] = $row;
            }
            if ($respuesta == null){
                header("Location: http://www.mibardejaen.es", true, 301);
                exit();
            }else{
                echo json_encode($respuesta);
                $resultado -> close();
            }
        }else{
            $identificador = '.';
            header("Location: http://www.mibardejaen.es", true, 301);
            exit();
        }
    }else{
        $tabla = '.';
        header("Location: http://www.mibardejaen.es", true, 301);
        exit();
    }
}else{
    $point = '.';
    header("Location: http://www.mibardejaen.es", true, 301);
    exit();
}

?>