<?php

include 'connection.php';

$respuesta = array();

if(isset($_GET['NOTICIAS'])){
    $NOTICIAS = $_GET["NOTICIAS"];
    if($NOTICIAS == 1){
        $consulta = "select titulo, cuerpo, imagen from noticias WHERE id=(select MAX(id) from noticias)";
    }
    elseif($NOTICIAS == 2){
        $consulta = "select titulo, cuerpo, fecha_inicio, fecha_fin, imagen from noticias ORDER BY id DESC";
    }
    else{
        $NOTICIAS = '.';
        header("Location: https://activarjonilla.com/", true, 301);
        exit();
    }
    $resultado = $connection -> query($consulta);

    while($row = mysqli_fetch_object($resultado)){
	    $respuesta[] = $row;
    }

    echo json_encode($respuesta);
    $resultado -> close();
}else{
    $NOTICIAS = '.';
    header("Location: https://activarjonilla.com/", true, 301);
    exit();
}

?>