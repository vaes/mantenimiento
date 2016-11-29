$(function(){

	function getUrlVars() {
		var vars = {};
		var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value) {
		vars[key] = value;
		});
		return vars;
	}

	$.ajax({
	    type: "POST",
	    url: path+"descripcion/infoHabitacion/",
	    data: { idHotel : getUrlVars()["hotel"], idHabitacion: getUrlVars()["habitacion"]},
	    cache: false,
	    dataType: "json",
	    success: function(data){ 
		    $.each(data, function(i,item){

		    	$(".lead > strong").append("Habitación"+item.tipo_h.substr(4,item.lenght));
		    	$("#descripcion > p").append(item.servicios);
		    	$("#descripcion > p").append("<br><br><strong>Equipamiento de la habitación:</strong><br>"+item.equipo);
		    	$("#descripcion > p").append("<br><br>Precio para "+noches()+" noches:<br> <div style='color: green;'>MXN "+conComas(item.precio*noches())+"</div>");
	           	$("#img1").append("<img src='"+path+"app/views/images/rooms/"+item.estado+"/"+item.nombre_hotel+"/"+item.tipo_h+"/fotos/1.jpg'>");			
		    	$("#img2").append("<img src='"+path+"app/views/images/rooms/"+item.estado+"/"+item.nombre_hotel+"/"+item.tipo_h+"/fotos/2.jpg'>");
		    	$("#img3").append("<img src='"+path+"app/views/images/rooms/"+item.estado+"/"+item.nombre_hotel+"/"+item.tipo_h+"/fotos/3.jpg'>");
		    });	
	    }
	});

	//FUNCION QUE CALCULA EL NUMERO DE NOCHES QUE HAY ENTRE EL RANGO DE FECHAS
	function noches()
	{
		var aFecha1 = $.session.get("fechaInicio").split('/'); 
		var aFecha2 = $.session.get("fechaSalida").split('/'); 
		var fFecha1 = Date.UTC(aFecha1[2],aFecha1[0]-1,aFecha1[1]); 
		var fFecha2 = Date.UTC(aFecha2[2],aFecha2[0]-1,aFecha2[1]); 
		var dif = fFecha2 - fFecha1;
		var dias = Math.floor(dif / (1000 * 60 * 60 * 24)); 
		return dias;
	}

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

	//BOTON PARA RESERVAR
	$("#btnReservar").click(function(){
		var ho = getUrlVars()["hotel"];
		var ha = getUrlVars()["habitacion"];
		window.location.replace(path+"reservar?hotel="+ho+"&habitacion="+ha);
	});
});


















