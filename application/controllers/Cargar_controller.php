<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cargar_controller extends CI_Controller {
	
	// public function index()
	// {
	// 	$data['usuario'] = $this->session->userdata('usuario');
	// 	$data['contrasena'] = $this->session->userdata('contrasena');

	// 	$data['datos'] = $this->horarios_model->seleccionarHorarios();

	// 	$this->load->view('include/header');
	// 	$this->load->view('include/navbar',$data);
	// 	$this->load->view('include/sidebar');
	// 	$this->load->view('admin/horarios',$data);
	// 	$this->load->view('include/footer');
	// }


		public function cargarSessiones()
	{
		

		$data = $this->cargar_model->cargarSessiones();

		print_r(json_encode($data));

		
		// una forma de cargar select
		// echo '<option>Session</option>';

		// foreach ($data as $datos) {
			

		// 	echo '<option>'.$datos->session.'</option>';
		// }

			


	}

		public function cargarTurnos()
	{
		
		$data = $this->cargar_model->cargarTurnos();

		print_r(json_encode($data));


	// 	echo '<option>Turno</option>';

	// 	foreach ($data as $datos) {
			

	// 		echo '<option>'.$datos->turno.'</option>';
	// 	}

	}


		public function cargarSedes()
	{
		
		$data = $this->cargar_model->cargarSedes();

		print_r(json_encode($data));

		// echo '<option>Sede</option>';

		// foreach ($data as $datos) {
			

		// 	echo '<option>'.$datos->sede.'</option>';
		// }

			


	}

			


	}




