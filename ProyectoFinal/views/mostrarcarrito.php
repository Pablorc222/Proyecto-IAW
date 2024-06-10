<div class="container">
    <h2 style="text-align: center"> Carrito de la compra </h2><br><br>

      <?php
      $total=0;
      if(!empty($_SESSION['carrito'])){
        echo " <table class='table'> <tr><th>Nombre</th><th>Descripcion</th><th>Precio</th></tr>";
        foreach ($data as $producto){
          echo "<tr>
          <td hidden>".$producto['Id_prod']."</td>
          <td>".$producto['Nombre_prod']."</td>
          <td>".$producto['Descripcion']." </td>
          <td>".$producto['Precio']." RP </td>
          <td>";
          echo "</tr>";
          $total=$total + $producto['Precio']; 
        }
        echo "</table>";
        echo "<td><center><strong> TOTAL = </strong>".$total." RP</center></td>";
      }else {
        echo "<div class='alert alert-danger'><p style='text-align: center;'>El carrito esta vacio</p></div>";
      }
      ?>
</div>