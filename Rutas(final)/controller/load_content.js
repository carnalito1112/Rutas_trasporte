/*
 * Proyecto    : Sistema de gestion de rutas de la red del transporte público
 * Descripcion : Aplicacion proveedora de servicios web para visualizacion de informacion de rutas.
 * Version     : 1.
 * Autor(es)   : Ana Karen Cordova Moran
 * Editado     : Emmanuel Garcia Cerriteño
 * Creacion    : 02-07-2015
 * Editado     : 03-07-2015
 * Decripcion
 * de clase    : Clase encargada de la carga asincrona de contenido que sea requerido.
 * Copyright © 2015, Laboratorio de CPU
 */

$(document).ready(function(){
  $("#crear-ruta").on("click", function(event){
    /*
     * Funcion encargada de cargar el contenido de sections/Rutas/nueva_ruta/nueva_ruta.php.
     */
    event.preventDefault();
    $("#contenido").load( "sections/Rutas/nueva_ruta/nueva_ruta.php" );
  mostrarMapa();
    });
  });

$(document).ready(function(){
  $("#editar-ruta").on("click", function(event){
    /*
     * Funcion encargada de cargar el contenido de sections/Rutas/editar_ruta/editar_ruta.php.
     */
    event.preventDefault();
    
    $("#contenido").load( "sections/Rutas/editar_ruta/editar_ruta.php" );
    mostrarMapaEditar();
    });
  });

$(document).ready(function(){
  $("#rutas").on("click", function(event){
    /*
     * Funcion encargada de cargar el contenido de sections/Rutas/rutas/rutas.php.
     */
    event.preventDefault();
    $("#contenido").load( "sections/Rutas/rutas/rutas.php" );

    });
  });

$(document).ready(function(){
  $("#eliminar-ruta").on("click", function(event){
    /*
     * Funcion encargada de cargar el contenido de sections/Rutas/borrar_ruta/borrar_ruta.php.
     */
    event.preventDefault();
    $("#contenido").load( "sections/Rutas/borrar_ruta/borrar_ruta.php" );
    
    });
  });