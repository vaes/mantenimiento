<?php
	class habitacione extends models{

		public function buscarHabitaciones($hotel, $p1, $p2){
			$this->db->query("SET NAMES utf8");
			return  $this->findAllBySql("SELECT Ha.id_habitacion, Ha.tipo_h, Ha.capacidad, Ha.cantidad, Ha.precio, H.nombre_hotel, H.estado, H.nombre_hotel FROM hoteles H INNER JOIN habitaciones Ha ON  H.id_hotel = Ha.id_hotel WHERE Ha.id_hotel = ".$hotel." AND Ha.precio between ".$p1." and ".$p2." group by H.nombre_hotel, Ha.id_habitacion, Ha.capacidad, Ha.cantidad");
		}

		public function buscarHabReservadas($fInicio, $fFin, $id_hotel){	
			return  $this->findAllBySql("CALL disponibles('".$fInicio."','".$fFin."',".$id_hotel.");");
		}

		public function informacion($hotel, $habitacion){
			$this->db->query("SET NAMES utf8");
			return  $this->findAllBySql("SELECT Ha.id_habitacion, Ha.tipo_h, Ha.capacidad, Ha.cantidad, Ha.precio, H.nombre_hotel, H.estado, H.nombre_hotel, Ha.servicios, Ha.equipo FROM hoteles H INNER JOIN habitaciones Ha ON  H.id_hotel = Ha.id_hotel WHERE Ha.id_hotel = ".$hotel." AND Ha.id_habitacion = ".$habitacion." group by H.nombre_hotel, Ha.id_habitacion, Ha.capacidad, Ha.cantidad");
		}
	}
?>