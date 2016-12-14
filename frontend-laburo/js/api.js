//para buscar algo especifico le ponemos por ejemplo /api/v1/inmuebles/X?_format=json donde la X es el valor

var backendUrl="http://192.168.7.185:8080/php20162/api/v1/";
//$(document).on("ready",main);
//$(document).ready(initMap);A
var urlimg="http://192.168.7.185:8080/php20162/backend/web/uploads/inmuebles/";
var control=0;
var inmuebles=[];
var inmueble=[];
var barrios =[];
var departamentos=[];
var tipoinmueble=[];
var auxd;
var auxb;
//variables api google
var map;
var myLatLng ;
var prueba=[];
var primero=true;
var login=false;
var tipo="";
var brrio="";
var dpto="";

function initMap() {
myLatLng = {lat: -34.911191, lng: -56.1885014};
map = new google.maps.Map(document.getElementById('map'), {
  center: myLatLng,
  zoom: 13
});
//Seteamos iniciadores de materialize
$('.button-collapse').sideNav();
$('.carousel.carousel-slider').carousel({full_width: true});
$('select').material_select();

try {
//buscamos todos los tipos de inmuebles  
$.ajax({
      url:        backendUrl+"tipoinmueble?_format=json",
      dataType:   "json", // <== JSON-P request
      success:    function(datos){
          //alert(weblink); // this statement doesn't show up
          $.each(datos,function(i,item){
            console.log("hola");
            tipoinmueble[i]=datos[i];
            tipo=tipo.concat('<option value="'+tipoinmueble[i].nombre+'">'+tipoinmueble[i].nombre+'</option>');
          });

      },
      error: function (jqXHR, exception) {
        var msg = '';
        if (jqXHR.status === 0) {
            msg = 'Not connect.\n Verify Network. '+jqXHR.responseText;
        } else if (jqXHR.status == 404) {
            msg = 'Requested page not found. [404]';
        } else if (jqXHR.status == 500) {
            msg = 'Internal Server Error [500].';
        } else if (exception === 'parsererror') {
            msg = 'Requested JSON parse failed.';
        } else if (exception === 'timeout') {
            msg = 'Time out error.';
        } else if (exception === 'abort') {
            msg = 'Ajax request aborted.';
        } else {
            msg = 'Uncaught Error.\n' + jqXHR.responseText;
        }
        console.log(msg);
        console.log("navigator.onLine: "+navigator.appName);
        $("div").css("border", "3px solid red");
        }
      //Error mas pro  
      /*error: function(XMLHttpRequest, textStatus, errorThrown) {
        if (XMLHttpRequest.readyState == 4) {
            // HTTP error (can be checked by XMLHttpRequest.status and XMLHttpRequest.statusText)
            console.log("error code 4");
        }
        else if (XMLHttpRequest.readyState == 0) {
            // Network error (i.e. connection refused, access denied due to CORS, etc.)
            console.log("error code 0");
            var pingserver= new Image();
            pingserver.src="http://localhost/2016php/advanced/backend/web/uploads/inmuebles/1/0.jpg";
            if (pingserver.height>0) {
              console.log("Online");
           } else {
              console.log("Offline");
           }
        }
        else {
            // something weird is happening
        }
    }*/  
  });
//Buscamos todos los barrios
$.ajax({
      url:        backendUrl+"barrios?_format=json",
      dataType:   "json", // <== JSON-P request
      success:    function(datos){
          //alert(weblink); // this statement doesn't show up
           $.each(datos,function(i,item){
            barrios[i]=datos[i];
            brrio+='<option value="'+barrios[i].nombre+'">'+barrios[i].nombre+'</option>';
          });
      },
      error: function (jqXHR, exception) {
        var msg = '';
        if (jqXHR.status === 0) {
            msg = 'Not connect.\n Verify Network.';
        } else if (jqXHR.status == 404) {
            msg = 'Requested page not found. [404]';
        } else if (jqXHR.status == 500) {
            msg = 'Internal Server Error [500].';
        } else if (exception === 'parsererror') {
            msg = 'Requested JSON parse failed.';
        } else if (exception === 'timeout') {
            msg = 'Time out error.';
        } else if (exception === 'abort') {
            msg = 'Ajax request aborted.';
        } else {
            msg = 'Uncaught Error.\n' + jqXHR.responseText;
        }
        console.log(msg);
        $("div").css("border", "3px solid red");
        }
  });
//buscamos los departamentos
$.ajax({
      url:        backendUrl+"departamentos?_format=json",
      dataType:   "json", // <== JSON-P request
      success:    function(datos){
          //alert(weblink); // this statement doesn't show up
           $.each(datos,function(i,item){
            departamentos[i]=datos[i];
              dpto+='<option value="'+departamentos[i].nombre+'">'+departamentos[i].nombre+'</option>';
          });
      },
      error: function (jqXHR, exception) {
        var msg = '';
        if (jqXHR.status === 0) {
            msg = 'Not connect.\n Verify Network.';
        } else if (jqXHR.status == 404) {
            msg = 'Requested page not found. [404]';
        } else if (jqXHR.status == 500) {
            msg = 'Internal Server Error [500].';
        } else if (exception === 'parsererror') {
            msg = 'Requested JSON parse failed.';
        } else if (exception === 'timeout') {
            msg = 'Time out error.';
        } else if (exception === 'abort') {
            msg = 'Ajax request aborted.';
        } else {
            msg = 'Uncaught Error.\n' + jqXHR.responseText;
        }
        console.log(msg);
        $("div").css("border", "3px solid red");
        }
  });

//buscamos los inmuebles
$.ajax({
      url:        backendUrl+"inmuebles?_format=json",
      dataType:   "json", // <== JSON-P request
      success:    function(datos){
          //alert(weblink); // this statement doesn't show up
          $.each(datos,function(i,item){
            inmuebles[i]=datos[i];
            setinmueble(inmuebles[i]);
            if(primero==true){
              setmenu();
              setbuscador();
              primero=false;
            }
            
      });
    },
    error: function (jqXHR, exception) {
        var msg = '';
        if (jqXHR.status === 0) {
            msg = 'Not connect.\n Verify Network.';
        } else if (jqXHR.status == 404) {
            msg = 'Requested page not found. [404]';
        } else if (jqXHR.status == 500) {
            msg = 'Internal Server Error [500].';
        } else if (exception === 'parsererror') {
            msg = 'Requested JSON parse failed.';
        } else if (exception === 'timeout') {
            msg = 'Time out error.';
        } else if (exception === 'abort') {
            msg = 'Ajax request aborted.';
        } else {
            msg = 'Uncaught Error.\n' + jqXHR.responseText;
        }
        console.log(msg);
        $("div").css("border", "3px solid red");
        }
});

}catch (e) {
// sentencias para manejar cualquier excepción
console.log(e);// pasar el objeto de la excepción al manejador de errores
}

}
function setbuscador(){
var formbuscar= '<div class="row">'+
'<div  class="input-field col s12 m2">'+
'<select id="valortipo">'+
'<option  value="" disabled selected>Tipo</option>'+
tipo+
'</select>'+
'<label>Tipo</label>'+
'</div>'+
'<div class="input-field col s12 m2">'+
'<select id="valorbarrio">'+
'<option value="" disabled selected>Barrio</option>'+
brrio+
'</select>'+
'<label>Barrio</label>'+
'</div>'+
'<div class="input-field col s12 m2">'+
'<select id="valordpto">'+
'<option value="" disabled selected>Departamento</option>'+
dpto+
'</select>'+
'<label>Departamento</label>'+
'</div>'+
'<div class="input-field col s12 m2">'+
'<select id="valordorm">'+
'<option value="" disabled selected>Dormitorios</option>'+
'<option value="1">1</option>'+
'<option value="2">2</option>'+
'<option value="3">3</option>'+
'<option value="4">Mas</option>'+
'</select>'+
'<label>Dormitorios</label>'+
'</div>'+
'<div class="input-field col s12 m2">'+
'<select id="valortipomov">'+
'<option value="" disabled selected>Alquiler/Compra</option>'+
'<option value="1">Aquiler</option>'+
'<option value="2">Compra</option>'+
'</select>'+
'<label>Alquiler/Compra</label>'+
'</div>'+
'<div class="input-field col s12 m2">'+
' <select id="valorprecio">'+
'<option value="" disabled selected>Hasta</option>'+
'<option value="10000">$10.000</option>'+
'<option value="20000">$20.000</option>'+
'<option value="30000">$30.000</option>'+
'<option value="50000">$50.000</option>'+
'<option value="100.000">$100.000</option>'+
'</select>'+
'<label>Precio</label>'+
'</div>'+
' </div>'+
'<div class="row center">'+
'<a href="#"   class="btn-large waves-effect waves-light orange" onclick="filtrarinmueble()">Filtrar</a>'+
' </div>';
$('#buscador').append(formbuscar);  
$('.button-collapse').sideNav();
$('select').material_select();    
} 
function setmenu(){
  var datamenu=$("#barranav");
  if(login==true){
    datamenu= '';
  }else{
    datamenu='<div class="nav-wrapper container"><a id="logo-container" href="/frontend-laburo/index.html" class="brand-logo">Quiero Casa <i class="large  material-icons">store</i></a>'+
      '<ul class="right hide-on-med-and-down">'+
      '<li><a href="#">Iniciar</a></li>'+
      '</ul>'+
      '<ul id="nav-mobile" class="side-nav">'+
      '<div class="userView">'+
      '<div class="background">'+
      '<img class="responsive-img" src="img/background.jpg">'+
      '</div>'+
      '<a href="#!user"><img class=" responsive-img circle" src="img/perfil.jpg"></a>'+
      '<li><a class="white-text" href="#">Perfil</a></li>'+
      '<br>'+
      '</div>'+
      '<li><a href="#">Iniciar Sesion</a></li>'+
      '</ul>'+
      '<a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>'+
      '</div>';
    $( "#barranav" ).append(datamenu);  
  }
  $('.button-collapse').sideNav();
}
function setinmueble(inm){
auxb=inm.id_Barrio; 
//inmuebles[i].setAttribute(Departamentos_iD);
$.each(barrios,function(a,item){

    if(barrios[a].id==auxb){

        inm.id_Barrio=barrios[a].nombre;
          $.each(departamentos,function(x,item){

            if(departamentos[x].id==barrios[a].id_Departamento){

              inm.Departamentos_iD=departamentos[x].nombre;    
                  
              $.each(tipoinmueble,function(z,item){
                if(inm.id_tipoinmueble==tipoinmueble[z].id){
                  inm.id_tipoinmueble=tipoinmueble[z].nombre;
                  //console.log(inmuebles[i]);
                  myLatLng.lat = parseFloat(inm.cordx);
                  myLatLng.lng = parseFloat(inm.cordy);
                  setMarcador(inm,map,myLatLng);
                  setTarjeta(inm);
                }
              });
            }
            
          });
        }
  });
}
function setTarjeta(inm){
var contentData;
contentData='<div class="col s12 m4">'+
'<div class="card hoverable">'+
'<div class="card-image">'+
'<img src="'+urlimg+inm.id+'/0.jpg">'+
'<span class="card-title">'+inm.nombre+'</span>'+
'</div>'+
'<p class="light">'+inm.descripcion+'</p>'+
'<div class="card-action">'+
'<a href="javascript:verInmueble('+inm.id+');">'+'info</a>'+
'<a href="#">Favoritos</a>'+
'</div>'+
'</div>'+
'</div>';
$( "#sectioninmuebles" ).append(contentData);
      
}
function setMarcador(inm,map,myLatLng){
var marker;
var infowindow;
var contentString;
contentString = '<div class="card-panel">'+
'<h3 class="blue-text text-darken-2">'+inm.nombre+'</h3>'+
'<div id="">'+
'<p class="grey-text text-darken-2">'+inm.descripcion+'</p>'+
'<p class="blue-text text-darken-2">Quierocasa.com <a href="javascript:verInmueble('+inm.id+');">'+
'Mas info</a> '+
'</p>'+
'</div>'+
'</div></div>';

infowindow = new google.maps.InfoWindow({
  content: contentString
});    
marker = new google.maps.Marker({
    position: myLatLng,
    map: map,
    animation: google.maps.Animation.DROP,
    title: 'Apretame!'
});
 //se lo mandamos al mapa
marker.setMap(map);
marker.addListener('click', function() {
map.setZoom(14);
//map.setCenter(marker.getPosition());
infowindow.open(map, marker);
})
//seteamos la tarjeta en minuatura del inmuebles
}


