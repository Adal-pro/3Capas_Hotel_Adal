<?php
    include_once('../datos/DReserva.php');
    
    
    if (isset($_GET['delete_id'])){
        $reserva = new NReserva;
        $reserva->eliminar($_GET['delete_id']); 
        header("Location: ../presentacion/reservas.php");
        die();
        
    }
    if (isset($_POST['update'])){
        $reserva = new NReserva;
        $reserva->modificar($_GET['id_edit'],$_POST['descripcion'],$_POST['habitacion'],$_POST['fechai'],$_POST['fechas']); 
        header("Location: ../presentacion/reservas.php");
        die();
    }
        if (isset($_POST['descripcion'])){
            
         $reserva = new NReserva;
        $reserva->create($_POST['descripcion'],$_POST['usuario'],$_POST['habitacion'],$_POST['fechai'],$_POST['fechas']);
        header("Location: ../presentacion/reservas.php");
        die();
    }

    class NReserva{

        private $reserva;
        
        public function __construct(){
            $this->reserva = new DReserva();
        }

        public function getAll(){
           return $this->reserva->getAll();
        }
        
        public function create($descripcion,$usuario,$habitacion,$fechai,$fechas){
            $this->reserva->set('descripcion',$descripcion);
            $this->reserva->set('usuario',$usuario);
            $this->reserva->set('habitacion',$habitacion);
            $this->reserva->set('fechai',$fechai);
            $this->reserva->set('fechas',$fechas);
            $this->reserva->create();
         }

        public function lista(){
            return $this->reserva->lista();
        }

        public function modificar($id,$descripcion,$habitacion,$fechai,$fechas){
            $this->reserva->set('id',$id);
            $this->reserva->set('descripcion',$descripcion);
            $this->reserva->set('habitacion',$habitacion);
            $this->reserva->set('fechai',$fechai);
            $this->reserva->set('fechas',$fechas);
            $this->reserva->modificar();
         }
         public function modificar2($id){
            $this->reserva->set('id',$id);
            return $this->reserva->modificar2();
           
         }

         public function eliminar($id){
            $this->reserva->set('id',$id);
            $this->reserva->eliminar();
         }
        
    }


?>