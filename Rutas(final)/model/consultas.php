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
 * de clase    : Clase encargada de las consultas de todo el sistema web.
 * Copyright © 2015, Laboratorio de CPU
 */

class consultas
{

	
	
	function AltaRuta( $NR, $NomR, $NU, $HI, $HF, $TR, $RT, $OD )
	{
		/*
		 * Funcion encargada de ejecutar la consulta de registro de ruta.
		 * :param int $NR es el numero de la ruta a dar de alta.
		 * :param string $NomR es el nombre de la ruta a dar de alta.
		 * :param int $NU Numero de unidades de una ruta a dar de alta
		 * :param time $HI Horario de inicio de una ruta.
		 * :param time $HF Horario final de una ruta a dar de alta
		 * :param int  $TR tarifa promedio que maneja una ruta.
		 * :param string  $RT cordenadas de respectiva ruta a dar de alta.
		 * :param string $OD origen y destino de una ruta a dar de alta
		 * :return object $sql es el resulñtado de la consulta realizada.
		 */
		$sql = pg_query(
									"insert into Ruta (Num_Ruta,Nom_Ruta,Num_Unidades,horario_ini,horario_f,tarifas,ruta,org_des)
									 values(".$NR.",'".$NomR."',".$NU.",'".$HI."','".$HF."',".$TR.",ST_MakePolygon(ST_GeometryFromText('LINESTRING (
									".$RT.")',4326)),'".$OD."')"
									);
	
		return $sql;
	}


	function mostrarNombreRuta()
	{
		/*
		 * funcion encargada de ejecutar la consulta de mostrar rutas.
		 * :return object $sql es el resultado de la consulta realizada.
		 */
		$sql = pg_query(
										"select id_ruta,nom_ruta from ruta;"
									 );
		
		return $sql;
	}
	
	
	function MostrarRutaEditar($idRuta)
	{
		/*
		 * Muestra la informacion de una ruta segun el idRuta especificado devuelve los valores de esa ruta.
		 * :param int $idRuta id ruta que sirve para realizar la ocnsulta.
		 * :return object $sql resultado de la consulta.
		 */
			
		$sql=pg_query(
					"select nom_ruta,num_ruta,num_unidades,horario_ini,horario_f,tarifas,org_des from ruta where id_ruta=".$idRuta.";"
				 );
		
		return $sql;		
	}
	
	
	function obtenerRecorridoRuta( $id_ruta )
	{
		/* 
		 * Funcion encargada de la consulta de los puntos que conforman a la ruta seleccionada por el usuario.
		 * :param int $id_ruta es el id de la ruta seleccionada por el usuario.
		 * :return object $resultado requesa el contenido de la consulta
		 * 
		 */
		$query = 'select ST_AsText( ruta ) from Ruta where id_ruta = '.$id_ruta;
		$resultado = pg_query( $query );
		return $resultado;
		//echo ($resultado);
		
	}
	
	function actualizarRegistros($nombre_ruta_editar, $num_ruta_editar, $num_uni_editar,
															  $hor_ini_editar, $hor_fin_editar, $tar_editar, $org_des_editar, $id_ruta, $ruta_editar)
	{
 /*
	*
	*Esta funcion esta encargada de actualizar algun registro existente.
	* :param int $num_ruta_editar es el numero de la ruta a actualizar.
	* :param string $nombre_ruta_editar es el nombre de la ruta a actualizar.
	* :param int $num_uni_editar Numero de unidades de una ruta a actualizar.
	* :param time $hor_ini_editar Horario de inicio de una ruta a actualizar.
	* :param time $hor_fin_editar Horario final de una ruta a actualizar.
	* :param int  $tar_editar tarifa promedio que maneja una ruta a actualizar.
	* :param string  $ruta_editar cordenadas de respectiva ruta a actualizar.
	* :param string $org_des_editar origen y destino de una ruta a actualizar.
	* :param int $id_ruta id de ruta que se ocupa como referencia al editar.
	* :return object $sql es el resulñtado de la consulta realizada.
	*
	*
	*/
	
				$sql=pg_query(
					" update ruta set  nom_ruta='".$nombre_ruta_editar."',num_ruta=".$num_ruta_editar.",
					num_unidades=".$num_uni_editar.",horario_ini='".$hor_ini_editar."',horario_f='".$hor_fin_editar."',
					tarifas=".$tar_editar.",org_des='".$org_des_editar."', ruta = ST_MakePolygon(ST_GeometryFromText
					('LINESTRING (".$ruta_editar.")',4326))   where id_ruta=".$id_ruta.";"
				 );
		
		return $sql;	
		
		
		
	}
	
	
	function consultaTabla()
	{
		/*
		 *esta funcion esta encargada de hacer una consulta a la base de datos
		 *:return object $sql devuelve el resultado de la consulta
		 *
		 *
		 */
		$sql = pg_query(
										"Select Num_ruta,Nom_Ruta,Num_Unidades,horario_ini,horario_f,tarifas from Ruta"
									 );
		
		return $sql;
	}
	
	
	function borrarRegistro($id_ruta_borrar)
	{
		/*
		 *Esta funcion esta encargada de borrar un registro
		 *:param int $id_ruta_borrar id de ruta a borrar 
		 *
		 *
		 */
			$sql = pg_query(
										"delete from ruta  where id_ruta=".$id_ruta_borrar
									 );
		
		return $sql;
		
	}
	
}
?>