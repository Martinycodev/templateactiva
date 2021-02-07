<?php

include 'connection.php';

//CONDICION ID LOCALIDAD
if(!isset($_GET['ID_LOCALIDAD']) || empty($_GET['ID_LOCALIDAD']))
{
    $ID_LOCALIDAD ="";
    header("Location: http://www.mibardejaen.es", true, 301);
    exit(); 
}
//ELSE CONDICION ID LOCALIDAD
else
{
	$ID_LOCALIDAD = $_GET['ID_LOCALIDAD'];
	//CONDICION ID LOCALIDAD 1
	if($ID_LOCALIDAD == "1")
	{
		//CONDICION SERVICIO
		if(!isset($_GET['SERVICIO']) || empty($_GET['SERVICIO']))
		{
			$SERVICIO = "";
            header("Location: http://www.mibardejaen.es", true, 301);
            exit();
		}
		//ELSE CONDICION SERVICIO
		else
		{
			$SERVICIO = $_GET['SERVICIO'];
			//CONDICION SERVICIO 1
			if($SERVICIO == "1")
			{
				//CONDICION BUSQUEDA 1.1
				if(!isset($_GET['BUSQUEDA']) || empty($_GET['BUSQUEDA']))
				{
					//SELECT * SIN BUSQUEDA 1.1
					$consulta = "SELECT url_foto, categoria, nombre_negocio, direccion, telefono_local, horario, horario_cocina, facebook,maps,url_carta,premium,galeria,menu_oferta FROM BARES ORDER BY prioridad DESC";

					//CONEXION * SIN BUSQUEDA 1.1
					$resultado = $connection -> query($consulta);
					//BUCLE LECTURA * SIN BUSQUEDA 1.1
					while($row = mysqli_fetch_object($resultado))
					{
                        $respuesta[] = $row;
                    }
                    //CONDICION DEVOLUCION DATOS * SIN BUSQUEDA 1.1
                    if($respuesta!=null)
                    {
                    	echo json_encode($respuesta);
                    }
                    //ELSE CONDICION DEVOLUCION DATOS * SIN BUSQUEDA 1.1
                    else
                    {
                    	header("Location: http://www.mibardejaen.es", true, 301);
                        exit();
                    }
                    //CIERRA CONEXION * SIN BUSQUEDA 1.1
                    $resultado -> close();
				}
				//ELSE CONDICION BUSQUEDA 1.1
				else
				{
					$BUSQUEDA = $_GET['BUSQUEDA'];
					//SELECT * CON BUSQUEDA 1.2
                    $consulta = "SELECT url_foto, categoria, nombre_negocio, direccion, telefono_local, horario, horario_cocina, facebook,maps,url_carta,premium,galeria,menu_oferta FROM BARES WHERE categoria LIKE '%$BUSQUEDA%' OR nombre_negocio LIKE '%$BUSQUEDA%' ORDER BY prioridad DESC";

                    //CONEXION * CON BUSQUEDA 1.2
                    $resultado = $connection -> query($consulta);
                    //BUCLE LECTURA * CON BUSQUEDA 1.2
                    while($row = mysqli_fetch_object($resultado))
                    {
                    	$respuesta[] = $row;
                    }
                    //CONDICION DEVOLUCION DATOS * CON BUSQUEDA 1.2
                    if($respuesta!=null)
                    {
                    	echo json_encode($respuesta);
                    }
                    //ELSE CONDICION DEVOLUCION DATOS * CON BUSQUEDA 1.2
                    else
                    {
                    	header("Location: http://www.mibardejaen.es", true, 301);
                        exit();
                    }
                    //CIERRA CONEXION * CON BUSQUEDA 1.2
                    $resultado -> close();
				}
			}
			//CONDICION SERVICIO 2
			elseif($SERVICIO == "2")
			{
				//CONDICION BUSQUEDA 2.1
				if(!isset($_GET['BUSQUEDA']) || empty($_GET['BUSQUEDA']))
				{
					//SELECT * SIN BUSQUEDA 2.1
					$consulta = "SELECT url_foto, categoria, nombre_negocio, direccion, telefono_local, horario, horario_cocina, facebook,maps,url_carta,premium,galeria,menu_oferta FROM BARES WHERE servicio>=$SERVICIO ORDER BY prioridad DESC";
					//CONEXION  * SIN BUSQUEDA 2.1
					$resultado = $connection -> query($consulta);
					//BUCLE LECTURA * SIN BUSQUEDA 2.1
					while($row = mysqli_fetch_object($resultado))
					{
						$respuesta[] = $row;
					}
					//CONDICION DEVOLUCION DATOS * SIN BUSQUEDA 2.1
					if($respuesta!=null)
					{
						echo json_encode($respuesta);
					}
					//ELSE CONDICION DEVOLUCION DATOS * SIN BUSQUEDA 2.1
					else
					{
						header("Location: http://www.mibardejaen.es", true, 301);
                        exit();
					}
					//CIERRA CONEXION * SIN BUSQUEDA 2.1
					$resultado -> close();
				}
				//ELSE CONDICION BUSQUEDA 2.2
				else
				{
					$BUSQUEDA = $_GET['BUSQUEDA'];
					//SELECT * CON BUSQUEDA 2.2
					$consulta = "SELECT url_foto, categoria, nombre_negocio, direccion, telefono_local, horario, horario_cocina, facebook,maps,url_carta,premium,galeria,menu_oferta FROM BARES WHERE servicio>=$SERVICIO AND (categoria LIKE '%$BUSQUEDA%' OR nombre_negocio LIKE '%$BUSQUEDA%') ORDER BY prioridad DESC";
					//CONEXION * CON BUSQUEDA 2.2
					$resultado = $connection -> query($consulta);
					//BUCLE LECTURA * CON BUSQUEDA 2.2
					while($row = mysqli_fetch_object($resultado))
					{
						$respuesta[] = $row;
					}
					//CONDICION DEVOLUCION DATOS * CON BUSQUEDA 2.2
					if($respuesta!=null)
					{
						echo json_encode($respuesta);
					}
					//ELSE CONDICION DEVOLUCION DATOS * CON BUSQUEDA 2.2
					else
					{
						header("Location: http://www.mibardejaen.es", true, 301);
                        exit();
					}
					//CIERRA CONEXION * CON BUSQUEDA 2.2
					$resultado -> close();
				}
			}
			//CONDICION SERVICIO 3
			elseif($SERVICIO == "3")
			{
				//CONDICION BUSQUEDA 3.1
				if(!isset($_GET['BUSQUEDA']) || empty($_GET['BUSQUEDA']))
				{
					//SELECT * SIN BUSQUEDA 3.1
					$consulta = "SELECT url_foto, categoria, nombre_negocio, direccion, telefono_local, horario, horario_cocina, facebook,maps,url_carta,premium,galeria,menu_oferta FROM BARES WHERE servicio=$SERVICIO ORDER BY prioridad DESC";
					//CONEXION * SIN BUSQUEDA 3.1
					$resultado = $connection -> query($consulta);
					//BUCLE LECTURA * SIN BUSQUEDA 3.1
					while($row = mysqli_fetch_object($resultado))
					{
						$respuesta[] = $row;
					}
					//CONDICION DEVOLUCION DATOS * SIN BUSQUEDA 3.1
					if($respuesta!=null)
					{
						echo json_encode($respuesta);
					}
					//ELSE CONDICION DEVOLUCION DATOS * SIN BUSQUEDA 3.1
					else
					{
						header("Location: http://www.mibardejaen.es", true, 301);
                        exit();
					}
					//CIERRA CONEXION * SIN BUSQUEDA 3.1
					$resultado -> close();
				}	
				//ELSE CONDICION BUSQUEDA 3.2
				else
				{
					$BUSQUEDA = $_GET['BUSQUEDA'];
					//SELECT * CON BUSQUEDA 3.2
					$consulta = "SELECT url_foto, categoria, nombre_negocio, direccion, telefono_local, horario, horario_cocina, facebook,maps,url_carta,premium,galeria,menu_oferta FROM BARES WHERE servicio=$SERVICIO AND (categoria LIKE '%$BUSQUEDA%' OR nombre_negocio LIKE '%$BUSQUEDA%') ORDER BY prioridad DESC";
					//CONEXION * CON BUSQUEDA 3.2
					$resultado = $connection -> query($consulta);
					//BUCLE LECTURA * CON BUSQUEDA 3.2
					while($row = mysqli_fetch_object($resultado))
					{
						$respuesta[] = $row;
					}
					//CONDICION DEVOLUCION DATOS * CON BUSQUEDA 3.2
					if($respuesta!=null)
					{
						echo json_encode($respuesta);
					}
					//ELSE CONDICION DEVOLUCION DATOS * CON BUSQUEDA 3.2
					else
					{
						header("Location: http://www.mibardejaen.es", true, 301);
                        exit();
					}
					//CIERRA CONEXION * CON BUSQUEDA 3.2
					$resultado -> close();
				}
				
			}
			//CONDICION SERVICIO DISTINTO A 1 2 3
			else
			{
				$SERVICIO = "";
            	header("Location: http://www.mibardejaen.es", true, 301);
            	exit();
			}
		}
	}
	//ELSE CONDICION ID LOCALIDAD SELECCIONADA
	else
	{
		//CONDICION SERVICIO
		if(!isset($_GET['SERVICIO']) || empty($_GET['SERVICIO']))
		{
			$SERVICIO = "";
            header("Location: http://www.mibardejaen.es", true, 301);
            exit(); 
		}
		//ELSE CONDICION SERVICIO
		else
		{
			$SERVICIO = $_GET['SERVICIO'];
			//CONDICION SERVICIO 1
			if($SERVICIO == "1")
			{
				//CONDICCION BUSQUEDA 1.1
				if(!isset($_GET['BUSQUEDA']) || empty($_GET['BUSQUEDA']))
				{
					//SELECT NEGOCIOS SIN BUSQUEDA 1.1
					$consulta = "SELECT url_foto, categoria, nombre_negocio, direccion, telefono_local, horario, horario_cocina, facebook,maps,url_carta,premium,galeria,menu_oferta FROM BARES WHERE id_localidad=$ID_LOCALIDAD ORDER BY prioridad DESC";
					//CONEXION NEGOCIOS SIN BUSQUEDA 1.1
					$resultado = $connection -> query($consulta);
					//BUCLE LECTURA NEGOCIOS SIN BUSQUEDA 1.1
					while($row = mysqli_fetch_object($resultado))
					{
						$respuesta[] = $row;
					}
					//CONDICION DEVOLUCION DATOS NEGOCIOS SIN BUSQUEDA 1.1
					if($respuesta!=null)
					{
						echo json_encode($respuesta);
					}
					//ELSE CONDICION DEVOLUCION DATOS NEGOCIOS SIN BUSQUEDA 1.1
					else
					{
						header("Location: http://www.mibardejaen.es", true, 301);
                        exit();
					}
					//CIERRA CONEXION NEGOCIOS SIN BUSQUEDA 1.1
					$resultado -> close();
				}
				//ELSE CONDICION BUSQUEDA 1.1
				else 
				{
					$BUSQUEDA = $_GET['BUSQUEDA'];
					//SELECT NEGOCIOS CON BUSQUEDA 1.1
					$consulta = "SELECT url_foto, categoria, nombre_negocio, direccion, telefono_local, horario, horario_cocina, facebook,maps,url_carta,premium,galeria,menu_oferta FROM BARES WHERE id_localidad=$ID_LOCALIDAD AND (categoria LIKE '%$BUSQUEDA%' OR nombre_negocio LIKE '%$BUSQUEDA%') ORDER BY prioridad DESC";
					//CONEXION NEGOCIOS CON BUSQUEDA 1.1
					$resultado = $connection -> query($consulta);
					//BUCLE LECTURA NEGOCIOS CON BUSQUEDA 1.1
					while($row = mysqli_fetch_object($resultado))
					{
						$respuesta[] = $row;
					}
					//CONDICION DEVOLUCION DATOS NEGOCIOS CON BUSQUEDA 1.1
					if($respuesta!=null)
					{
						echo json_encode($respuesta);
					}
					//ELSE CONDICION DEVOLUCION DATOS NEGOCIOS CON BUSQUEDA 1.1
					else
					{
						header("Location: http://www.mibardejaen.es", true, 301);
                        exit();
					}
					//CIERRA CONEXION NEGOCIOS CON BUSQUEDA 1.1
					$resultado -> close();
				}
			}
			//CONDICION SERVICIO 2
			elseif($SERVICIO == "2")
			{
				//CONDICCION BUSQUEDA 2.1
				if(!isset($_GET['BUSQUEDA']) || empty($_GET['BUSQUEDA']))
				{
					//SELECT NEGOCIOS SIN BUSQUEDA 2.1
					$consulta = "SELECT url_foto, categoria, nombre_negocio, direccion, telefono_local, horario, horario_cocina, facebook,maps,url_carta,premium,galeria,menu_oferta FROM BARES WHERE id_localidad=$ID_LOCALIDAD AND servicio>=$SERVICIO ORDER BY prioridad DESC";
					//CONEXION NEGOCIOS SIN BUSQUEDA 2.1
					$resultado = $connection -> query($consulta);
					//BUCLE LECTURA NEGOCIOS SIN BUSQUEDA 2.1
					while($row = mysqli_fetch_object($resultado))
					{
						$respuesta[] = $row;
					}
					//CONDICION DEVOLUCION DATOS NEGOCIOS SIN BUSQUEDA 2.1
					if($respuesta!=null)
					{
						echo json_encode($respuesta);
					}
					//ELSE CONDICION DEVOLUCION DATOS NEGOCIOS SIN BUSQUEDA 2.1
					else
					{
						header("Location: http://www.mibardejaen.es", true, 301);
                        exit();
					}
					//CIERRA CONEXION NEGOCIOS SIN BUSQUEDA 2.1
					$resultado -> close();
				}
				//ELSE CONDICION BUSQUEDA 2.1
				else 
				{
					$BUSQUEDA = $_GET['BUSQUEDA'];
					//SELECT NEGOCIOS CON BUSQUEDA 2.2
					$consulta = "SELECT url_foto, categoria, nombre_negocio, direccion, telefono_local, horario, horario_cocina, facebook,maps,url_carta,premium,galeria,menu_oferta FROM BARES WHERE id_localidad=$ID_LOCALIDAD AND servicio>=$SERVICIO AND (categoria LIKE '%$BUSQUEDA%' OR nombre_negocio LIKE '%$BUSQUEDA%') ORDER BY prioridad DESC";
					//CONEXION NEGOCIOS CON BUSQUEDA 2.2
					$resultado = $connection -> query($consulta);
					//BUCLE LECTURA NEGOCIOS CON BUSQUEDA 2.2
					while($row = mysqli_fetch_object($resultado))
					{
						$respuesta[] = $row;
					}
					//CONDICION DEVOLUCION DATOS NEGOCIOS CON BUSQUEDA 2.2
					if($respuesta!=null)
					{
						echo json_encode($respuesta);
					}
					//ELSE CONDICION DEVOLUCION DATOS NEGOCIOS CON BUSQUEDA 2.2
					else
					{
						header("Location: http://www.mibardejaen.es", true, 301);
                        exit();
					}
					//CIERRA CONEXION NEGOCIOS CON BUSQUEDA 2.2
					$resultado -> close();
				}
			}
			//CONDICION SERVICIO 3
			elseif($SERVICIO == "3")
			{
				//CONDICCION BUSQUEDA 3.1
				if(!isset($_GET['BUSQUEDA']) || empty($_GET['BUSQUEDA']))
				{
					//SELECT NEGOCIOS SIN BUSQUEDA 3.1
					$consulta = "SELECT url_foto, categoria, nombre_negocio, direccion, telefono_local, horario, horario_cocina, facebook,maps,url_carta,premium,galeria,menu_oferta FROM BARES WHERE id_localidad=$ID_LOCALIDAD AND servicio=$SERVICIO ORDER BY prioridad DESC";
					//CONEXION NEGOCIOS SIN BUSQUEDA 3.1
					$resultado = $connection -> query($consulta);
					//BUCLE LECTURA NEGOCIOS SIN BUSQUEDA 3.1
					while($row = mysqli_fetch_object($resultado))
					{
						$respuesta[] = $row;
					}
					//CONDICION DEVOLUCION DATOS NEGOCIOS SIN BUSQUEDA 3.1
					if($respuesta!=null)
					{
						echo json_encode($respuesta);
					}
					//ELSE CONDICION DEVOLUCION DATOS NEGOCIOS SIN BUSQUEDA 3.1
					else
					{
						header("Location: http://www.mibardejaen.es", true, 301);
                        exit();
					}
					//CIERRA CONEXION NEGOCIOS SIN BUSQUEDA 3.1
					$resultado -> close();
				}
				//ELSE CONDICION BUSQUEDA 3.1
				else 
				{
					$BUSQUEDA = $_GET['BUSQUEDA'];
					//SELECT NEGOCIOS CON BUSQUEDA 3.2
					$consulta = "SELECT url_foto, categoria, nombre_negocio, direccion, telefono_local, horario, horario_cocina, facebook,maps,url_carta,premium,galeria,menu_oferta FROM BARES WHERE id_localidad=$ID_LOCALIDAD  AND servicio=$SERVICIO AND (categoria LIKE '%$BUSQUEDA%' OR nombre_negocio LIKE '%$BUSQUEDA%') ORDER BY prioridad DESC";
					//CONEXION NEGOCIOS CON BUSQUEDA 3.2
					$resultado = $connection -> query($consulta);
					//BUCLE LECTURA NEGOCIOS CON BUSQUEDA 3.2
					while($row = mysqli_fetch_object($resultado))
					{
						$respuesta[] = $row;
					}
					//CONDICION DEVOLUCION DATOS NEGOCIOS CON BUSQUEDA 3.2
					if($respuesta!=null)
					{
						echo json_encode($respuesta);
					}
					//ELSE CONDICION DEVOLUCION DATOS NEGOCIOS CON BUSQUEDA 3.2
					else
					{
						header("Location: http://www.mibardejaen.es", true, 301);
                        exit();
					}
					//CIERRA CONEXION NEGOCIOS CON BUSQUEDA 3.2
					$resultado -> close();
				}
			}
			//CONDICION SERVICIO DISTINTO 1 2 3
			else
			{
				$SERVICIO = "";
            	header("Location: http://www.mibardejaen.es", true, 301);
            	exit();
			}
		}
	}
}

?>