


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
			<input type="text" class="form-control" id="datepicker" name="nacimiento" value="<?php echo $datos->nacimiento?>" >				
			<input type="text" class="form-control" name="email" value="<?php echo $datos->email?>">
			<input type="text" class="form-control" name="telefono" value="<?php echo $datos->telefono?>">			

			<button type="submit" name="submit" value="submit" class="btn-success btn-sm glyphicon glyphicon-ok">Actualizar</button>
			<button type="reset" class="btn-danger btn-sm glyphicon glyphicon-remove">Cancelar</button>


			<br>
			<br>	
			<a href="<?php echo base_url();?>usuarios_controller"><span class="btn-default btn-sm glyphicon glyphicon-arrow-left">Regresar</span></a>
		</form>



<br>
<br>
<br>
<br>
<br>
<br>
		
	</div>