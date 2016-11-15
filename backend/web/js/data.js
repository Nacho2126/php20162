$(document).on("ready",main);

   			function main(){
   				$('#nav').localScroll(800);
				$('#dat').parallax("50%",0.1);
				$('#gmaps').parallax("50%",0.1);
				$('#st').parallax("50%",0.3);
                    console.log("hola");
				/*console.log("Pepe"); 		<script type="text/javascript" src="js/parallax.min.js">*/
				$("#buscar").on("click",function(){
                 
        		/*var texto="";*/
        		var latitud;
        		var longitud;
                
                /*region de busqueda*/
                var region=$("#region_input_text").val();

                /*b era la calle
        		var dir=$("#b").val();
        		c es el numero
                var num=$('#c').val();*/

                var dir_completa=$('#direccion_input_text').val();

        		$.getJSON("https://maps.googleapis.com/maps/api/geocode/json?address="+dir_completa+"+"+region+"",function(datos){

            	$.each(datos.results,function(i,item){

                //texto +="<div class=''><br> "; 		<script type="text/javascript" src="js/parallax.min.js">
                //texto +="<h3>"+item.title+"</h3>" //direccion https://maps.googleapis.com/maps/api/geocode/json?address=1059+Carlos+Montevideo 
                //texto +="<img class='img-thumbnail img-responsive' alt='Responsive image'src='"+results.location.m+"'/><br>";
                //texto +="</div>";
               
                	latitud=datos.results[0].geometry.bounds.northeast.lat;
                	longitud=datos.results[0].geometry.bounds.northeast.lng;
                
           		});


            	cargoDatos(longitud,latitud);
            	initMap();
            
        	});
      	});
                $("#buscar2").on("click",function(){
                
                /*var texto="";*/
                var latitud;
                var longitud;
                
                /*region de busqueda*/
                var region=$("#region_input_text").val();

                /*b era la calle
                var dir=$("#b").val();
                c es el numero
                var num=$('#c').val();*/

                var dir_completa=$('#direccion_input_text').val();

                $.getJSON("https://maps.googleapis.com/maps/api/geocode/json?address="+dir_completa+"+"+region+"",function(datos){

                $.each(datos.results,function(i,item){

                //texto +="<div class=''><br> ";        <script type="text/javascript" src="js/parallax.min.js">
                //texto +="<h3>"+item.title+"</h3>" //direccion https://maps.googleapis.com/maps/api/geocode/json?address=1059+Carlos+Montevideo 
                //texto +="<img class='img-thumbnail img-responsive' alt='Responsive image'src='"+results.location.m+"'/><br>";
                //texto +="</div>";
               
                    latitud=datos.results[0].geometry.bounds.northeast.lat;
                    longitud=datos.results[0].geometry.bounds.northeast.lng;
                
                });
                

                cargoDatos(longitud,latitud);
                initMap();
            
            });
        });
	}