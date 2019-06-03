<div class="contTitleService">
    <div class="subContTitleService">
        <div id="titleService" class="container">
            <h1 class="page-header"><?php echo $emple->idPedido != null ? 'Editar Pedido' : 'Nuevo Pedido'; ?></h1>
        </div>
    </div>
</div>

<div class="container">
    <div>
        <ol class="breadcrumb">
            <li><a class="moduloTitle" href="?c=Pedido">Modulo de Pedidos</a></li>
            <li id="NewEdit" class="active"><?php echo $emple->idPedido != null ? 'Editar Pedido' : 'Nuevo Pedido'; ?></li>
        </ol>
    </div>

    <form id="frm-pedido" action="?c=Pedido&a=Guardar" method="post" enctype="multipart/form-data" onsubmit="miFuncion()">
        <div class="form-group">
            <label>Codigo del pedido</label>
            <input name="idPedido" value="<?php echo $emple->idPedido; ?>" class="form-control" placeholder="Codigo del pedido" data-validacion-tipo="requerido|min:3"/>
        </div>

        <div class="form-group">
            <label>Direccion de envio</label>
            <input type="text" name="direccionEnvio" value="<?php echo $emple->direccionEnvio; ?>" class="form-control" placeholder="Ingrese la direccon de envio" data-validacion-tipo="requerido|min:3" />
        </div>

        <div class="form-group">
            <label>Fecha</label>
            <input type="date" name="fecha" value="<?php echo $emple->fecha; ?>" class="form-control" placeholder="Ingrese Fecha del pedido" data-validacion-tipo="requerido|min:3" />
        </div>

        <div class="form-group">
            <label>Empleado:</label>
            <select name="empleado" class="form-control">

              <!-- Este metodo llama de la base de datos los id de los empleados -->
              <option value="">No seleccionado</option>

              <?php foreach ($this->modelEmp->ListarEmpleados() as $emp) :
                 $valor = $emp->idEmpleado; ?>

                 <option <?php echo $valor == $emple->empleado ? 'selected' : ''; ?> value="<?php echo $valor ?>"><?php echo $emp->idEmpleado; ?></option>

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
        $("#frm-pedido").submit(function () {
            return $(this).validate();

        });
    })

</script>
