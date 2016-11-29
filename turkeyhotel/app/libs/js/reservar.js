$(function(){

	function getUrlVars() {
		var vars = {};
		var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value) {
		vars[key] = value;
		});
		return vars;
	}

	//TRAE LOS DATOS DE LA HABITACION A RESERVAR Y LOS MUESTRA
	$.ajax({
	    type: "POST",
	    url: path+"reservar/infoHabitacion/",
	    data: { idHotel : getUrlVars()["hotel"], idHabitacion: getUrlVars()["habitacion"]},
	    cache: false,
	    dataType: "json",
	    success: function(data){ 
		    $.each(data, function(i,item){
		    	$("#precio").append("MXN "+conComas(noches()*item.precio));
		    	$("#hotel").append(item.nombre_hotel);
		    	$("#hTipo").append("Habitación "+item.tipo_h.substr(4,item.lenght));
		    	$("#foto").append("<img src='"+path+"app/views/images/rooms/"+item.estado+"/"+item.nombre_hotel+"/"+item.tipo_h+"/default.jpg'>")
		    });	
	    }
	});

	$("#inicio").append($.session.get("fechaInicio"));
	$("#fin").append($.session.get("fechaSalida"));
	$("#noches").append("Precio para "+noches()+" noches:");
	
	//REALIZA LA RESERVACION
	$("#reservar").click(function(){
		var nom = $("#nombre").val();
		var ape = $("#apellido").val();
		var mail = $("#mail").val();
		var esp = $("#especial").val();
		var hot = getUrlVars()["hotel"];
		var hab = getUrlVars()["habitacion"];
		var fi = $.session.get("fechaInicio");
		var ff = $.session.get("fechaSalida");
		var cod = password(7).toUpperCase();

		$.ajax({
		    type: "POST",
		    url: path+"reservar/nuevaReserva/",
		    data: { nom : nom, ape: ape, mail: mail, esp: esp, cod: cod, hot: hot, hab: hab, fi: fi, ff: ff, noches: noches()},
		    cache: false,
		    success: function(data){ 
				$.post(path+"reservar/eviarEmail/", { nom: nom, ape: ape, cod: cod, mail: mail } , function(data){
					if(data == "Exito"){
						$("#myModal").modal("show");
					}
				});
		    }
		});
	});

	$("#ok").click(function(){
		window.location.replace(path+"inicio");
	});

	//CALCULA LAS NOCHES ENTRE LAS 2 FECHAS
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

	//CREA UNA CONTRASEÑA PARA TEMPORAL
	function password(length, special) {
		var iteration = 0;
		var password = "";
		var randomNumber;

		if(special == undefined){
		  var special = false;
		}
		while(iteration < length){
			randomNumber = (Math.floor((Math.random() * 100)) % 94) + 33;
			if(!special){
				if ((randomNumber >=33) && (randomNumber <=47)) { continue; }
				if ((randomNumber >=58) && (randomNumber <=64)) { continue; }
				if ((randomNumber >=91) && (randomNumber <=96)) { continue; }
				if ((randomNumber >=123) && (randomNumber <=126)) { continue; }
		}
		iteration++;
		password += String.fromCharCode(randomNumber);
		}
		return password;
	}
	
});