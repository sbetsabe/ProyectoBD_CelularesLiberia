<div class="contTitleService">
    <div class="subContTitleService">
        <div id="titleService" class="container">
            <h1 class="page-header">Cliente</h1>
        </div>
    </div>
</div>


<form action="?c=Cliente" method="post">

    <div class="well well-sm text-right">

      <div class="contLabelBuscar">
            <label class="labelBuscar">Buscar:</label>
            <input class="form-control" id="buscar" type="text"  placeholder="Escriba algo para buscar"  height="60px"/>
        </div>

        <div id="margenCont">
            <a id="botonRegistrar" class="btn btn-primary" href="?c=Cliente&a=Registrar">Registrar</a>
            <input id="botonEditar" type="submit" value="Editar" name="a" class="btn btn-primary"/>
            <input id="botonEliminar" type="submit" value="Eliminar" name="a" onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" class="btn btn-primary"/>
        </div>
    </div>

    <table id="tabla" class="table table-striped">
        <thead>
            <tr>
                <th class="spaceCol"></th>
                <th class="spaceCol">Identificacion</th>
                <th class="spaceCol">Nombre</th>
                <th class="spaceCol">Apellidos</th>
                <th class="spaceCol">Telefono</th>
                <th class="spaceCol">Direccion</th>
                <th class="spaceCol">Email</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($this->model->ListarClientes() as $clie): ?>
                <?php $valor = $clie->cedula; ?>
                <tr>
                    <td><input id="marginRadio" type=radio name=id value=<?php echo $clie->cedula; ?> ></td>
                    <td><?php echo $clie->cedula; ?></td>
                    <td><?php echo $clie->nombre; ?></td>
                    <td><?php echo $clie->apellidos; ?></td>
                    <td><?php echo $clie->telefono; ?></td>
                    <td><?php echo $clie->direccion; ?></td>
                    <td><?php echo $clie->email; ?></td>
                </tr>
            <?php endforeach; ?>
        <script src="assets/js/buscador.js"></script>
        </tbody>
    </table>
</form>
