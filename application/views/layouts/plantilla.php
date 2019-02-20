<!DOCTYPE html>
<html>
<head>
   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="images/favicon.ico" type="image/ico" />

    <title>Sistema Monedas</title>

    <!-- Bootstr<?php echo base_url();?>-->
    <link href="<?php echo base_url();?>public/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo base_url();?>public/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo base_url();?>public/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="<?php echo base_url();?>public/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
  
    <!-- bootstrap-progressbar -->
    <link href="<?php echo base_url();?>public/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="<?php echo base_url();?>public/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="<?php echo base_url();?>public/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

     <!-- Datatables -->
    <link href="<?php echo base_url();?>public/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>public/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>public/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>public/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>public/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
     <!-- Datatables -->

    <!-- Custom Theme Style -->
    <link href="<?php echo base_url();?>public/zoomy.css" rel="stylesheet">
    <link href="<?php echo base_url();?>public/build/css/custom.min.css" rel="stylesheet">
    <!--ESTILOS MAPA-->
    <link href="<?php echo base_url();?>public/css_mapa/estilos_mapa.css" rel="stylesheet">
    <!--ESTILOS MAPA-->   

    <!--FUENTES DE LETRAS-->
    <link href="https://fonts.googleapis.com/css?family=Gugi|Mogra" rel="stylesheet">
    <!--FUENTES DE LETRAS-->

    <link href="<?php echo base_url();?>public/app.css" rel="stylesheet">



</head>





<body class="nav-md">
 <!-----------------------------------ASIDE Y HEADER---------------------------------------------> 
   <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="<?php echo base_url(); ?>dashboard" class="site_title"><i class="fa fa-paw"></i><span>Monedas Mex.</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="<?php echo base_url();?>public/images/img.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Bienvenido,</span>
                <h2><?php echo $this->session->userdata("nombre_persona")?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                   <?php if($this->session->userdata("tipo_usuario")==1 ):?>
                        <li><a><i class="fa fa-list"></i> Atributos <span class="fa fa-chevron-down"></span></a>
                          <ul class="nav child_menu">                       
                           <!-- <li><a href="<?php echo base_url();?>attrbillete/list">Control de Atributos Billetes</a></li>--> 
                            <li><a href="<?php echo base_url();?>attrmoneda/list/Información_general">Control de Atributos Monedas</a></li>
                          </ul>
                        </li>
                      <?php endif; ?> 
                    <li><a><i class="fa fa-money"></i> Catalagos<span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu">
                          <!--<li><a href="<?php echo base_url();?>billetes/list">Billetes</a></li>--> 
                        <li><a href="<?php echo base_url();?>monedas/list">Monedas</a></li>                     
                      </ul>
                    </li> 

                   <li><a><i class="fa fa-list-alt"></i> Colección Personal <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                       <!--<li><a href="<?php echo base_url();?>collectionb/list">Colecci&oacute;n de Billetes</a></li>--> 
                      <li><a href="<?php echo base_url();?>collectionm/list">Colecci&oacute;n de Monedas</a></li>                      
                    </ul>
                  </li>  
                                  

                  <li><a><i class="fa fa-shopping-cart"></i> Mercado <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                     <!-- <li><a href="<?php echo base_url();?>mercadob/list">Billetes</a></li>--> 
                     <li><a href="<?php echo base_url();?>mercadom/list">Monedas</a></li>
                      <li><a href="<?php echo base_url();?>mercadob/listb">Busquedas de Billetes</a></li>
                     <li><a href="<?php echo base_url();?>mercadom/listb">Busquedas de Monedas</a></li>                     
                    </ul>
                  </li>                  

                  <li><a><i class="fa fa-file-text"></i> Sugerencias <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo base_url();?>sugerencias/list">Listado de Sugerencias</a></li>
                      <?php if($this->session->userdata("tipo_usuario")==1 ):?>
                         <li><a href="<?php echo base_url();?>sugerencias/list_monedas">Sugerencias para Monedas</a></li>
                       <?php endif; ?> 
                    </ul>
                  </li> 

                   <li><a><i class="fa fa-paypal"></i> Membresías <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                     <?php if($this->session->userdata("tipo_usuario")==1 ):?>
                       <li><a href="<?php echo base_url();?>membresias/list">Listado de Membresías</a></li>
                      <?php endif; ?> 
                      <li><a href="<?php echo base_url();?>membresias/inf">Estado de mi Membresía</a></li>
                    </ul>
                  </li> 
                 <?php if($this->session->userdata("tipo_usuario")==1 ):?>
                    <li><a><i class="fa fa-user"></i>Administradores <span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu">
                       
                         <li><a href="<?php echo base_url();?>membresias/list_users_admins">Ver Administradores</a></li>
                       
                      </ul>
                    </li>                 
                  <?php endif; ?> 
                </ul>
              </div>            

            </div>
            <!-- /sidebar menu -->          
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="<?php echo base_url();?>public/images/img.jpg" alt=""><?php echo $this->session->userdata("nombre_persona")?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">                    
                    <li><a href="<?php echo base_url(); ?>auth/logout"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>

              
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->
<!-----------------------------------ASIDE Y HEADER--------------------------------------------->
 <!----------------------------------------page content AQUI EMPIEZA EL CONTENIDO DE LA PAGINA-->
       
          <?php echo $content_for_layout; ?>       
        <!------------------------------------- /page content AQUI TERMINA EL CONTENIDO DE LA PAGINA-->



