<?php
    include_once('../datos/DHabitacion.php');
   
    if (isset($_POST['update'])){
 

        $habitacion = new NHabitacion;
        $habitacion->modificar($_GET['id_edit'],$_POST['nroh'],$_POST['descripcione'],$_POST['estadoe'],$_POST['categoriae']); 
        header("Location: ../presentacion/habitaciones.php");
        die();
        }

    if (isset($_POST['nro'])){
        $habitacion = new NHabitacion;
       $habitacion->create($_POST['nro'],$_POST['descripcion'],$_POST['estado'],$_POST['categoria']);
        header("Location: ../presentacion/habitaciones.php");
       die();
   }

   
    if (isset($_GET['delete_id'])){
        $habitacion = new NHabitacion;
        $habitacion->eliminar($_GET['delete_id']); 
        header("Location: ../presentacion/habitaciones.php");
        die();
        
    }
    class NHabitacion{
        private $habitacion;
        
        public function __construct(){
            $this->habitacion = new DHabitacion();
        }

        public function getAll(){
           return $this->habitacion->getAll();
        }
        public function lista(){
            return $this->habitacion->lista();
        }

        public function create($nro,$descripcion,$estado,$categoria){
            $this->habitacion->set('nro',$nro);
            $this->habitacion->set('descripcion',$descripcion);
            $this->habitacion->set('estado',$estado);
            $this->habitacion->set('id_categoria',$categoria);
            $this->habitacion->create();
         }

        public function modificar($id,$nro,$descripcion,$estado,$categoria){
            $this->habitacion->set('id',$id);
            $this->habitacion->set('nroh',$nro);
            $this->habitacion->set('descripcione',$descripcion);
            $this->habitacion->set('estadoe',$estado);
            $this->habitacion->set('id_categoriae',$categoria);
            $this->habitacion->modificar();
         }
         public function modificar2($id){
            $this->habitacion->set('id',$id);
            return $this->habitacion->modificar2();
           
         }

         public function eliminar($id){
            $this->habitacion->set('id',$id);
            $this->habitacion->eliminar();
         }
        
    }
