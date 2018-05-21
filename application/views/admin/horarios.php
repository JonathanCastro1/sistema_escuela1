<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>


<br>
<br>
<br>


	<div class="row col-md-4">

		<div class="page-header">
  			<h1>Admin Horarios <small>SchoolCastro 2.0</small></h1>
		</div>
	</div>

	<div class="col md-12">
		<table id="tabla" class="table-responsive table-hover table-bordered" > 

		 
												
	                    <thead>
	                        <tr>
	                            <th >#</th>
	                            <th >Hora</th>
	                            <th >Profesor</th>	                            
	                            <th >Materia</th>
	                            <th >Session</th>
	                            <th >Turno</th>
	                            <th >Sede</th>	                          
			                            
			                 </tr>
			               </thead>

			 <tbody>
			<?php

		foreach ($datos as $dato) {

			?>
		<tr>
		<td><?php echo $dato->id ?> </td>
		<td><?php echo $dato->hora ?> </td>
		<td><?php echo $dato->profesor ?> </td>		
		<td><?php echo $dato->materia ?> </td>
		<td><?php echo $dato->session ?> </td>
		<td><?php echo $dato->turno ?> </td>
		<td><?php echo $dato->sede ?> </td>		

		</tr>

		<?php

		}


		?>

	</tbody>

</table>
</div>
		



	<br>
	<br>

	<div class="row col-md-6">

		<div id="calendario"></div>
		
	</div>

		<!-- <select name="sede" id="sede" >
			<option value="algo">Profesores</option>
			<option value="">Materias</option>
			<option value="">Sede</option>
			
		</select>


			<select name="cambio" id="cambio" >
			
			
		</select> -->


		


		<br>

		<!-- <table id="tabla" class="table-responsive table-hover table-bordered" > 

		 
												
	                    <thead>
	                        <tr>
	                            <th >#</th>
	                            <th >Hora</th>
	                            <th >Profesor</th>	                            
	                            <th >Materia</th>
	                            <th >Session</th>
	                            <th >Turno</th>
	                            <th >Sede</th>	                          
			                            
			                 </tr>
			               </thead>

			 <tbody>
			<?php

		foreach ($datos as $dato) {

			?>
		<tr>
		<td><?php echo $dato->id ?> </td>
		<td><?php echo $dato->hora ?> </td>
		<td><?php echo $dato->profesor ?> </td>		
		<td><?php echo $dato->materia ?> </td>
		<td><?php echo $dato->session ?> </td>
		<td><?php echo $dato->turno ?> </td>
		<td><?php echo $dato->sede ?> </td>		

		</tr>

		<?php

		}


		?>

	</tbody>

</table> -->

<br>
<br>
<br>







