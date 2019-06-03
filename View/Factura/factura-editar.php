<div class="contTitleService">
    <div class="subContTitleService">
        <div id="titleService" class="container">
            <h1 class="page-header"><?php echo $fac->numeroCompra != null ? 'Editar Registro' : 'Nuevo Registro'; ?></h1>
        </div>
    </div>
</div>


<div class="container">
  <div>
      <ol class="breadcrumb">
          <li><a class="moduloTitle" href="?c=Factura">Modulo de Factura</a></li>
          <li id="NewEdit" class="active"><?php echo $fac->numeroCompra != null ? 'Editar Registro' : 'Nuevo Registro'; ?></li>
      </ol>
  </div>

  <form id="frm-factura" action="?c=Factura&a=Guardar" method="post" enctype="multipart/form-data" onsubmit="miFuncion()">
      <div class="form-group">
          <label>Numero de factura:</label>
          <input name="numeroCompra" value="<?php echo $fac->numeroCompra; ?>" class="form-control" placeholder="Numero de factura" data-validacion-tipo="requerido|min:3"/>
      </div>

      <div class="form-group">
          <label>Fecha:</label>
          <input type="text" name="fecha" value="<?php echo $fac->fecha; ?>" class="form-control" placeholder="Ingrese la fecha" data-validacion-tipo="requerido|min:3" />
      </div>

      <div class="form-group">
          <label>Impuesto:</label>
          <input type="text" name="impuesto" value="<?php echo $fac->impuesto; ?>" class="form-control" placeholder="Ingrese el impuesto a pagar" data-validacion-tipo="requerido|min:3" />
      </div>

      <div class="form-group">
          <label>Descuento:</label>
          <input type="text" name="descuento" value="<?php echo $fac->descuento; ?>" class="form-control" placeholder="Ingrese el descuento" data-validacion-tipo="requerido|min:3" />
      </div>

      <div class="form-group">
          <label>Codigo del Empleado:</label>
          <select name="empleado" class="form-control">

            <!-- Este metodo llama de la base de datos los id de los empleados -->
            <option value="">No seleccionado</option>

            <?php foreach ($this->modelEmp->ListarEmpleados() as $emp) :
               $valor = $emp->idEmpleado; ?>

               <option <?php echo $valor == $fac->empleado ? 'selected' : ''; ?> value="<?php echo $valor ?>"><?php echo $emp->idEmpleado; ?></option>

            <?php endforeach; ?>
        <script src="assets/js/buscador.js"></script>
        </select>
      </div>

      <div class="form-group">
          <label>Total a pagar:</label>
          <input type="text" name="total" value="<?php echo $fac->total; ?>" class="form-control" placeholder="Total a pagar" data-validacion-tipo="requerido|min:3" />
      </div>

      <div class="form-group">
          <label>Cedula del Cliente:</label>
          <select name="cliente" class="form-control">

            <!-- Este metodo llama de la base de datos los id de los empleados -->
            <option value="">No seleccionado</option>

            <?php foreach ($this->modelCli->ListarClientes() as $emp) :
               $valor = $emp->cedula ?>

               <option <?php echo $valor == $fac->cliente ? 'selected' : ''; ?> value="<?php echo $valor ?>"><?php echo $emp->cedula; ?></option>

            <?php endforeach; ?>
        <script src="assets/js/buscador.js"></script>
        </select>
      </div>

      <div class="form-group">
          <label>Codigo del producto:</label>
          <select name="producto" class="form-control">

            <!-- Este metodo llama de la base de datos los id de los empleados -->
            <option value="">No seleccionado</option>

            <?php foreach ($this->modelPro->ListarProductos() as $emp) :
               $valor = $emp->codigo; ?>

               <option <?php echo $valor == $fac->producto ? 'selected' : ''; ?> value="<?php echo $valor ?>"><?php echo $emp->codigo; ?></option>

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
        $("#frm-factura").submit(function () {
            return $(this).validate();

        });
    })

</script>
