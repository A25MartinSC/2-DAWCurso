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
  ]
  ?>
  <h1>Select Dinamico</h1>
  <form>
    <label for="idCompra">Compra</label>
    <select id="idCompra" name="opcion">
      <?php
      foreach ($data as $valordoSelect => $valor) { ?>
        <option value="<?php echo $valordoSelect; ?>"><?php echo $valor["text"]; ?> (<?php echo $valor["precio"]; ?>€)</option>

      <?php
      }
      ?>
    </select>
  </form>
</body>

</html>