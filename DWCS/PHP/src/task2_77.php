<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Select</title>
</head>

<body>
  <?php
  $data = [
    "cocacola" => ["text" => "Coca Cola", "precio" => 2.1],
    "pepsicola" => ["text" => "Pepsi Cola", "precio" => 2],
    "fantanaranja" => ["text" => "Fanta Naranja", "precio" => 2.5],
    "trinamanzana" => ["text" => "Trina Manzana", "precio" => 2.3],
  ];

  function test_input($data)
  {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  // Inicializamos variables
  $opcion = "";
  $cantidad = "";
  $opcionErr = $cantidadErr = "";
  $enviadoConExito = false;

  ?>
  <form method="post">
    <h1>FORM</h1>
    <label for="idCompra">Compra</label>
    <select id="idCompra" name="opcion">
      <?php
      foreach ($data as $valordoSelect => $valor) { ?>
        <option value="<?php echo $valordoSelect; ?>"><?php echo $valor["text"]; ?> (<?php echo $valor["precio"]; ?>€)</option>

      <?php
      }
      ?>

    </select>
    <br><br>
    Cantidad: <input type="text" id="idCantidad" name="cantidad"><br><br>
    <input type="submit" value="Send">
  </form>
</body>

</html>