
$(document).ready(function () {

    $(function () {
       table = $("#example1").DataTable({
         language: {
            "sProcessing":     "Procesando...",
            "sLengthMenu":     "Mostrar _MENU_ registros",
            "sZeroRecords":    "No se encontraron resultados",
            "sEmptyTable":     "Ningún dato disponible en esta tabla",
            "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
            "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix":    "",
            "sSearch":         "Buscar:",
            "sUrl":            "",
            "sInfoThousands":  ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst":    "Primero",
                "sLast":     "Último",
                "sNext":     "Siguiente",
                "sPrevious": "Anterior"
        },
        "oAria": {
            "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
        }
    },
    "aaSorting": [[ 0, "asc" ]]
        });



       table = $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false,
          "bSort": false,



          
        });
      });
   

})

function datosusuario($id_usuario){
  var id = $id_usuario;
  var base_url= 'http://localhost/sistema_monedas/';
        $.ajax({
            url: base_url + "billetes/view/" + id,
            type:"POST",
            success:function(resp){
                $("#modal-default .modal-body").html(resp);
                //alert(resp);
            }

        });
}

function datosusuariomonedas($id_usuario){
  var id = $id_usuario;
  var base_url= 'http://localhost/sistema_monedas/';
        $.ajax({
            url: base_url + "monedas/view/" + id,
            type:"POST",
            success:function(resp){
                $("#modal-default .modal-body").html(resp);
                //alert(resp);
            }

        });
}

function catalogoinput () {
           // var catalogo   = document.getElementById("catalogo");
           var selecvalue = catalogo.options[catalogo.selectedIndex].value;
           var selectext  = catalogo.options[catalogo.selectedIndex].text;
  if (selecvalue) {
             var base_url= 'http://localhost/sistema_monedas/';
            $.ajax({
                url: base_url + "billetes/form_billete/" + selectext +"/"+ selecvalue,
                type:"POST",
                beforeSend: function() {
                     $('#gif_carga').html("<center><img src='"+base_url+"/public/images/loader.gif' /></center>");
                  },
                   success:function(resp){
                     //$("#input_creado").append(resp);
                      $('#gif_carga').html("");
                      $("#input_creado").append(resp);
                    //alert(resp);
                },
                error:function(){
                  $('#gif_carga').html("");
                  $('#input_creado').html("<center><h4 style='color:red;'>ERROR EN EL SERVIDOR.POR FAVOR ENVIE UN MENSAJE AL ADMINISTRADOR</h4></center>");
                }

            });
  }
     
};

function catalogoinputmonedas () {
           // var catalogo   = document.getElementById("catalogo");
           var selecvalue = catalogo.options[catalogo.selectedIndex].value;
           var selectext  = catalogo.options[catalogo.selectedIndex].text;
  if (selecvalue) {
             var base_url= 'http://localhost/sistema_monedas/';
            $.ajax({
                url: base_url + "monedas/form_moneda/" + selectext +"/"+ selecvalue,
                type:"POST",
                beforeSend: function() {
                     $('#gif_carga').html("<center><img src='"+base_url+"/public/images/loader.gif' /></center>");
                  },
                   success:function(resp){
                     //$("#input_creado").append(resp);
                      $('#gif_carga').html("");
                      $("#input_creado").append(resp);
                    //alert(resp);
                },
                error:function(){
                  $('#gif_carga').html("");
                  $('#input_creado').html("<center><h4 style='color:red;'>ERROR EN EL SERVIDOR.POR FAVOR ENVIE UN MENSAJE AL ADMINISTRADOR</h4></center>");
                }

            });
  }
     
};

 $(document).on("click",".btn-remove", function(){
        $(this).closest("table").remove();
    });

/*FUNCTION ONLY NUMBERS**/
function solonumeros (e) {
  key = e.keyCode || e.which;
  teclado= String.fromCharCode(key);
  numeros ="0,1,2,3,4,5,6,7,8,9";
  especiales =[8,37,39,46]; // array
  teclado_especial = false;

    for (var i in especiales){
      if(key==especiales[i] || key ==numeros){
        teclado_especial = true;

      }
    }
  
      if(numeros.indexOf(teclado)==-1 && !teclado_especial){      
          return false;
      }else{
        return true;
      }

  }
/*FUNCTION ONLY NUMBERS**/

/*ZOOM*/
$(function () {
    $('.zoom').zoomy();
}(jQuery))
/*ZOOM*/

