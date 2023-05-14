<?php
include_once('conexion.php');
class DOpcion
{
    private $id;
    private $nombre;

    public $pdo;

    public function set($atributo, $valor)
    {
        $this->$atributo = $valor;
    }
    public function get($atributo)
    {
        return $this->$atributo;
    }

    public function __construct()
    {
        $this->pdo = Conexion::getInstance()->getConnection();
    }

    public function getAll()
    {
        try {
            $stm = $this->pdo->prepare("SELECT * FROM opcion");
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function create()
    {
        try {
            $stm = $this->pdo->prepare("INSERT INTO opcion (nombre) VALUES (?)");
            $stm->execute(array($this->nombre));
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }


    public function modificar()
    {
        try {
            $stm = $this->pdo->prepare("UPDATE opcion SET nombre=? WHERE id=?");
            $stm->execute(array($this->nombre, $this->id));
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    public function modificar2(){
        try {
            $stm = $this->pdo->prepare("SELECT *FROM opcion WHERE id=?");
            $stm->execute(array($this->id));
            return $stm->fetchAll(PDO::FETCH_OBJ);       

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        } 
    public function eliminar()
    {
        try {
            $stm = $this->pdo->prepare("DELETE FROM opcion WHERE id=?");
            $stm->execute(array($this->id));
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
