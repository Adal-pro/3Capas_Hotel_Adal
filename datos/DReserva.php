<?php
    include_once('conexion.php');
class DReserva{
    private $id_reserva;
    private $id_habitacion;
    private $id_usuario;
    private $descripcion_reserva;
    private $fecha_ingreso;
    private $fecha_salida;
    private $fecha_reserva;

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
        $stm=$this->pdo->prepare("SELECT * FROM reservas");
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_OBJ);
       } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

 public function create(){
     try {
         $stm = $this->pdo->prepare("INSERT INTO reservas (id_habitacion,id_usuario,descripcion_reserva,fecha_ingreso,fecha_salida) VALUES (?,?,?,?,?)");
     $stm->execute(array($this->habitacion,$this->usuario,$this->descripcion,$this->fechai,$this->fechas));
     } catch (PDOException $e) {
         echo $e->getMessage();
     }
    }
    public function lista(){
        try {
            $stm = $this->pdo->prepare("
            SELECT res.id_reserva,res.id_habitacion,res.id_usuario,res.descripcion_reserva,res.fecha_ingreso,res.fecha_salida,res.fecha_reserva,us.id_u,us.nombre,hab.nrohabitacion
            FROM  reservas res
            INNER JOIN usuarios us ON res.id_usuario=us.id_u
            INNER JOIN habitaciones hab ON res.id_habitacion=hab.id
            ORDER BY res.id_reserva
            ");
            $stm->execute(array());
            return $stm->fetchAll(PDO::FETCH_OBJ);       

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

 public function modificar(){
    try {
        $stm = $this->pdo->prepare("UPDATE reservas SET id_habitacion=?,descripcion_reserva=?,fecha_ingreso=?,fecha_salida=? WHERE id_reserva=?");
        $stm->execute(array($this->habitacion,$this->descripcion,$this->fechai,$this->fechas,$this->id));//las variablesdebem estar igual las del modificar negocio
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    }
    public function modificar2(){
        try {
            $stm = $this->pdo->prepare("SELECT *FROM reservas WHERE id_reserva=?");
            $stm->execute(array($this->id));
            return $stm->fetchAll(PDO::FETCH_OBJ);       

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        }

 public function eliminar(){
   try {
    $stm=$this->pdo->prepare("DELETE FROM reservas WHERE id_reserva=?");
    $stm->execute(array($this->id));
   } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
}

