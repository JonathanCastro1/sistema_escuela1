<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Calificaciones_controller extends CI_Controller {
	
	public function index()
	{
		$data['usuario'] = $this->session->userdata('usuario');
		// $data['contrasena'] = $this->session->userdata('contrasena');

		// $data['datos'] = $this->calificaciones_model->seleccionar();



		$this->load->view('include/header');
		$this->load->view('include/navbar',$data);
		$this->load->view('include/sidebar');
		$this->load->view('admin/calificaciones',$data);
		$this->load->view('include/footer');
	}

	 public function agregarCalificaciones()	{                 
                   
				
			if (isset($_POST['submit'])) {	

		    $alumno = $this->input->post('alumno');
			$nota = $this->input->post('nota');			
			$descripcion = $this->input->post('descripcion');
			$fecha = $this->input->post('fecha');
			$session = $this->input->post('session');
			$turno = $this->input->post('turno');
			$sede = $this->input->post('sede');			

			$this->calificaciones_model->agregarCalificaciones($alumno ,$nota ,$descripcion , $fecha,$session ,$turno ,$sede);

			redirect(base_url("index.php/calificaciones_controller"));
					
                         	
            } else {			

			redirect(base_url("index.php/dashboard_controller"));
		}		

	}



		public function estudiantesAprobados()
	{
		
		$data['datos'] = $this->calificaciones_model->estudiantesAprobados();
		
		$this->load->view('admin/dashboard',$data);
		
	}




}
