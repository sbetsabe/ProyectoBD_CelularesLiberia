<div class="contTitleService">
    <div class="subContTitleService">
        <div id="titleService" class="container">
            <h1 class="page-header">Pedido</h1>
        </div>
    </div>
</div>

<form action="?c=Pedido" method="post">

  <div class="well well-sm text-right">

    <div class="contLabelBuscar">
          <label class="labelBuscar">Buscar:</label>
          <input class="form-control" id="buscar" type="text"  placeholder="Escriba algo para buscar"  height="60px"/>
      </div>

      <div id="margenCont">
          <a id="botonRegistrar" class="btn btn-primary" href="?c=Pedido&a=Registrar">Realizar pedido</a>
          <input id="botonEditar" type="submit" value="Editar" name="a" class="btn btn-primary"/>
          <input id="botonEliminar" type="submit" value="Eliminar" name="a" onclick="javascript:return confirm('¿Seguro de eliminar este pedido?');" class="btn btn-primary"/>
      </div>
  </div>

  <table id="tabla" class="table table-striped">
      <thead>
          <tr>
              <th class="spaceCol"></th>
              <th class="spaceCol">Codigo del pedido</th>
              <th class="spaceCol">Direccion de envio</th>
              <th class="spaceCol">Fecha del pedido</th>
              <th class="spaceCol">Empleado</th>
          </tr>
      </thead>
      <tbody>
          <?php foreach ($this->model->ListarPedidos() as $emple): ?>
              <?php $valor = $emple->idPedido; ?>
              <tr>
                  <td><input id="marginRadio" type=radio name=idPedido value=<?php echo $emple->idPedido; ?> ></td>
                  <td><?php echo $emple->idPedido; ?></td>
                  <td><?php echo $emple->direccionEnvio; ?></td>
                  <td><?php echo $emple->fecha; ?></td>
                  <td><?php echo $emple->empleado; ?></td>
              </tr>
          <?php endforeach; ?>
      <script src="assets/js/buscador.js"></script>
      </tbody>
  </table>
</form>
