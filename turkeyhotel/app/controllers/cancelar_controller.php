<?php
	class cancelar_controller extends appcontroller {

		public function __construct() {
			parent::__construct();
		}

		public function index($id = NULL) {
			$this->view->setLayout("inicio");
			$this->title_for_layout('Cancelaciones');
			$this->render();
		}

		public function buscarReservacion(){
			$reserva = new reservacione();
			echo json_encode($reserva->buscarReserva($_POST["codigo"], $_POST["nombre"]));
		}

		public function cancelarReservacion(){
			$reserva = new reservacione();
			$reserva->cancelarReserva($_POST["reserva"], $_POST["huesped"]);
		}
	}
?>