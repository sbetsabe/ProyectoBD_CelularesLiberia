<?php

class Empleado {

  private $pdo;

  //Atributos
  public $idEmpleado;
  public $nombre;
  public $apellidos;
  public $telefono;
  public $puesto;
  public $clave;

  public function __CONSTRUCT() {
        try {
            $this->pdo = Database::StartUp();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //Muestra en pantalla la lista de empleados registrados en la base de datos
    public function ListarEmpleados() {
        try {
            $result = array();

            $stm = $this->pdo->prepare("SELECT idEmpleado, nombre, apellidos, telefono, puesto, clave FROM empleado");
            $stm->execute();

            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //Verifica si la cedula y la clave ingresada esta previamente registrada en la base de datos
    public function Verificar($idEmpleado, $clave) {

        try {
            $sql = "SELECT  idEmpleado, clave FROM empleado WHERE idEmpleado = ? AND clave = ?";
            $stm = $this->pdo->prepare($sql);
            $stm->execute(array($idEmpleado, $clave));

            $empleadoDatos = $stm->fetch(PDO::FETCH_OBJ);
            if ($empleadoDatos == NULL) {
                return FALSE;
            } else {
                return TRUE;
            }
        } catch (Exception $ex) {
            die($ex->getMessage());
        }
    }

    //Obtiene los datos de un empleado por numero de cedula
    public function Obtener($idEmpleado) {
        try {
            $stm = $this->pdo
                    ->prepare("SELECT * FROM empleado WHERE idEmpleado = ?");


            $stm->execute(array($idEmpleado));
            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //Actualiza datos de un empleado en la base de datos
    public function Actualizar($data) {
        try {
            $sql = "UPDATE empleado SET
                nombre = ?,
                apellidos  = ?,
                telefono = ?,
                puesto  = ?,
                clave  = ?
                WHERE idEmpleado = ?";

            $this->pdo->prepare($sql)
                    ->execute(
                            array(
                                $data->nombre,
                                $data->apellidos,
                                $data->telefono,
                                $data->puesto,
                                $data->clave,
                                $data->idEmpleado
                            )
            );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //Procede al registro de la informacion del empleado en la base de datos
    public function Registrar(Empleado $data) {
        try {
            $sql = "INSERT INTO empleado(idEmpleado, nombre, apellidos, telefono, puesto, clave)
		        VALUES (?, ?, ?, ?, ?, ?)";


            $this->pdo->prepare($sql)
                    ->execute(
                            array(
                                $data->idEmpleado,
                                $data->nombre,
                                $data->apellidos,
                                $data->telefono,
                                $data->puesto,
                                $data->clave
                            )
            );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //Procede a eliminar la informacion del empleado de la base de datos
    public function Eliminar($id) {
        try {
            $stm = $this->pdo
                    ->prepare("DELETE FROM empleado WHERE idEmpleado = ?");

            $stm->execute(array($id));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
