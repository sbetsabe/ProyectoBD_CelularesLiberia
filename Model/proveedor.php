<?php

class Proveedor{

    private $pdo;
    public $cedulaJuridica;
    public $nombre;
    public $telefono;
    public $email;
    public $tipo;

    public function __CONSTRUCT() {
        try {
            $this->pdo = Database::StartUp();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //Muestra en pantalla la lista de proveedores registrados en la base de datos
    public function ListarProveedores() {
        try {
            $result = array();

            $stm = $this->pdo->prepare("SELECT cedulaJuridica, nombre, telefono, email, tipo FROM proveedor");
            $stm->execute();

            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //Obtiene los datos de los proveedores por su identificador
    public function Obtener($cedulaJuridica) {
        try {
            $stm = $this->pdo
                    ->prepare("SELECT * FROM proveedor WHERE cedulaJuridica = ?");


            $stm->execute(array($cedulaJuridica));
            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //Actualiza datos del proveedor en la base de datos
    public function Actualizar($data) {
        try {
            $sql = "UPDATE proveedor SET
                nombre = ?,
                telefono  = ?,
                email = ?,
                tipo  = ?
                WHERE cedulaJuridica = ?";

            $this->pdo->prepare($sql)
                    ->execute(
                            array(
                                $data->nombre,
                                $data->telefono,
                                $data->email,
                                $data->tipo,
                                $data->cedulaJuridica
                            )
            );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //Procede al registro de la informacion del proveedor en la base de datos
    public function Registrar(Proveedor $data) {
        try {
            $sql = "INSERT INTO proveedor(cedulaJuridica, nombre, telefono, email, tipo)
		        VALUES (?, ?, ?, ?, ?)";


            $this->pdo->prepare($sql)
                    ->execute(
                            array(
                                $data->cedulaJuridica,
                                $data->nombre,
                                $data->telefono,
                                $data->email,
                                $data->tipo
                            )
            );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //Procede a eliminar la informacion del proveedor de la base de datos
    public function Eliminar($ced) {
        try {
            $stm = $this->pdo
                    ->prepare("DELETE FROM proveedor WHERE cedulaJuridica = ?");

            $stm->execute(array($ced));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
