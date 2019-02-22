/*TITULO DE PRODUCTOS MAS IMPORTANTES*/
var titulo= document.getElementById('titulo_productos_importantes');
setInterval(()=>{

	$(titulo).fadeTo( 600 , 1,()=>{
	    if (titulo.style.color == 'red') {

			 titulo.style.color ='black';
			 titulo.style.fontSize = '40.5px';

		}else{
			 titulo.style.color ='red';
			 titulo.style.fontSize = '50px';

		}
  });

	
}, 1000);


/*TITULO DE PRODUCTOS MAS IMPORTANTES*/


/*************OPCIONES EN EL LISTADO DE MONEDAS*************/
function opciones_moneda()
{
  var id_atributo = document.getElementById('filtro_moneda').value;

   var base_url= 'http://localhost/sistema_monedas/';
            $.ajax({
                url: base_url + "tienda/form_atributo_moneda/" + id_atributo,
                type:"POST",               
                   success:function(resp){
                     //$("#input_creado").append(resp);
                      $('#respuesta_ajax_filtros_monedas').html("");
                      $("#respuesta_ajax_filtros_monedas").html(resp);
                    //alert(resp);
                },
                error:function(){
                  $('#respuesta_ajax_filtros_monedas').html("");
                  $('#respuesta_ajax_filtros_monedas').html("<center><h5 style='color:red;'>ERROR EN EL SERVIDOR.POR FAVOR ENVIE UN MENSAJE AL ADMINISTRADOR</h5></center>");
                }

            });
}

table = $("#example1").DataTable({
         language: {
            "sProcessing":     "Procesando...",
            "sLengthMenu":     "Mostrar _MENU_ registros",
            "sZeroRecords":    "No se encontraron resultados",
            "sEmptyTable":     "Ningún dato disponible en esta tabla",
            "sInfo":           " ",
            "sInfoEmpty":      " ",
            "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix":    "",
            "sSearch":         "Buscador General:",
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


function datosusuariomonedas($id_usuario){
  var id = $id_usuario;
  var base_url= 'http://localhost/sistema_monedas/';
        $.ajax({
            url: base_url + "tienda/view/" + id,
            type:"POST"           

        }).done(function(resp) {
          $("#modal-default .modal-body").html(resp);
        });
}
/*************OPCIONES EN EL LISTADO DE MONEDAS*************/




