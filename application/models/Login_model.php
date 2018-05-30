<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {
	
	public function login($usuario ,$contrasena )
	{

		$sql = "SELECT usuario,contrasena from usuarios where usuario='$usuario' and
		contrasena='$contrasena'	
		";

		$query = $this->db->query($sql);

		return $query->row();
		
	}


		public function cambiarPass($contrasenav ,$contrasenan )
	{

		$sql = "UPDATE usuarios SET contrasena = '$contrasenan'
		       WHERE contrasena = '$contrasenav' ";

		$query = $this->db->query($sql);

		return $query;
		
	}

	public function subirImagen($imagen)
	{		
		
		$sql = "INSERT INTO imagen VALUES
		       (null,		       	
		        '$imagen' )";

		$query = $this->db->query($sql);

		return $query;
	}


		public function mostrarImagen()
	{		
		
		$sql = "SELECT ruta from imagen";

		$query = $this->db->query($sql);

		return $query->row();
	}






	


}
