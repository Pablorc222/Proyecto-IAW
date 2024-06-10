<?php
require_once ('db/db.php');

class UsuarioDAO{
    public $db_con;
    public function __construct(){
        $this->db_con=Database::connect();
    }

    // Metodo que toma los valores que hay en la tabla Users de la base de datos
    public function getAllUsers($usuario,$contrasena){
        $stmt=$this->db_con->prepare("select * from usuarios where Nombreusu='$usuario' and Contrasenia='$contrasena'");
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
?>