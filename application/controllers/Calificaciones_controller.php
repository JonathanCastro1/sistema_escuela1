<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Calificaciones_controller extends CI_Controller {
	
	public function index()
	{
		$data['usuario'] = $this->session->userdata('usuario');
		$data['contrasena'] = $this->session->userdata('contrasena');

		// $data['datos'] = $this->usuarios_model->seleccionarUsuarios();



		$this->load->view('include/header');
		$this->load->view('include/navbar',$data);
		$this->load->view('include/sidebar');
		$this->load->view('admin/calificaciones',$data);
		$this->load->view('include/footer');
	}




}
