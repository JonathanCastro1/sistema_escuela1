<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Calificaciones_model extends CI_Model {
	
	public function agregarCalificaciones($alumno ,$nota ,$descripcion , $fecha ,$session ,$turno ,$sede)
	{		
		
		$sql = "INSERT INTO calificaciones VALUES
		       (null,
		        '$alumno',
		         '$nota',		         
		         '$descripcion',
		         '$fecha',
		         '$session',		         
		         '$turno',
		     	 '$sede')";

		$query = $this->db->query($sql);

		return $query;
	}

		public function estudiantesAprobados()
	{		
		
		$sql = "SELECT COUNT(alumno) AS totalaprobados FROM calificaciones WHERE nota > 9 ";
		

		$query = $this->db->query($sql);

		return $query->row();
	}

	


}