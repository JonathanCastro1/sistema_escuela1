<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>


<br>
<br>
<br>


	<div class="row col-md-4 col-md-offset-4">

		<div class="page-header">
  			<h1>Admin Profesores <small>SchoolCastro 2.0</small></h1>
		</div>

		<div>
			<a ><span class="btn-success btn-xs glyphicon glyphicon-plus" data-toggle="modal" data-target="#login-modal" id="">Agregar</span></a>

			<a  href="<?php echo base_url();?>profesores_controller/reportePPdf"><span class="btn-danger  btn-xs glyphicon glyphicon-file">PDF</span></a>

			<a  href="<?php echo base_url();?>profesores_controller/reportePExcel"><span class="btn-warning  btn-xs glyphicon glyphicon-download-alt">XLS</span></a>
		</div>


		<br>

		<table id="tabla" class="table-responsive table-hover table-bordered" > 

		 
												
	                    <thead>
	                        <tr>
	                            <th >#</th>
	                            <th >Nombre</th>
	                            <th >Apellido</th>	                            
	                            <th >Email</th>
	                            <th >Session</th>
	                            <th >Turno</th>
	                            <th >Sede</th>
	                            <th >Acciónes</th>
			                            
			                 </tr>
			               </thead>

			 <tbody>
			<?php

		foreach ($datos as $dato) {

			?>
		<tr>
		<td><?php echo $dato->id ?> </td>
		<td><?php echo $dato->nombre ?> </td>
		<td><?php echo $dato->apellido ?> </td>		
		<td><?php echo $dato->email ?> </td>
		<td><?php echo $dato->session ?> </td>
		<td><?php echo $dato->turno ?> </td>
		<td><?php echo $dato->sede ?> </td>
		<td >
		 <a  href="<?php echo base_url("profesores_controller/ver/$dato->nombre") ?>" ><span class="btn-primary btn-xs glyphicon glyphicon-zoom-in" data-toggle="ver" title="Ver"></span></a>
		
		
		 <a  href="<?php echo base_url("profesores_controller/editar/$dato->id") ?>" ><span class="btn-success btn-xs glyphicon glyphicon-pencil" data-toggle="editar" title="Editar"></span></a>
		
		
		 <a id="eliminar"  href="<?php echo base_url("profesores_controller/eliminar/$dato->id") ?>" ><span class="btn-danger btn-xs glyphicon glyphicon-trash" data-toggle="eliminar" title="Eliminar"></span></a>
		</td>

		</tr>

		<?php

		}


		?>

	</tbody>

</table>

<!-- <a  href="<?php echo base_url();?>index.php/usuarios_controller/reporte"><span class="btn-danger btn-danger btn-sm glyphicon glyphicon-file">Version PDF</span></a> -->
<br>
<br>
<br>


</div>


<!-- aqui agregando un formulario modal -->
<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    	  <div class="modal-dialog">
				<div class="loginmodal-container">
					<h1>Agregar Estudiante</h1><br>
				  <form action="<?php echo base_url();?>profesores_controller/agregarProfesores" method="post">
					<input type="text" name="nombre" placeholder="Nombre">
					<input type="text" name="apellido" placeholder="Apellido">		
					<input type="text" name="email" placeholder="Email">
					<select name="session" class="form-control" id="session" >
						<option>Sessiones</option>							
					</select>
					<br>

					<select name="turno" class="form-control" id="turno" >
						<option>Turnos</option>							
					</select>
					<br>

					<select name="sede" class="form-control" id="sede" >
						<option>Sedes</option>						
					</select>
					<br>						
					<input type="submit" name="submit"  class="login loginmodal-submit" value="Agregar">
				  </form>
					
				  <!-- <div class="login-help">
					<a href="#">Register</a> - <a href="#">Forgot Password</a>
				  </div> -->

				  <div class="modal-footer">
         			 <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        		  </div>
				</div>
		</div>
 </div>