<div class="contact-bg">
	 <div class="container">
	      <div class="contact-us">				
				<div class="contact-us_left">
					<div class="contact-us_info">
			    	 	<h3 class="style">Encuentranos aqui</h3>
			    	 		<div class="map">
					   			<script src='https://maps.googleapis.com/maps/api/js?v=3.exp'></script> 
								<div style='overflow:hidden;height:175px;width:100%;'>
									<div id='gmap_canvas' style='height:175px;width:100%;'></div>
									<style>#gmap_canvas img{max-width:none!important;background:none!important}</style>
								</div>
					   		</div>
      				</div>
      			 <div class="company_address">
				     	<h3 class="style">Información de la empresa</h3>
						<p>Av. Universidad 333,Las Víboras,28040 Colima, Col.</p>
						<p>Universidad de colima</p>
						<p>México</p>
				   		<p>Telefono: (54) 312 423 45 65</p>
				   		<p>Fax: (54) 463 11 21 1</p>
				 	 	<p>Email: <a href="mailto:info@example.com">TurkeyHotel@hotmail.com</a></p>
				   		<p>Siguenos: <a href="#">Facebook</a>, <a href="#">Twitter</a></p>
				   </div>
				</div>				
				<div class="contact_right">
				  <div class="contact-form">
				  	<h3 class="style">Contactanos</h3>
					    <form method="post" action="index.html">
					    	<div>
						    	<span><label>NOMBRE</label></span>
						    	<span><input name="userName" type="text" class="textbox"></span>
						    </div>
						    <div>
						    	<span><label>E-MAIL</label></span>
						    	<span><input name="userEmail" type="text" class="textbox"></span>
						    </div>
						    <div>
						     	<span><label>TELEFONO</label></span>
						    	<span><input name="userPhone" type="text" class="textbox"></span>
						    </div>
						    <div>
						    	<span><label>ASUNTO</label></span>
						    	<span><textarea name="userMsg"> </textarea></span>
						    </div>
						   <div>
						   		<input type="submit" value="Enviar">
						  </div>
					    </form>
				    </div>
  				</div>		
  				<div class="clear"></div>		
		  </div>
	 </div>	
</div>	 






<script type='text/javascript'>
function init_map(){
	var myOptions = {zoom:5,center:new google.maps.LatLng(19.123914285009885,-103.91172437509766),mapTypeId: google.maps.MapTypeId.ROADMAP};
	map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions);
	marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(19.123914285009885,-103.91172437509766)});
	infowindow = new google.maps.InfoWindow({content:'<strong>Ubicación</strong><br>Universidad de Colima Oficial, Las Víboras, Colima<br>'});
	google.maps.event.addListener(marker, 'click', function(){
		infowindow.open(map,marker);
	});
	infowindow.open(map,marker);
}
google.maps.event.addDomListener(window, 'load', init_map);
</script>