<!--
 * Proyecto    : Sistema de gestión de rutas de la red del transporte público
 * Descripcion : Aplicacion proveedora de servicios web para visualizacion de informacion de rutas.
 * Version     : 1.
 * Autor(es)   : Emmanuel Garcia Cerriteño
 * Creacion    : 02-07-2015
 * Editado     : 10-08-2015
 * Decripcion
 * de clase    : documento encargado de mostrar la parte de borrar ruta.
 * Copyright © 2015, Laboratorio de CPU
-->

<?php
include("model_borrar_ruta.php");
?>

<div id="borrar-ruta">
  <fieldset>
  <legend>Eliminar Ruta</legend>
  
            <div class="campo">
                <label>Selecciona la ruta a eliminar:</label>
                <select name="selector-rutas-borrar" id="selector-rutas-borrar" >
                  <option value="0"> </option>
                  <?php mostrarRutaBorrar(); ?>
                </select>
            
            <input type="button"  onclick="borrarRuta();" value="Eliminar"/>
            </div>
            
            
 
  </fieldset>
  
  
</div>