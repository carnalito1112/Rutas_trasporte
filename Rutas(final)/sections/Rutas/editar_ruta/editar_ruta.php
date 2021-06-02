<!--
 * Proyecto    : Sistema de gestión de rutas de la red del transporte público
 * Descripcion : Aplicacion proveedora de servicios web para visualizacion de informacion de rutas.
 * Version     : 1.
 * Autor(es)   : Emmanuel Garcia Cerriteño
 * Creacion    : 02-07-2015
 * Editado     : 10-08-2015
 * Decripcion
 * de clase    : clase encargada de mostrar la parte de editar ruta.
 * Copyright © 2015, Laboratorio de CPU
-->

<?php  include("model_editar_ruta.php");?>
<div id="editar-ruta">
    <fieldset>
               
		<legend>Editar Ruta</legend>
		<form id="signup">
            <div class="campo">
                <label>Selecciona la ruta a editar:</label>
                <select name="selector-rutas" id="selector-rutas" onchange="cambio(); ">
                  <option value="0"> </option>
                  <?php mostrarRuta(); ?>
                </select>
            </div> 
			<div class="campo">
				<label>Número de ruta:</label>
				<input type="text" name="numero-ruta-editar" id="numero-ruta-editar" placeholder="Ingrese el Numero de la ruta"/>
			</div>
			<div class="campo">
				<label>Nombre de la ruta:</label>
				<input type="text" name="nombre-ruta-editar" id="nombre-ruta-editar" placeholder="Ingrese el Nombre de la Ruta"/>
			</div>
			<div class="campo">
				<label>Numero de unidades:</label>
				<input type="text" name="numero-unidades-editar" id="numero-unidades-editar" placeholder="Ingrese el Numero de unidades"/>
			</div>
			<div class="campo">
				<label>Hora inicial:</label>
				<input type="text" name="hora-inicial-editar" id="hora-inicial-editar" placeholder="Ingrese la hora inicial de la ruta "/>
			</div>
            <div class="campo">
				<label>Hora final:</label>
				<input type="text" name="hora-final-editar" id="hora-final-editar" placeholder="Ingrese la hora final de la Ruta"/>
			</div>
            <div class="campo">
				<label>Tarifas:</label>
				<input type="text" name="tarifas-editar" id="tarifas-editar" placeholder="Ingrese su tarifa estandar"/>
			</div>
            <div class="campo">
				<label>Origen-destino:</label>
				<input type="text" name="origen-destino-editar" id="origen-destino-editar" placeholder="Ingrese su Origen y Destino"/>
			</div>
			</br>
			<input type="hidden" name="actionfunction" value="actualizaRegistros"/>
			</form>
		<div id="map"></div>
	</fieldset>
	<br/><br/><br/><br/><br/>
	<input type="button" id="formsubmit" onclick="ActualizaRuta(); " value="Actualizar"/>
 </div>
        
 