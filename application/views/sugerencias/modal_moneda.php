<div class="contenido_modal">

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#informacion" aria-controls="informacion" role="tab" data-toggle="tab">Informacion</a></li>
    <li role="presentation"><a href="#imagenes" aria-controls="imagenes" role="tab" data-toggle="tab">Imagenes</a></li>
    <li role="presentation"><a href="#catalogo" aria-controls="catalogo" role="tab" data-toggle="tab">Catalogos</a></li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane fade in active" id="informacion">
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