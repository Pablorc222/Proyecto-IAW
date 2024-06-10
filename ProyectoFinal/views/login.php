<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Login</title>
    <style>
        form {
        margin: 25px auto;
        width: 400px;
        background-color: #f2f2f2;
        padding: 30px;
        border-radius: 5px;
        box-shadow: 10px 10px 15px grey;
        }
        #formulario{
        margin-top: 10%;
        }
        h2 {
        text-align: center;
        }
        label {
        display: block;
        margin-bottom: 10%;
        }
        #invitado{
        color: blue;
        }
        #invitado:hover{
        color: blue;
        }
        input[type="text"],
        input[type="password"] {
        width: 100%;
        padding: 5px;
        margin-bottom: 20px;
        border-radius: 5px;
        border: none;
        box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.1);
        }
        input[type="submit"] {
        background-color: blue;
        color: white;
        padding: 10px 15px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        }
        input[type="submit"]:hover {
        background-color: blue;
        }
    </style>

  </head>
  <body>
    <div id="formulario">
      <form action="index.php?controller=ControllerUsu&action=validacioniniciosesion" method='POST' >
        <h2>Iniciar Sesión</h2>
        <label for="usuario">Usuario</label>
        <input type="text" id="usuario" name="usuario">
        <?php
          if(isset($data) && isset($data['usuario'])){
            echo "<div class='alert alert-danger'>".$data['usuario']."</div>";
          }
        ?>
        <label for="constrasena" style="margin-top: 6%;">Contraseña</label>
        <input type="password" id="contrasena" name="contrasena">
        <?php

          if(isset($data) && isset($data['contrasena'])){
            echo "<div class='alert alert-danger'>".$data['contrasena']."</div>";
          }

          if(isset($data) && isset($data['general'])){
            echo "<div class='alert alert-danger'>".$data['general']."</div>";
          }
        ?>
        <div style="text-align: center;">
        <input type="submit" value="Iniciar Sesion" name="iniciarsesion"><br><br>
        </div>
      </form>
    </div>
  </body>
</html>