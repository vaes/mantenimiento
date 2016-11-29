$(function(){

	//INICIALIZA LOS CALENDARIOS
	$("#pickerInicio").datepicker();
	$("#pickerSalida").datepicker();

	//LIMPIA LA CAJA DE TEXTO BUSCAR CADA QUE OBTIENE EL FOCO
	$("#txtBuscar").on("click", function() {
    	$(this).val('');
	});
	
	//OBTIENE UNA LISTA DE ESTADOS ACTUALES PARA EL AUTOCOMPLETADO
	$.ajax({
        type: "POST",
        url: path+"inicio/getEstados/",
        cache: false,
        dataType: "json",
        success: function(data){ 
		    $( "#txtBuscar" ).autocomplete({
				source: data,
				response: function(event, ui) {
		            if (!ui.content.length) {
		                var noResult = { value:"",label:"No encontramos nada. ¿Vuelves a buscar?" };
		                ui.content.push(noResult);
		            } 
		        }
				
		    });
        }
    });

	//BUSCA LOS HOTELES DISPONIBLES DEL ESTADO SELECCIONADO
    $("#btnBuscar").on("click",function(){

    	if($("#pickerInicio").val() == "" || $("#pickerSalida").val() == ""){
	    	$.session.set("fechaInicio", fechaActual(0));
    		$.session.set("fechaSalida", fechaActual(1));
	    	$("#pickerInicio").val($.session.get("fechaInicio"));
	    	$("#pickerSalida").val($.session.get("fechaSalida"));
	    }
    	$.session.set("fechaInicio", $("#pickerInicio").val());
    	$.session.set("fechaSalida", $("#pickerSalida").val());

    	var cont=0;
    	
    	$.ajax({
	        type: "POST",
	        url: path+"inicio/buscarHoteles/",
	        data: { estado : $("#txtBuscar").val(), estrellas: $("#estrellas").val()},
	        cache: false,
	        dataType: "json",
	        success: function(data){ 
	      
	        	if(!$.isEmptyObject(data)){

	        		$(".room-grids").html("");
	        	
				    $.each(data, function(i,item){

				    	if(cont >= 3){
				    		$(".room-grids").append("<div class='clearfix'></div>");
				    		cont=0;
				    	}


				    	var estrellas = "";
				    	for (var i = 0; i < item.calificacion; i++) {
				    		estrellas += "<span class='glyphicon glyphicon-star'></span>";
				    	};

				    	var hotel = "<div class='col-md-4 room-sec'>"+
				    					"<a href='"+path+"habitaciones?id="+item.id_hotel+"'><img src='"+path+"app/views/images/hotels/"+item.estado+item.id_hotel+".jpg'></a>"+
										"<h4>"+item.nombre_hotel+"</h4>"+
										"<div class='form-inline'>"+estrellas+"</div>"+
										"<p >"+item.descripcion+"</p>"+
										"<div class='items'>"+
											"<li><a href='#'><span class='img1'></span></a></li>"+
											"<li><a href='#'><span class='img2'></span></a></li>"+
											"<li><a href='#'><span class='img3'></span></a></li>"+
											"<li><a href='#'><span class='img4'></span></a></li>"+
											"<li><a href='#'><span class='img5'></span></a></li>"+
											"<li><a href='#'><span class='img6'></span></a></li>"+
										"</div>"+
									"</div>";
						$(".room-grids").append(hotel).hide().show("normal");
						cont++;	
				    });

					$("#lugar").text("Hoteles en "+$("#txtBuscar").val()).hide().show("slow");
	        	}
	        }
	    });
	});


	$("#txtBuscar").val("colima");
	$("#btnBuscar").trigger("click");

    //OBTIENE LA FECHA ACTUAL
	function fechaActual(masDias){
		var d = new Date();
		var salida = ((d.getMonth()+1)<10 ? '0' : '') + (d.getMonth()+1) + '/' +
		    (d.getDate()<10 ? '0' : '') + (d.getDate()+masDias) + '/' +
		    d.getFullYear();
		return salida;
	}
});










	
	




