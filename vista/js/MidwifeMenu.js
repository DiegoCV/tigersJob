
var pestana = 'crear';

$("#e1").click(function() {
  pestana = 'crear';
});

$("#e2").click(function() {
  pestana = 'listar';
});

$("#e3").click(function() {
  pestana = 'actualizar';
});

$("#e4").click(function() {
  pestana = 'eliminar';
});

	function llamarAccion(n) {

    switch(pestana){
      case 'crear':
         $.get( "/"+n+"/"+pestana+"Form", function( data ) {
           $( "#miFormulario" ).html( data );
        });
      break;
      case 'listar':
         $.get( "/"+n+"/"+pestana, function( data ) {
           $( "#miFormulario" ).html( data );
        });
      break;
      case 'actualizar':
      break;
      default:
        $.get( "/"+n+"/form"+pestana, function( data ) {
           $( "#miFormulario" ).html( data );
        });
    }
    
	}