<!-------------------------------------------FOOTER------------------------------------>
        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

 <!-- jQuery -->
    <script src="<?php echo base_url();?>public/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?php echo base_url();?>public/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url();?>public/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="<?php echo base_url();?>public/vendors/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="<?php echo base_url();?>public/vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="<?php echo base_url();?>public/vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="<?php echo base_url();?>public/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="<?php echo base_url();?>public/vendors/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="<?php echo base_url();?>public/vendors/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="<?php echo base_url();?>public/vendors/Flot/jquery.flot.js"></script>
    <script src="<?php echo base_url();?>public/vendors/Flot/jquery.flot.pie.js"></script>
    <script src="<?php echo base_url();?>public/vendors/Flot/jquery.flot.time.js"></script>
    <script src="<?php echo base_url();?>public/vendors/Flot/jquery.flot.stack.js"></script>
    <script src="<?php echo base_url();?>public/vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="<?php echo base_url();?>public/vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="<?php echo base_url();?>public/vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="<?php echo base_url();?>public/vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="<?php echo base_url();?>public/vendors/DateJS/build/date.js"></script>
    <!-- JQVMap -->
    <script src="<?php echo base_url();?>public/vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="<?php echo base_url();?>public/vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="<?php echo base_url();?>public/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="<?php echo base_url();?>public/vendors/moment/min/moment.min.js"></script>
    <script src="<?php echo base_url();?>public/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

    <script src="<?php echo base_url();?>public/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url();?>public/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>public/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?php echo base_url();?>public/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>public/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="<?php echo base_url();?>public/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="<?php echo base_url();?>public/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="<?php echo base_url();?>public/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="<?php echo base_url();?>public/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="<?php echo base_url();?>public/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?php echo base_url();?>public/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="<?php echo base_url();?>public/vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="<?php echo base_url();?>public/vendors/jszip/dist/jszip.min.js"></script>
    <script src="<?php echo base_url();?>public/vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="<?php echo base_url();?>public/vendors/pdfmake/build/vfs_fonts.js"></script>

    <!--ESTILOS MAPA-->
     <script src="<?php echo base_url();?>public/js_mapa/imageMapResizer.min.js"></script>
     <script src="<?php echo base_url();?>public/js_mapa/jquery.maphighlight.min.js"></script>
    <!--ESTILOS MAPA-->    

    <!-- Custom Theme Scripts -->
    <script src="<?php echo base_url();?>public/build/js/custom.min.js"></script> 
    <!--GRAFICAS-->
    <script src="https://cdnjs.com/libraries/Chart.js"></script>
    <!--GRAFICAS-->    

    <!--Scripts Personalizados-->
    <script src="<?php echo base_url();?>public/zoomy.js"></script>
     <script src="<?php echo base_url();?>public/app.js"></script>
