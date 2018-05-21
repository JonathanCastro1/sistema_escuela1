<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_controller extends CI_Controller {
	
	public function index()
	{
		$this->load->view('include/header');
		$this->load->view('admin/login');
		$this->load->view('include/footer');
	}


		public function iniciarSession()
	{
		$usuario = $this->input->post('usuario');
		$contrasena = $this->input->post('contrasena');


		$this->session->set_userdata('usuario',$usuario);
		$this->session->set_userdata('contrasena',$contrasena);
		$data['usuario'] = $this->session->userdata('usuario');
		$data['contrasena'] = $this->session->userdata('contrasena');

		// le paso los datos de los modelos al iniciar session
		$data['datos'] = $this->usuarios_model->totalUsuarios();
		$data['dato'] = $this->estudiantes_model->totalEstudiantes();
		$data['dat'] = $this->profesores_model->totalProfesores();

		// Validamos si existe el usuario y contraseña
		$existeUserPass=$this->login_model->login($usuario ,$contrasena);
			if ($existeUserPass)
			{
				$this->load->view('include/header');
				$this->load->view('include/navbar',$data);
				$this->load->view('include/sidebar');
				$this->load->view('admin/dashboard',$data);				
				$this->load->view('include/footer');

			} else {
				redirect(base_url());
			}
		}

		public function cerrarSession()	{       	
	
		$this->session->sess_destroy();

		redirect(base_url());
	}


		public function adminPass()
	{

		$data['usuario'] = $this->session->userdata('usuario');
		$data['contrasena'] = $this->session->userdata('contrasena');

		// $data['datos'] = $this->usuarios_model->seleccionarUsuarios();

		$this->load->view('include/header');
		$this->load->view('include/navbar',$data);
		$this->load->view('include/sidebar');		
		$this->load->view('admin/adminpass');
		$this->load->view('include/footer');
	}




		public function cambiarPass()	{       
				
		 	// mantego abierta los datos de la session
			$data['usuario'] = $this->session->userdata('usuario');
			$data['contrasena'] = $this->session->userdata('contrasena');	
			
 			// $data['datos'] = $this->login_model->cambiarPass();


				if (isset($_POST['submit'])) {
				
					$contrasenan = $this->input->post('contrasenan');
					$contrasenav = $this->input->post('contrasenav');							

				 $this->login_model->cambiarPass($contrasenav ,$contrasenan);
				// $this->load->view('usuarios/editar',$data);

				// redirect(base_url("index.php/dashboard_controller"));
							
				
				} 
				
				// $this->load->view('header/header');
				// $this->load->view('navbar/navbar_usuarios',$data);
				// $this->load->view('sidebar/sidebar');			
				// $this->load->view('usuarios/editar',$data);
				// $this->load->view('footer/footer');						

	}





}
