<?php

class Bodega {

  private $pdo;

  //Atributos
  public $idBodega;
  public $nombre;
  public $telefono;
  public $direccion;
  public $email;

  public function __CONSTRUCT() {
        try {
            $this->pdo = Database::StartUp();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //Muestra en pantalla la lista de bodegas registrados en la base de datos
    public function ListarBodegas() {
        try {
            $result = array();

            $stm = $this->pdo->prepare("SELECT idBodega, nombre, telefono, direccion, email FROM bodega");
            $stm->execute();

            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //Obtiene los datos de las bodegas por su identificador
    public function Obtener($idBodega) {
        try {
            $stm = $this->pdo
                    ->prepare("SELECT * FROM bodega WHERE idBodega = ?");


            $stm->execute(array($idBodega));
            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //Actualiza datos de la bodega en la base de datos
    public function Actualizar($data) {
        try {
            $sql = "UPDATE bodega SET
                nombre = ?,
                telefono  = ?,
                direccion = ?,
                email  = ?
                WHERE idBodega = ?";

            $this->pdo->prepare($sql)
                    ->execute(
                            array(
                                $data->nombre,
                                $data->telefono,
                                $data->direccion,
                                $data->email,
                                $data->idBodega
                            )
            );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //Procede al registro de la informacion de la bodega en la base de datos
    public function Registrar(Bodega $data) {
        try {
            $sql = "INSERT INTO bodega(idBodega, nombre, telefono, direccion, email)
		        VALUES (?, ?, ?, ?, ?)";


            $this->pdo->prepare($sql)
                    ->execute(
                            array(
                                $data->idBodega,
                                $data->nombre,
                                $data->telefono,
                                $data->direccion,
                                $data->email
                            )
            );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //Procede a eliminar la informacion de la bodega de la base de datos
    public function Eliminar($idBodega) {
        try {
            $stm = $this->pdo
                    ->prepare("DELETE FROM bodega WHERE idBodega = ?");

            $stm->execute(array($idBodega));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