<!-------------------------------------JS PARA EL MAPA--> 
  <script type="text/javascript">        
        function cargarEstado(id_estado){
            //que quiero hacercuando se seleccione un estado
            console.log('Se selecciono el id_estado: '+id_estado);
        }
        /* State Names */
        var state_names = new Array();
        var state_class = new Array();
            state_names[1]="Aguascalientes";state_names[2]="Baja California";state_names[3]="Baja California Sur";state_names[4]="Campeche";state_names[5]="Coahuila";state_names[6]="Colima";state_names[7]="Chiapas";state_names[8]="Chihuahua";state_names[9]="Distrito Federal";state_names[10]="Durango";state_names[11]="Guanajuato";state_names[12]="Guerrero";state_names[13]="Hidalgo";state_names[14]="Jalisco";state_names[15]="Estado de M&eacute;xico";state_names[16]="Michoac&aacute;n";state_names[17]="Morelos";state_names[18]="Nayarit";state_names[19]="Nuevo Le&oacute;n";state_names[20]="Oaxaca";state_names[21]="Puebla";state_names[22]="Quer&eacute;taro";state_names[23]="Quintana roo";state_names[24]="San Luis Potos&iacute;";state_names[25]="Sinaloa";state_names[26]="Sonora";state_names[27]="Tabasco";state_names[28]="Tamaulipas";state_names[29]="Tlaxcala";state_names[30]="Veracruz";state_names[31]="Yucat&aacute;n";state_names[32]="Zacatecas";
            state_class[1]="AGU";state_class[2]="BCN";state_class[3]="BCS";state_class[4]="CAM";state_class[5]="COA";state_class[6]="COL";state_class[7]="CHP";state_class[8]="CHH";state_class[9]="DIF";state_class[10]="DUR";state_class[11]="GUA";state_class[12]="GRO";state_class[13]="HID";state_class[14]="JAL";state_class[15]="MEX";state_class[16]="MIC";state_class[17]="MOR";state_class[18]="NAY";state_class[19]="NLE";state_class[20]="OAX";state_class[21]="PUE";state_class[22]="QUE";state_class[23]="ROO";state_class[24]="SLP";state_class[25]="SIN";state_class[26]="SON";state_class[27]="TAB";state_class[28]="TAM";state_class[29]="TLA";state_class[30]="VER";state_class[31]="YUC";state_class[32]="ZAC";
        $(function () {
            $('.listaEdos').mouseover(function(e) {                
                $($(this).data('parent-map')).mouseover();
            }).mouseout(function(e) {                
                $($(this).data('parent-map')).mouseout();                    
            }).click(function(e) { 
                e.preventDefault(); 
                $($(this).data('parent-map')).click(); 
            });
            
        
            $('.area').hover(function () {
                var id_estado = $(this).data('id-estado');
                var meid = $(this).attr('id');
                $('#edo').html(state_names[id_estado]);                
                $('#letras'+meid).addClass('listaEdosHover');
                $('.escudo').addClass('escudo_img');
                if(last_selected_id_estado!==null){
                    $('.escudo').removeClass(state_class[last_selected_id_estado]);
                }
                $('.escudo').addClass(meid);
            }).mouseout(function () {
                var meid = $(this).attr('id');
                $('#letras'+meid).removeClass('listaEdosHover');
                $('.escudo').removeClass(meid);
                if(last_selected_id_estado!==null){
                    $('#edo').html(state_names[last_selected_id_estado]);
                    $('.escudo').addClass(state_class[last_selected_id_estado]);
                }else{                    
                    $('#edo').html("&nbsp;");
                    $('.escudo').removeClass('escudo_img');
                    //$('.escudo').attr('class','escudo');
                }
            });
            //$('#map_ID').imageMapResize();//funciona perfectamente
            var areaLastClicked=null;
            var last_selected_id_estado=null;
            $('.area').click(function (e) {
                    e.preventDefault();
                    var $area = $(this);
                    var meid = $area.attr('id');
                    //$('.area').mouseout();
                    var data = $area.data('maphilight') || {};                    
                    if(areaLastClicked!==null){                        
                        var lastData = areaLastClicked.data('maphilight') || {};
                        lastData.alwaysOn=false;
                        $('#letras'+areaLastClicked.attr('id')).removeClass('listaEdosActive');
                        $('.escudo').removeClass(state_class[last_selected_id_estado]);
                    }
                    $('#letras'+meid).addClass('listaEdosActive');
                    areaLastClicked=$area;
                    //data.alwaysOn = !data.alwaysOn;
                    data.alwaysOn = true;
                    $(this).data('maphilight', data).trigger('alwaysOn.maphilight');
                    last_selected_id_estado = $(this).data('id-estado');
                    cargarEstado(last_selected_id_estado);
            });
                                    
            $('.map').maphilight({ fade: true,strokeColor: '950054', fillColor: '950054', fillOpacity: 0.3 });//funciona, pero no cuando se redimienciona la imagen (cuando se cambia el estylo de la img con widt o height)                        
        });
                            
