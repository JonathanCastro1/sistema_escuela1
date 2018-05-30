<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios_controller extends CI_Controller {
	
	public function index()
	{
		$data['usuario'] = $this->session->userdata('usuario');
		$data['contrasena'] = $this->session->userdata('contrasena');

		$data['datos'] = $this->usuarios_model->seleccionarUsuarios();



		$this->load->view('include/header');
		$this->load->view('include/navbar',$data);
		$this->load->view('include/sidebar');
		$this->load->view('admin/usuarios',$data);
		$this->load->view('include/footer');
	}

	  public function agregarUsuarios()	{


     // Establecemos las reglas de validacion
         $this->form_validation->set_rules('nombre', 'Ingrese un nombre', 'required|max_length[10]');
         $this->form_validation->set_rules('apellido', 'Ingrese un apellido', 'required|max_length[10]');
         $this->form_validation->set_rules('nacimiento', 'Seleccione una fecha', 'required');
         $this->form_validation->set_rules('email', 'Ingrese un email valido', 'required','required|max_length[10]');
         $this->form_validation->set_rules('telefono', 'Solo numeros', 'required' ,'required|max_length[10]');       
         $this->form_validation->set_rules('usuario', 'Ingrese un usuario', 'required|max_length[10]');
         $this->form_validation->set_rules('contrasena', 'Ingrese una contraseña', 'required|max_length[10]|numeric');


       if ($this->form_validation->run() == FALSE){

        // me quedo en esta vista, si no esta validado
                $data['usuario'] = $this->session->userdata('usuario');
                $data['contrasena'] = $this->session->userdata('contrasena');

                $data['datos'] = $this->usuarios_model->seleccionarUsuarios();

                $this->load->view('include/header');
                $this->load->view('include/navbar',$data);
                $this->load->view('include/sidebar');
                $this->load->view('admin/usuarios',$data);
                $this->load->view('include/footer');

           }else{
                       
          if (isset($_POST['submit'])) {  

      $nombre = $this->input->post('nombre');
      $apellido = $this->input->post('apellido');
      $nacimiento = $this->input->post('nacimiento');
      $email = $this->input->post('email');
      $telefono = $this->input->post('telefono');
      $usuario = $this->input->post('usuario');
      $contrasena = $this->input->post('contrasena');

      $this->usuarios_model->agregarUsuarios($nombre ,$apellido ,$nacimiento ,$email ,$telefono,$usuario , $contrasena);

      redirect(base_url("dashboard_controller"));     
                          
            }    

   

           }                
                   
				
		// 	if (isset($_POST['submit'])) {	

		//   $nombre = $this->input->post('nombre');
		// 	$apellido = $this->input->post('apellido');
		// 	$nacimiento = $this->input->post('nacimiento');
		// 	$email = $this->input->post('email');
		// 	$telefono = $this->input->post('telefono');
		// 	$usuario = $this->input->post('usuario');
		// 	$contrasena = $this->input->post('contrasena');

		// 	$this->usuarios_model->agregarUsuarios($nombre ,$apellido ,$nacimiento ,$email ,$telefono,$usuario , $contrasena);

		// 	redirect(base_url("usuarios_controller"));			
                         	
  //           } else {			

		// 	redirect(base_url("dashboard_controller"));
		// }	

	}



        // obtengo el parametro id
        public function editar($id) {       
                
            // mantego abierta los datos de la session
            $data['usuario'] = $this->session->userdata('usuario');
            // $data['contrasena'] = $this->session->userdata('contrasena');   
            
            $data['datos'] = $this->usuarios_model->usuariosPorId($id);


                if (isset($_POST['submit'])) {
                            $nombre = $this->input->post('nombre');
                            $apellido = $this->input->post('apellido');
                            $nacimiento = $this->input->post('nacimiento');
                            $email = $this->input->post('email');
                            $telefono = $this->input->post('telefono');

                $data['datos']= $this->usuarios_model->editarUsuarios($nombre,$apellido ,$nacimiento ,$email ,$telefono , $id);
                $this->load->view('admin/editar_usuarios',$data);

                redirect(base_url("usuarios_controller"));
                            
                
                } 
                
                $this->load->view('include/header');
                $this->load->view('include/navbar',$data);
                $this->load->view('include/sidebar');           
                $this->load->view('admin/editar_usuarios',$data);
                $this->load->view('include/footer');                     

    }


      public function eliminar($id)   {
       

            $this->usuarios_model->eliminarUsuarios($id);

            redirect(base_url("usuarios_controller"));   
                

    } 


     public function ver($nombre)   {
       

        $data['usuario'] = $this->session->userdata('usuario');
        $data['contrasena'] = $this->session->userdata('contrasena');

        // $data['datos'] = $this->usuarios_model->seleccionarUsuarios();

        $data['datos']=$this->usuarios_model->verUsuarios($nombre);



        $this->load->view('include/header');
        $this->load->view('include/navbar',$data);
        $this->load->view('include/sidebar');       
        $this->load->view('admin/ver_usuarios',$data);
        $this->load->view('include/footer');  
                

    }



		public function totalUsuarios()
	{
		
		$data['datos'] = $this->usuarios_model->totalUsuarios();
		
		$this->load->view('admin/dashboard',$data);
		
	}

	public function reporteUPdf()	{       	
	
	 $data = $this->usuarios_model->seleccionarUsuarios();
	

	 $totalE = $this->usuarios_model->totalUsuarios();  

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
    $this->pdf->SetTitle("Reporte Usuarios SchoolCastro 2.0");
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
    $this->pdf->Cell(20,5,'Nacimiento','TB',0,'L','1');
    $this->pdf->Cell(50,5,'Email','TB',0,'L','1');
    $this->pdf->Cell(30,5,'Telefono','TB',0,'L','1');      
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
      $this->pdf->Cell(20,5,$datos->nacimiento,'B',0,'L',0);
      $this->pdf->Cell(50,5,$datos->email,'B',0,'L',0);
      $this->pdf->Cell(30,5,$datos->telefono,'B',0,'L',0);
     
      //Se agrega un salto de linea
      $this->pdf->Ln(5);
    }

    $this->pdf->Cell(30,5,'Total Fecha:','TB',0,'L','1');
 	$this->pdf->Cell(30,5, date("d-m-y"),'B',0,'L',0);
 	$this->pdf->Ln(5);
 	$this->pdf->Cell(30,5,'Total Usuarios:','TB',0,'L','1');
 	$this->pdf->Cell(30,5, $totalE->totalusuarios,'B',0,'L',0);
  
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


        public function reporteUExcel()
    {

        $data = $this->usuarios_model->mostrarUsuariosExcel();
       
       //load our new PHPExcel library
        $this->load->library('phpexcel');
        //activate worksheet number 1
        $this->phpexcel->setActiveSheetIndex(0);

        //name the worksheet
        $this->phpexcel->getActiveSheet()->setTitle('Reporte Usuarios');

        // //set cell A1 content with some text
        // $this->phpexcel->getActiveSheet()->setCellValue('A1', 'Id');
        // $this->phpexcel->getActiveSheet()->setCellValue('B1', 'Nombre');
        // $this->phpexcel->getActiveSheet()->setCellValue('C1', 'Apellido');
        // $this->phpexcel->getActiveSheet()->setCellValue('D1', 'Fecha de nacimiento');
        // $this->phpexcel->getActiveSheet()->setCellValue('E1', 'Email');
        // $this->phpexcel->getActiveSheet()->setCellValue('F1', 'Telefóno');

// //change the font size
// $this->phpexcel->getActiveSheet()->getStyle('A1')->getFont()->setSize(20);
// //make the font become bold
// $this->phpexcel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
// //merge cell A1 until D1
// $this->phpexcel->getActiveSheet()->mergeCells('A1:D1');
// //set aligment to center for that merged cell (A1 to D1)
// $this->phpexcel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

// print_r($data);


// foreach ($data as $datos) {
    
//    $this->phpexcel->getActiveSheet()->setCellValue('A1', $datos->id); 
//    $this->phpexcel->getActiveSheet()->setCellValue('A2', $datos->nombre);
//    $this->phpexcel->getActiveSheet()->setCellValue('A3', $datos->apellido);
//    $this->phpexcel->getActiveSheet()->setCellValue('A4', $datos->nacimiento);
//    $this->phpexcel->getActiveSheet()->setCellValue('A5', $datos->email);
//    $this->phpexcel->getActiveSheet()->setCellValue('A6', $datos->telefono);

        
// }

    // mostramos la data del modelo biene en forma de array, con result_array

    $this->phpexcel->getActiveSheet()->fromArray($data);


//name the worksheet
// $this->phpexcel->getActiveSheet()->setTitle('test worksheet');
// //set cell A1 content with some text
// // $this->phpexcel->getActiveSheet()->setCellValue('A1', '$data');
// //change the font size
// $this->phpexcel->getActiveSheet()->getStyle('A1')->getFont()->setSize(20);
// //make the font become bold
// $this->phpexcel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
// //merge cell A1 until D1
// $this->phpexcel->getActiveSheet()->mergeCells('A1:D1');
// //set aligment to center for that merged cell (A1 to D1)
// $this->phpexcel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
 
    $filename='Reporte usuarios.xls'; //save our workbook as this file name
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
