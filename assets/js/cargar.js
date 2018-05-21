
  $(document).ready(function() {

// Buena forma si no tuviera ya mi base_url configurada
 // var base_url = <?php echo base_url();?> 
 

// Ya tengo la base url en config, osea htpp:localhost/sistema_escuela

// Nota estar pendiente al obtener la url escribirla bien,
// chequear por consola al obtener GET

// cargo las sessiones
$.ajax({
  url: "cargar_controller/cargarsessiones", 
  
})
.done(function(resp) {

  // console.log(resp);
   $('#session').html(resp);  
})
.fail(function() {
  console.log("error");
});

// cargo los turnos
$.ajax({
 url: "cargar_controller/cargarturnos", 
  
})
.done(function(resp) {
  
  $('#turno').html(resp);  
})
.fail(function() {
 console.log("error");
});

// cargo los turnos
$.ajax({
 url: "cargar_controller/cargarsedes", 
  
})
.done(function(resp) {
  
  $('#sede').html(resp);  
})
.fail(function() {
 console.log("error");
});



});



