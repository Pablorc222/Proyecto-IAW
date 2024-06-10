<?php
include_once("views/header.php");
include_once("Controllers/ProductsController.php");
include_once("Controllers/UserControllers.php");
require_once 'db/db.php';  // Asegúrate de incluir la clase Database

// Prueba la conexión a la base de datos
$db = Database::connect();
if ($db) {
    echo "Conexión exitosa a la base de datos.";
} else {
    echo "Fallo en la conexión a la base de datos.";
}

// Punto de entrada a la aplicación. Si no se recibe parámetro action y controller en la URL,
// se muestra la página de inicio (texto HTML).
if (isset($_REQUEST['action']) && isset($_REQUEST['controller'])) {
    $act = $_REQUEST['action'];
    $cont = $_REQUEST['controller'];

    // Verificar que la clase del controlador exista
    if (class_exists($cont)) {
        $controller = new $cont();

        // Verificar que el método exista en el controlador
        if (method_exists($controller, $act)) {
            $controller->$act();
        } else {
            echo "Error: El método $act no existe en el controlador $cont.";
        }
    } else {
        echo "Error: El controlador $cont no existe.";
    }
} else {
    // Página de entrada
    echo '<div class="container mt-3">
            <h1 style="text-align:center;">Tienda de camisetas de futbol</h1>
            <div class="d-flex justify-content-center">
                <img src="assets/futbol.png" width="500" height="200">
            </div> 
          </div>';
}

// Incluir el pie de página
require_once("views/footer.php");
?>
