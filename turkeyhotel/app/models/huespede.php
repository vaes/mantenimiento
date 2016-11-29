<?php
	class huespede extends models{

		public function nuevoHuesped($nom, $mail, $esp, $cod){
			$this->db->query("INSERT INTO huespedes VALUES ('','".$nom."','".$mail."','".$esp."','".$cod."')");
		}

		public function getHuesped(){
			return $this->findBySql("SELECT MAX(id_huesped) as id from huespedes")["id"];
		}
	}
?>