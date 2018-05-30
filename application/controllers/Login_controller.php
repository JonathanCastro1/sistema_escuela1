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
		$data['tUsuarios'] = $this->usuarios_model->totalUsuarios();
		$data['tEstudiantes'] = $this->estudiantes_model->totalEstudiantes();
		$data['tProfesores'] = $this->profesores_model->totalProfesores();
		$data['tAprobados'] = $this->calificaciones_model->estudiantesAprobados();

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

		// $data['datos']=$this->login_model->mostrarImagen();


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

 			$this->form_validation->set_rules('contrasenan', 'Solo numeros', 'required','required|max_length[10]|numeric');

 			$this->form_validation->set_rules('contrasenav', 'Solo numeros', 'required','required|max_length[10]|numeric');         


       if ($this->form_validation->run() == FALSE){

       		redirect(base_url("login_controller/adminpass"));			

           }else{

				if (isset($_POST['submit'])) {
				
					$contrasenan = $this->input->post('contrasenan');
					$contrasenav = $this->input->post('contrasenav');							

				 $this->login_model->cambiarPass($contrasenav ,$contrasenan);
				// $this->load->view('usuarios/editar',$data);

				redirect(base_url("login_controller"));	
				
				} 
				
				// $this->load->view('header/header');
				// $this->load->view('navbar/navbar_usuarios',$data);
				// $this->load->view('sidebar/sidebar');			
				// $this->load->view('usuarios/editar',$data);
				// $this->load->view('footer/footer');						

	}

}


	 public function subirImagen()	{



        // $imagen = 'imagen';
        $config['upload_path'] = "./subidas/cargadas";
        // $config['file_name'] = "archivos";
        $config['allowed_types'] = "gif|jpg|jpeg|png";
        $config['max_size'] = "50000";
        $config['max_width'] = "2000";
        $config['max_height'] = "2000";

	$this->load->library('upload', $config);

        if (!$this->upload->do_upload('imagen')) {
            //*** ocurrio un error
            $data['uploadError'] = $this->upload->display_errors();
            echo $this->upload->display_errors();
            return;
        }

        // recibimos la informacion del archivo que subimos
        $file_info= $this->upload->data();

         $this->crearMiniatura($file_info['file_name']); 


        if (isset($_POST['submit'])) {

       		 // $titulo = $this->input->post('titulo');

       		 // guardamos el nombre de archivo el array file_name
        	 $imagen=$file_info['file_name'];        					

			 $this->login_model->subirImagen($imagen);

			 // $data['titulo'] = $titulo;
           	 // $data['imagen'] = $imagen;	

           	 // $this->load->view('admin/ver_usuarios',$data);
      		   

			redirect(base_url("usuarios_controller"));
					
                         	
            } 

	}


		 function crearMiniatura($filename){
        $config['image_library'] = 'gd2';
        $config['source_image'] = 'subidas/cargadas/'.$filename;
        $config['create_thumb'] = TRUE;
        $config['maintain_ratio'] = TRUE;
        $config['new_image']='subidas/miniaturas';
        $config['thumb_marker']='';//captura_thumb.png
        $config['width'] = 150;
        $config['height'] = 150;
        $this->load->library('image_lib', $config); 
        $this->image_lib->resize();
    }





}
