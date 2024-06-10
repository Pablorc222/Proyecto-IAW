<?php
class ControllerUsu{
   

// Metodo con el que se muestra la vista de inicio de sesion.    
public function showiniciosesion(){
    View::show("login");
}

// Metodo que valida la correcta insercion de datos en el inicio de sesion y comprueba si el usuario esta en la base de datos
// lo que significaria que seria administrador por lo que se insertaria en un nuevo valor de $_SESSION para poder hacer validaciones
// en otras vistas.
public function validacioniniciosesion(){
    $errores=array();
    if(isset($_POST['iniciarsesion'])){
        if(!isset($_POST['usuario'])||strlen($_POST['usuario'])==0){
            $errores['usuario']="El usuario no puede estar vacío";
        }

        if(!isset($_POST['contrasena'])||strlen($_POST['contrasena'])==0){
            $errores['contrasena']="La contraseña no puede estar vacia";
        }

        if(empty($errores)){
            include_once('models/usuarios.php');
            include_once('models/productos.php');
            $uDAO=new UsuarioDAO();

            if(empty($uDAO->getAllUsers($_POST['usuario'],$_POST['contrasena']))){
                $errores['general']="El usuario al que intenta acceder no existe";
                View::show("login",$errores);
            } else{
                $pDAO=new ProductoDAO();
                $products=$pDAO->getAllProducts();
                $pDAO=null;
                $_SESSION['usuario']=$_POST['usuario'];
                View::show("showProducts", $products);
            }
        } else {
            View::show("login",$errores);
        }
    }
}

// Metodo que cierra la sesion y te envia de nuevo al login
public function cerrarsesion(){
    session_destroy();
    View::show("login");
}

}
?>