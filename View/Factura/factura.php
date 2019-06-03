<div class="contTitleService">
    <div class="subContTitleService">
        <div id="titleService" class="container">
            <h1 class="page-header">Factura</h1>
        </div>
    </div>
</div>


<form action="?c=Factura" method="post">
    <div class="well well-sm text-right">

        <div class="contLabelBuscar"> <!--Contenedor de busqueda-->
          <label class="labelBuscar">Buscar:</label>
          <input class="form-control" id="buscar" type="text"  placeholder="Escriba algo para buscar"  height="60px"/>
        </div> <!--Fin Contenedor de busqueda-->

          <div id="margenCont"> <!--Contenedor de botones-->
            <a id="botonRegistrar" class="btn btn-primary" href="?c=Factura&a=Registrar">Registrar</a>
            <input id="botonEditar" type="submit" value="Editar" name="a" class="btn btn-primary"/>
            <input id="botonEliminar" type="submit" value="Eliminar" name="a" onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" class="btn btn-primary"/>
          </div> <!--Fin Contenedor de botones-->

          <table id="tabla" class="table table-striped">
            <thead> <!--Encabezado tabla-->
              <tr>
                <th class="spaceCol"></th>
                <th class="spaceCol">Numero de compra</th>
                <th class="spaceCol">Fecha</th>
                <th class="spaceCol">Impuesto</th>
                <th class="spaceCol">Descuento</th>
                <th class="spaceCol">Empleado</th>
                <th class="spaceCol">Total</th>
                <th class="spaceCol">Cliente</th>
                <th class="spaceCol">Producto</th>
                <th class="spaceCol"></th>
              </tr>
            </thead> <!--Fin Encabezado tabla-->
            <tbody>
              <?php foreach ($this->model->ListarFacturas() as $fac): ?>
                <?php $valor = $fac->numeroCompra; ?>
                <tr>
                    <td><input id="marginRadio" type=radio name=numeroCompra value=<?php echo $fac->numeroCompra; ?> ></td>
                    <td><?php echo $fac->numeroCompra; ?></td>
                    <td><?php echo $fac->fecha; ?></td>
                    <td><?php echo $fac->impuesto; ?></td>
                    <td><?php echo $fac->descuento; ?></td>
                    <td><?php echo $fac->empleado; ?></td>
                    <td><?php echo $fac->total; ?></td>
                    <td><?php echo $fac->cliente; ?></td>
                    <td><?php echo $fac->producto; ?></td>
                </tr>
              <?php endforeach; ?>
            <script src="assets/js/buscador.js"></script>
          </tbody>
          </table>
    </div>
</form>
