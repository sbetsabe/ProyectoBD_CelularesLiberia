<?php
include_once 'model/factura.php';

include_once 'model/producto.php';
include_once 'model/cliente.php';
include_once 'model/empleado.php';

class FacturaController {

  private $model;

  private $modelPro;
  private $modelCli;
  private $modelEmp;

  public function __CONSTRUCT() {
      $this->model = new Factura();

      $this->modelPro = new Producto();
      $this->modelCli = new Cliente();
      $this->modelEmp = new Empleado();
  }

  public function Index() {
      require_once 'view/header.php';
      require_once 'view/factura/factura.php';
      require_once 'view/footer.php';
  }

  //Metodo editar factura
  public function Editar() {
      $fac = new Factura();

      if (isset($_POST['numeroCompra'])) {
          $fac = $this->model->Obtener($_POST['numeroCompra']);
      }

      require_once 'view/header.php';
      require_once 'view/factura/factura-editar.php';
      require_once 'view/footer.php';
  }

  //Metodo registrar nueva factura
  public function Registrar() {
      $fac = new Factura();

      if (isset($_POST['numeroCompra'])) {
          $fac = $this->model->Obtener($_POST['numCompra']);
      }

      require_once 'view/header.php';
      require_once 'view/factura/factura-editar.php';
      require_once 'view/footer.php';
  }

  public function Guardar() {
      $fac = new Factura();

      $fac->numeroCompra = $_POST['numeroCompra'];
      $fac->fecha = $_POST['fecha'];
      $fac->impuesto = $_POST['impuesto'];
      $fac->descuento = $_POST['descuento'];
      $fac->empleado = $_POST['empleado'];
      $fac->total = $_POST['total'];
      $fac->cliente = $_POST['cliente'];
      $fac->producto = $_POST['producto'];
      $this->model->Obtener($_POST['numeroCompra']) ?
                      $this->model->Actualizar($fac) :
                      $this->model->Registrar($fac);

      header('Location: index.php?c=Factura');
  }

  //Metodo eliminar factura
  public function Eliminar() {
      $this->model->Eliminar($_POST['numeroCompra']);
      header('Location: index.php?c=Factura');
  }
}

?>
