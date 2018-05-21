<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cargar_model extends CI_Model {
	

	public function cargarSessiones()
	{

		$sql = "SELECT session from session";

		$query = $this->db->query($sql);

		return $query->result();
		
	}

		public function cargarTurnos()
	{

		$sql = "SELECT turno from turno";

		$query = $this->db->query($sql);

		return $query->result();
		
	}


		public function cargarSedes()
	{

		$sql = "SELECT sede from sede";

		$query = $this->db->query($sql);

		return $query->result();
		
	}




	


}