<?php
include_once 'model/empleado.php';

class EmpleadoController {

    private $model;

    public function __CONSTRUCT() {
        $this->model = new Empleado();
    }

    public function Index() {
        require_once 'view/header.php';
        require_once 'view/empleado/empleado.php';
        require_once 'view/footer.php';
    }

    //Metodo editar empleado
    public function Editar() {
        $emple = new Empleado();

        if (isset($_POST['id'])) {
            $emple = $this->model->Obtener($_POST['id']);
        }

        require_once 'view/header.php';
        require_once 'view/empleado/empleado-editar.php';
        require_once 'view/footer.php';
    }

    //Metodo registrar nuevo empleado
    public function Registrar() {
        $emple = new Empleado();

        if (isset($_POST['idEmpleado'])) {
            $emple = $this->model->Obtener($_POST['id']);
        }

        require_once 'view/header.php';
        require_once 'view/empleado/empleado-editar.php';
        require_once 'view/footer.php';
    }

    public function Guardar() {
        $emple = new empleado();

        $emple->idEmpleado = $_POST['identificacion'];
        $emple->nombre = $_POST['nombre'];
        $emple->apellidos = $_POST['apellidos'];
        $emple->telefono = $_POST['telefono'];
        $emple->puesto = $_POST['puesto'];
        $emple->clave = $_POST['clave'];
        $this->model->Obtener($_POST['identificacion']) ?
                        $this->model->Actualizar($emple) :
                        $this->model->Registrar($emple);

        header('Location: index.php?c=Empleado');
    }

    //Metodo eliminar empleado
    public function Eliminar() {
        $this->model->Eliminar($_POST['id']);
        header('Location: index.php?c=Empleado');
    }
}
?>
