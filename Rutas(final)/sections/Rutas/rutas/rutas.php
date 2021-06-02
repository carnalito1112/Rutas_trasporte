<!--
 * Proyecto    : Sistema de gestión de rutas de la red del transporte público
 * Descripcion : Aplicacion proveedora de servicios web para visualizacion de informacion de rutas.
 * Version     : 1.
 * Autor(es)   : Emmanuel Garcia Cerriteño
 * Creacion    : 02-07-2015
 * Editado     : 10-08-2015
 * Decripcion
 * de clase    : documento encargado de mostrar la parte de Consulta de rutas.
 * Copyright © 2015, Laboratorio de CPU
-->

<?php
include ("model_rutas.php");
?>
<div id="mostrar-ruta"> 
        <table id="rutas-existentes">
					<tr>
						<td>
							Numero de Ruta
						</td>
						
						<td>
							Nombre de Ruta
						</td>
						
						<td>
							Numero de unidades
						</td>
						<td>
							 Horario inicial
						</td>
						<td>
							 Horario final
						</td>
						<td>
							 tarifas
						</td>
					 
					</tr>
					
					<?php
						mostrarConsulta();
					?>
        </table>
        </div>
