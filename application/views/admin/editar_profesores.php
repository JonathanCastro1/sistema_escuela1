


<br>
<br>
<br>
<br>
<br>
<br>

	<div class="row col-md-6" >

		<form action="" method="post">
			<input type="text" class="form-control" name="nombre" value="<?php echo $datos->nombre?>">
			<input type="text" class="form-control"  name="apellido" value="<?php echo $datos->apellido?>">						
			<input type="text" class="form-control" name="email" value="<?php echo $datos->email?>">
			<select name="session" class="form-control" id="session" >
				<option><?php echo $datos->session?></option>							
			</select>					
			<select name="turno" class="form-control" id="turno" >					
				<option><?php echo $datos->turno?></option>	
			</select>
			<select name="sede" class="form-control" id="sede">
				<option><?php echo $datos->sede?></option>						
			</select>		

			<button type="submit" name="submit" value="submit" class="btn-success btn-sm glyphicon glyphicon-ok">Actualizar</button>
			<button type="reset" class="btn-danger btn-sm glyphicon glyphicon-remove">Cancelar</button>


			<br>
			<br>	
			<a href="<?php echo base_url();?>profesores_controller"><span class="btn-default btn-sm glyphicon glyphicon-arrow-left">Regresar</span></a>
		</form>



<br>
<br>
<br>
<br>
<br>
<br>
		
	</div>