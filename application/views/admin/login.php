
<div class="container centrar_login">
		
	
	<div class="row col-md-6">
		<br>
		<br>
		<br>

		<div class="page-header"><h2>Iniciar Session </h2></div>

		<form action="<?php echo base_url();?>index.php/login_controller/iniciarSession" method="POST">
			
			<input type="text" class="form-control" name="usuario" placeholder="Usuario"
			value="admin">
			<br>
			
			<input type="password" class="form-control" name="contrasena" placeholder="Contraseña" value="admin">
			
			<br>
			<br>
			<button type="submit" name="submit" value="submit" class="btn-success btn-sm glyphicon glyphicon-ok">Ingresar</button>
			<button type="reset" class="btn-danger btn-sm glyphicon glyphicon-remove">Cancelar</button>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			
		</form>
	
	</div>
</div>
