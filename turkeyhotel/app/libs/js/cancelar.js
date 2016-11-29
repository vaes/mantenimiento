$(function(){

	/*$.session.set("fechaInicio", "$("#pickerInicio").val()");
    $.session.set("fechaSalida", "");*/
	var idReserva = 0;
	var idHuesped = 0;

	$("#buscar").click(function(){
		
		$("#reserva").html("");
		var codigo = $("#codigo").val();
		var nombre = $.trim($("#nombre").val());
		$.ajax({
		    type: "POST",
		    url: path+"cancelar/buscarReservacion/",
		    data: {codigo: codigo, nombre: nombre},
		    cache: false,
		    dataType: "json",
		    success: function(data){ 

			    $.each(data, function(i,item){
			    	
			    	idReserva = item.id_reserva;
			    	idHuesped = item.id_huesped;

			    	var datos = "<div class='col-md-7 col-md-offset-2'>"+
									"<div class='well'>"+
										"<div class='row'>"+
											"<div class='col-md-5' align='left'>"+
												"<img src='"+path+"app/views/images/rooms/"+item.estado+"/"+item.nombre_hotel+"/"+item.tipo_h+"/default.jpg'>"+
												"<label for='' class='titulo'><h3>"+item.nombre_hotel+"</h3></label>"+
												"<label for='' class='titulo'><h4>"+item.tipo_h+"</h4></label>"+
											"</div>"+
											"<div class='col-md-7'>"+
									          	"<label>Entrada:</label><br>"+
									            "<label class='servicio'>"+item.fecha_inicio+" hasta las 15:00</label><br>"+
									            "<label>Salida:</label><br>"+
									            "<label class='servicio'>"+item.fecha_salida+" hasta las 13:00</label><br>"+
									            "<br><label>Precio para "+item.noches+" noches:</label><br>"+
									            "<label class='servicio'>MXN "+(conComas(item.precio*item.noches))+"</label><br>"+
												"<br><br>"+
												"<div class='row' align='right'>"+
													"<div class='col-md-12'>"+
														"<button type='submit' class='btn btn-warning' data-toggle='modal' data-target='#myModal'><strong>Cancelar reservacion</strong></button>"+
													"</div>"+
												"</div>"+
											"</div>"+
										"</div>"+
									"</div>"+
								"</div>";
					$("#reserva").append(datos).hide().show("normal");
					
			    });	
		    }
		});
	});

	$("#reserva").on("click","button",function(){
		$.post(path+"cancelar/cancelarReservacion/", { reserva: idReserva, huesped: idHuesped } );
	});

	$("#ok").click(function(){
		window.location.replace(path+"inicio");
	});

	//SEPARA UN NUMERO POR COMAS
	function conComas(valor) {
    var nums = new Array();
	    var simb = ","; //Éste es el separador
	    valor = valor.toString();
	    valor = valor.replace(/\D/g, "");   //Ésta expresión regular solo permitira ingresar números
	    nums = valor.split(""); //Se vacia el valor en un arreglo
	    var long = nums.length - 1; // Se saca la longitud del arreglo
	    var patron = 3; //Indica cada cuanto se ponen las comas
	    var prox = 2; // Indica en que lugar se debe insertar la siguiente coma
	    var res = "";
	 
	    while (long > prox) {
	        nums.splice((long - prox),0,simb); //Se agrega la coma
	        prox += patron; //Se incrementa la posición próxima para colocar la coma
	    }
	 
	    for (var i = 0; i <= nums.length-1; i++) {
	        res += nums[i]; //Se crea la nueva cadena para devolver el valor formateado
	    }
	    return res;
	}
	
});