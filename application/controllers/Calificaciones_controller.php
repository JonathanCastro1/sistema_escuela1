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
		$this->load->view('admin/calificaciones');
		$this->load->view('include/footer');
	}

	 public function agregarCalificaciones()	{  



     // Establecemos las reglas de validacion
         $this->form_validation->set_rules('alumno', 'Ingrese un nombre', 'required|max_length[10]');
         $this->form_validation->set_rules('nota', 'Ingrese una nota', 'required|max_length[10]');       
         $this->form_validation->set_rules('descripcion', 'Ingrese una descripcion', 'required','required|max_length[30]');
         $this->form_validation->set_rules('fecha', 'Ingrese una fecha', 'required');
         $this->form_validation->set_rules('session', 'Seleccione session', 'required'); 
         $this->form_validation->set_rules('turno', 'Seleccione turno', 'required');
         $this->form_validation->set_rules('sede', 'Seleccione sede', 'required');   
      



       if ($this->form_validation->run() == FALSE){
		// nota cuando carga otra vista, se pierda la carga con ajax
			// $this->load->view('admin/calificaciones');

         redirect(base_url("calificaciones_controller"));

           }else{


           	if (isset($_POST['submit'])) {	

		    $alumno = $this->input->post('alumno');
			$nota = $this->input->post('nota');			
			$descripcion = $this->input->post('descripcion');
			$fecha = $this->input->post('fecha');
			$session = $this->input->post('session');
			$turno = $this->input->post('turno');
			$sede = $this->input->post('sede');			

			$this->calificaciones_model->agregarCalificaciones($alumno ,$nota ,$descripcion , $fecha,$session ,$turno ,$sede);

			redirect(base_url("dashboard_controller"));
					
                         	
            } 	
				

             

	}	               
                   
				
			

	}



		public function estudiantesAprobados()
	{
		
		$data['datos'] = $this->calificaciones_model->estudiantesAprobados();
		
		$this->load->view('admin/dashboard',$data);
		
	}




}
