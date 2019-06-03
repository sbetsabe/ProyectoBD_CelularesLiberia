<div class="contTitleService">
    <div class="subContTitleService">
        <div id="titleService" class="container">
            <h1 class="page-header">Producto</h1>
        </div>
    </div>
</div>

<form action="?c=Producto" method="post">
    <div class="well well-sm text-right">

        <div class="contLabelBuscar"> <!--Contenedor de busqueda-->
          <label class="labelBuscar">Buscar:</label>
          <input class="form-control" id="buscar" type="text"  placeholder="Escriba algo para buscar"  height="60px"/>
        </div> <!--Fin Contenedor de busqueda-->

          <div id="margenCont"> <!--Contenedor de botones-->
            <a id="botonRegistrar" class="btn btn-primary" href="?c=Producto&a=Registrar">Registrar</a>
            <input id="botonEditar" type="submit" value="Editar" name="a" class="btn btn-primary"/>
            <input id="botonEliminar" type="submit" value="Eliminar" name="a" onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" class="btn btn-primary"/>
          </div> <!--Fin Contenedor de botones-->

          <table id="tabla" class="table table-striped">
            <thead> <!--Encabezado tabla-->
              <tr>
                <th class="spaceCol"></th>
                <th class="spaceCol">Codigo</th>
                <th class="spaceCol">Nombre</th>
                <th class="spaceCol">Marca</th>
                <th class="spaceCol">Descripcion</th>
                <th class="spaceCol">Tipo</th>
                <th class="spaceCol">Stock</th>
                <th class="spaceCol">Proveedor</th>
                <th class="spaceCol">Bodega</th>
                <th class="spaceCol"></th>
              </tr>
            </thead> <!--Fin Encabezado tabla-->
            <tbody>
              <?php foreach ($this->model->ListarProductos() as $emple): ?>
                <?php $valor = $emple->codigo; ?>
                <tr>
                    <td><input id="marginRadio" type=radio name=codigo value=<?php echo $emple->codigo; ?> ></td>
                    <td><?php echo $emple->codigo; ?></td>
                    <td><?php echo $emple->nombreProducto; ?></td>
                    <td><?php echo $emple->marca; ?></td>
                    <td><?php echo $emple->descripcion; ?></td>
                    <td><?php echo $emple->tipo; ?></td>
                    <td><?php echo $emple->stock; ?></td>
                    <td><?php echo $emple->proveedor; ?></td>
                    <td><?php echo $emple->bodega; ?></td>
                    <!--<td><?php// echo $emple->clave; ?></td>-->
                </tr>
              <?php endforeach; ?>
            <script src="assets/js/buscador.js"></script>
          </tbody>
          </table>
    </div>
</form>
