<div class="main">
	<div class="row">
		<div class="col-md-4">
			<h2 class="lead"><strong></strong></h2>
			<div cass="row">
				<div class="col-md-12 text-justify" id="descripcion"><p></p></div>
			</div>
			
			<div class="row">
				<div class="col-md-12" align="right">
					<?php if($agotada != "a"){ ?>
						<button type="button" class="btn btn-primary btn-md" id="btnReservar">Reservar</button>
					<?php } else{?>
						<p style="color: red;"">Habitación agotada</p>
					<?php } ?>
				</div>
			</div>
		</div>
		<div class="col-md-8">
			<div id="myCarousel" class="carousel slide" data-ride="carousel">
			  
				<ol class="carousel-indicators">
					<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
					<li data-target="#myCarousel" data-slide-to="1"></li>
					<li data-target="#myCarousel" data-slide-to="2"></li>
				</ol>

				<div class="carousel-inner" role="listbox" align="center">
					<div class="item active" id="img1">
					</div>
					<div class="item" id="img2">
					</div>
					<div class="item" id="img3">
					</div>
				</div>

				<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
					<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
					<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a>
			</div> 
		</div>
	</div>
</div>

