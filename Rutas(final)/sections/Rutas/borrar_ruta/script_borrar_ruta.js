/*
 * Proyecto    : Sistema de gestión de rutas de la red del transporte público
 * Descripcion : Aplicacion proveedora de servicios web para visualizacion de informacion de rutas.
 * Version     : 1.
 * Autor(es)   :  Emmanuel Garcia Cerriteño
 * Creacion    : 02-07-2015
 * Editado     : 10-08-2015
 * Decripcion
 * de clase    : Clase encargada de las consultas de todo el sistema web.
 * Copyright © 2015, Laboratorio de CPU
 */

function borrarRuta(){
/*
 *
 *Enta funcion esta encargada de borrar una ruta. 
 *
 */
  

  var selector = $('#selector-rutas-borrar').val();
  var nombre_ruta = $('#selector-rutas-borrar').text(selector);
  console.log(selector);
  if (confirm("¿deseas eliminar la siguiente ruta"+ nombre_ruta +" ?"))
  {
    

 
   jQuery.ajax({
    url   : "sections/Rutas/borrar_ruta/model_borrar_ruta.php",
    type  : "POST",
    data: "actionfunction=borrarRuta&selector="+selector,
  //  data  : formulario,
    cache : false,
    success: function(response)
      {
      if( response == 'Borrado' )
        {	
     
        alert("Ruta Eliminada correctamente");
        $("#contenido").load( "sections/Rutas/rutas/rutas.php" );
        }
      }		
    }); 
  }
  else
  { 
    $("#contenido").load( "sections/Rutas/rutas/rutas.php" );
  }
}
