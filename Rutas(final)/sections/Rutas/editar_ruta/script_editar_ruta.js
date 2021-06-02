//var poligono_editar_ruta;
var latlng = "";
var map_editar;
var poligono;

function cambio()
{
/*
 *Funcion encargada de llenar el formulario y el mapa.
 */
 var id_ruta=$("#selector-rutas").val();
 if ( poligono )
 {
  poligono.setMap(null);
 }
   // console.log( "id_ruta: "+ id_ruta);
    
    var lista = eval( obtenerInfoRuta( id_ruta ).responseText );
    var lista2 = eval( obtenerRecorridoRuta (id_ruta).responseText);
    console.log( lista );
     
    $("#nombre-ruta-editar").val(lista[0]);
    $("#numero-ruta-editar").val(lista[1]);
    $("#numero-unidades-editar").val(lista[2]);
    $("#hora-inicial-editar").val(lista[3]);
    $("#hora-final-editar").val(lista[4]);
    $("#tarifas-editar").val(lista[5]);
    $("#origen-destino-editar").val(lista[6]);

    //console.log(lista2);
    var posiciones = [];
		for ( var i = 0; i < lista2.length; i++)
		{
      /*
       *llena una lista con los puntos obtenidos anteriormente en la consulta.
       */
			var punto = lista2[i];
			var info = punto.split(",");
			console.log( "lat: " + info[0] + "lng: " + info[1] );
			var posicion = new google.maps.LatLng( info[0], info[1] );
			posiciones.push( posicion );
		}
  
		poligono = new google.maps.Polygon({
      /*
       *Llena el mapa con los puntos especificados en la consulta anterior
       */
			path: posiciones, //este es el nombre de la lista que se lleno anteriormente en el for
			map: map_editar, //aqui va el nombre de la variable que genera tu mapa
			strokeColor: '#000099', //color de la linea
			strokeOpacity: 0.5, //opacidad de la linea
			fillOpacity : 0,//relleno del poligono 
      strokeWeight: 3,//ancho de la linea
      editable: true
		});
     
}


function obtenerInfoRuta( ruta )
{
  /*
   *Funcion encargada de obtener la informacion dependiendo de la ruta especificada.
   *:param int ruta  contiene el id de la ruta.
   *:return retorna datos de la ruta especificada.
   ** 
   */
  return jQuery.ajax({
    url:"sections/Rutas/editar_ruta/model_editar_ruta.php",
    type:"POST",
    data:"actionfunction=mostrarEditar&id_ruta="+ruta,
    cache:false,
    dataType : 'json',
    async : !1,
    success: function(response)
    {}
  });
}


function obtenerRecorridoRuta( id_ruta )
{
	/*
	 * Obtiene una lista de los puntos que forman al recorrido autorizado de una ruta.
	 * :param int numero_ruta es el numero de la ruta de la cual se va a mostrar su recorrido autorizado.
	 * :return retorna datos de la ruta especificada.
	 */
	return jQuery.ajax({
			url:"sections/Rutas/editar_ruta/model_editar_ruta.php",
			type:"POST",
			data:"actionfunction=obtenerRuta&id_ruta="+id_ruta,
			cache: false,
			dataType: 'json',
			async : !1,
			success: function(response)
			{}
		});
}

function initializeEditar ()
{
  /*
   *Funcion encargada de inicializar el mapa en el div map 
   */
  
  var mapOptions =  { 
    center :  new google . maps . LatLng (19.0322031 ,-98.3155158  ), 
    zoom :  16
  }; 

  map_editar =  new google . maps . Map ( document . getElementById ( 'map' ), 
    mapOptions ); 

}



function ActualizaRuta()
{
  /* Funcion encargada de extraer la informacion para llenar el formulario  y hacer llamado a la funcion
   *
   *
   *PHP encargada del actualizaRegistros.
   */
  var formulario = jQuery("#signup").serialize();
  //console.log( "formdata: " + formulario );
   var lista_editar = poligono.getPath();
		
			for (var i = 0; i < lista_editar.getLength(); i++)
			{
				var xy = lista_editar.getAt(i);
				if ( i == lista_editar.getLength()-1 )
				{
					latlng += xy.lat()+' '+xy.lng() ;
				}
				else
				{
					latlng += xy.lat()+' '+xy.lng() + ',';
				}
			}
            console.log(latlng);
            
  jQuery.ajax ({
    url   : "sections/Rutas/editar_ruta/model_editar_ruta.php",
    type  : "POST",
    data  : formulario+"&ruta_editar="+latlng,
    cache : false,
    success: function(response)
    {
      if( response == 'Actualiza' )
      {	
        resetFormulario();
        alert("Ruta Actualizada correctamente");
        $("#contenido").load( "sections/Rutas/rutas/rutas.php" );
      }
    }		
	});
}


function mostrarMapaEditar()
{
	/*
	 * Funcion encargada de hacer llamado a la funcion mapaMarcadores() despues de cargar el API de Google Maps.
	 */
	var script = document.createElement( 'script' );
	script.id = 'script',
	script.type = 'text/javascript';
	script.src = 'https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=drawing&' + 'callback=initializeEditar';
	document.body.appendChild( script );
    
}



