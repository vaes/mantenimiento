$(function(){

	//RECUPERA EL ID DEL HOTEL EN EL QUE SE HIZO CLICK
	function getUrlVars() {
		var vars = {};
		var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value) {
		vars[key] = value;
		});
		return vars;
	}


	//OBTIENE UN LISTADO DE LAS HABITACIONES DADO UN ID HOTEL
	function getHabitaciones(p1, p2){
		$(".service_list").html("");
		$.ajax({
		    type: "POST",
		    url: path+"habitaciones/getHabitaciones/",
		    data: { id : getUrlVars()["id"], p1: p1, p2: p2 },
		    cache: false,
		    dataType: "json",
		    success: function(data){ 
		    	console.log(data);
		    	var cont = 0;
		    	var col = 0;
		    	var nomHotel = "";
			    $.each(data, function(i,item){
			 
			 		var estado = "";
			 		var reservaURL = "";
			 		nomHotel = item.nombre_hotel;

			 		//IMPRIME LAS HABITACIONES DISPONIBLES
			 		if(reservadas().length > 0){
			 			for (var key in reservadas()) {
							if(key == item.id_habitacion){
								if(reservadas()[key] == 0){
									estado = "<p class='para' style='color: red;'>Agotadas</p>";
									reservaURL = "<a href='"+path+"descripcion?hotel="+getUrlVars()["id"]+"&habitacion="+item.id_habitacion+"&h=a'>";
								}
								else{
									estado = "<p class='para' style='color: green;'>Disponibles "+reservadas()[key]+"</p>";
									reservaURL = "<a href='"+path+"descripcion?hotel="+getUrlVars()["id"]+"&habitacion="+item.id_habitacion+"&h=t'>";
								}
								break;
							}else{
								estado = "<p class='para' style='color: green;'>Disponibles "+item.cantidad+"</p>";
								reservaURL = "<a href='"+path+"descripcion?hotel="+getUrlVars()["id"]+"&habitacion="+item.id_habitacion+"&h=t'>";	
							}
						}
			 		}else{
			 			estado = "<p class='para' style='color: green;'>Disponibles "+item.cantidad+"</p>";
			 			reservaURL = "<a href='"+path+"descripcion?hotel="+getUrlVars()["id"]+"&habitacion="+item.id_habitacion+"&h=t'>";
			 		}
			 		

			    	if(cont > 4){
			    		$(".room-grids").append("<div class='clearfix'></div>");
			    		cont=0;
			    		col++;
			    	}

			    	var datos = "<li>"+
				                    "<div class='ser_img' id='"+item.id_habitacion+"'>"+reservaURL+
											"<span class='next'> </span>"+
											"<img src='"+path+"app/views/images/rooms/"+item.estado+"/"+item.nombre_hotel+"/"+item.tipo_h+"/default.jpg'>"+
										"</a>"+
				                    "</div>"+    
				                    "<a href='#'><h3>"+item.tipo_h+"</h3></a>"+
				                    "<p class='para'>"+item.capacidad+"</p>"+estado+
				                    "<h4><a  href='#'>MXN "+item.precio+"</a></h4>"+
				                "</li>";
		           	$("#hb > #col"+col).append(datos).hide().show("fast");	

		           	if(cont == 3){
	                	$("#col"+col).append("<div class='clear'></div>");
	                	$("#hb").append("<ul class='service_list' id='col"+(col+1)+"'></ul>");
	                }	

		           	cont++;
		           	      					
			    });	
			    $("#noches").html("");
			    $("#noches").prepend("<h1>Habitaciones ("+nomHotel+")</h1><br>")
		    }
		});
	}
	getHabitaciones(500,5000);

	//OBTIENE UN LISTADO DE LOS IDS DE LAS HABITACIONES REVESERVADAS DADO UN RANGO DE FECHA
	function reservadas(){

		var reservas = [];
		
		$.ajax({
		    type: "POST",
		    url: path+"habitaciones/getHabReservadas/",
		    data: { inicio : $.session.get("fechaInicio"), fin: $.session.get("fechaSalida"), hotel: getUrlVars()["id"] },
		    cache: false,
		    dataType: "json",
		    success: function(data){ 

			    $.each(data, function(i,item){
			  		reservas[item.id_habitacion] = item.disponibles;
			    });	
		    },
		    async: false
		});

		return reservas;
	}
	

	$("#bo").click(function(){
		//if ($.session.get("fechaInicio").indexOf("1") >= 0)
		//{
		  alert($.session.get("fechaInicio"));
		  alert($.session.get("fechaSalida"));

		//}
		
		$.session.remove("fechaInicio");
		$.session.remove("fechaSalida");
	});


	//FILTRA LAS HABITACIONES EN UN RANGO DE PRECIO
	var precio1 = 0;
	var precio2 = 0;
	$( "#slider-range" ).slider({
      range: true,
      min: 100,
      max: 10000,
      values: [ 500, 5000 ],
      slide: function( event, ui ) {
        $( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
        precio1 = ui.values[ 0 ];
        precio2 = ui.values[ 1 ];
      }
    });
    $( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) +
      " - $" + $( "#slider-range" ).slider( "values", 1 ) );

    $(".ui-slider-handle").mouseup(function(){
    	
		getHabitaciones(precio1,precio2);
		
	});
});
