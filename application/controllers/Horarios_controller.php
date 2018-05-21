<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Horarios_controller extends CI_Controller {
	
	public function index()
	{
		$data['usuario'] = $this->session->userdata('usuario');
		$data['contrasena'] = $this->session->userdata('contrasena');

		$data['datos'] = $this->horarios_model->seleccionarHorarios();

		$this->load->view('include/header');
		$this->load->view('include/navbar',$data);
		$this->load->view('include/sidebar');
		$this->load->view('admin/horarios',$data);
		$this->load->view('include/footer');
	}


	// 	public function obtenerSede()
	// {
	// 		// combo dependiente a lo pro Jonathan Castro Style

	// 		$sede=$_POST["misede"];

	// 		$data=$this->horarios_Model->seleccionarPorSede($sede);


	// 		echo '<option>'.$data->sede.'</option>';
			


	// }



}
