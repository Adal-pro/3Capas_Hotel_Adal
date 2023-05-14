<?php
    include_once('../datos/DCategoria.php');
   // include_once('../datos/DOpcion.php');
    include_once('../datos/DDetalleCategoria.php');




    if (isset($_POST['nombrec'])){
        
        $categoria = new NCategoria;
        $categoria->create($_POST['nombrec'],$_POST['descripcion'],$_POST['opciones']);
          header("Location: ../presentacion/categorias.php");
        die();
    }
    if (isset($_GET['delete_idc'])){
        echo($_GET['delete_idc']);
        $categoria = new NCategoria;
        $categoria->eliminar($_GET['delete_idc']); 
        header("Location: ../presentacion/categorias.php");
        die();
    }

    class NCategoria{
        private $categoria;
        
        public function __construct(){
            $this->categoria = new DCategoria();
            $this->detalle = new DDetalleCategoria();
        

        }

        public function getAll(){
           return $this->categoria->getAll();
           
        }

        public function create($nombrec,$descripcion,$opciones){
            $this->categoria->set('nombrec',$nombrec);
            $this->categoria->set('descripcion',$descripcion);
            $this->categoria->create();
            $id=$this->categoria->ultimoId();
           for($i=0;$i< sizeof($opciones);$i++){
               $this->detalle->set('categoria',$id[0][0]);
               $this->detalle->set('opcion',$opciones[$i]);
               $this->detalle->create();     
           }
            
         }
         public function Lista(){
            return $this->detalle->lista();
        }

        // public function modificar($id,$nombrec,$descripcion){
        //     $this->categoria->set('id',$id);
        //     $this->categoria->set('nombrec',$nombrec);
        //     $this->categoria->set('descripcion',$descripcion);
        //     $this->categoria->modificar();
        //  }

          public function eliminar($id){
          $this->detalle->set('id',$id);
          $this->detalle->eliminar();
          $this->categoria->set('id',$id);
          $this->categoria->eliminar();
         }
        
    }


?>