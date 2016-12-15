//para buscar algo especifico le ponemos por ejemplo /api/v1/inmuebles/X?_format=json donde la X es el valor

var backendUrl="http://localhost/2016php/advanced/api/v1/";
//$(document).on("ready",main);
//$(document).ready(initMap);A
var urlimg="http://localhost/2016php/advanced/backend/web/uploads/inmuebles/";
var control=0;
//variable de arreglos
var inmuebles=[];
var inmueble=[];
var barrios =[];
var departamentos=[];
var tipoinmueble=[];
var misfav=[];
var auxd;
var auxb;
//variables api google
var map;
var myLatLng ;
var prueba=[];
var primero=true;
var login=false;
//variables para filtros
var tipo="";
var brrio="";
var dpto="";
//variable para login
var user="";
var pass="";
var idusuario;
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
$('#buscador').empty(); 
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
'<div class="row"> <br>'+
'<a href="#"   class="btn-large waves-effect waves-light orange" onclick="mostrartodo()">Mostrar Todo</a>'+
'</div>'+' </div>';
$('#buscador').append(formbuscar);  
$('.button-collapse').sideNav();
$('select').material_select();    
} 
function setmenu(){
var datamenu="";
$("#barranav").empty();
  if(login==true){
    datamenu='<div class="nav-wrapper container"><a id="logo-container" href="javascript:cargotodo()" class="brand-logo">Quiero Casa <i class="large  material-icons">store</i></a>'+
      '<ul class="right hide-on-med-and-down">'+
      '<li><a id="logout" href="javascript:logout()">logout</a></li>'+
      '<li><a id="vermisinmuebles" href="javascript:verfavoritos()">Ver mis Favoritos</a></li>'+
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
      '<li><a id="login" href="javascript:logout()">logout </a></li>'+
      '<li><a id="vermisinmuebles" href="javascript:verfavoritos()">Ver mis Favoritos</a></li>'+
      '</ul>'+
      '<a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>'+
      '</div>';
    $( "#barranav" ).append(datamenu);;
  }else{
    datamenu='<div class="nav-wrapper container"><a id="logo-container" href="javascript:cargotodo()" class="brand-logo">Quiero Casa <i class="large  material-icons">store</i></a>'+
      '<ul class="right hide-on-med-and-down">'+
      '<li><a id="login" href="javascript:logeo()">Login</a></li>'+
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
      '<li><a id="login" href="javascript:logeo()">Login </a></li>'+
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
'<a href="javascript:verInmueble('+inm.id+');">'+'info</a>';
if (idusuario != null){
	var misfavid=[];
	$.each(misfav,function(i,item){
		misfavid[i] = misfav[i].id_Inmueble;      
      });
	var aux69 = misfavid.indexOf(inm.id.toString());
	console.log(aux69);
	if(aux69 == -1){
		contentData=contentData+'<a href="javascript:ponerfavorito('+inm.id+')">Favoritos</a>';
	}

}
contentData=contentData+'</div>'+
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
'<h2>Datos Inmueble</h2>'+
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
  var vt=document.getElementById("valortipo").value;
  var vb=document.getElementById("valorbarrio").value;
  var vd=document.getElementById("valordpto").value;
  var vdo=document.getElementById("valordorm").value;
  var tm=document.getElementById("valortipomov").value;
  var vp=document.getElementById("valorprecio").value;
  var auxinmueble=[];
  var valorvt=0;
  var resultado=0;
  if(vt!=''){
    valorvt=1;
  }
  if(vb!=''){
    valorvt=2;
  }
  if(vd!=''){
    valorvt=3;
  }
  if(vdo!=''){
    valorvt=4;
  }
  if(tm!=''){
    valorvt=5;
  }
  if(vp!=''){
    valorvt=6;
  }
switch (valorvt)
{
   case 0:
        break; 
   case 1:
        resultado = _.filter(inmuebles, function(inmuebles, key) {
        return  inmuebles.id_tipoinmueble === vt;
        });
        //console.log(resultado);
       break;
   case 2:
        if(vt!=''){
          resultado = _.filter(inmuebles, function(inmuebles, key) {
            return  inmuebles.id_tipoinmueble === vt && inmuebles.id_Barrio === vb;
          });
          //console.log(resultado);

        }
        else{
          resultado = _.filter(inmuebles, function(inmuebles, key) {
            return  inmuebles.id_Barrio === vb;
            //console.log(resultado);
          });
          
        }
       break;      
   case 3:
       if(vt!=''){
        if(vb!=''){
          //si eleji tipo inm, barrio y dpto
          resultado = _.filter(inmuebles, function(inmuebles, key) {
            return  inmuebles.id_tipoinmueble === vt && inmuebles.id_Barrio === vb && inmuebles.Departamentos_iD === vd;
          });
            //console.log("todo");
        }else {
          //si eleji tipo inmueble y dpto
          resultado = _.filter(inmuebles, function(inmuebles, key) {
            return  inmuebles.id_tipoinmueble === vt && inmuebles.Departamentos_iD === vd;
        });
             //console.log("Inm y dpto");
       }
       
       }
       //si eleji barrio y dpto
       else if(vb!=''){
          resultado = _.filter(inmuebles, function(inmuebles, key) {
            return  inmuebles.id_Barrio === vb && inmuebles.Departamentos_iD === vd;
          });
            //console.log("Barrio y dpto");
       
       }
       else{
        //si eleji solo dpto
          resultado = _.filter(inmuebles, function(inmuebles, key) {
            return   inmuebles.Departamentos_iD === vd;
          });
            //console.log("Solo dpto");
       }
       break;
    case 4:
       if(vt!=''){
        if(vb!=''){
          if(vd!=''){
            //si eleji todo
            resultado = _.filter(inmuebles, function(inmuebles, key) {
              return  inmuebles.id_tipoinmueble === vt && inmuebles.id_Barrio === vb && inmuebles.Departamentos_iD === vd && inmuebles.cant_dormitorios == parseInt(vd);
              });
              //console.log("todo");
            }else{
              //si eleji tipo, barrio y dormito
              //console.log("eleji tipo y barrio");
              resultado = _.filter(inmuebles, function(inmuebles, key) {
                return  inmuebles.id_tipoinmueble === vt && inmuebles.id_Barrio === vb && inmuebles.cant_dormitorios >= vd;
              });
            } 
          }else if(vt!=''){
            if(vd!=''){
              //console.log("eleji tipo y dpto");
              resultado = _.filter(inmuebles, function(inmuebles, key) {
                return  inmuebles.id_tipoinmueble === vt && inmuebles.Departamentos_iD === vd && inmuebles.cant_dormitorios >= vd;
              });
            }else{
              //solo eleji tipo
              //console.log("eleji tipo");
              resultado = _.filter(inmuebles, function(inmuebles, key) {
                return  inmuebles.id_tipoinmueble === vt && inmuebles.cant_dormitorios >= vd;
              });
              }
          }
        }
        if(vb!=''){
          if(vd!=''){
            //si eleji barrio y dpto
            resultado = _.filter(inmuebles, function(inmuebles, key) {
                return  inmuebles.id_Barrio === vb && inmuebles.Departamentos_iD === vd && inmuebles.cant_dormitorios >= vd;
              });
          }else{
            //solo eleji barrio
            //console.log("solo eleji barrio");
            resultado = _.filter(inmuebles, function(inmuebles, key) {
                return  inmuebles.id_Barrio === vb && inmuebles.cant_dormitorios >= vd;
            });
          }
        }  
        if(vd!=''){//solo eleji dpto
          resultado = _.filter(inmuebles, function(inmuebles, key) {
                return  inmuebles.Departamentos_iD === vd && inmuebles.cant_dormitorios >= vd;
            });
          //console.log("dpto");
        }
       
       break;
    case 5:
       if(vt!=''){//si eleji tipo
        if(vb!=''){//si eleji tipo y barrio
          if(vd!=''){//si tipo, barrio y eleji dpto
              if(vdo!=''){
                //si eleji tipo,barrio,dpto y dormitorio
                //console.log("eleji todo");
                resultado = _.filter(inmuebles, function(inmuebles, key) {
                  return  inmuebles.id_tipoinmueble === vt && inmuebles.id_Barrio === vb && inmuebles.Departamentos_iD === vd && inmuebles.cant_dormitorios >= vd && inmuebles.tipo_operacion === tm;
                });
              }else{//solo eleji tipo barrio y doti
                  //console.log("solo tipo barrio y dpto");
                  resultado = _.filter(inmuebles, function(inmuebles, key) {
                    return  inmuebles.id_tipoinmueble === vt && inmuebles.id_Barrio === vb && inmuebles.Departamentos_iD === vd && inmuebles.tipo_operacion === tm;
                  });
              }

            }else{//solo tipo y barrio
              resultado = _.filter(inmuebles, function(inmuebles, key) {
                return  inmuebles.id_tipoinmueble === vt && inmuebles.id_Barrio === vb && inmuebles.tipo_operacion === tm;
              });
            }
          }else{//si eleji solo tipo
            resultado = _.filter(inmuebles, function(inmuebles, key) {
              return  inmuebles.id_tipoinmueble === vt && inmuebles.tipo_operacion === tm;
            });
          }
        }
        if(vb!=''){ //si eleji barrio
          if(vd!=''){//si eljio barrio y dpto
            if(vdo!=''){//si elijio barrio dpto y dormi
              resultado = _.filter(inmuebles, function(inmuebles, key) {
                return inmuebles.id_Barrio === vb && inmuebles.Departamentos_iD === vd && inmuebles.cant_dormitorios >= vd && inmuebles.tipo_operacion === tm;
              });
            }
          }
          if(vdo!=''){//si elijio barrio y dormi
            resultado = _.filter(inmuebles, function(inmuebles, key) {
              return   inmuebles.id_Barrio === vb && inmuebles.cant_dormitorios >= vd && inmuebles.tipo_operacion === tm;
            });
          }
        }
        if(vd!=''){ //si eleji dpto
          if(vdo!=''){//si elijio dormi
            resultado = _.filter(inmuebles, function(inmuebles, key) {
              return  inmuebles.Departamentos_iD===vd && inmuebles.cant_dormitorios >= vd && inmuebles.tipo_operacion === tm;
            });
          }
        }
       else{//si eleji dormitorios
            resultado = _.filter(inmuebles, function(inmuebles, key) {
              return  inmuebles.cant_dormitorios >= vd && inmuebles.tipo_operacion === tm;
            });
        }
         
       break;
    case 6:
        //elijo todo
        if( vt!='' && vb!='' && vd!='' && vdo!='' && tm!=''){
          resultado = _.filter(inmuebles, function(inmuebles, key) {
            return  inmuebles.id_tipoinmueble === vt && inmuebles.id_Barrio === vb && inmuebles.Departamentos_iD === vd && inmuebles.cant_dormitorios >= vd && inmuebles.tipo_operacion === tm && inmuebles.precio=== vp;
          });
        }
        //elijo solo tipo
        if( vt!=''){
          resultado = _.filter(inmuebles, function(inmuebles, key) {
            return  inmuebles.id_tipoinmueble && inmuebles.precio=== vp;
          });
        }
        //elijo solo barrio
        if( vb!=''){
          resultado = _.filter(inmuebles, function(inmuebles, key) {
            return  inmuebles.id_Barrio === vb && inmuebles.precio=== vp;
          });
          }
        //elijo solo dpto
        if( vd!='' ){
          resultado = _.filter(inmuebles, function(inmuebles, key) {
            return  inmuebles.Departamentos_iD === vd && inmuebles.precio=== vp;
          });
          }
        //elijo solo dormitorio
        if( vdo!=''){
          resultado = _.filter(inmuebles, function(inmuebles, key) {
            return inmuebles.cant_dormitorios >= vd && inmuebles.precio=== vp;
          });
          }
        //elijo topo movimiento
        if(tm!=''){
          resultado = _.filter(inmuebles, function(inmuebles, key) {
            return  inmuebles.tipo_operacion === tm && inmuebles.precio=== vp;
          });
        }
       break;

          
}
$( "#sectioninmuebles" ).empty();
$.each(resultado,function(i,item){
  setTarjeta(resultado[i]);
  
});
//setTarjeta();
}

function iniciarsesion(){
    var data=$("#login-form"); 
    var username=$("#username").val();
    var password=$("#password").val();
    var datos='{"username": "' + username + '", "password" : "' + password + '"}';

    $.ajax({
           type: "GET",
           url: backendUrl+"usuario",
           data:  'username='+username+'&password='+password+'',
           success: function(response)
           {
              $( "#carga" ).empty();
              $( "#carga" ).append('<img class="responsive-img" src="img/loader.gif">');
              login==true; 
              primero=true;
              user=username;
              pass=password;
              $.each(response,function(i,item){
	            if(response[i].username==username){
	              idusuario=response[i].id;
	            }		            
		      });
              cargofavorits(username,password);
              cargotodo();
           },
          error: function (jqXHR, exception) {
            var msg = '';
            if (jqXHR.status === 0) {
                $( "#carga" ).empty();
                $( "#carga" ).append('<img class="responsive-img" src="img/loader.gif">');
                setTimeout(' window.location.href = "#"; ',4000);
                msg = 'Not connect.\n Verify Network.';
                $( "#carga" ).append('<p class="flow-text">'+msg+'</p>');
            } else if (jqXHR.status == 404) {
                $( "#carga" ).empty();
                $( "#carga" ).append('<img class="responsive-img" src="img/loader.gif">');
                setTimeout(' window.location.href = "#"; ',4000);
                msg = 'Requested page not found. [404]';
                $( "#carga" ).append('<p class="flow-text">'+msg+'</p>');
            } else if (jqXHR.status == 500) {
                $( "#carga" ).empty();
                $( "#carga" ).append('<img class="responsive-img" src="img/loader.gif">');
                setTimeout(' window.location.href = "#"; ');
                $( "#carga" ).append('<p class="flow-text">Error de usuario o Contraseña</p>');
                msg = 'Internal Server Error [500].';

            } else if (exception === 'parsererror') {
                $( "#carga" ).empty();
                $( "#carga" ).append('<img class="responsive-img" src="img/loader.gif">');
                setTimeout(' window.location.href = "#"; ',4000);
                msg = 'Requested JSON parse failed.';
                $( "#carga" ).append('<p class="flow-text">'+msg+'</p>');
            } else if (exception === 'timeout') {
                $( "#carga" ).empty();
                $( "#carga" ).append('<img class="responsive-img" src="img/loader.gif">');
                setTimeout(' window.location.href = "#"; ',4000);
                msg = 'Time out error.';
                $( "#carga" ).append('<p class="flow-text">'+msg+'</p>');
            } else if (exception === 'abort') {
                $( "#carga" ).empty();
                $( "#carga" ).append('<img class="responsive-img" src="img/loader.gif">');
                setTimeout(' window.location.href = "#"; ',4000);
                $( "#carga" ).append('<p class="flow-text">'+msg+'</p>');
                msg = 'Ajax request aborted.';
            } else {
                msg = 'Uncaught Error.\n' + jqXHR.responseText;
            }
            console.log(msg);
            }
   });
}
function logeo(){
$( "#all" ).empty();
var formulario='<div class="container">'+
'<div class="section">'+
'<div class="row">'+
'<div class="row">'+  
'<form id="login-form" method="post" class="col s12"">'+
'<div class="input-field col s6 offset-s3">'+
'<input name="username" id="username" id="first_name" type="text" class="validate">'+
'<label for="first_name">Usuario</label>'+
'</div>'+
' </div>'+
'<div class="row">'+
'<div class="input-field col s6 offset-s3">'+
'<input name="password" id="password" type="password" class="validate">'+
'<label  for="password">Password</label>'+
'</div>'+
'</div>'+
'<div class="row">'+
'<div class="input-field col s3 offset-s3">'+
'<a  class=" btn waves-effect waves-light" href="javascript:iniciarsesion();">Enviar</a>'+
'<div id="carga" class="s3 offset-s6">'+
'</div>'+
'</div>'+
'</div>'+
'<div class="row">'+
'<div class="input-field col s3 offset-s3">'+
'<a  class=" btn waves-effect waves-light" href="javascript:registrar();">Registrar</a>'+
'</div>'+
'</div>'+
'</form>'+
'</div>'+
'</div>'+
'<br><br><br><br><br><br>'+
'</div>';
$( "#all" ).append(formulario);
}
function cargotodo(){
  $( "#all" ).empty();
  var cargatodo='<div class="section no-pad-bot" id="index-banner">'+
'<div class="container">'+
'<br><br>'+
'<h1 class="header center black-text">Busca tu futuro hogar</h1>'+
'<div class="row center" >'+
'<form class="col s12" id="buscador">'+
'<!-- <div class="row">'+
'<div class="col s12">'+
'<div class="row">'+
'<div class="input-field col s12">'+
'<i class="material-icons prefix">textsms</i>'+
'<input type="text" id="autocomplete-input" class="autocomplete">'+
'<label for="autocomplete-input">Ingresa: Barrio/</label>'+
'</div>'+
'</div>'+
'</div>'+
'</div>'+
'<a href="#"   class="btn-large waves-effect waves-light orange" onclick="filtrarinmueble()">Filtrar</a>'+
'<div class="row">'+
'<a href="#"   class="btn-large waves-effect waves-light orange" onclick="mostrartodo()">Mostrar Todo</a>'+
'</div>'+
'</form>'+
'</div>'+
'<br><br>'+
'</div>'+
'</div>'+
'<!--   Map Section   -->'+
'<div class="container">'+
'<div class="section">'+
'<div class="row">'+
'<div class="col s12">'+
'<div class="card-content white-text">'+
'<div id="map">'+
'</div>'+
'</div>  '+
'</div>'+
'</div>'+
'</div>'+
'</div>'+
'<div class="container">'+
'<div class="section">'+
'<!--   Inmuebles Section   -->'+
'<div class="row" id="sectioninmuebles">'+
'</div>'+
'<br><br>'+
'<div class="section">'+
'</div>'+
'</div>'+
'</div>'+
'</div>';
barrios =[];
departamentos=[];
tipoinmueble=[];
var s = document.createElement("script");
s.type = "text/javascript";
s.src = "https://maps.googleapis.com/maps/api/js?key=AIzaSyCdqKB2KhL1D9HxiGCdYiS5GNnB9dMghi4&callback=initMap";
$("head").append(s);
$( "#all" ).append(cargatodo);
$('.button-collapse').sideNav();
$('.carousel.carousel-slider').carousel({full_width: true});
$('select').material_select();
login=true;
primero=true;

$.each(inmuebles,function(i,item){
    setinmueble(inmuebles[i]);
    if(primero==true){
      setmenu();
      setbuscador();
      primero=false;
    }
    
  });
}
function cargofavorits(username,password){
  if (misfav !== null){
  	misfav = [];
  }

  $.ajax({
      url:        backendUrl+"usuario/obtenerfavoritos?username="+user,
      data:  'username='+username+'&password='+password+'',
      success:    function(datos){
          //alert(weblink); // this statement doesn't show up
          $.each(datos,function(i,item){
            misfav[i]=datos[i];
            setinmueble(inmuebles[i]);
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
}
function verfavoritos(){
  var aux=[];
  var texto='<br><ul class="collection">';
  $('#all').empty();
  
  $.each(misfav,function(i,item){
     $.each(inmuebles,function(z,item){
      if(misfav[i].id_Inmueble==inmuebles[z].id && misfav[i].id_Inmueble!=null){
          texto+='<h2>Mis favoritos</h2>'+
                '<li class="collection-item avatar">'+
                '<img src="'+urlimg+inmuebles[z].id+'/0.jpg" alt="" class="circle">'+
                '<span class="title">'+inmuebles[z].nombre+'</span>'+
                '<p>'+inmuebles[z].descripcion+'<br>'+
                '<a href="javascript:verInmueble('+inmuebles[z].id+');">'+'info</a>'+
                '</p>'+
                '<a href="javascript:sacarfavorito('+misfav[i].id+')" class="secondary-content"><i class="material-icons">grade</i></a>'+
                '</li>';      
              }
    
    });
    
  });
  texto+='</ul>';
  $('#all').append(texto);
  $('.button-collapse').sideNav();
  $('.carousel.carousel-slider').carousel({full_width: true});
  $('select').material_select();
}
function sacarfavorito(id){
  var auxfav=[];
  $.ajax({
      url:        backendUrl+"favoritos/"+id,
      type: 'DELETE',
      //data:  'username='+username+'&password='+password+'',
      success:    function(datos){
          /*$.each(misfav,function(i,item){
            if(misfav[i].id==id){
              var index = misfav.indexOf(i);
              if (index > -1) {
			    array.splice(index, 1);
			  }
              //delete misfav[i];
            }*/
            cargofavorits(user,pass);
            
      //});
      cargotodo();
      console.log(misfav);
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
}

function ponerfavorito(id){
  $.ajax({
      url:        backendUrl+"favoritos",
      data: 'user_id=' + idusuario + '&id_Inmueble=' + id,
      type: 'POST',
      //data:  'username='+username+'&password='+password+'',
      success:    function(datos){
          /*$.each(misfav,function(i,item){
            if(misfav[i].id==id){
              var index = misfav.indexOf(i);
              if (index > -1) {
			    array.splice(index, 1);
			  }
              //delete misfav[i];
            }*/
            cargofavorits(user,pass);
            
      //});
      cargotodo();
      console.log(misfav);
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
}
function mostrartodo(){
  $( "#sectioninmuebles" ).empty();
  $.each(inmuebles,function(i,item){
    setTarjeta(inmuebles[i]);
  });
}