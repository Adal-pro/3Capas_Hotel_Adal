<?php
 class Conexion{

    private static $instance = null;
    private $pdo;

    private $driver='mysql';
    private $host='localhost';
    private $user='root';
    private $pass='';
    private $dbName='reservas-hotel-lite';
    private $charset='utf8';
    
  
    private function __construct(){
        try {
            $this->pdo = new PDO("{$this->driver}:host={$this->host};dbname={$this->dbName};",$this->user,$this->pass);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public static function getInstance(){
        if (!self::$instance) {
            self::$instance = new Conexion();
        }
        return self::$instance;
    }

    public function getConnection()
    {
      return $this->pdo;
    }


     
 }

