var url="http://localhost/2016php/advanced/api/v1/";
var inmuebles=[];
var inmueble=[];
var barrios =[];
var departamentos=[];
var tipoinmueble=[];
window.onload = function (){$.ajax({
	
                url:        url+"tipoinmueble?_format=json",
                type: "GET",
                dataType:   "json", // <== JSON-P request
                success:    function(datos){
                    //alert(weblink); // this statement doesn't show up
                    $.each(datos,function(i,item){
                      tipoinmueble[i]=datos[i];
                  });
                    
                }
            });
          
          $.ajax({
                url:        url+"barrios?_format=json",
                dataType:   "json", // <== JSON-P request
                success:    function(datos){
                    //alert(weblink); // this statement doesn't show up
                     $.each(datos,function(i,item){
                      barrios[i]=datos[i];
                    });
                    
                }
            });
          $.ajax({
                url:        url+"departamentos?_format=json",
                dataType:   "json", // <== JSON-P request
                success:    function(datos){
                    //alert(weblink); // this statement doesn't show up
                     $.each(datos,function(i,item){
                      departamentos[i]=datos[i];
                    });
                    
                }
            });
          $.ajax({
                url:        url+"inmuebles?_format=json",
                dataType:   "json", // <== JSON-P request
                success:    function(datos){
                    //alert(weblink); // this statement doesn't show up
                    $.each(datos,function(i,item){
                inmuebles[i]=datos[i];
                setinmueble(inmuebles[i]);
                });
                    
              }
          });
}          