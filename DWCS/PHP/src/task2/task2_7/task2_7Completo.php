<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Select</title>
  <style>
    .error {
      color: #FF0000;
    }

    .result {
      margin-top: 15px;
      font-weight: bold;
    }
  </style>
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


  $opcion = $cantidad = "";
  $cantidadErr = "";
  $enviadoConExito = false;


  if ($_SERVER["REQUEST_METHOD"] == "POST") {


    if (isset($_POST["opcion"])) {
      $opcion = test_input($_POST["opcion"]);
    }


    if (empty($_POST["cantidad"])) {
      $cantidadErr = "The amount is required";
    } else {
      $cantidad = test_input($_POST["cantidad"]);


      if (!is_numeric($cantidad) || $cantidad <= 0) {
        $cantidadErr = "Please enter a valid positive number";
      } else {
        $enviadoConExito = true;
      }
    }
  }
  ?>


  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <h1>FORM</h1>

    <label for="idCompra">Compra</label>
    <select id="idCompra" name="opcion">
      <?php
      foreach ($data as $valordoSelect => $valor) {

        $selected = ($opcion == $valordoSelect) ? "selected" : "";
      ?>
        <option value="<?php echo $valordoSelect; ?>" <?php echo $selected; ?>>
          <?php echo $valor["text"]; ?> (<?php echo $valor["precio"]; ?>€)
        </option>
      <?php
      }
      ?>
    </select>
    <br><br>

    <label for="idCantidad">Cantidad:</label>
    <input type="text" id="idCantidad" name="cantidad" value="<?php echo $cantidad; ?>">
    <span class="error">* <?php echo $cantidadErr; ?></span>
    <br><br>

    <input type="submit" value="Send">
  </form>

  <?php

  if ($enviadoConExito && array_key_exists($opcion, $data)) {
    $nombreBebida = $data[$opcion]["text"];
    $precioUnitario = $data[$opcion]["precio"];
    $precioTotal = $cantidad * $precioUnitario;

    echo "<div class='result'>";
    echo "Has pedido " . $cantidad . " de " . $nombreBebida . ". El precio es: " . $precioTotal . " €.";
    echo "</div>";
  }
  ?>
</body>

</html>