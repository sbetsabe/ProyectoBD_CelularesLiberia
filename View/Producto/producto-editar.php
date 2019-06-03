<div class="contTitleService">
    <div class="subContTitleService">
        <div id="titleService" class="container">
            <h1 class="page-header"><?php echo $emple->codigo != null ? 'Editar Registro' : 'Nuevo Registro'; ?></h1>
        </div>
    </div>
</div>

<div class="container">
  <div>
      <ol class="breadcrumb">
          <li><a class="moduloTitle" href="?c=Producto">Modulo de Producto</a></li>
          <li id="NewEdit" class="active"><?php echo $emple->codigo != null ? 'Editar Registro' : 'Nuevo Registro'; ?></li>
      </ol>
  </div>

  <form id="frm-producto" action="?c=Producto&a=Guardar" method="post" enctype="multipart/form-data" onsubmit="miFuncion()">
      <div class="form-group">
          <label>Codigo producto:</label>
          <input name="codigo" value="<?php echo $emple->codigo; ?>" class="form-control" placeholder="Codigo del producto" data-validacion-tipo="requerido|min:3"/>
      </div>

      <div class="form-group">
          <label>Nombre del producto:</label>
          <input type="text" name="nombreProducto" value="<?php echo $emple->nombreProducto; ?>" class="form-control" placeholder="Ingrese el nombre del producto" data-validacion-tipo="requerido|min:3" />
      </div>

      <div class="form-group">
          <label>Marca del producto:</label>
          <input type="text" name="marca" value="<?php echo $emple->marca; ?>" class="form-control" placeholder="Ingrese la marca del producto" data-validacion-tipo="requerido|min:3" />
      </div>

      <div class="form-group">
          <label>Descripcion del producto:</label>
          <input type="text" name="descripcion" value="<?php echo $emple->descripcion; ?>" class="form-control" placeholder="Ingrese la descripcion del producto" data-validacion-tipo="requerido|min:3" />
      </div>

      <div class="form-group">
          <label>Tipo de producto:</label>
          <select name="tipo" class="form-control">
              <option value="">No seleccionado</option>
              <option <?php echo $emple->tipo == 'Repuesto' ? 'selected' : ''; ?> value="Repuesto">Repuesto</option>
              <option <?php echo $emple->tipo == 'Accesorio' ? 'selected' : ''; ?> value="Accesorio">Accesorio</option>
          </select>
      </div>

      <div class="form-group">
          <label>Cantidad en stock:</label>
          <input type="number" name="stock" value="<?php echo $emple->stock; ?>" class="form-control" min="0"/>
      </div>

      <div class="form-group">
          <label>Codigo del Proveedor:</label>
          <select name="proveedor" class="form-control">

            <!-- Este metodo llama de la base de datos los id de los empleados -->
            <option value="">No seleccionado</option>

            <?php foreach ($this->modelPro->ListarProveedores() as $emp) :
               $valor = $emp->cedulaJuridica; ?>

               <option <?php echo $valor == $emple->proveedor ? 'selected' : ''; ?> value="<?php echo $valor ?>"><?php echo $emp->cedulaJuridica; ?></option>

            <?php endforeach; ?>
        <script src="assets/js/buscador.js"></script>
        </select>
      </div>

      <div class="form-group">
          <label>Codigo de la bodega:</label>
          <select name="bodega" class="form-control">

            <!-- Este metodo llama de la base de datos los id de los empleados -->
            <option value="">No seleccionado</option>

            <?php foreach ($this->modelBod->ListarBodegas() as $emp) :
               $valor = $emp->idBodega; ?>

               <option <?php echo $valor == $emple->bodega ? 'selected' : ''; ?> value="<?php echo $valor ?>"><?php echo $emp->idBodega; ?></option>

            <?php endforeach; ?>
        <script src="assets/js/buscador.js"></script>
        </select>
      </div>

      <div class="text-right">
          <button id="botonGuardar" class="btn btn-success">Guardar</button>
      </div>
  </form>
</div>

<script>
    $(document).ready(function () {
        $("#frm-producto").submit(function () {
            return $(this).validate();

        });
    })

</script>
