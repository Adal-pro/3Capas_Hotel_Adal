<?php

    include_once('conexion.php');
class DDetalleCategoria{
    //
    private $idcategoria;
    private $idopcion;

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
        $stm=$this->pdo->prepare("SELECT * FROM detallecategoria");
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_OBJ);
       } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

 public function create(){
     try {
    $stm = $this->pdo->prepare("INSERT INTO detallecategoria (idcategoria,idopcion) VALUES (?,?)");
     $stm->execute(array($this->categoria,$this->opcion));
     } catch (PDOException $e) {
         echo $e->getMessage();
     }
    }
    public function lista(){
        try {
            $stm = $this->pdo->prepare("
            SELECT cat.id,cat.nombrec,cat.descripcion,op.nombre
            FROM  detallecategoria det
            INNER JOIN categorias cat ON det.idcategoria=cat.id
            INNER JOIN opcion op ON det.idopcion=op.id
            ORDER BY cat.id
            ");
            $stm->execute(array());
            return $stm->fetchAll(PDO::FETCH_OBJ);       
    
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

//  public function modificar(){
//     try {
//         $stm = $this->pdo->prepare("UPDATE categorias SET nombrec=?,descripcion=? WHERE id=?");
//         $stm->execute(array($this->nombrec,$this->descripcion,$this->id));
//     } catch (PDOException $e) {
//         echo $e->getMessage();
//     }
//     }

  public function eliminar(){
    try {
     $stm=$this->pdo->prepare("DELETE FROM detallecategoria WHERE idcategoria=?");
     $stm->execute(array($this->id));
    } catch (PDOException $e) {
         echo $e->getMessage();
     }
 }

}