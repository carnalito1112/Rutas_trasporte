<?php

/*
 * Proyecto    : Sistema de gestión de rutas de la red del transporte público
 * Descripcion : Aplicacion proveedora de servicios web para visualizacion de informacion de rutas.
 * Version     : 1.
 * Autor(es)   : Ana Karen Cordova Moran
 * Editado     : Emmanuel Garcia Cerriteño
 * Creacion    : 02-07-2015
 * Editado     : 10-08-2015
 * Decripcion
 * de clase    : Clase encargada de ejecutar la funciones necesarias para borrar alguna ruta.
 * Copyright © 2015, Laboratorio de CPU
 */

include( "../../../model/conexion.php" );
include( "../../../model/consultas.php" );


if(isset($_REQUEST['actionfunction']) && $_REQUEST['actionfunction']!='')
{
$actionfunction=$_REQUEST['actionfunction'];
call_user_func($actionfunction,$_REQUEST);
}




function borrarRuta($data)
{
	/*
	 *
	 *funcion encargada de borrar la ruta elejida.
	 *:param object $data contiene el idRuta_borrar
	 *
	 */
	
	$idRuta_borrar=$data['selector'];
	
	$conexion = new conexionBaseDatos();
	$consultas = new Consultas();

	$conexion ->conexion();
	$result = $consultas ->borrarRegistro($idRuta_borrar);
	

	if($result)
	{
		echo "Borrado";
	}
	
}     
     
function mostrarRutaBorrar()
{
	/*
	 *
	 *Funcion encargada de llenar el selector de borrar_ruta.php.
	 *
	 *
	 */
	$conexion = new conexionBaseDatos();
	$consultas = new Consultas();

	$conexion ->conexion();
	$result = $consultas ->mostrarNombreRuta();
	

	while($row=pg_fetch_array($result))
	{
		echo "<option value=".$row[0].">".$row[1]."</option>";
	}
	
}		 
		 		 
     
     
?>