<?php
	class descripcion_controller extends appcontroller {

		public function __construct() {
			parent::__construct();
		}

		public function index($id = NULL) {
			$this->view->setLayout("inicio");
			$this->title_for_layout('Reservaciones');
			$this->view->hotel = $_GET["hotel"];
			$this->view->habitacion = $_GET["habitacion"];
			$this->view->agotada = $_GET["h"];
			$this->render();
		}

		public function infoHabitacion(){
			$habitaciones = new habitacione();
			echo json_encode($habitaciones->informacion($_POST["idHotel"], $_POST["idHabitacion"]));
		}
	}
?>