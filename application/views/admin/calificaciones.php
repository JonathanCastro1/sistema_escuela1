<br>
<br>
<br>
<br>




	<!-- <?php print_r($datos);
	// echo "<br>".$datos->nombre;
	 ?> -->




	<!-- 	<h1 id="prueba"></h1> -->


 <div class="col-lg-4">
                        <h1 class="page-header">
                           Admin
                            <small>Calificaciones</small>
                        </h1>

</div>



		<form action="<?php echo base_url();?>calificaciones_controller/agregarCalificaciones" method="post">
		

			<div class="form-group col-md-4">			
			

			<label>Alumno:</label>
			<!-- <?php echo form_error('alumno'); ?> -->
			<input type="text" class="form-control" name="alumno">
		
			<label>Nota:</label>
			<!-- <?php echo form_error('nota'); ?> -->
			<input type="number" class="form-control" name="nota">
		
			<label>Descripcion:</label>	
			<!-- <?php echo form_error('descripcion'); ?> -->
			<textarea name="descripcion"  class="form-control"></textarea>

			<label>Fecha:</label>
			<!-- <?php echo form_error('fecha'); ?> -->
			<input type="text" id="datepicker" name="fecha" class="form-control">

			</div>

			<div class="form-group col-md-6">			
			
			
			<br>
			<!-- <?php echo form_error('session'); ?> -->
			<select name="session" class="form-control" id="session">
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

			</div>
			
			

			<div class="col-md-12 text-center ">
			<button type="submit" name="submit" value="submit" class="btn-success btn-sm glyphicon glyphicon-ok">Registrar</button>
			<button type="reset" class="btn-danger btn-sm glyphicon glyphicon-remove">Cancelar</button>	

			<br>
			<br>


			</div>	

			<br>
			<!-- <button type="submit" name="submit" value="submit" class="btn-success btn-sm glyphicon glyphicon-ok">Registrar</button>
			<button type="reset" class="btn-danger btn-sm glyphicon glyphicon-remove">Cancelar</button> -->
			<br>
			<br>			
			<!--  <a href="<?php echo base_url();?>index.php/usuarios_controller/contabilidad"><span class="btn-default btn-sm glyphicon glyphicon-arrow-left ">Regresar</span></a> -->
			<br>
			
	

		 </form>
 	
