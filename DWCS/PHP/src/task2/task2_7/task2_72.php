<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Process the form</title>
</head>

<body>
  <h1>Info del formulario anterior<h1>
      <?php

      $data = [
        "cocacola" => ["text" => "Coca Cola", "precio" => 2.1],
        "pepsicola" => ["text" => "Pepsi Cola", "precio" => 2],
        "fantanaranja" => ["text" => "Fanta Naranja", "precio" => 2.5],
        "trinamanzana" => ["text" => "Trina Manzana", "precio" => 2.3],
      ];

      $opcion = $_POST["opcion"];

      $bebida = $data[$opcion]["text"];
      $precio = $data[$opcion]["precio"];

      $cantidad = $_POST["cantidad"];

      echo "Has pedido " . $cantidad . " de " . $bebida . " y te ha costado " . $precio * $cantidad . "€";
      ?>
</body>

</html>