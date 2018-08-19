  
  var controller;
  var funcion;
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

  function cargar(control,funt){
    controller = control;
    funcion = funt;
  }

  $('#a').submit(function(event){
    event.preventDefault();
    var dataString = $('#a').serializeArray();
    dataString = ordenar(dataString);
    $.ajax({
                  type: 'post',
                  data: {
                        'data':dataString
                      },
                  url: '/'+controller+'/'+funcion
                })
                .done(function(listas_rep){
                  alert(listas_rep);
                  $('#miFormulario').html(listas_rep);
                })
                .fail(function(){
                  alert('Hubo un errror al cargar las listas_rep');
                });

  });