<?php
/*
 * Proyecto    : Sistema de gestión de rutas de la red del transporte público
 * Descripcion : Aplicacion proveedora de servicios web para visualizacion de informacion de rutas.
 * Version     : 1.
 * Autor(es)   : Emmanuel Garcia Cerriteño
 * Creacion    : 02-07-2015
 * Editado     : 10-08-2015
 * Decripcion
 * de clase    : clase encargada de guardar una nueva ruta
 * Copyright © 2015, Laboratorio de CPU
 */

include( "../../../model/conexion.php" );
include( "../../../model/consultas.php" );

if(isset($_REQUEST['actionfunction']) && $_REQUEST['actionfunction']!=''){
$actionfunction=$_REQUEST['actionfunction'];
call_user_func($actionfunction,$_REQUEST);
}

function guardarRuta( $data )
{
	/*
	 *
	 *Funcion encargada de guardar una nueva ruta recibe
	 *:param object $data contiene toda la informacion de la ruta.
	 *
	 */
	$NuR=$data['numero-ruta'];
	$nomR=$data['nombre-ruta'];
	$nUni=$data['numero-unidades'];
	$horarioI=$data['hora-inicial'];
	$horarioF=$data['hora-final'];
	$tarifas=$data['tarifas'];
	$Orig_Destino=$data['origen-destino'];
	$ruta=$data['ruta'];

	//printf( $data );
	
	$conexion = new conexionBaseDatos();
	$consultas = new Consultas();

	$conexion ->conexion();
  $result = $consultas ->AltaRuta( $NuR, $nomR, $nUni, $horarioI, $horarioF, $tarifas, $ruta, $Orig_Destino );
      
	if( $result )
	{
		//verfica si result tiene datos.. si  tiene es un true...... si no tiene es un false.... :) 
		 echo 'added';
	}
}


?>