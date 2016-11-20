var map;
var map_stv;
var control=0;
var myLatLng ;
var longi;
var lati;

function cargoDatos(l,la){
    longi=l;
    lati=la;
  }

function initMap() {

    if(control==0){
      
  // le marcamos una direccion por defecto
     myLatLng = {lat: -34.911191, lng: -56.1885014};    
     control=1;
      }else{
      	myLatLng ={lat: lati, lng: longi};
    	}


  //creamos un objeto del tipo google maps y le pasamos la latiud y longitud  
  map = new google.maps.Map(document.getElementById('map_article'), {
    	center: myLatLng,
    	zoom: 15
    });

    //creamos la marca para ver el marcado clasico de google maps
  var marker = new google.maps.Marker({
    position: myLatLng,
      map: map,
      title: 'Apretame!'
    });
     //se lo mandamos al mapa
     marker.setMap(map);
   /*Animacion al hacer click sobre el iconito rojo de google maps*/
    marker.addListener('click', function() {
    map.setZoom(18);
    map.setCenter(marker.getPosition());
    canvas();
  });
} 