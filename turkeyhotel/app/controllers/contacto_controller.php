<?php
	class contacto_controller extends appcontroller {

		public function __construct() {
			parent::__construct();
		}

		public function index($id = NULL) {
			$this->view->setLayout("inicio");
			$this->title_for_layout('Contacto');
			$this->render();
		}
	}
?>