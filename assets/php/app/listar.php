<?php

include 'connection.php';

$respuesta = array();

if(isset($_GET['LOCALIDADES'])){
    $LOCALIDADES = $_GET["LOCALIDADES"];
    $consulta = "select * from LOCALIDADES ORDER BY localidad ASC";
    $resultado = $connection -> query($consulta);

    while($row = mysqli_fetch_object($resultado)){
	    $respuesta[] = $row;
    }

    echo json_encode($respuesta);
    $resultado -> close();
}else{
    $LOCALIDADES = '.';
    header("Location: http://www.mibardejaen.es", true, 301);
    exit();
}

?>