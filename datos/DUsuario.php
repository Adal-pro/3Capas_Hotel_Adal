<?php
    include_once('conexion.php');
    class DUsuario{
        private $id_u;
        private $nombre;
        private $ci;
        private $telefono;
        private $email;

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
        $stm=$this->pdo->prepare("SELECT * FROM usuarios");
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_OBJ);
       } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

 public function create(){
     try {
         $stm = $this->pdo->prepare("INSERT INTO usuarios (nombre,ci,telefono,email) VALUES (?,?,?,?)");
     $stm->execute(array($this->nombre,$this->ci,$this->telefono,$this->email));
     
     } catch (PDOException $e) {
         echo $e->getMessage();
     }
    }



 public function modificar(){
    try {
        $stm = $this->pdo->prepare("UPDATE usuarios SET nombre=?,ci=?,telefono=?,email=?WHERE id_u=?");
        $stm->execute(array($this->nombre,$this->ci,$this->telefono,$this->email,$this->id));
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    }
    public function modificar2(){
        try {
            $stm = $this->pdo->prepare("SELECT *FROM usuarios WHERE id_u=?");
            $stm->execute(array($this->id));
            return $stm->fetchAll(PDO::FETCH_OBJ);       

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        }   
 public function eliminar(){
   try {
    $stm=$this->pdo->prepare("DELETE FROM usuarios WHERE id_u=?");
    $stm->execute(array($this->id));
    echo 'id';
   } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

    }