<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Horarios_model extends CI_Model {
	

public function seleccionarHorarios()
	{

		$sql = "SELECT id,hora,profesor,materia,session,turno,sede
		 from horarios";

		$query = $this->db->query($sql);

		return $query->result();
		
	}


	public function seleccionarPorSede($sede)
	{

		$sql = "SELECT id,hora,profesor,materia,session,turno,sede
		 from horarios where sede='$sede'    ";

		$query = $this->db->query($sql);

		return $query->row();
		
	}


	


}