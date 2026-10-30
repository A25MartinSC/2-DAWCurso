<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>

  <?php
  $pedido = [
    "name" => "Carmen Agulla",
    "address" => "rua Nova, 23, Santiago de Compostela",
    "pedido" => [
      ["description" => "Keyboard", "price" => 20, "units" => 2],
      ["description" => "Mouse", "price" => 12, "units" => 4],
      ["description" => "Screen", "price" => 130, "units" => 1],
    ],
  ];

  function showPedido(array $datos)
  {
    echo "<p><b>Name:</b> " . $datos["name"] . "</p>";
    echo "<p><b>Address:</b> " . $datos["address"] . "</p>";

    echo "<ul><b>Pedido:</b>";
    $precioTotal = 0;
    foreach ($datos["pedido"] as $producto) {
      echo "<li>" . $producto["units"] . " of " . $producto["description"] . "</li>";

      $precioTotal +=  ($producto["units"] * $producto["price"]);
    }
    echo "</ul>";
    echo "<p><b>Total price: </b> " . $precioTotal . " euros</p>";
  }

  showPedido($pedido);
  ?>



</body>

</html>