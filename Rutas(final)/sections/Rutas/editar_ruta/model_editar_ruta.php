<?php
 /*
 * Proyecto    : Sistema de gestión de rutas de la red del transporte público
 * Descripcion : Aplicacion proveedora de servicios web para visualizacion de informacion de rutas.
 * Version     : 1.
 * Autor(es)   : Emmanuel Garcia Cerriteño
 * Creacion    : 02-07-2015
 * Editado     : 10-08-2015
 * Decripcion
 * de clase    : clase encargada de mostrar la parte de editar ruta.
 * Copyright © 2015, Laboratorio de CPU
 */
include( "../../../model/conexion.php" );
include( "../../../model/consultas.php" );

if( isset( $_REQUEST['actionfunction'] ) && $_REQUEST['actionfunction'] != '' )
{
	$actionfunction = $_REQUEST['actionfunction'];
	call_user_func( $actionfunction,$_REQUEST );
}



function mostrarRuta()
{
	/*
	 *
	 *Esta funcion estaa encargada de mostrar un listado que contiene id_ruta y nombre de la ruta.
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

function mostrarEditar( $data )
{
	/*
	 *
	 *funcion encargada de mostrar los datos de una ruta.
	 *:param object $data recibe el id de una ruta y lo guarda en $id_ruta
	 */
	$lista= array();
	$id_ruta = $data['id_ruta'];
	$conexion = new conexionBaseDatos();
	$consultas = new Consultas();

	$conexion ->conexion();
  $result = $consultas ->MostrarRutaEditar( $id_ruta );
	
	//while( $registro = pg_fetch_row( $result ) )
	//{
	//	echo $registro;
	//	array_push( $lista, $registro[0] );
	//}
	echo json_encode( pg_fetch_row( $result ) ); 
}



function obtenerRuta( $data )
{
	/*
	 *Funcion encargarda de obtener las cordenadas de una ruta especificada.
	 *:param object $data recibe el id de una ruta y lo guarda en $id_ruta.
	 *
	 */
	$conexion = new conexionBaseDatos();
	$consulta = new Consultas();
	
	$conexion -> conexion();
	
	$idruta = $data[ 'id_ruta' ];
	$resultado = $consulta ->obtenerRecorridoRuta( $idruta );
	$resultado = pg_fetch_row( $resultado )[0];
	$lista = array();
	$punto = str_replace( "POLYGON((", "", $resultado );
	$punto = str_replace( "))", "", $punto );
	$puntos_recorrido = explode( ",", $punto );
	
	foreach( $puntos_recorrido as $valor )
	{
		$punto_recorrido = str_replace( " ", ",", $valor );
		array_push( $lista, $punto_recorrido );
	}
	echo json_encode($lista);
}



function actualizaRegistros( $data )
{
	/*
	 *
	 *Esta funcion esta encargada de actualizar los registros de una ruta especificada.
	 *:param object $data contiene toda la informacion de una ruta a actualizar.
	 *
	 *
	 */
	$NuR = $data['numero-ruta-editar'];
	$nomR = $data['nombre-ruta-editar'];
	$nUni = $data['numero-unidades-editar'];
	$horarioI = $data['hora-inicial-editar'];
	$horarioF = $data['hora-final-editar'];
	$tarifas = $data['tarifas-editar'];
	$Orig_Destino = $data['origen-destino-editar'];
	$id_ruta_editar = $data['selector-rutas'];
	$ruta_editar = $data['ruta_editar'];

	//printf( $data );
	$puntos = explode( ", ", $ruta_editar );
	$conexion = new conexionBaseDatos();
	$consultas = new Consultas();

	$conexion ->conexion();
  $result = $consultas ->actualizarRegistros( $nomR, $NuR, $nUni, $horarioI, $horarioF, $tarifas,  $Orig_Destino,  $id_ruta_editar, $ruta_editar.",".$puntos[0]);
      
	if( $result )
	{
		//verfica si result tiene datos.. si  tiene es un true...... si no tiene es un false.... :) 
		 echo 'Actualiza';
	}
}
?>