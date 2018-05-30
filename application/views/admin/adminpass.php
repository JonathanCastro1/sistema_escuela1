<br>
<br>
<br>
<br>


 <div class="col-lg-4">
               <h1 class="page-header">
                Admin
                   <small>Perfil</small>
                </h1>

</div>

 <!-- <img src="<?=base_url()?>subidas/miniaturas/<?php echo $datos->ruta;?>" /> -->

<!-- <h1><?php echo $datos->ruta ?></h1> -->


<form action="<?php echo base_url();?>login_controller/subirImagen" method="post" enctype="multipart/form-data">
		

			<div class="form-group col-md-6">		
			

			<label>Foto:</label>
			<input type="file" class="form-control" name="imagen" >



			<div class="col-md-12 text-center ">
			<button type="submit" name="submit" value="submit" class="btn-success btn-sm glyphicon glyphicon-ok">Cargar</button>
			<button type="reset" class="btn-danger btn-sm glyphicon glyphicon-remove">Cancelar</button>	

			<br>
			<br>

			</div>			
	</div>

		 </form>




		<form action="<?php echo base_url();?>login_controller/cambiarPass" method="post">
			
			<div class="form-group col-md-8">	

				<label>Nueva contraseña:</label>
				<input type="password" class="form-control" name="contrasenan">

				<label>Vieja contraseña:</label>
				<input type="password" class="form-control" name="contrasenav">
					
			<br>

			
				<button type="submit"  name="submit" value="submit" class="btn-success btn-sm glyphicon glyphicon-ok">Cambiar</button>
				<button type="reset" class="btn-danger btn-sm glyphicon glyphicon-remove">Cancelar</button>	

			</div>

<br>
<br>
<br>
<br>

<br>
<br>
<br>
<br>

<br>
<br>
<br>
<br>

<br>
<br>
<br>
<br>


		


		</form>
		
