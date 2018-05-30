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

		public function mostrarProfesoresExcel()
	{

		$sql = "SELECT id,nombre,apellido,email,session,turno,sede
		 from profesores";

		$query = $this->db->query($sql);

		return $query->result_array();
		
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

	public function verProfesores($nombre)
	{		
		
		
		$sql = "SELECT imagen.ruta,
				profesores.nombre,
				profesores.apellido,
				profesores.email,
				session.session,
				sede.sede,
				turno.turno
				from profesores  INNER JOIN imagen on profesores.id= imagen.id
				INNER JOIN session on profesores.id= session.id
				INNER JOIN sede on profesores.id= sede.id
				INNER JOIN turno on profesores.id= turno.id
				where profesores.nombre = '$nombre' ";

		$query = $this->db->query($sql);

		return $query->row();
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