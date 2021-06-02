/*
 * Proyecto    : Sistema de gestión de rutas de la red del transporte público
 * Descripcion : Aplicacion proveedora de servicios web para visualizacion de informacion de rutas.
 * Version     : 1.
 * Autor(es)   : Emmanuel Garcia Cerriteño
 * Creacion    : 02-07-2015
 * Editado     : 10-08-2015
 * Decripcion
 * de clase    : clase  encargada de cargar mapa en nueva ruta ademas de guadarla
 * Copyright © 2015, Laboratorio de CPU
*/
var latlng = "";
var poligono_ruta;

function initialize ()
{
  /*
   *
   *funcion encargada de cargar mapa en el div map.
   *
   */
  var mapOptions =  { 
    center :  new google . maps . LatLng (19.0322031 ,-98.3155158  ), 
    zoom :  16
  }; 

  var map =  new google . maps . Map ( document . getElementById ( 'map' ), 
    mapOptions ); 

  var drawingManager =  new google . maps . drawing . DrawingManager
	({ 
     
    drawingControl : true, 
    drawingControlOptions:
		{ 
      position : google . maps . ControlPosition . TOP_CENTER , 
      drawingModes :  [ 
       google.maps.drawing.OverlayType.POLYLINE
      ] 
    }, 
    polylineOptions :
		{ 
     editable: true,
		 fillColor: '#ffff00'
    }
  }); 
  drawingManager . setMap ( map );
  
  google.maps.event.addListener(drawingManager, 'polylinecomplete', function(Polyline)
	{
	//lista_puntos = Polyline;
  poligono_ruta = Polyline;
    
            drawingManager.setOptions
						({
						drawingControl: false,
            drawingMode : null
						});
           // return latlng;     
	});
}


function nuevaRuta()
{
  /*
   * Funcion encargada de extraer la informacion del formulario y hacer llamado a la funcion PHP encargada del registro de ruta.
   */
  var formulario = jQuery("#signup").serialize();
  
  var lista = poligono_ruta.getPath();
		
			for (var i = 0; i < lista.getLength(); i++)
			{
				var xy = lista.getAt(i);
				if ( i == lista.getLength()-1 )
				{
					latlng += xy.lat()+' '+xy.lng();
				}
				else
				{
					latlng += xy.lat()+' '+xy.lng() + ',';
				}
			}
      
  console.log(latlng);
  console.log( "formdata: " + formulario );
  jQuery.ajax({
    url   : "sections/Rutas/nueva_ruta/model_nueva_ruta.php",
    type  : "POST",
    //data: "actionfunction=registrarUsuario&nombre="+nombre+"&ap_paterno="+ap_paterno+"&area="+area,
    data  : formulario+"&ruta="+latlng,
    cache : false,
    success: function(response)
    {
      if( response == 'added' )
      {	
       resetFormulario();
       alert("Usuario registrado correctamente");
       $("#contenido").load( "sections/Rutas/rutas/rutas.php" );
      }
    }		
	});
}

function resetFormulario()
{
  /*
   * Funcion encargada de resetear el formulario despues de ser utilizado.
   */
  jQuery( "#numero-ruta" ).val( "" );
  jQuery( "#nombre-ruta" ).val( "" );
  jQuery( "#numero-unidades" ).val( "" );
  jQuery( "#tarifas" ).val( "" );
  jQuery( "#origen-destino" ).val( "" );

}
//var num_ruta_verificar;
//var nom_ruta_verificar;
//var num_unidades_verificar;   -----pendiente-------
//function verificarNuevaRuta()
//{



function mostrarMapa()
{
	/*
	 * Funcion encargada de hacer llamado a la funcion mapaMarcadores() despues de cargar el API de Google Maps.
	 */
	var script = document.createElement( 'script' );
	script.id = 'script',
	script.type = 'text/javascript';
	script.src = 'https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=drawing&' + 'callback=initialize';
	document.body.appendChild( script );
    
    //document.getElementById( "#formsubmit" ).setAttribute( 'class', 'btn' );
}

