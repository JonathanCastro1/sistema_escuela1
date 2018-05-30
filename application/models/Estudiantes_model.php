<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Estudiantes_model extends CI_Model {
	
	public function seleccionarEstudiantes()
	{

		$sql = "SELECT id,nombre,apellido,email,session,turno,sede
		 from estudiantes";

		$query = $this->db->query($sql);

		return $query->result();
		
	}

		public function mostrarEstudiantesExcel()
	{

		$sql = "SELECT id,nombre,apellido,email,session,turno,sede
		 from estudiantes";

		$query = $this->db->query($sql);

		return $query->result_array();
		
	}

	public function agregarEstudiantes($nombre ,$apellido ,$email ,$session ,$turno ,$sede)
	{		
		
		$sql = "INSERT INTO estudiantes VALUES
		       (null,
		        '$nombre',
		         '$apellido',		         
		         '$email',
		         '$session',		         
		         '$turno',
		     	 '$sede')";

		$query = $this->db->query($sql);

		return $query;
	}

	public function editarEstudiantes($nombre ,$apellido ,$email ,$session ,$turno ,$sede ,$id)
	{			
				
		$sql = "UPDATE estudiantes SET nombre = '$nombre',
				apellido = '$apellido',				
				email = '$email',
				session = '$session',
				turno = '$turno',
				sede = '$sede'
		       WHERE id = $id";

		$query = $this->db->query($sql);    	
		
		 return $query;
	}


	public function estudiantesPorId($id)
	{
		
		$sql = "SELECT id,nombre,apellido,email,session,turno,sede from estudiantes where id= $id";

		$query = $this->db->query($sql);

		return $query->row();
	}


		public function eliminarEstudiantes($id)
	{			
				
		$sql = "DELETE from estudiantes where id='$id'";

		$query = $this->db->query($sql);    	
		
		 return $query;
	}

		public function verEstudiantes($nombre)
	{		
		
		
		$sql = "SELECT imagen.ruta,
				estudiantes.nombre,
				estudiantes.apellido,
				estudiantes.email,
				session.session,
				sede.sede,
				turno.turno
				from estudiantes  INNER JOIN imagen on estudiantes.id= imagen.id
				INNER JOIN session on estudiantes.id= session.id
				INNER JOIN sede on estudiantes.id= sede.id
				INNER JOIN turno on estudiantes.id= turno.id
				where estudiantes.nombre = '$nombre' ";

		$query = $this->db->query($sql);

		return $query->row();
	}


		public function totalEstudiantes()
	{		
		
		$sql = "SELECT COUNT(nombre) AS totalestudiantes FROM estudiantes";
		

		$query = $this->db->query($sql);

		return $query->row();
	}



	


}