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


    map_stv = new google.maps.Map(document.getElementById('stv_map_article'), {
      center: myLatLng,
      zoom: 14
    });


  var panorama = new google.maps.StreetViewPanorama(document.getElementById('stv_map_article'), {
        position: myLatLng
    });

   map_stv.setStreetView(panorama);

   /*Animacion al hacer click sobre el iconito rojo de google maps*/
    marker.addListener('click', function() {
    map.setZoom(18);
    map.setCenter(marker.getPosition());
    canvas();
  });
} 

/*******************
Animacion en Canvas
*******************/
function canvas(){

  // Nuestras variables
var canvas, ctx, img, x, y, step, direction;

canvas = document.getElementById('canvas');
ctx = canvas.getContext('2d');
img = document.getElementById('img');

// La posición x inicial, variara con cada paso
x = 0;
// La posición y inicial, quedará estatica
y = 25;

// Numerador de paso, lo usaremos para saber que frame dibujar
step = 0;

// Direccion, 1 derecha, -1 izquierda
direction = 1;

setInterval(function() {
    // Borramos lo dibujado
    ctx.clearRect(0, 0, canvas.width, canvas.height);
    
    // Dibujamos el frame adecuado en la posicion correspondiente
    ctx.drawImage(
        // Imagen
        img,
        // Source x
        (step++ % 4) * 32, // Avance sobre el eje x
        // Source y
        [52, 0, 104][direction + 1], // Selecciona el frame adecuado
        // Source width
        32,
        // Source height
        52,
        // Dest x
        x,
        // Dest y
        y,
        // Dest width
        32,
        // Dest height
        52
    );
           
    // Avance, indistinto de la direccion
    x += 5 * direction;
    // Si toca un limite, cambiamos la dirección
    if (x >= canvas.width - 32 || x <= 0) {
        direction = -direction;
    }
}, 1000 / 12); // Aproximadamente 12 frames por segundo
}
