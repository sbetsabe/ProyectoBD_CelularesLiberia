<?php

class Producto {

    private $pdo;

    //Atributos
    public $codigo;
    public $nombreProducto;
    public $marca;
    public $descripcion;
    public $tipo;
    public $stock;

    //Llaves foraneas
    public $proveedor;
    public $bodega;

    public function __CONSTRUCT() {
          try {
              $this->pdo = Database::StartUp();
          } catch (Exception $e) {
              die($e->getMessage());
          }
      }

      //Muestra en pantalla la lista de productos registrados en la base de datos
      public function ListarProductos() {
          try {
              $result = array();

              $stm = $this->pdo->prepare("SELECT codigo, nombreProducto, marca, descripcion, tipo, stock, proveedor, bodega FROM producto");
              $stm->execute();

              return $stm->fetchAll(PDO::FETCH_OBJ);
          } catch (Exception $e) {
              die($e->getMessage());
          }
      }

      //Obtiene los datos de un producto por codigo
      public function Obtener($codigo) {
          try {
              $stm = $this->pdo
                      ->prepare("SELECT * FROM producto WHERE codigo = ?");


              $stm->execute(array($codigo));
              return $stm->fetch(PDO::FETCH_OBJ);
          } catch (Exception $e) {
              die($e->getMessage());
          }
      }


      //Actualiza datos de un producto en la base de datos
      public function Actualizar($data) {
          try {
              $sql = "UPDATE producto SET
                  nombreProducto = ?,
                  marca  = ?,
                  descripcion = ?,
                  tipo  = ?,
                  stock  = ?,
                  proveedor  = ?,
                  bodega = ?
                  WHERE codigo = ?";


              $this->pdo->prepare($sql)
                      ->execute(
                              array(
                                  $data->nombreProducto,
                                  $data->marca,
                                  $data->descripcion,
                                  $data->tipo,
                                  $data->stock,
                                  $data->proveedor,
                                  $data->bodega,
                                  $data->codigo
                              )
              );
          } catch (Exception $e) {
              die($e->getMessage());
          }
      }

      //Procede al registro de la informacion de un producto en la base de datos
      public function Registrar(Producto $data) {
          try {
              $sql = "INSERT INTO producto(codigo, nombreProducto, marca, descripcion, tipo, stock, proveedor, bodega)
  		        VALUES (?, ?, ?, ?, ?, ?, ?, ?)";


              $this->pdo->prepare($sql)
                      ->execute(
                              array(
                                $data->codigo,
                                $data->nombreProducto,
                                $data->marca,
                                $data->descripcion,
                                $data->tipo,
                                $data->stock,
                                $data->proveedor,
                                $data->bodega
                              )
              );
          } catch (Exception $e) {
              die($e->getMessage());
          }
      }

      //Procede a eliminar la informacion de un producto de la base de datos
      public function Eliminar($codigo) {
          try {
              $stm = $this->pdo
                      ->prepare("DELETE FROM producto WHERE codigo = ?");

              $stm->execute(array($codigo));
          } catch (Exception $e) {
              die($e->getMessage());
          }
      }
}
