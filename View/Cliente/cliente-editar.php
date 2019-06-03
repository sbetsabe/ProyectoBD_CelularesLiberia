<div class="contTitleService">
    <div class="subContTitleService">
        <div id="titleService" class="container">
            <h1 class="page-header"><?php echo $clie->cedula != null ? 'Editar Registro' : 'Nuevo Registro'; ?></h1>
        </div>
    </div>
</div>

<div class="container">
    <div>
        <ol class="breadcrumb">
            <li><a class="moduloTitle" href="?c=Cliente">Modulo de Cliente</a></li>
            <li id="NewEdit" class="active"><?php echo $clie->cedula != null ? 'Editar Registro' : 'Nuevo Registro'; ?></li>
        </ol>
    </div>
    <form id="frm-cliente" action="?c=Cliente&a=Guardar" method="post" enctype="multipart/form-data" onsubmit="miFuncion()">
        <div class="form-group">
            <label>Cedula:</label>
            <input name="cedula" value="<?php echo $clie->cedula; ?>" class="form-control" placeholder="Numero de identificacion" data-validacion-tipo="requerido|min:3"/>
        </div>

        <div class="form-group">
            <label>Nombre:</label>
            <input type="text" name="Nombre" value="<?php echo $clie->nombre; ?>" class="form-control" placeholder="Ingrese su nombre" data-validacion-tipo="requerido|min:3" />
        </div>

        <div class="form-group">
            <label>Apellidos:</label>
            <input type="text" name="Apellidos" value="<?php echo $clie->apellidos; ?>" class="form-control" placeholder="Ingrese su apellidos" data-validacion-tipo="requerido|min:7" />
        </div>

        <div class="form-group">
            <label>Telefono:</label>
            <input type="text" name="Telefono" value="<?php echo $clie->telefono; ?>" class="form-control" placeholder="Ingrese su numero de telefono" data-validacion-tipo="requerido|min:3" />
        </div>

        <div class="form-group">
            <label>Email:</label>
            <input type="text" name="Email" value="<?php echo $clie->email; ?>" class="form-control" placeholder="Ingrese su clave" data-validacion-tipo="requerido|min:4" minlength="6" />
        </div>
        <div class="form-group">
            <label>Direccion:</label>
            <input type="text" name="Direccion" value="<?php echo $clie->direccion; ?>" class="form-control" placeholder="Ingrese su clave" data-validacion-tipo="requerido|min:4" minlength="6" />
        </div>

        <div class="text-right">
            <button id="botonGuardar" class="btn btn-success">Guardar</button>
        </div>
    </form>
</div>

<script>
    $(document).ready(function () {
        $("#frm-cliente").submit(function () {
            return $(this).validate();

        });
    })

</script>
