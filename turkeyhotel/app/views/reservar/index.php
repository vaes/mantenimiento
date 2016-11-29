<br><br>

<div class="container">
<div class="row">
  <div class="col-md-5">
    <div class="well">
      <div class="row">
        <div class="col-md-12" align="center">
            <label for="" class="titulo"><h2 id="hotel"></h2><br></label>
            <div class="ser_img" id="foto"></div> 
            <label for="" class="titulo"><h3 id="hTipo"></h3></label> 
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">

            <br><label for="">Tu reserva incluye:</label><br>
            <label for="" class="servicio">- WiFi gratis</label><br>
            <label for="" class="servicio">- Parking gratis</label><br>
            
            <br><label for="">Entrada:</label><br>
            <label for="" class="servicio"><div id="inicio"></div> hasta las 15:00</label><br>
            <br><label for="">Salida:</label><br>
            <label for="" class="servicio"><div id="fin"></div> hasta las 13:00</label><br>

            <br><label for="" id="noches"></label><br>
            <label for="" class="servicio" id="precio"></label><br>

            <br><label for="">Condiciones de la reserva:</label><br>
          
            <ul>
              <li>
                <i class="nota">
                  Hasta 2 menores de 12 años se pueden alojar gratis utilizando las camas existentes.
                </i>
              </li>
              <li>
                <i class="nota">
                  si cancelas o modificas la reserva, el establecimiento cargará la estancia completa. Si cancelas o modificas la reserva fuera de plazo o no te presentas, el establecimiento cargará la estancia completa.
                </i>
              </li>
              <li>
                <i class="nota">
                  16% Impuesto no incluido. 3% Impuesto municipal no incluido. cargo por servicio no aplicable
                </i>
              </li>
            </ul>

       
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-7">
  <div class="well">
   <!--  <form action="">   -->
      <div class="row">
        <div class="form-group">           
          <div class="col-md-4">
            <label for="trato">Trato</label><br><br>
            <select name="" id="trato" class="form-control">
              <option value="Sr.">Sr.</option>
              <option value="Srta.">Srta.</option>
              <option value="Sra.">Sra.</option>
            </select>
          </div>
          <div class="col-md-8">
            <label for="nombre">Nombre</label><br><i class="nota">nombre del huésped que se hospedará en el hotel</i>
            <input type="text" name="nombre" id="nombre" class="form-control" value="" required="required">
          </div>
        </div>
      </div>
    
      <div class="row">
        <div class="form-group">
          <div class="col-md-12">
            <label for="apellido">Apellido</label>
            <input type="text" name="apellido" id="apellido" class="form-control" value="" required="required">
            <br>
            <label for="mail">E-mail</label>
            <input type="email" name="mail" id="mail" class="form-control" value="" required="required">

            <label for="cMail">Confirmar dirección de e-mail</label>
            <input type="email" name="cMail" id="cMail" class="form-control" value="" required="required">
            
            <br><label for="fumador">Preferencias</label><br>
            <i class="nota">Las preferencias en cuanto a fumar o no fumar no están garantizadas.</i>
            <div class="checkbox">
              <label>
                <input type="checkbox" id="fumador" value="si">
                Fumador
              </label>
            </div>
            <br>

            <label for="especial">Solicitudes especiales</label><br>
            <i class="nota">Las peticiones especiales no se pueden garantizar, pero el alojamiento hará todo lo posible por satisfacer tu petición.</i>
            <textarea name="especial" id="especial" class="form-control" rows="3"></textarea>
            
            <br><h2>Detalles del pago</h2><br>
            <label for="pNombre">Nombre</label>
            <input type="text" name="apellido" id="pNombre" class="form-control" value="" required="required">

            <br><label for="pApellido">Apellido</label>
            <input type="text" name="pApellido" id="apellido" class="form-control" value="" required="required"> 
            <br>
            <div class="row">
              <div class="col-md-6">
                <label for="tarjeta">Tipo de tarjeta</label>
                <select name="tarjeta" id="tarjeta" class="form-control" required="required">
                  <option value="AmericanExprex">AmericanExprex</option>
                  <option value="MasterCard">MasterCard</option>
                  <option value="Visa">Visa</option>
                </select>
              </div>
              <div class="col-md-6">
                <label for="codigoT">Cod. de seguridad</label>
                <input type="number" min="1" max="999" name="codigoT" id="codigoT" class="form-control" value="" required="required">
              </div>
            </div>
            <br>
            <div class="row">
              <div class="col-md-6">
                <label for="mes">Fecha de vencimiento</label><br><br>
                <label for="mes">Mes</label>
                <select name="mes" id="mes" class="form-control" required="required">
                  <option value="01">01</option>
                  <option value="02">02</option>
                  <option value="03">03</option>
                  <option value="04">04</option>
                  <option value="05">05</option>
                  <option value="06">06</option>
                  <option value="07">07</option>
                  <option value="08">08</option>
                  <option value="09">09</option>
                  <option value="10">10</option>
                  <option value="11">11</option>
                  <option value="12">12</option>
                </select>
              </div>
              <div class="col-md-6">
              <br><br>
                <label for="ano">Año</label>
                <select name="ano" id="ano" class="form-control" required="required">
                  <option value="2016">2016</option>
                  <option value="2017">2017</option>
                  <option value="2018">2018</option>
                  <option value="2019">2019</option>
                  <option value="2020">2020</option>
                  <option value="2021">2021</option>
                  <option value="2022">2022</option>
                  <option value="2023">2023</option>
                  <option value="2024">2024</option>
                  <option value="2025">2025</option>
                  <option value="2026">2026</option>
                  <option value="2027">2027</option>
                </select>
              </div>
            </div>
          </div>
        </div>
      </div><br>
      <div class="row">
        <div class="col-md-12" align="right">
          <input type="button" class="btn btn-primary" id="reservar" value="Reservar">
        </div>
      </div>
   <!--  </form> -->
     </div>
  </div>
</div>
  <br>
  <br>
  <br>
</div>

<div class="modal fade" id="myModal" role="dialog">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">TurkeyHotel - mensaje</h4>
      </div>
      <div class="modal-body">
        <p>Su reservación se completo con Éxito. Se han enviado los datos ha su correo.</p>
      </div>
      <div class="modal-footer">
        <button type="button" id="ok" class="btn btn-default" data-dismiss="modal">Ok</button>
      </div>
    </div>
  </div>
</div>

   