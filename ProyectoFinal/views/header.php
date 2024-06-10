<?php
session_start();
if(!isset($_SESSION['carrito'])){
  $_SESSION['carrito']=array();
}
if(!isset($_SESSION['usuario'])){
  $_SESSION['usuario']=array();
}
?>
<!DOCTYPE html>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=devide-width, initial-scale=1">
    <title> Tienda Camisetas de Fútbol </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
<!--
  Página de cabecera estática. Contiene el menú de la aplicación con enlaces que apuntan a la página
  index con el controlador y acción apropiado.
-->
<div class="container">
    <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
      <a href="index.php" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
        <svg class="bi me-2" width="40" height="62"><use xlink:href="#bootstrap"/></svg>
        <span class="fs-4"><img src="assets/logo.png" style="height: 80px; width: 90px"></img></span>
      </a>

      <ul class="nav nav-pills">
        <?php
        if(!empty($_SESSION['usuario'])){
          echo '<li class="nav-item"><a href="index.php?controller=ProductController&action=getAllProducts" class="nav-link" style="color: blue">Listar Productos</a></li>
          <li class="nav-item"><a href="index.php?controller=ProductController&action=aniadirProduct" class="nav-link" style="color: blue;">Añadir Producto</a></li>
          <li class="nav-item"><a href="index.php?controller=ControllerUsu&action=cerrarsesion" class="nav-link active" aria-current="page" style="background-color: blue;">Cerrar Sesion</a></li> 
          <li class="nav-item"><a href="index.php?controller=ProductController&action=verCarrito" class="nav-link"><img src="assets/carro.png" style="width: 40px;height:40px;"></a></li>'; 
        }else{
          echo  '<li class="nav-item"><a href="index.php?controller=ProductController&action=getAllProducts" class="nav-link" style="color: blue">Listar Productos</a></li>
          <li class="nav-item"><a href="index.php?controller=ControllerUsu&action=showiniciosesion" class="nav-link active" aria-current="page" style="background-color: blue;">Iniciar Sesion</a></li> 
          <li class="nav-item"><a href="index.php?controller=ProductController&action=verCarrito" class="nav-link"><img src="assets/carro.png" style="width: 40px;height:40px;"></a></li>';
        }
       ?>
      </ul>
    </header>
  </div>