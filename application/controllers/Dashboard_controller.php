<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_controller extends CI_Controller {
	
	public function index()
	{
		$data['usuario'] = $this->session->userdata('usuario');
		$data['contrasena'] = $this->session->userdata('contrasena');

		$data['datos'] = $this->usuarios_model->totalUsuarios();
		$data['dato'] = $this->estudiantes_model->totalEstudiantes();
		$data['dat'] = $this->profesores_model->totalProfesores();
		

		$this->load->view('include/header');
		$this->load->view('include/navbar',$data);
		$this->load->view('include/sidebar');
		$this->load->view('admin/dashboard');
		$this->load->view('include/footer',$data);
	}



}
