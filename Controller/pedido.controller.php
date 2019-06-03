<?php
include_once 'model/pedido.php';
include_once 'model/empleado.php';

class PedidoController {
    private $model;
    private $modelEmp;

    public function __CONSTRUCT() {
        $this->model = new Pedido();
        $this->modelEmp = new Empleado();
    }

    public function Index() {
        require_once 'view/header.php';
        require_once 'view/pedido/pedido.php';
        require_once 'view/footer.php';
    }

    public function Editar() {
        $emple = new Pedido();

        if (isset($_POST['idPedido'])) {
            $emple = $this->model->Obtener($_POST['idPedido']);
        }

        require_once 'view/header.php';
        require_once 'view/pedido/pedido-editar.php';
        require_once 'view/footer.php';
    }

    public function Registrar() {
        $emple = new Pedido();

        if (isset($_POST['idPedido'])) {
            $emple = $this->model->Obtener($_POST['id']);
        }

        require_once 'view/header.php';
        require_once 'view/pedido/pedido-editar.php';
        require_once 'view/footer.php';
    }

    public function Guardar() {
        $emple = new pedido();

        $emple->idPedido = $_POST['idPedido'];
        $emple->direccionEnvio = $_POST['direccionEnvio'];
        $emple->fecha = $_POST['fecha'];
        $emple->empleado = $_POST['empleado'];
        $this->model->Obtener($_POST['idPedido']) ?
                        $this->model->Actualizar($emple) :
                        $this->model->Registrar($emple);

        header('Location: index.php?c=Pedido');
    }

    public function Eliminar() {
        $this->model->Eliminar($_POST['idPedido']);
        header('Location: index.php?c=Pedido');
    }
}

?>