</script>   
<!-------------------------------------JS PARA EL MAPA-->

<!--JS PARA EL GRAFICO-->
<script>
 $( document ).ready(function() {
    var hoy = new Date()    
    var yyyy = hoy.getFullYear();
    ano_proyecto    = yyyy;
      
  

datagrafico(ano_proyecto);
}); 

</script>




<script>
  $("#ano_proyecto").on("change",function(){
         ano_proyecto    = $('#ano_proyecto').val();
         datagrafico(ano_proyecto);      
    });

  /*****GRAFICAS EVENTO*****/
function datagrafico(ano_proyecto){
namesMonth= ["Enero","Feb","Mar","Abr","Mayo","Jun","Jul","Ago","Set","Oct","Nov","Dic"];
//http://lamonedamexicana.com.mx/
var base_url= 'http://localhost/sistema_monedas/';
//alert('GRAFICOS');
        $.ajax({
            url: base_url + "dashboard/grafica/"+ ano_proyecto,
            type:"POST",
            //data:{idpozo: idpozo},
            dataType:"json",
            success:function(data){    
                if (data==0) {
                      $("canvas#myChart").remove();
                      document.getElementById("sin_registros").style.display = "block";
                      document.getElementById("sin_registros").innerHTML = "<center><h3>No hay Registros</h3></center>";                     

                }else{
                    var meses = new Array();
                    var registros = new Array();
                    $.each(data,function(key, value){
                        meses.push(namesMonth[value.mes - 1]);
                        registros.push(value.total_registros);
                    }); 
/*BUSCA EL MAYOR VALOR Y SUMA PARA QUE ESTE ARRIBA POR 5 NUMEROS*/
                    var valor_maximo = Math.max.apply(null,registros); //<----

                    suma = 0;
                    i = 0;
                    var valor_maximo_numero = Number(valor_maximo);
                    while (suma < valor_maximo_numero+5) {
                          suma = valor_maximo_numero+i;
                          i++;
                    } 

 /*BUSCA EL MAYOR VALOR Y SUMA PARA QUE ESTE ARRIBA POR 5 NUMEROS*/  
                       $("canvas#myChart").remove();
                       $("div.myChart").append('<canvas id="myChart" width="400" height="200"></canvas> '); 
                       graficar(meses,registros,suma);   
                       document.getElementById("sin_registros").style.display = "none";
                       //alert(data);
                }
                
            }
        });
}
/*****GRAFICAS EVENTO*****/

/*****GRAFICAS*****/
function graficar(meses,registros,suma){ 
            var ctx = document.getElementById("myChart"); 
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: meses,
                    datasets: [{
                        data: registros,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)',
                            'rgb(179, 255, 179,0.2)',
                            'rgb(173, 173, 133,0.2)',
                            'rgb(255, 140, 102,0.2)',
                            'rgb(255, 128, 191,0.2)',
                            'rgb(26, 102, 255,0.2)',
                            'rgb(102, 153, 153,0.2)'
                        ],
                        borderColor: [
                            'rgba(255,99,132,1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)',
                            'rgb(179, 255, 179,1)',
                            'rgb(173, 173, 133,1)',
                            'rgb(255, 140, 102,1)',
                            'rgb(255, 128, 191,1)',
                            'rgb(26, 102, 255,1)',
                            'rgb(102, 153, 153,1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero:true,
                                steps: 1,
                                stepValue: 1,
                                max: suma
                            }
                        }]
                    },
                    legend: {
                        display: false
                     },                 
                }
            });


}
</script>
<!--JS PARA EL GRAFICO-->


</body>
</html>
<!-------------------------------------------FOOTER------------------------------------>