
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

/*BOTONES VIEW*/
//$(".btn-view").on("click", function(){
       // alert('hola');

   // });
/*BOTONES VIEW*/
   

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

function catalogoinput () {
           var catalogo   = document.getElementById("catalogo");
           var selecvalue = catalogo.options[catalogo.selectedIndex].value;
           var selectext  = catalogo.options[catalogo.selectedIndex].text;
           var selectext_form = selectext.replace(" ", "_");

      if(selecvalue !=''){
          html="<div class='form-group'>";
                 html+="<label for='catalogo' class='col-sm-2 col-xs-12 col-md-2 control-label'>"+selectext+"</label>";         
              html+="<div class='col-md-10 col-sm-12 col-xs-12'>";
                 html += "<td><input type='hidden' name='atributo_id[]' value='"+selecvalue+"'></td>";
                 html += "<input type='text' onkeypress='return solonumeros(event)' class='form-control' placeholder='Precio entero referencia en el Catalogo' name='catalogo[]'>";
              html+='</div>';   
          html+="</div>"                
          $("#input_creado").append(html);

      }else{
        document.getElementById("input_creado").innerHTML="";
      } 
};

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

