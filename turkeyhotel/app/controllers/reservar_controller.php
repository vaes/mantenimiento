<?php
	class reservar_controller extends appcontroller {

		public function __construct() {
			parent::__construct();
		}

		public function index($id = NULL) {
			$this->view->setLayout("inicio");
			$this->title_for_layout('Reservacion');
			$this->render();
		}

		public function infoHabitacion(){
			$habitaciones = new habitacione();
			echo json_encode($habitaciones->informacion($_POST["idHotel"], $_POST["idHabitacion"]));
		}

		public function nuevaReserva(){
			$huesped = new huespede();
			$reserva = new reservacione();

			$nom = $_POST["nom"]." ".$_POST["ape"];
			$hot = $_POST["hot"];
			$hab = $_POST["hab"];
			$fi = $_POST["fi"];
			$ff = $_POST["ff"];
			$noches = $_POST["noches"];

			$huesped->nuevoHuesped($nom,$_POST["mail"],$_POST["esp"],$_POST["cod"]);
			$reserva->nuevaReservacion($huesped->getHuesped(),$hot,$hab,$fi,$ff,$noches);
		}

		public function eviarEmail(){
			$nom = $_POST["nom"]." ".$_POST["ape"];
			$cod = $_POST["cod"];
			$email = $_POST["mail"];
			$mensaje = "Reservando a nombre de: <strong>".$nom."</strong><br>Codigo de cancelacion: <strong>".$cod."</strong>";

			$mail = new PHPMailer(); 
			$mail->IsSMTP(); 
			$mail->SMTPDebug = 0;  
			$mail->SMTPAuth = true; 
			$mail->SMTPSecure = 'ssl'; 
			$mail->Host = 'smtp.gmail.com';
			$mail->Port = 465; 
			$mail->Username = "turkeyhote@gmail.com";  
			$mail->Password = "zxasdqwer";           
			$mail->SetFrom("vaes706@gmail.com", "TurkeyHotel");
			$mail->Subject = "Datos de la reserva";
			$mail->Body = $mensaje;
			$mail->AddAddress($email);
			$mail->IsHTML(true);

			if ($mail->Send())
			    echo "Exito";
			else
			    echo "Fallo";
		}
	}
?>