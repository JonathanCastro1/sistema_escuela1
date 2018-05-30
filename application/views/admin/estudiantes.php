<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>


<br>
<br>
<br>

	<div class="row col-md-4 col-md-offset-4">

		<div class="page-header">
  			<h1>Admin Estudiantes <small>SchoolCastro 2.0</small></h1>
		</div>		

		<div>
			<a ><span class="btn-success btn-xs glyphicon glyphicon-plus" data-toggle="modal" data-target="#login-modal" id="">Agregar</span></a>

			<a  href="<?php echo base_url();?>estudiantes_controller/reporteEPdf"><span class="btn-danger  btn-xs glyphicon glyphicon-file">PDF</span></a>

			<a  href="<?php echo base_url();?>estudiantes_controller/reporteEExcel"><span class="btn-warning  btn-xs glyphicon glyphicon-download-alt">XLS</span></a>
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
	
		 <a  href="<?php echo base_url("estudiantes_controller/ver/$dato->nombre") ?>" ><span class="btn-primary btn-xs glyphicon glyphicon-zoom-in" data-toggle="ver" title="Ver"></span></a>
		
		 <a  href="<?php echo base_url("estudiantes_controller/editar/$dato->id") ?>" ><span class="btn-success btn-xs glyphicon glyphicon-pencil" data-toggle="editar" title="Editar"></span></a>
		
		
		 <a id="eliminar"  href="<?php echo base_url("estudiantes_controller/eliminar/$dato->id") ?>" ><span class="btn-danger btn-xs glyphicon glyphicon-trash" data-toggle="eliminar" title="Eliminar"></span></a>
		</td>

		</tr>

		<?php

		}


		?>

	</tbody>

</table>

<br>
<br>
<br>


</div>


<!-- aqui agregando un formulario modal -->
<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    	  <div class="modal-dialog">
				<div class="loginmodal-container">
					<h1>Agregar Estudiante</h1><br>
				  <form action="<?php echo base_url();?>estudiantes_controller/agregarEstudiantes" method="post">

				  <!-- 	<?php echo form_error('nombre'); ?> -->
					<input type="text" name="nombre" placeholder="Nombre">

					<!-- <?php echo form_error('apellido'); ?> -->
					<input type="text" name="apellido" placeholder="Apellido">

					<!-- <?php echo form_error('email'); ?>	 -->	
					<input type="text" name="email" placeholder="Email">

					<!-- <?php echo form_error('session'); ?> -->
					<select name="session" class="form-control" id="session" >
						<option>Sessiones</option>									
					</select>
					<br>
					
					<!-- <?php echo form_error('turno'); ?> -->
					<select name="turno" class="form-control" id="turno" >			
						<option>Turnos</option>											
					</select>
					<br>

					<!-- <?php echo form_error('sede'); ?> -->
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