$(document).on("ready",main);

   			function main(){
   				/*console.log("Pepe"); 		<script type="text/javascript" src="js/parallax.min.js">*/
				$("#buscar").on("click",function(){
                 
        		/*var texto="";*/
        		var latitud;
        		var longitud;
                
                /*region de busqueda*/
                var region="Montevideo";
                //var region=$("#region_input_text").val();

                /*b era la calle
        		var dir=$("#b").val();
        		c es el numero
                var num=$('#c').val();*/

                var dir_completa=$('#inmuebles-direccion').val();

        		$.getJSON("https://maps.googleapis.com/maps/api/geocode/json?address="+dir_completa+"+"+region+"",function(datos){

            	$.each(datos.results,function(i,item){

                //texto +="<div class=''><br> "; 		<script type="text/javascript" src="js/parallax.min.js">
                //texto +="<h3>"+item.title+"</h3>" //direccion https://maps.googleapis.com/maps/api/geocode/json?address=1059+Carlos+Montevideo 
                //texto +="<img class='img-thumbnail img-responsive' alt='Responsive image'src='"+results.location.m+"'/><br>";
                //texto +="</div>";
               
                	latitud=datos.results[0].geometry.bounds.northeast.lat;
                	longitud=datos.results[0].geometry.bounds.northeast.lng;
                
           		});
                $("#buscar").click(function(){
                    $("#inmuebles-cordx").val(latitud);
                    $("#inmuebles-cordy").val(longitud);
                });
            	cargoDatos(longitud,latitud);
            	initMap();
            
        	});
      	});
}