<?php
if (!isset($_SESSION['carrito'])) {
    session_start();
    $_SESSION['carrito'] = array();
}

include ("views/View.php");

class ProductController {

    public function getAllProducts() {
        require_once ("models/productos.php");
        $pDAO = new ProductoDAO();
        $products = $pDAO->getAllProducts();
        View::show("showProducts", $products);
    }

    public function aniadirProduct() {
        $errores = array();
        
        if (isset($_POST['insertar'])) {
            if (!isset($_POST['nombre']) || strlen($_POST['nombre']) == 0) 
                $errores['nombre'] = "El nombre no puede estar vacío";
            if (!isset($_POST['descripcion']) || strlen($_POST['descripcion']) < 10) 
                $errores['descripcion'] = "La descripción debe tener al menos 10 caracteres";    
            if (!isset($_POST['precio']) || !is_numeric($_POST['precio']) || $_POST['precio'] <= 0) 
                $errores['precio'] = "El precio debe ser un número mayor que cero";

            if (empty($errores)) {
                include ("models/productos.php");
                $pDAO = new ProductoDAO();
                if ($pDAO->insertProduct($_POST['nombre'], $_POST['descripcion'], $_POST['precio'])) {
                    $this->getAllProducts(); 
                } else {
                    $errores['general'] = "Hubo algún problema insertando el nuevo producto";
                    View::show("addProduct", $errores);  
                }     
            } else {
                View::show("addProduct", $errores);               
            }
        } else {
            View::show("addProduct", null);
        }
    }

    public function getProductById() {
        include_once 'models/productos.php';
        if (isset($_GET['id_product'])) {
            $pDAO = new ProductoDAO();
            $producto = $pDAO->getProductById($_GET['id_product']);
            View::show("productoporid", $producto);
        }
    }

    public function addCarrito() {
        if (isset($_GET['id_product'])) {
            array_push($_SESSION['carrito'], $_GET['id_product']);  
            include_once 'models/productos.php';    
            $pDAO = new ProductoDAO();
            $products = $pDAO->getAllProducts();
            View::show("showProducts", $products);
        }
    }

    public function verCarrito() {
        include_once 'models/productos.php';
        $pDAO = new ProductoDAO();
        $arrayCarrito = array();
        foreach ($_SESSION['carrito'] as $posicion => $id) {
            $producto = $pDAO->getProductById($id);
            array_push($arrayCarrito, $producto);
        }
        View::show("mostrarcarrito", $arrayCarrito);
    }

    public function borrarproducto() {
        include_once 'models/productos.php';
        if (isset($_GET['id_product'])) {
            $pDAO = new ProductoDAO();
            $pDAO->borrarprod($_GET['id_product']);
            $products = $pDAO->getAllProducts();
            View::show("showProducts", $products);
        }
    }
}
?>
