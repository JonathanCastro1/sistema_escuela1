<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Estudiantes_controller extends CI_Controller {
	
	public function index()
	{
		$data['usuario'] = $this->session->userdata('usuario');
		$data['contrasena'] = $this->session->userdata('contrasena');         

		$data['datos'] = $this->estudiantes_model->seleccionarEstudiantes();      

		$this->load->view('include/header');
		$this->load->view('include/navbar',$data);
		$this->load->view('include/sidebar');
		$this->load->view('admin/estudiantes',$data);
		$this->load->view('include/footer');
	}


	 public function agregarEstudiantes()	{ 



     // Establecemos las reglas de validacion
         $this->form_validation->set_rules('nombre', 'Ingrese un nombre', 'required|max_length[10]');
         $this->form_validation->set_rules('apellido', 'Ingrese un apellido', 'required|max_length[10]');       
         $this->form_validation->set_rules('email', 'Ingrese un email valido', 'required','required|max_length[10]');
         $this->form_validation->set_rules('session', 'Seleccione session', 'required'); 
         $this->form_validation->set_rules('turno', 'Seleccione turno');
         $this->form_validation->set_rules('sede', 'Seleccione sede');   
      



       if ($this->form_validation->run() == FALSE){

        // me quedo en esta vista, si no esta validado
                // $data['usuario'] = $this->session->userdata('usuario');
                // $data['contrasena'] = $this->session->userdata('contrasena');

                // $data['datos'] = $this->estudiantes_model->seleccionarEstudiantes();

                // $this->load->view('include/header');
                // $this->load->view('include/navbar',$data);
                // $this->load->view('include/sidebar');
                // $this->load->view('admin/estudiantes',$data);
                // $this->load->view('include/footer');

         redirect(base_url("estudiantes_controller"));

           }else{

             if (isset($_POST['submit'])) {  

                 $nombre = $this->input->post('nombre');
                 $apellido = $this->input->post('apellido');     
                 $email = $this->input->post('email');
                 $session = $this->input->post('session');
                 $turno = $this->input->post('turno');
                 $sede = $this->input->post('sede');     

     $this->estudiantes_model->agregarEstudiantes($nombre ,$apellido ,$email ,$session ,$turno ,$sede);

     redirect(base_url("dashboard_controller"));   
                          
            }       
             

	}	

	}


     // obtengo el parametro id
        public function editar($id) {       
                
            // mantego abierta los datos de la session
            $data['usuario'] = $this->session->userdata('usuario');
            // $data['contrasena'] = $this->session->userdata('contrasena');   
            
            $data['datos'] = $this->estudiantes_model->estudiantesPorId($id);


                if (isset($_POST['submit'])) {
                            $nombre = $this->input->post('nombre');
                            $apellido = $this->input->post('apellido');
                            $email = $this->input->post('email');
                            $session = $this->input->post('session');
                            $turno = $this->input->post('turno');
                            $sede = $this->input->post('sede');

                $data['datos']= $this->estudiantes_model->editarEstudiantes($nombre ,$apellido ,$email ,$session ,$turno ,$sede , $id);
                $this->load->view('admin/editar_estudiantes',$data);

                redirect(base_url("estudiantes_controller"));
                            
                
                } 
                
                $this->load->view('include/header');
                $this->load->view('include/navbar',$data);
                $this->load->view('include/sidebar');           
                $this->load->view('admin/editar_estudiantes',$data);
                $this->load->view('include/footer');                     

    }



        public function eliminar($id)   {
       

            $this->estudiantes_model->eliminarEstudiantes($id);

            redirect(base_url("estudiantes_controller"));   
                

    }


     public function ver($nombre)   {
       

        $data['usuario'] = $this->session->userdata('usuario');
        $data['contrasena'] = $this->session->userdata('contrasena');

        // $data['datos'] = $this->usuarios_model->seleccionarUsuarios();

        $data['datos']=$this->estudiantes_model->verEstudiantes($nombre);



        $this->load->view('include/header');
        $this->load->view('include/navbar',$data);
        $this->load->view('include/sidebar');       
        $this->load->view('admin/ver_estudiantes',$data);
        $this->load->view('include/footer');  
                

    }


		public function totalEstudiantes()
	{
		
		$data['dato'] = $this->estudiantes_model->totalEstudiantes();
		
		$this->load->view('admin/dashboard',$data);
		
	}

	public function reporteEPdf()	{       	
	
	 $data = $this->estudiantes_model->seleccionarEstudiantes();
	

	 $totalE = $this->estudiantes_model->totalEstudiantes();  

	 // Creacion del PDF
 
    /*
     * Se crea un objeto de la clase Pdf, recuerda que la clase Pdf
     * heredó todos las variables y métodos de fpdf
     */

	 $this->pdf = new fpdf();
    // Agregamos una página
    $this->pdf->AddPage();
    // Define el alias para el número de página que se imprimirá en el pie
    $this->pdf->AliasNbPages();
 
    /* Se define el titulo, márgenes izquierdo, derecho y
     * el color de relleno predeterminado
     */
    $this->pdf->SetTitle("Reporte Estudiantes SchoolCastro 2.0");
    $this->pdf->SetLeftMargin(15);
    $this->pdf->SetRightMargin(15);
    $this->pdf->SetFillColor(200,200,200);
 
    // Se define el formato de fuente: Arial, negritas, tamaño 9
    $this->pdf->SetFont('Arial', 'B', 9);
    /*
     * TITULOS DE COLUMNAS
     *
     * $this->pdf->Cell(Ancho, Alto,texto,borde,posición,alineación,relleno);
     */
 
    $this->pdf->Cell(20,5,'ID','TBL',0,'L','1');
    $this->pdf->Cell(20,5,'Nombre','TB',0,'L','1');
    $this->pdf->Cell(20,5,'Apellido','TB',0,'L','1');
    $this->pdf->Cell(20,5,'Session','TB',0,'L','1');
    $this->pdf->Cell(20,5,'Turno','TB',0,'L','1');
    $this->pdf->Cell(30,5,'Sede','TB',0,'L','1');      
    $this->pdf->Ln(7);
    // La variable $x se utiliza para mostrar un número consecutivo
    // $x = 1;
    foreach ($data as $datos) {
      // se imprime el numero actual y despues se incrementa el valor de $x en uno
      // $this->pdf->Cell(15,5,$x++,'BL',0,'C',0);
      // Se imprimen los datos de cada alumno
      $this->pdf->Cell(20,5,$datos->id,'B',0,'L',0);
      $this->pdf->Cell(20,5,$datos->nombre,'B',0,'L',0);
      $this->pdf->Cell(20,5,$datos->apellido,'B',0,'L',0);
      $this->pdf->Cell(20,5,$datos->session,'B',0,'L',0);
      $this->pdf->Cell(20,5,$datos->turno,'B',0,'L',0);
      $this->pdf->Cell(30,5,$datos->sede,'B',0,'L',0);
     
      //Se agrega un salto de linea
      $this->pdf->Ln(5);
    }

    $this->pdf->Cell(30,5,'Total Fecha:','TB',0,'L','1');
 	$this->pdf->Cell(30,5, date("d-m-y"),'B',0,'L',0);
 	$this->pdf->Ln(5);
 	$this->pdf->Cell(30,5,'Total Estudiantes:','TB',0,'L','1');
 	$this->pdf->Cell(30,5, $totalE->totalestudiantes,'B',0,'L',0);
  
    /*
     * Se manda el pdf al navegador
     *
     * $this->pdf->Output(nombredelarchivo, destino);
     *
     * I = Muestra el pdf en el navegador
     * D = Envia el pdf para descarga
     *
     */
    $this->pdf->Output("Reporte estudiantes SchoolCastro 2.0.pdf", 'D');
		
	}


        public function reporteEExcel()
    {

        $data = $this->estudiantes_model->mostrarEstudiantesExcel();
       
       //load our new PHPExcel library
        $this->load->library('phpexcel');
        //activate worksheet number 1
        $this->phpexcel->setActiveSheetIndex(0);

         //name the worksheet
        $this->phpexcel->getActiveSheet()->setTitle('Reporte Estudiantes');

    // mostramos la data del modelo biene en forma de array, con result_array

    $this->phpexcel->getActiveSheet()->fromArray($data);



 
    $filename='Reporte estudiantes.xls'; //save our workbook as this file name
    header('Content-Type: application/vnd.ms-excel'); //mime type
    header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
    header('Cache-Control: max-age=0'); //no cache
                
    //save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
    //if you want to save it as .XLSX Excel 2007 format
    $objWriter = PHPExcel_IOFactory::createWriter($this->phpexcel, 'Excel5');  
    //force user to download the Excel file without writing it to server's HD
    $objWriter->save('php://output');
       
        
    }
 



}
