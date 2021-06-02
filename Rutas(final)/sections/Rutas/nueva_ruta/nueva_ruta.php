<!--
 * Proyecto    : Sistema de gestión de rutas de la red del transporte público
 * Descripcion : Aplicacion proveedora de servicios web para visualizacion de informacion de rutas.
 * Version     : 1.
 * Autor(es)   : Emmanuel Garcia Cerriteño
 * Creacion    : 02-07-2015
 * Editado     : 10-08-2015
 * Decripcion
 * de clase    : documento encargado de mostrar la parte de nueva ruta.
 * Copyright © 2015, Laboratorio de CPU
-->

<div id="nueva-ruta">
	<fieldset>
		<legend>Nueva Ruta</legend>
		<form id="signup">
			<div class="campo">
				<label>Número de ruta:</label>
				<input type="text" name="numero-ruta" id="numero-ruta" placeholder="Ingrese el Numero de la ruta"/>
			</div>
			<div class="campo">
				<label>Nombre de la ruta:</label>
				<input type="text" name="nombre-ruta" id="nombre-ruta" placeholder="Ingrese el Nombre de la Ruta"/>
			</div>
			<div class="campo">
				<label>Numero de unidades:</label>
				<input type="text" name="numero-unidades" id="numero-unidades" placeholder="Ingrese el Numero de unidades"/>
			</div>
			<div class="campo">
				<label>Hora inicial:</label>
				<input type="text" name="hora-inicial" id="hora-inicial" placeholder="Ingrese la hora inicial de la ruta "/>
			</div>
            <div class="campo">
				<label>Hora final:</label>
				<input type="text" name="hora-final" id="hora-final" placeholder="Ingrese la hora final de la Ruta"/>
			</div>
            <div class="campo">
				<label>Tarifas:</label>
				<input type="text" name="tarifas" id="tarifas" placeholder="Ingrese su tarifa estandar"/>
			</div>
            <div class="campo">
				<label>Origen-destino:</label>
				<input type="text" name="origen-destino" id="origen-destino" placeholder="Ingrese su Origen y Destino"/>
			</div>
			</br>
			<input type="hidden" name="actionfunction" value="guardarRuta"/>
			</form>
		<div id="map"></div>
	</fieldset>
	<br/><br/><br/><br/><br/>
	<input type="button" id="formsubmit" onclick="nuevaRuta();" value="Registrar"/>
 </div>
        
 
  
 
    

