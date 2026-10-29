<?php
require_once("Operations.php");

//Opciones de monedas
$monedas = [
  "euro" => ["text" => "Euro (€)", "value" => "€"],
  "dollar" => ["text" => "USD ($)", "value" => "$"],
  "pound" => ["text" => "Pound (£)", "value" => "£"],
  "yen" => ["text" => "JPY (¥)", "value" => "¥"],
];

$moneda = 'euro'; // Por defecto la clave del array

//Leer cookie si existe
if (isset($_COOKIE['moneda']) && isset($monedas[$_COOKIE['moneda']])) {
  $moneda = $_COOKIE['moneda'];
}

//Si el usuario cambia la moneda, actualizamos variable y Cookie
if (isset($_GET['moneda']) && isset($monedas[$_GET['moneda']])) {
  $moneda = $_GET['moneda'];

  setcookie('moneda', $moneda, time() + (86400 * 30), "/");
}

$simbolo = $monedas[$moneda]['value'];

// Conexión a la base de datos 
$operations = new Operations();

// Procesar formulario POST
$conceptoErr = $importeErr = "";
$concepto = $importe = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if (empty($_POST["concepto"])) {
    $conceptoErr = "Concept is required";
  } else {
    $concepto = trim($_POST['concept']);
  }

  if (empty($_POST["importe"])) {
    $importeErr = "Amount is required";
  } else {
    $importe = (float) $_POST['amount'];
  }
  $tipo = $_POST['type'];
  if ($concepto !== '' && $importe > 0 && ($tipo === 'Expense' || $tipo === 'Income')) {
    $money = new Money();
    $money->setConcept($concepto);
    $money->setAmount($importe);
    $money->setType($tipo);
    $money->setDate(date('Y-m-d'));

    $operations->addMoney($money);
  }

  header('Location: ' . $_SERVER['PHP_SELF']);
  exit;
}

// Obtener transacciones y calcular balance
$listaMoney = $operations->getAllMoney();

$balance = 0;
foreach ($listaMoney as $money) {
  if ($money->getType() === 'Income') {
    $balance += $money->getAmount();
  } else {
    $balance -= $money->getAmount();
  }
}

// Cerrar conexión
$operations->closeConnection();
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Piggy Bank</title>
  <link rel="stylesheet" href="index.css">
</head>

<body>
  <div class="header">
    <img src="img/Group 3.png" alt="Piggy Bank">
    <h1>Piggy Bank</h1>
  </div>

  <div class="container">
    <div class="añadir">
      <h3>New Transaction</h3>
      <form class="formFila" action="" method="post">
        <div class="campo">
          <label for="concept">Concept</label>
          <input type="text" id="concept" name="concept" required>
        </div>

        <div class="campo">
          <label for="amount">Amount</label>
          <input type="number" step="0.01" min="0.01" id="amount" name="amount" required>
        </div>

        <div class="campo">
          <label for="type">Type</label>
          <select id="type" name="type">
            <option value="Expense">Expense</option>
            <option value="Income">Income</option>
          </select>
        </div>

        <input class="boton1" type="submit" value="Add">
      </form>
    </div>

    <div class="moneda">
      <p>Currency:</p>

      <form method="get" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

        <select name="moneda" id="moneda">
          <option value="default" disabled>Select Option</option>
          <?php foreach ($monedas as $key => $item): ?>
            <option value="<?php echo $key; ?>">
              <?php echo $item['text']; ?>
            </option>
          <?php endforeach; ?>
        </select>

        <input class="botonM" type="submit" value="Change">

      </form>
    </div>

    <div class="tabla">
      <table>
        <tr>
          <th>Concept</th>
          <th>Amount</th>
          <th>Type</th>
          <th>Date</th>
          <th>Action</th>
        </tr>
        <?php foreach ($listaMoney as $money): ?>
          <tr>
            <td><?= $money->getConcept() ?></td>
            <td><?= number_format($money->getAmount(), 2, ',', '.') ?> <?= $simbolo ?></td>
            <td><?= $money->getType() ?></td>
            <td><?= $money->getDate() ?></td>
            <td><?= "<a href='cancelMoney.php?id=" . $money->getId() . "' class='boton2'>Cancel</a>"; ?></td>
          </tr>
        <?php endforeach; ?>
      </table>
    </div>

    <div class="total">
      <h1>Total Balance: <?= number_format($balance, 2, ',', '.') ?> <?= $simbolo ?></h1>
    </div>
  </div>
</body>

</html>