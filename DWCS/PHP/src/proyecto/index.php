<?php
require_once("Operations.php");

// Monedas disponibles y su símbolo
$monedas = [
  'Euro (€)' => '€',
  'USD ($)' => '$',
  'Pound (£)' => '£',
  'JPY (¥)' => '¥'
];

// Moneda por defecto
$moneda = 'Euro (€)';

// Si hay cookie guardada, la usamos
if (isset($_COOKIE['moneda']) && isset($monedas[$_COOKIE['moneda']])) {
  $moneda = $_COOKIE['moneda'];
}

// Si el usuario ha elegido una moneda nueva, la guardamos en la cookie
if (isset($_GET['moneda']) && isset($monedas[$_GET['moneda']])) {
  $moneda = $_GET['moneda'];
  setcookie('moneda', $moneda, time() + (86400 * 30), "/");
}

$simbolo = $monedas[$moneda];

// Conexión con la base de datos
$operations = new Operations();

// Si se ha enviado el formulario, añadimos la transacción
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $concepto = trim($_POST['concept']);
  $importe = (float) $_POST['amount'];
  $tipo = $_POST['type'];

  if ($concepto !== '' && ($tipo === 'Expense' || $tipo === 'Income')) {
    $money = new Money();
    $money->setConcept($concepto);
    $money->setAmount($importe);
    $money->setType($tipo);
    $money->setDate(date('Y-m-d'));

    $operations->addMoney($money);
  }

  // Redirigimos para que no se repita al recargar
  header('Location: ' . $_SERVER['PHP_SELF']);
  exit;
}

// Cogemos todas las transacciones de la base de datos
$listaMoney = $operations->getAllMoney();

// Calculamos el balance total
$balance = 0;
foreach ($listaMoney as $money) {
  if ($money->getType() === 'Income') {
    $balance = $balance + $money->getAmount();
  } else {
    $balance = $balance - $money->getAmount();
  }
}

$operations->closeConnection();
?>
<!DOCTYPE html>
<html lang="en">

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

  <div class="añadir">
    <h3>New Transaction</h3>
    <form class="formFila" action="" method="post">
      <div class="campo">
        <label for="concept">Concept</label>
        <input type="text" id="concept" name="concept" required>
      </div>

      <div class="campo">
        <label for="amount">Amount</label>
        <input type="number" step="0.01" min="0" id="amount" name="amount" required>
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
    <form method="get" action="">
      <select name="moneda" onchange="this.form.submit()">
        <?php
        foreach ($monedas as $opcion => $sim) {
          $selected = ($opcion === $moneda) ? 'selected' : '';
          echo "<option value=\"$opcion\" $selected>$opcion</option>";
        }
        ?>
      </select>
    </form>
  </div>

  <div class="tabla">
    <table>
      <tr>
        <th>Concept</th>
        <th>Amount</th>
        <th>Type</th>
        <th>Date</th>
      </tr>
      <?php
      // Filas con las transacciones de la base de datos
      foreach ($listaMoney as $money) {
        $clase = ($money->getType() === 'Income') ? 'ingreso' : 'gasto';
        $concepto = htmlspecialchars($money->getConcept());
        $importe = number_format($money->getAmount(), 2, ',', '.');
        $fecha = date('j-n-Y', strtotime($money->getDate()));

        echo "<tr>";
        echo "<td>$concepto</td>";
        echo "<td>$importe $simbolo</td>";
        echo "<td class=\"$clase\">" . $money->getType() . "</td>";
        echo "<td>$fecha</td>";
        echo "</tr>";
      }

      // Filas vacías hasta llegar a 5, como en el diseño
      $total = count($listaMoney);
      for ($i = $total; $i < 5; $i++) {
        echo "<tr><td></td><td></td><td></td><td></td></tr>";
      }
      ?>
    </table>
  </div>

  <div class="total">
    <h1>Total Balance:
      <?php
      echo number_format($balance, 2, ',', '.') . $simbolo;
      ?>
    </h1>
  </div>
</body>

</html>