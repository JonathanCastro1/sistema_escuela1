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


	public function editarProfesores($nombre ,$apellido ,$email ,$session ,$turno ,$sede ,$id)
	{			
				
		$sql = "UPDATE profesores SET nombre = '$nombre',
				apellido = '$apellido',				
				email = '$email',
				session = '$session',
				turno = '$turno',
				sede = '$sede'
		       WHERE id = $id";

		$query = $this->db->query($sql);    	
		
		 return $query;
	}


	public function profesoresPorId($id)
	{
		
		$sql = "SELECT id,nombre,apellido,email,session,turno,sede from profesores where id= $id";

		$query = $this->db->query($sql);

		return $query->row();
	}


		public function eliminarProfesores($id)
	{			
				
		$sql = "DELETE from profesores where id='$id'";

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
