<div class="contTitleService">
    <div class="subContTitleService">
        <div id="titleService" class="container">
            <h1 class="page-header"><?php echo $emple->idBodega != null ? 'Editar Registro' : 'Nuevo Registro'; ?></h1>
        </div>
    </div>
</div>

<div class="container">
    <div>
        <ol class="breadcrumb">
            <li><a class="moduloTitle" href="?c=Bodega">Modulo de Bodega</a></li>
            <li id="NewEdit" class="active"><?php echo $emple->idBodega != null ? 'Editar Registro' : 'Nuevo Registro'; ?></li>
        </ol>
    </div>

    <form id="frm-bodega" action="?c=Bodega&a=Guardar" method="post" enctype="multipart/form-data" onsubmit="miFuncion()">
        <div class="form-group">
              <label>Codigo de bodega</label>
              <input name="idBodega" value="<?php echo $emple->idBodega; ?>" class="form-control" placeholder="Codigo de bodega" data-validacion-tipo="requerido|min:3"/>
          </div>

          <div class="form-group">
              <label>Nombre</label>
              <input type="text" name="nombre" value="<?php echo $emple->nombre; ?>" class="form-control" placeholder="Ingrese su nombre de bodega" data-validacion-tipo="requerido|min:3" />
          </div>

          <div class="form-group">
            <label>Telefono</label>
            <input type="text" name="telefono" value="<?php echo $emple->telefono; ?>" class="form-control" placeholder="Ingrese su numero de telefono" data-validacion-tipo="requerido|min:3" />
          </div>

          <div class="form-group">
            <label>Direccion</label>
            <input type="text" name="direccion" value="<?php echo $emple->direccion; ?>" class="form-control" placeholder="Ingrese la direccion" data-validacion-tipo="requerido|min:3" />
          </div>

        <div class="form-group">
          <label>Email</label>
          <input type="text" name="email" value="<?php echo $emple->email; ?>" class="form-control" placeholder="Ingrese email" data-validacion-tipo="requerido|min:3" />
        </div>

        <div class="text-right"> <!--contenedor boton guardar registro-->
            <button id="botonGuardar" class="btn btn-success">Guardar</button>
        </div>
    </form>
</div>
    </form>

</div>
<script>
    $(document).ready(function () {
        $("#frm-bodega").submit(function () {
            return $(this).validate();

        });
    })
</script>