function verInmueble(id){
  var datainmueble="";
  $('#all').empty();
  
  $.each(inmuebles,function(i,item){
        if(inmuebles[i].id==id){
          inmueble=inmuebles[i];
        }
    });
  var aimg="";
  for(var z=0;z<parseInt(inmueble.cant_imagenes);z++){
    aimg+='<a class="carousel-item" href="#'+inmueble.id+'!"><img height="480" src="'+urlimg+''+inmueble.id+'/'+z+'.jpg"></a>';
  }
  datainmueble=''+
'<div class="section">'+
'<div class="row">'+

'<div class="carousel carousel-slider">'+
aimg+
'</div>'+
'</div>'+
'</div>'+
'<div class="section">'+
'<div class="row">'+
'<div class="col s12">'+
'<div class="card z-depth-3">'+
'<span class="card-title"> Ficha Tecnica</span>'+
'<div class="card-content">'+
'<div class="collection">'+
'<a href="#!" class="collection-item"><span class="badge">'+inmueble.cant_banios+'</span>Baños</a>'+
'<a href="#!" class="collection-item"><span class="badge">'+inmueble.cant_dormitorios+'</span>Cuartos</a>'+
'<a href="#!" class="collection-item"><span class="badge">'+inmueble.mts_totales+'</span>Mts Totales</a>'+
'<a href="#!" class="collection-item"><span class="badge">'+inmueble.mts_edificados+'</span>Mts Edificados</a>'+
'<a href="#!" class="collection-item"><span class="badge">'+inmueble.direccion+'</span>Direccion</a>'+
'<a href="#!" class="collection-item"><span class="badge">'+inmueble.id_Barrio+'</span>Bariio</a>'+
'<a href="#!" class="collection-item"><span class="badge">'+inmueble.garantia+'</span>Garantia</a>'+
'<a href="#!" class="collection-item"><span class="badge">$ '+inmueble.precio+'</span>Precio</a>'+
'</div>'+
'</div>'+
'<div class="card-content">'+
'<span class="card-title">Descripcion</span>'+
'<p>'+inmueble.descripcion+' </p>'+
'</div>'+
'<div class="card-action">'+
'<a href="#">Agregar a Favoritos</a>'+
'</div>'+
'</div>'+
'</div>'+
'</div>'+
'</div>'+
'<br><br></div>';

$( "#all" ).append(datainmueble);
$('.carousel.carousel-slider').carousel({full_width: true});
}

function filtrarinmueble(){
  /*var vt=document.getElementById("valortipo").value;
  var vd=document.getElementById("valordpto").value;
  var vb=document.getElementById("valorbarrio").value;
  var vdo=document.getElementById("valordorm").value;
  var tm=document.getElementById("valortipomov").value;
  var vp=document.getElementById("valorprecio").value;
  var auxinmueble=[];
  $.each(inmuebles,function(i,item){
    if((inmuebles[i].id_tipoinmueble==vt)||(inmuebles[i].id_tipoinmueble==vt)||(inmuebles[i].Departamentos_iD==vd)||(inmuebles[i].id_Barrio==vb)||(inmuebles[i].cant_dormitorios>=vdo)||(inmuebles[i].tipo_operacion==tm)||(inmuebles[i].precio>vp) ){
     auxinmueble.push(inmuebles[i]);
  }
               
  });
  console.log(auxinmueble);*/
}