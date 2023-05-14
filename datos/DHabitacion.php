    <?php
    include_once('conexion.php');
class DHabitacion{
    private $id;
    private $nro;
    private $estado;
    private $descripcion;
    private $fecha_h;
    private $id_categoria;

    private $pdo;

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
        $stm=$this->pdo->prepare("SELECT * FROM habitaciones");
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_OBJ);
       } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    public function lista(){
        try {
            $stm = $this->pdo->prepare("
            SELECT hab.nrohabitacion,hab.id,hab.estado,hab.descripcion,hab.fecha_h,categ.nombrec
            FROM  habitaciones hab
            INNER JOIN categorias categ ON hab.id_categoria=categ.id
            ORDER BY hab.nrohabitacion
            ");
            $stm->execute(array());
            return $stm->fetchAll(PDO::FETCH_OBJ);       

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
 public function create(){
     try {
         $stm = $this->pdo->prepare("INSERT INTO habitaciones (nrohabitacion,estado,descripcion,id_categoria) VALUES (?,?,?,?)");
     $stm->execute(array($this->nro,$this->estado,$this->descripcion,$this->id_categoria));
     } catch (PDOException $e) {
         echo $e->getMessage();
     }
    }


 public function modificar(){
    try {
        $stm = $this->pdo->prepare("UPDATE habitaciones SET nrohabitacion=?,estado=?,descripcion=?,id_categoria=? WHERE id=?");
        $stm->execute(array($this->nroh,$this->estadoe,$this->descripcione,$this->id_categoriae,$this->id));
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    }
    public function modificar2(){
        try {
            $stm = $this->pdo->prepare("SELECT *FROM habitaciones WHERE id=?");
            $stm->execute(array($this->id));
            return $stm->fetchAll(PDO::FETCH_OBJ);       

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        }
 public function eliminar(){
   try {
    $stm=$this->pdo->prepare("DELETE FROM habitaciones WHERE id=?");
    $stm->execute(array($this->id));
   } catch (PDOException $e) {
        echo $e->getMessage();
    }
    
}
}

