<?php

    include_once('conexion.php');
class DCategoria{
    private $id;
    private $nombrec;
    private $descripcion;

    public $pdo;

 public function set($atributo,$valor){
        $this->$atributo = $valor;
 }
 public function get($atributo){
    return $this->$atributo;
 }

 public function __construct(){
        $this->pdo = Conexion::getInstance()->getConnection();
   }
   
 public function getAll(){
       try {
        $stm=$this->pdo->prepare("SELECT * FROM categorias");
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_OBJ);
       } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

 public function create(){
     try {
         $stm = $this->pdo->prepare("INSERT INTO categorias (nombrec,descripcion) VALUES (?,?)");
     $stm->execute(array($this->nombrec,$this->descripcion));
     } catch (PDOException $e) {
         echo $e->getMessage();
     }
    }
public function ultimoId(){
    try {
        $stm=$this->pdo->prepare("SELECT @@identity as id");
        $stm->execute();
        return $stm->fetchAll();
       } catch (PDOException $e) {
            echo $e->getMessage();
        }
}


  public function modificar(){
     try {
         $stm = $this->pdo->prepare("UPDATE categorias SET nombrec=?,descripcion=? WHERE id=?");
         $stm->execute(array($this->nombrec,$this->descripcion,$this->id));
     } catch (PDOException $e) {
         echo $e->getMessage();
     }
     }

  public function eliminar(){
    try {
     $stm=$this->pdo->prepare("DELETE FROM categorias WHERE id=?");
     $stm->execute(array($this->id));
    } catch (PDOException $e) {
         echo $e->getMessage();
     }
 }

}

