//    http://sistemamonedas.cpsobrino.mx/  
//    http://sistemamonedas.cpsobrino.mx/  
$(document).ready(function () {
/**********BOTON ESCONDIDO POR DEFECTO***********/
$("#boton_tipo_atributo").hide();
/**********BOTON ESCONDIDO POR DEFECTO***********/    

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


      table = $("#list_attrm").DataTable({
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
    "aaSorting": [[ 4, "asc" ]]
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


/*LIST COLECCION DE BILLETES*/
function datosusuario($id_usuario){
  var id = $id_usuario;
  var base_url= 'http://sistemamonedas.cpsobrino.mx/';
        $.ajax({
            url: base_url + "billetes/view/" + id,
            type:"POST",
            success:function(resp){
                $("#modal-default .modal-body").html(resp);
                $("#modal-default .modal-title").html('Información del Catalogo General');
                //alert(resp);
            }

        });
}

function datoscoleccion($id_usuario,$id_billete){
  var id_usuario = $id_usuario;
  var id_billete = $id_billete;
  var base_url= 'http://sistemamonedas.cpsobrino.mx/';
        $.ajax({
            url: base_url + "collectionb/view/" + id_usuario + "/" + id_billete,
            type:"POST",
            success:function(resp){
                $("#modal-default .modal-body").html(resp);
                $("#modal-default .modal-title").html('Información del Usuario');
                //alert(resp);
            }

        });
}
/*LIST COLECCION DE BILLETES*/



/*LIST COLECCION DE MONEDAS*/
function datosusuariom($id_usuario){
  var id = $id_usuario;
  var base_url= 'http://sistemamonedas.cpsobrino.mx/';
        $.ajax({
            url: base_url + "monedas/view/" + id,
            type:"POST",
            success:function(resp){
                $("#modal-default .modal-body").html(resp);
                $("#modal-default .modal-title").html('Información del Catalogo General');
                //alert(resp);
            }

        });
}

function datoscoleccionm($id_usuario,$id_billete){
  var id_usuario = $id_usuario;
  var id_billete = $id_billete;
  var base_url= 'http://sistemamonedas.cpsobrino.mx/';
        $.ajax({
            url: base_url + "collectionm/view/" + id_usuario + "/" + id_billete,
            type:"POST",
             beforeSend: function() {
                     $('#modal-default .modal-body').html("<center><img src='"+base_url+"/public/images/loader.gif' /></center>");
                  }, 
            success:function(resp){
                $("#modal-default .modal-body").html(resp);
                $("#modal-default .modal-title").html('Información del Usuario');
                //alert(resp);
            }

        });
}
/*LIST COLECCION DE MONEDAS*/



function datosusuariomonedas($id_usuario){
  var id = $id_usuario;
  var base_url= 'http://sistemamonedas.cpsobrino.mx/';
        $.ajax({
            url: base_url + "monedas/view/" + id,
            type:"POST",
            beforeSend: function() {
                     $('#modal-default .modal-body').html("<center><img src='"+base_url+"/public/images/loader.gif' /></center>");
                  },                  
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
             var base_url= 'http://sistemamonedas.cpsobrino.mx/';
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
             var base_url= 'http://sistemamonedas.cpsobrino.mx/';
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
/********************************************************SECCION BILLETES******************************************************/


/***********************************SECCION ATRIBUTOS BILLETES*/
function tipoatributo()
{
           var selecvalue = tipo_atributo.options[tipo_atributo.selectedIndex].value;
           //var selectext  = catalogo.options[catalogo.selectedIndex].text;
  if (selecvalue=='Especiales') {
            $("#boton_tipo_atributo").show();

           /*  var base_url= 'http://sistemamonedas.cpsobrino.mx/';
            $.ajax({
                url: base_url + "collectionm/form_moneda/",
                type:"POST",
                beforeSend: function() {
                     $('#gif_carga').html("<center><img src='"+base_url+"/public/images/loader.gif' /></center>");
                  },
                   success:function(resp){
                     //$("#input_creado").append(resp);
                      $("#precio_moneda").html(resp);
                    //alert(resp);
                },
                error:function(){
                  $('#gif_carga').html("");
                  $('#precio_moneda').html("<center><h4 style='color:red;'>ERROR EN EL SERVIDOR.POR FAVOR ENVIE UN MENSAJE AL ADMINISTRADOR</h4></center>");
                }

            });*/
  }else{
    $("#boton_tipo_atributo").hide();
   /* $('#precio_billete').html("");*/
  }
  
}


function opcionesadd () {
           // var catalogo   = document.getElementById("catalogo");
         
             var base_url= 'http://sistemamonedas.cpsobrino.mx/';
            $.ajax({
                url: base_url + "attrbillete/form_opciones",
                type:"POST",
                beforeSend: function() {
                     $('#gif_carga').html("<center><img src='"+base_url+"/public/images/loader.gif' /></center>");
                  },
                   success:function(resp){
                     //$("#input_creado").append(resp);
                      $('#gif_carga').html("");
                      $("#tipo_atributo_ajax").append(resp);
                    //alert(resp);
                },
                error:function(){
                  $('#gif_carga').html("");
                  $('#tipo_atributo_ajax').html("<center><h4 style='color:red;'>ERROR EN EL SERVIDOR.POR FAVOR ENVIE UN MENSAJE AL ADMINISTRADOR</h4></center>");
                }

            });
  
     
};

/*ELIMINAR CAMPO*/
$(document).on("click",".eliminar", function(){
        $(this).closest(".form-group").remove();
    });
/*ELIMINAR CAMPO*/
/************************************SECCION ATRIBUTOS BILLETES*/


/*PRECIO DEL BILLETE*/
function preciobillete()
{
           var selecvalue = tipo_registro.options[tipo_registro.selectedIndex].value;
           //var selectext  = catalogo.options[catalogo.selectedIndex].text;
  if (selecvalue=='Intercambio' || selecvalue=='Venta') {
             var base_url= 'http://sistemamonedas.cpsobrino.mx/';
            $.ajax({
                url: base_url + "collectionb/form_billete/",
                type:"POST",
                beforeSend: function() {
                     $('#gif_carga').html("<center><img src='"+base_url+"/public/images/loader.gif' /></center>");
                  },
                   success:function(resp){
                     //$("#input_creado").append(resp);
                      $('#gif_carga').html("");
                      $("#precio_billete").html(resp);
                    //alert(resp);
                },
                error:function(){
                  $('#gif_carga').html("");
                  $('#precio_billete').html("<center><h4 style='color:red;'>ERROR EN EL SERVIDOR.POR FAVOR ENVIE UN MENSAJE AL ADMINISTRADOR</h4></center>");
                }

            });
  }else{
    $('#precio_billete').html("");
  }
  
}
/*PRECIO DEL BILLETE*/


/*CANTIDAD DEL BILLETE*/
function repeticion()
{
           var selectvalue =document.getElementById('cantidad_billete').value;
           var entero =Number(selectvalue);
           var mayorque = Number(0);
           //var selectext  = catalogo.options[catalogo.selectedIndex].text;
  if (entero > mayorque) {
             var base_url= 'http://sistemamonedas.cpsobrino.mx/';
            $.ajax({
                url: base_url + "collectionb/form_billete_cantidad/" + entero,
                type:"POST",
                beforeSend: function() {
                     $('#respuesta_ajax').html("<center><img src='"+base_url+"/public/images/loader.gif' /></center>");
                  },
                   success:function(resp){
                     //$("#input_creado").append(resp);
                      $('#respuesta_ajax').html("");
                      $("#respuesta_ajax").html(resp);
                    //alert(resp);
                },
                error:function(){
                  $('#respuesta_ajax').html("");
                  $('#respuesta_ajax').html("<center><h4 style='color:red;'>ERROR EN EL SERVIDOR.POR FAVOR ENVIE UN MENSAJE AL ADMINISTRADOR</h4></center>");
                }

            });
  }else{
    $('#respuesta_ajax').html("");
  }
  
}
/*CANTIDAD DEL BILLETE*/


function preciobillete_add($contador)
{
         var contador   = $contador;
         var selecvalue =document.getElementById("tipo_registro_billete_add_" + contador).value
           //var selectext  = catalogo.options[catalogo.selectedIndex].text;
  if (selecvalue=='Intercambio' || selecvalue=='Venta') {
             var base_url= 'http://sistemamonedas.cpsobrino.mx/';
            $.ajax({
                url: base_url + "collectionb/form_billete_add/"+contador,
                type:"POST",
                beforeSend: function() {
                     $('#gif_carga_add_'+contador).html("<center><img src='"+base_url+"/public/images/loader.gif' /></center>");
                  },
                   success:function(resp){
                     //$("#input_creado").append(resp);
                      $('#gif_carga_add_'+contador).html("");
                      $("#precio_billete_add_"+contador).html(resp);
                    //alert(resp);
                },
                error:function(){
                  $('#gif_carga_add_').html("");
                  $('#precio_billete_add_'+contador).html("<center><h4 style='color:red;'>ERROR EN EL SERVIDOR.POR FAVOR ENVIE UN MENSAJE AL ADMINISTRADOR</h4></center>");
                }

            });
  }else{
    $('#precio_billete_add_' + contador).html("");
  }
  
}


/*MERCADO*/
function datoscoleccionmercado($id_billete){
  var id_billete = $id_billete;
  var base_url= 'http://sistemamonedas.cpsobrino.mx/';
        $.ajax({
            url: base_url + "mercadob/view/" + id_billete ,
            type:"POST",
            success:function(resp){
                $("#modal-default .modal-body").html(resp);
                $("#modal-default .modal-title").html('Información del Billete');
                //alert(resp);
            }

        });
}
/*MERCADO*/
/********************************************************SECCION BILLETES******************************************************/



/******************************************************SECCION MONEDAS******************************************************/

/***********************************SECCION ATRIBUTOS MONEDAS*/
function tipoatributom()
{
           var selecvalue = tipo_atributo.options[tipo_atributo.selectedIndex].value;
           //var selectext  = catalogo.options[catalogo.selectedIndex].text;
  if (selecvalue=='Especiales') {
            $("#boton_tipo_atributo").show();
            $("#div_boton").hide();

         
  }else{
    $("#boton_tipo_atributo").hide();
     $("#div_boton").hide();
  }
  
}


function opcionesaddm () {
           // var catalogo   = document.getElementById("catalogo");
         
             var base_url= 'http://sistemamonedas.cpsobrino.mx/';
            $.ajax({
                url: base_url + "attrmoneda/form_opciones",
                type:"POST",
                beforeSend: function() {
                     $('#gif_carga').html("<img src='"+base_url+"/public/images/loader.gif' />");
                  },
                   success:function(resp){
                     //$("#input_creado").append(resp);
                      $('#gif_carga').html("");
                      $("#tipo_atributo_ajax").append(resp);
                    //alert(resp);
                },
                error:function(){
                  $('#gif_carga').html("");
                  $('#tipo_atributo_ajax').html("<center><h4 style='color:red;'>ERROR EN EL SERVIDOR.POR FAVOR ENVIE UN MENSAJE AL ADMINISTRADOR</h4></center>");
                }

            });
  
     
};

/*ELIMINAR CAMPO*/
$(document).on("click",".eliminar", function(){
        $(this).closest(".form-group").remove();
    });
/*ELIMINAR CAMPO*/
/************************************SECCION ATRIBUTOS MONEDAS*/



/*PRECIO DE LAMONEDA*/
function preciomoneda()
{
           var selecvalue = tipo_registro.options[tipo_registro.selectedIndex].value;
           //var selectext  = catalogo.options[catalogo.selectedIndex].text;
  if (selecvalue=='Intercambio' || selecvalue=='Venta') {
             var base_url= 'http://sistemamonedas.cpsobrino.mx/';
            $.ajax({
                url: base_url + "collectionm/form_moneda/",
                type:"POST",
                beforeSend: function() {
                     $('#gif_carga').html("<center><img src='"+base_url+"/public/images/loader.gif' /></center>");
                  },
                   success:function(resp){
                     //$("#input_creado").append(resp);
                      $("#precio_moneda").html(resp);
                    //alert(resp);
                },
                error:function(){
                  $('#gif_carga').html("");
                  $('#precio_moneda').html("<center><h4 style='color:red;'>ERROR EN EL SERVIDOR.POR FAVOR ENVIE UN MENSAJE AL ADMINISTRADOR</h4></center>");
                }

            });
  }else{
    $('#precio_billete').html("");
  }
  
}
/*PRECIO DE LA MONEDA*/



/*CANTIDAD DEL MONEDA*/
function repeticionmoneda()
{
           var selectvalue =document.getElementById('cantidad_moneda').value;
           var entero =Number(selectvalue);
           var mayorque = Number(0);
           //var selectext  = catalogo.options[catalogo.selectedIndex].text;
  if (entero > mayorque) {
             var base_url= 'http://sistemamonedas.cpsobrino.mx/';
            $.ajax({
                url: base_url + "collectionm/form_moneda_cantidad/" + entero,
                type:"POST",
                beforeSend: function() {
                     $('#respuesta_ajax_moneda').html("<center><img src='"+base_url+"/public/images/loader.gif' /></center>");
                  },
                   success:function(resp){
                     //$("#input_creado").append(resp);
                      $('#respuesta_ajax_moneda').html("");
                      $("#respuesta_ajax_moneda").html(resp);
                    //alert(resp);
                },
                error:function(){
                  $('#respuesta_ajax_moneda').html("");
                  $('#respuesta_ajax_moneda').html("<center><h4 style='color:red;'>ERROR EN EL SERVIDOR.POR FAVOR ENVIE UN MENSAJE AL ADMINISTRADOR</h4></center>");
                }

            });
  }else{
    $('#respuesta_ajax_moneda').html("");
  }
  
}
/*CANTIDAD DEL MONEDA*/

/*PRECIO DEL MONEDA ADD*/
function preciomoneda_add($contador)
{
         var contador   = $contador;
         var selecvalue =document.getElementById("tipo_registro_moneda_add_" + contador).value
           //var selectext  = catalogo.options[catalogo.selectedIndex].text;
  if (selecvalue=='Intercambio' || selecvalue=='Venta') {
             var base_url= 'http://sistemamonedas.cpsobrino.mx/';
            $.ajax({
                url: base_url + "collectionm/form_moneda_add/"+contador,
                type:"POST",
                beforeSend: function() {
                     $('#precio_moneda_add_'+contador).html("<center><img src='"+base_url+"/public/images/loader.gif' /></center>");
                  },
                   success:function(resp){
                     //$("#input_creado").append(resp);
                     $("#precio_moneda_add_"+contador).html(resp);
                    //alert(resp);
                },
                error:function(){
                     $('#precio_moneda_add_'+contador).html("<center><h4 style='color:red;'>ERROR EN EL SERVIDOR.POR FAVOR ENVIE UN MENSAJE AL ADMINISTRADOR</h4></center>");
                }

            });
  }else{
    $('#precio_billete_add_' + contador).html("");
  }
  
}

/*PRECIO DEL MONEDA ADD*/

/*MERCADO*/
function datoscoleccionmercadom($id_billete){
  var id_billete = $id_billete;
  var base_url= 'http://sistemamonedas.cpsobrino.mx/';
        $.ajax({
            url: base_url + "mercadom/view/" + id_billete ,
            type:"POST",
            success:function(resp){
                $("#modal-default .modal-body").html(resp);
                $("#modal-default .modal-title").html('Información de la Moneda');
                //alert(resp);
            }

        });
}
/*MERCADO*/
/******************************************************SECCION MONEDAS******************************************************/

/*************************SUGERENCIAS*****************************/
function datosugerencia($id_sugerencia){
  var id = $id_sugerencia;
  var base_url= 'http://sistemamonedas.cpsobrino.mx/';
        $.ajax({
            url: base_url + "sugerencias/view/" + id,
            type:"POST",
            success:function(resp){
                $("#modal-default .modal-body").html(resp);
                $("#modal-default .modal-title").html('Mensaje de la Sugerencia');
                //alert(resp);
            }

        });
}
/*************************SUGERENCIAS*****************************/


/*******SECCION PARA COLOCAR REQUERIDO EL CAMPO FUENTE********/
function requerido($id){
  var id = $id;
  var input = document.getElementById('fuente_imagen' + id)
  $(input).prop('required',true);

}
/*******SECCION PARA COLOCAR REQUERIDO EL CAMPO FUENTE********/



/*************OPCIONES EN EL LISTADO DE MONEDAS*************/
function opciones_moneda()
{
  var id_atributo = document.getElementById('filtro_moneda').value;

   var base_url= 'http://sistemamonedas.cpsobrino.mx/';
            $.ajax({
                url: base_url + "monedas/form_atributo_moneda/" + id_atributo,
                type:"POST",
                beforeSend: function() {
                     $('#respuesta_ajax_filtros_monedas').html("<center><img src='"+base_url+"/public/images/loader.gif' /></center>");
                  },
                   success:function(resp){
                     //$("#input_creado").append(resp);
                      $('#respuesta_ajax_filtros_monedas').html("");
                      $("#respuesta_ajax_filtros_monedas").html(resp);
                    //alert(resp);
                },
                error:function(){
                  $('#respuesta_ajax_filtros_monedas').html("");
                  $('#respuesta_ajax_filtros_monedas').html("<center><h4 style='color:red;'>ERROR EN EL SERVIDOR.POR FAVOR ENVIE UN MENSAJE AL ADMINISTRADOR</h4></center>");
                }

            });
}
/*************OPCIONES EN EL LISTADO DE MONEDAS*************/



