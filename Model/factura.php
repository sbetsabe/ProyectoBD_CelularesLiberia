<?php

class Factura {

    private $pdo;

    //Atributos
    public $numeroCompra;
    public $fecha;
    public $impuesto;
    public $descuento;
    public $total;

    //Llaves foraneas
    public $empleado;
    public $cliente;
    public $producto;

    public function __CONSTRUCT() {
          try {
              $this->pdo = Database::StartUp();
          } catch (Exception $e) {
              die($e->getMessage());
          }
      }

      //Muestra en pantalla la lista de facturas registrados en la base de datos
      public function ListarFacturas() {
          try {
              $result = array();

              $stm = $this->pdo->prepare("SELECT numeroCompra, fecha, impuesto, descuento, empleado, total, cliente, producto FROM factura");
              $stm->execute();

              return $stm->fetchAll(PDO::FETCH_OBJ);
          } catch (Exception $e) {
              die($e->getMessage());
          }
      }

      //Obtiene los datos de una factura por su numero de compra
      public function Obtener($numeroCompra) {
          try {
              $stm = $this->pdo
                      ->prepare("SELECT * FROM factura WHERE numeroCompra = ?");


              $stm->execute(array($numeroCompra));
              return $stm->fetch(PDO::FETCH_OBJ);
          } catch (Exception $e) {
              die($e->getMessage());
          }
      }


      //Actualiza datos de una factura en la base de datos
      public function Actualizar($data) {
          try {
              $sql = "UPDATE factura SET
                  fecha = ?,
                  impuesto  = ?,
                  descuento = ?,
                  empleado  = ?,
                  total  = ?,
                  cliente  = ?,
                  producto = ?
                  WHERE numeroCompra = ?";


              $this->pdo->prepare($sql)
                      ->execute(
                              array(
                                  $data->fecha,
                                  $data->impuesto,
                                  $data->descuento,
                                  $data->empleado,
                                  $data->total,
                                  $data->cliente,
                                  $data->producto,
                                  $data->numeroCompra
                              )
              );
          } catch (Exception $e) {
              die($e->getMessage());
          }
      }

      //Procede al registro de la informacion de la factura en la base de datos
      public function Registrar(Factura $data) {
          try {
              $sql = "INSERT INTO factura(numeroCompra, fecha, impuesto, descuento, empleado, total, cliente, producto)
  		        VALUES (?, ?, ?, ?, ?, ?, ?, ?)";


              $this->pdo->prepare($sql)
                      ->execute(
                              array(
                                $data->numeroCompra,
                                $data->fecha,
                                $data->impuesto,
                                $data->descuento,
                                $data->empleado,
                                $data->total,
                                $data->cliente,
                                $data->producto
                              )
              );
          } catch (Exception $e) {
              die($e->getMessage());
          }
      }

      //Procede a eliminar la informacion de una factura de la base de datos
      public function Eliminar($numeroCompra) {
          try {
              $stm = $this->pdo
                      ->prepare("DELETE FROM factura WHERE numeroCompra = ?");

              $stm->execute(array($numeroCompra));
          } catch (Exception $e) {
              die($e->getMessage());
          }
      }
}
