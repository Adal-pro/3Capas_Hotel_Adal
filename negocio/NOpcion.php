<?php
    include_once('../datos/DOpcion.php');
    include_once('upload_image.php');
    

    if (isset($_GET['delete_id'])){
        $opcion = new NOpcion;
        $opcion->eliminar($_GET['delete_id']); 
        header("Location: ../presentacion/opciones.php");
        die();
        
    }
    if (isset($_POST['update'])){
        $opcion = new NOpcion;
        $opcion->modificar($_GET['id_edit'],$_POST['nombre']); 
        header("Location: ../presentacion/opciones.php");
        die();
    }
        if (isset($_POST['nombre'])){
        $opcion = new NOpcion;
        $opcion->create($_POST['nombre']);
        header("Location: ../presentacion/opciones.php");
        die();
    }

    class NOpcion{
        private $opcion;
        
        public function __construct(){
            $this->opcion = new DOpcion();
        }

        public function getAll(){
           return $this->opcion->getAll();
        }

        public function create($nombre){
            $this->opcion->set('nombre',$nombre);
            $this->opcion->create();
         }

        public function modificar($id,$nombre){
            $this->opcion->set('id',$id);
            $this->opcion->set('nombre',$nombre);
            $this->opcion->modificar();
         }
         public function modificar2($id){
            $this->opcion->set('id',$id);
            return $this->opcion->modificar2();
           
         }
         public function eliminar($id){
            $this->opcion->set('id',$id);
            $this->opcion->eliminar();
         }
        
    }


?>