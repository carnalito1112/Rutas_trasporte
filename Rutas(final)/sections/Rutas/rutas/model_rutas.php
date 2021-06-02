<?php
/*
 * Proyecto    : Sistema de gestión de rutas de la red del transporte público
 * Descripcion : Aplicacion proveedora de servicios web para visualizacion de informacion de rutas.
 * Version     : 1.
 * Autor(es)   : Emmanuel Garcia Cerriteño
 * Creacion    : 02-07-2015
 * Editado     : 10-08-2015
 * Decripcion
 * de clase    : clase encargada de realizar una consulta a la base de datos.
 * Copyright © 2015, Laboratorio de CPU
 */
include( "../../../model/conexion.php" );
include( "../../../model/consultas.php" );



function  mostrarConsulta()
{
	/*
	 *
	 *
	 *funcion encargada de mostrar informacion especifica de todas las rutas.
	 *
	 *
	 */
	$conexion = new conexionBaseDatos();
	$consultas = new consultas();

	$conexion ->conexion();
	$result = $consultas -> consultaTabla();
	
		 while($row=pg_fetch_array($result))
		 {
		
 echo "<tr >
				<td>".$row[0]."</td><td>".$row[1]."</td><td>".$row[2]."</td><td>".$row[3]."</td><td>".$row[4]."</td><td>".$row[5]."</td>
			
			</tr>" ;
			
		 }
	
}



?>