<?php
	class inicio_controller extends appcontroller {

		public function __construct() {
			parent::__construct();
		}

		public function index($id = NULL) {
			$this->view->setLayout("inicio");
			$this->title_for_layout('Inicio');
			$this->render();
		}

		public function getEstados($id = NULL){
			$hoteles = new hotele();
			echo json_encode($hoteles->buscarEstados());
		}

		public function buscarHoteles($id = NULL){

			$hoteles = new hotele();
			echo json_encode($hoteles->buscarHoteles($_POST["estado"], $_POST["estrellas"]));

		}
	}
?>