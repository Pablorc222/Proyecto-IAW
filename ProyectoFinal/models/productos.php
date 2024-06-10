<?php
include_once ('db/db.php'); 


class ProductoDAO {

    //Atributo con la conexión a la BBDD.
    public $db_con;

    //Constructor que inicializa la conexión a la BBDD.
    public function __construct (){
        $this->db_con = Database::connect();
    }

    //Método que devuelve un array con todos los productos existentes en la base de datos.
    public function getAllProducts(){
        $stmt = $this->db_con->prepare("SELECT * FROM productos");
        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        $stmt->execute();
        return $stmt->fetchAll();
    }

    //Método que devuelve toda la información de un producto dado su id.
    public function getProductById ($id){
        $stmt = $this->db_con->prepare("SELECT * FROM productos WHERE Id_prod=:id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        $stmt->execute();
        return $stmt->fetch();        
    }

    //Insertar un producto en la base de datos.
    public function insertProduct($nombre, $descrip, $precio){
        $stmt = $this->db_con->prepare("INSERT INTO Productos (Nombre_prod, Descripcion, Precio) VALUES (:nombre, :descripcion, :precio)");      
        
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':descripcion', $descrip);
        $stmt->bindParam(':precio', $precio);

        try{
            return $stmt->execute();
        } catch (PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }

    //Método que borra un producto dado su id.
    public function borrarprod($id){
        $stmt = $this->db_con->prepare("DELETE FROM Productos WHERE Id_prod=:id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();
        return $stmt->fetch();       
    }

}
?>
