<?php

class Pedido{

  private $pdo;

  public function __CONSTRUCT() {
      try {
          $this->pdo = Database::StartUp();
      } catch (Exception $e) {
          die($e->getMessage());
      }
  }
}
