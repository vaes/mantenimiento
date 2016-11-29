<?php
	class habitaciones_controller extends appcontroller {

		public function __construct() {
			parent::__construct();
		}

		public function index($id = NULL) {
			$this->view->setLayout("inicio");
			$this->title_for_layout('Habitaciones');
			$this->render();
		}

		public function getHabitaciones(){
			$habitaciones = new habitacione();
			echo json_encode($habitaciones->buscarHabitaciones($_POST["id"], $_POST["p1"], $_POST["p2"]));
		}

		public function getHabReservadas(){

			$habitaciones = new habitacione();

			$inicio = $_POST["inicio"];
			$fin = $_POST["fin"];
			$hotel = $_POST["hotel"];

			echo json_encode($habitaciones->buscarHabReservadas($inicio, $fin, $hotel));
		}
	}
?>