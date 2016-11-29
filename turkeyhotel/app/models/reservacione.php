<?php
	class reservacione extends models{

		public function nuevaReservacion($hues, $hot, $hab, $fi, $ff, $noches){
			
			$this->db->query("insert into reservaciones values('',".$hues.",".$hab.",".$hot.",STR_TO_DATE('".$fi."', '%m/%d/%Y'), STR_TO_DATE('".$ff."', '%m/%d/%Y'),".$noches.")");
		}

		public function buscarReserva($codigo, $nombre){
			$this->db->query("SET NAMES utf8");
			return $this->findAllBySql("select Ho.nombre_hotel, Ho.estado, Ha.tipo_h, Ha.precio, R.noches, R.fecha_inicio, R.fecha_salida, R.id_reserva, Hu.id_huesped from reservaciones R inner join habitaciones Ha on R.id_habitacion = Ha.id_habitacion inner join hoteles Ho on R.id_hotel = Ho.id_hotel inner join huespedes Hu on R.id_huesped = Hu.id_huesped where Hu.codigo_r='".$codigo."' and Hu.nombre_huesped = '".$nombre."'");
		}

		public function cancelarReserva($reserva, $huesped){
			$this->db->query("DELETE FROM reservaciones WHERE id_reserva = ".$reserva);
			$this->db->query("DELETE FROM huespedes WHERE id_huesped = ".$huesped);
		}
	}
?>