<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>


<br>
<br>
<br>


	<div class="row col-md-4 col-md-offset-4">

		<div class="page-header">
  			<h1>Admin Usuarios <small>SchoolCastro 2.0</small></h1>
		</div>

		<div>
			<a ><span class="btn-success btn-xs glyphicon glyphicon-plus" data-toggle="modal" data-target="#login-modal" id="">Agregar</span></a>

			<a  href="<?php echo base_url();?>usuarios_controller/reporteUPdf"><span class="btn-danger  btn-xs glyphicon glyphicon-file">PDF</span></a>

			<a  href="<?php echo base_url();?>usuarios_controller/reporteUExcel"><span class="btn-warning  btn-xs glyphicon glyphicon-download-alt">XLS</span></a>			
		</div>
		


		<br>

		<table id="tabla" class="table-responsive table-hover table-bordered" > 

		 
												
	                    <thead>
	                        <tr>
	                            <th >#</th>
	                            <th >Nombre</th>
	                            <th >Apellido</th>
	                            <th >Fecha de nacimiento</th>
	                            <th >Email</th>
	                            <th >Telefóno</th>
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
		<td><?php echo $dato->nacimiento ?> </td>
		<td><?php echo $dato->email ?> </td>
		<td><?php echo $dato->telefono ?> </td>
		<td >
		<!-- <a href="<?php echo base_url();?>usuarios_controller/ver/$dato->id"><span class="btn-info btn-xs glyphicon glyphicon-zoom-in" data-toggle="ver" title="Ver"></span></a> -->

		 <a  href="<?php echo base_url("usuarios_controller/ver/$dato->nombre") ?>" ><span class="btn-primary btn-xs glyphicon glyphicon-zoom-in" data-toggle="ver" title="Ver"></span></a>
		
		
		 <a  href="<?php echo base_url("usuarios_controller/editar/$dato->id") ?>" ><span class="btn-success btn-xs glyphicon glyphicon-pencil" data-toggle="editar" title="Editar"></span></a>
		
		
		 <a id="eliminar"  href="<?php echo base_url("usuarios_controller/eliminar/$dato->id") ?>" ><span class="btn-danger btn-xs glyphicon glyphicon-trash" data-toggle="eliminar" title="Eliminar"></span></a>
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
					<h1>Agregar Usuario</h1><br>
				  <form action="<?php echo base_url();?>usuarios_controller/agregarUsuarios" method="post">

				<!-- muestro los errores individualmente -->

				<!-- estas validaciones solo funcionan si el type es igual a al regla
				osea type="password" con regla numeric etc -->
				  	<?php echo form_error('nombre'); ?>
					<input type="text" name="nombre" placeholder="Nombre">

					<?php echo form_error('apellido'); ?>
					<input type="text" name="apellido" placeholder="Apellido">

					<?php echo form_error('nacimiento'); ?>
					<input type="text" id="datepicker" name="nacimiento" placeholder="Fecha de nacimiento" >

					<?php echo form_error('email'); ?>				
					<input type="text" name="email" placeholder="Email">

					<?php echo form_error('telefono'); ?>
					<input type="text" name="telefono" placeholder="Telefóno">

					<?php echo form_error('usuario'); ?>
					<input type="text" name="usuario" placeholder="Usuario">

					<?php echo form_error('contrasena'); ?>
					<input type="password" name="contrasena" placeholder="Contraseña">

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