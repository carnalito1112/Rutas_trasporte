<?php
/*
 * Proyecto    : Sistema de gestion de rutas de la red del transporte público
 * Descripcion : Aplicacion proveedora de servicios web para visualizacion de informacion de rutas.
 * Version     : 1.
 * Autor(es)   : Ana Karen Cordova Moran
 * Editado     : Emmanuel Garcia Cerriteño
 * Creacion    : 02-07-2015
 * Editado     : 10-08-2015
 * Decripcion
 * de clase    : Clase encargada de la conexion a la base de datos.
 * Copyright © 2015, Laboratorio de CPU
 */

class conexionBaseDatos
{
  function conexion()
  {
		/*
		 * Funcion encargada de crear la conexion a la base de datos.
		 */
    session_start();
    $conexion = pg_connect( "host=localhost port=5432 dbname=rutas user=postgres password=narcos" )
    or die('No se ha podido conectar al servidor.');
  }
}
?>