<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profesores_model extends CI_Model {
	
	public function seleccionarProfesores()
	{

		$sql = "SELECT id,nombre,apellido,email,session,turno,sede
		 from profesores";

		$query = $this->db->query($sql);

		return $query->result();
		
	}

	public function agregarProfesores($nombre ,$apellido ,$email ,$session ,$turno ,$sede)
	{		
		
		$sql = "INSERT INTO profesores VALUES
		       (null,
		        '$nombre',
		         '$apellido',		         
		         '$email',
		         '$session',		         
		         '$turno',
		   	 	 '$sede' )";

		$query = $this->db->query($sql);

		return $query;
	}

		public function totalProfesores()
	{		
		
		$sql = "SELECT COUNT(nombre) AS totalprofesores FROM profesores";
		

		$query = $this->db->query($sql);

		return $query->row();
	}




	


}