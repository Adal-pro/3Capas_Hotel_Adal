<?php
    
    include_once('../datos/DUsuario.php');

    if (isset($_GET['delete_id'])){
        $usuario = new NUsuario;
        $usuario->eliminar($_GET['delete_id']); 
        header("Location: ../presentacion/usuarios.php");
        die();
        
    }
    if (isset($_POST['update'])){
        $usuario = new NUsuario;
        $usuario->modificar($_GET['id_edit'],$_POST['nombre'],$_POST['ci'],$_POST['telefono'],$_POST['email']); 
        header("Location: ../presentacion/usuarios.php");
        die();
    }
        if (isset($_POST['nombre'])){
         $usuario = new NUsuario;
        $usuario->create($_POST['nombre'],$_POST['ci'],$_POST['telefono'],$_POST['email']);
       header("Location: ../presentacion/usuarios.php");
        die();
    }
    
    class NUsuario{
        private $usuario;
        
        public function __construct(){
            $this->usuario = new DUsuario();
        }

        public function getAll(){
           return $this->usuario->getAll();
        }


        public function create($nombre,$ci,$telefono,$email){
            $this->usuario->set('nombre',$nombre);
            $this->usuario->set('ci',$ci);
            $this->usuario->set('telefono',$telefono);
            $this->usuario->set('email',$email);
            $this->usuario->create();
         }

        public function modificar($id,$nombre,$ci,$telefono,$email){
            $this->usuario->set('id',$id);
            $this->usuario->set('nombre',$nombre);
            $this->usuario->set('ci',$ci);
            $this->usuario->set('telefono',$telefono);
            $this->usuario->set('email',$email);
            $this->usuario->modificar();
         }
         public function modificar2($id){
            $this->usuario->set('id',$id);
            return $this->usuario->modificar2();
           
         }

         public function eliminar($id){
        
            $this->usuario->set('id',$id);
            $this->usuario->eliminar();
         }
        
    }

?>