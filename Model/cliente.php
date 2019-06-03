<?php

class Cliente{

    private $pdo;
    public $cedula;
    public $nombre;
    public $apellidos;
    public $email;
    public $telefono;
    public $direccion;


    public function __CONSTRUCT() {
        try {
            $this->pdo = Database::StartUp();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //Muestra en pantalla la lista de clientes registrados en la base de datos
    public function ListarClientes() {
        try {
            $result = array();

            $stm = $this->pdo->prepare("SELECT cedula, nombre, apellidos, email, telefono, direccion FROM cliente");
            $stm->execute();

            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //Obtiene los datos de un cliente por numero de cedula
    public function Obtener($cedula) {
        try {
            $stm = $this->pdo
                    ->prepare("SELECT * FROM cliente WHERE cedula = ?");


            $stm->execute(array($cedula));
            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //Actualiza datos de un cliente en la base de datos
    public function Actualizar($data) {
        try {
            $sql = "UPDATE cliente SET
                nombre = ?,
                apellidos = ?,
                email = ?,
                telefono  = ?,
                direccion = ?
                WHERE cedula = ?";

            $this->pdo->prepare($sql)
                    ->execute(
                            array(
                                $data->nombre,
                                $data->apellidos,
                                $data->email,
                                $data->telefono,
                                $data->direccion,
                                $data->cedula
                            )
            );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //Procede al registro de la informacion del cliente en la base de datos
    public function Registrar(Cliente $data) {
        try {
            $sql = "INSERT INTO cliente(cedula, nombre, apellidos, email, telefono, direccion)
		        VALUES (?, ?, ?, ?, ?, ?)";


            $this->pdo->prepare($sql)
                    ->execute(
                            array(
                                $data->cedula,
                                $data->nombre,
                                $data->apellidos,
                                $data->email,
                                $data->telefono,
                                $data->direccion
                            )
            );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //Procede a eliminar la informacion del cliente de la base de datos
    public function Eliminar($ced) {
        try {
            $stm = $this->pdo
                    ->prepare("DELETE FROM cliente WHERE cedula = ?");

            $stm->execute(array($ced));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
