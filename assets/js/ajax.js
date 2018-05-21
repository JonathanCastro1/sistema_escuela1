
$(document).ready(function() {

// Buena forma si no tuviera ya mi base_url configurada
 // var base_url = <?php echo base_url();?>	
 

// Ya tengo la base url en config, osea htpp:localhost/proyecto_trabajadores
// cargo los estados
$.ajax({
	url: "index.php/usuarios_controller/cargarestados",	
	
})
.done(function(resp) {

	// console.log(resp);
	 $('#estado').html(resp);	
})
.fail(function() {
	console.log("error");
});

// cargo capitales
$.ajax({
	url: "index.php/usuarios_controller/cargarcapitales",	
	
})
.done(function(resp) {
	
	 $('#capital').html(resp);	
})
.fail(function() {
	console.log("error");
});


});




