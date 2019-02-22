<div class="contenido_modal">

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
     <li class="nav-item">
           <a class="nav-link active" id="informacion-tab" data-toggle="tab" href="#informacion" role="tab" aria-controls="home" aria-selected="true">Informacion</a>
    </li>

    <li class="nav-item">
      <a class="nav-link" id="imagenes-tab" data-toggle="tab" href="#imagenes" role="tab" aria-controls="profile" aria-selected="false">Imagenes</a>
    </li>

    <li class="nav-item">
      <a class="nav-link" id="catalogo-tab" data-toggle="tab" href="#catalogo" role="tab" aria-controls="contact" aria-selected="false">Catalogos</a>
    </li>


  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane fade in active show" id="informacion">
      <?php require_once 'informacion.php' ?>
    </div>
    <div role="tabpanel" class="tab-pane fade" id="imagenes">
       <?php require_once 'imagenes.php' ?>
    </div>
    <div role="tabpanel" class="tab-pane fade" id="catalogo">
      <?php require_once 'catalogos.php' ?>
    </div>
  </div>

</div>