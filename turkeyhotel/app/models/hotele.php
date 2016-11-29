<?php
	class hotele extends models{

		public function buscarHoteles($estado, $estrellas){
			$this->db->query("SET NAMES utf8");
			if($estrellas == 0)
				return  $this->findAllBySql("SELECT * FROM hoteles WHERE estado='".$estado."'");
			else
				return $this->findAllBySql("SELECT * FROM hoteles WHERE estado='".$estado."' AND calificacion=".$estrellas."");
		}

		public function buscarEstados(){
			$this->db->query("SET NAMES utf8");
			foreach ($this->findAllBySql("SELECT DISTINCT estado FROM hoteles") as $key => $value) {
				$estados[] = $value["estado"];
			}

			return $estados;
		}
	}
?>