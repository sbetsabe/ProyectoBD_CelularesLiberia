<?php

class Pedido{

    private $pdo;

    public $idPedido;
    public $direccionEnvio;
    public $fecha;
    public $empleado;

    public function __CONSTRUCT() {
        try {
            $this->pdo = Database::StartUp();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //Metodo que muestra en pantalla todos los peddos registrados en la base de datos
    public function ListarPedidos() {
        try {
            $result = array();

            $stm = $this->pdo->prepare("SELECT idPedido, direccionEnvio, fecha, empleado FROM pedido");
            $stm->execute();

            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Obtener($idPedido) {
        try {
            $stm = $this->pdo
                    ->prepare("SELECT * FROM pedido WHERE idPedido = ?");


            $stm->execute(array($idPedido));
            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Actualizar($data) {
        try {
            $sql = "UPDATE pedido SET
                direccionEnvio = ?,
                fecha  = ?,
                empleado = ?
                WHERE idPedido = ?";

            $this->pdo->prepare($sql)
                    ->execute(
                            array(
                                $data->direccionEnvio,
                                $data->fecha,
                                $data->empleado,
                                $data->idPedido
                            )
            );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Registrar(Pedido $data) {
        try {
            $sql = "INSERT INTO pedido(idPedido, direccionEnvio, fecha, empleado)
		        VALUES (?, ?, ?, ?)";


            $this->pdo->prepare($sql)
                    ->execute(
                            array(
                                $data->idPedido,
                                $data->direccionEnvio,
                                $data->fecha,
                                $data->empleado
                            )
            );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Eliminar($idPedido) {
        try {
            $stm = $this->pdo
                    ->prepare("DELETE FROM pedido WHERE idPedido = ?");

            $stm->execute(array($idPedido));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
  }
