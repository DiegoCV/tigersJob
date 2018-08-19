   var controladorE;
  var funcionE;


/**
   * Convierte un serializeArray en Json
   *
   */
  function ordenar(arrayData) {
      var aux = '{';
      for (var i = 0; i < arrayData.length; i++) {
          aux += '"' + arrayData[i]['name'] + '":"' + arrayData[i]['value'] + '",';
      }
      aux = aux.substring(0, aux.length - 1);
      aux += "}";
      return JSON.parse(aux);
  }

  function cargar2(control,funt){
    controladorE = "";
    controladorE = control;
    funcionE ="";
    funcionE = funt;
  }


 $('#formEliminar').submit(function(event){
    event.preventDefault();
    alert(controladorE+funcionE);
       alert("¡elimandote de tu vida");
    var dataString = $('#formEliminar').serializeArray();
    dataString = ordenar(dataString);
    $.ajax({
                  type: 'post',
                  data: {
                        'data':dataString
                      },
                  url: '/'+controladorE+'/'+funcionE
                })
                .done(function(listas_rep){
                  alert(listas_rep);
                  $('#miFormulario').html(listas_rep);
                })
                .fail(function(){
                  alert('Hubo un errror al cargar las listas_rep');
                });

  });