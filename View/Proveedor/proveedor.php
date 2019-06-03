<div class="contTitleService">
    <div class="subContTitleService">
        <div id="titleService" class="container">
            <h1 class="page-header">Proveedor</h1>
        </div>
    </div>
</div>

<form action="?c=Proveedor" method="post">

    <div class="well well-sm text-right">

      <div class="contLabelBuscar">
            <label class="labelBuscar">Buscar:</label>
            <input class="form-control" id="buscar" type="text"  placeholder="Escriba algo para buscar"  height="60px"/>
        </div>

        <div id="margenCont">
            <a id="botonRegistrar" class="btn btn-primary" href="?c=Proveedor&a=Registrar">Registrar</a>
            <input id="botonEditar" type="submit" value="Editar" name="a" class="btn btn-primary"/>
            <input id="botonEliminar" type="submit" value="Eliminar" name="a" onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" class="btn btn-primary"/>
        </div>
    </div>

    <table id="tabla" class="table table-striped">
        <thead>
            <tr>
                <th class="spaceCol"></th>
                <th class="spaceCol">Cedula Jurdica</th>
                <th class="spaceCol">Nombre</th>
                <th class="spaceCol">Telefono</th>
                <th class="spaceCol">Email</th>
                <th class="spaceCol">Tipo de Proveedor</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($this->model->ListarProveedores() as $prov): ?>
                <?php $valor = $prov->cedulaJuridica; ?>
                <tr>
                    <td><input id="marginRadio" type=radio name=cedulaJuridica value=<?php echo $prov->cedulaJuridica; ?> ></td>
                    <td><?php echo $prov->cedulaJuridica; ?></td>
                    <td><?php echo $prov->nombre; ?></td>
                    <td><?php echo $prov->telefono; ?></td>
                    <td><?php echo $prov->email; ?></td>
                    <td><?php echo $prov->tipo; ?></td>
                </tr>
            <?php endforeach; ?>
        <script src="assets/js/buscador.js"></script>
        </tbody>
    </table>
</form>
